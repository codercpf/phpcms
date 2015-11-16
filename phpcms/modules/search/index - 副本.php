<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('form','',0);
pc_base::load_sys_class('format','',0);
class index {
	function __construct() {
		$this->db = pc_base::load_model('search_model');
		$this->content_db = pc_base::load_model('content_model');
	}
	
	/**
	 * 关键词搜索
	 */
//修改过无注释
	public function init() {
		//获取siteid
		$siteid = isset($_REQUEST['siteid']) && trim($_REQUEST['siteid']) ? intval($_REQUEST['siteid']) : 1;
		$SEO = seo($siteid);

		//搜索配置
		$search_setting = getcache('search');
		$setting = $search_setting[$siteid];

		$search_model = getcache('search_model_'.$siteid);
		$type_module = getcache('type_module_'.$siteid);

		if(isset($_GET['q'])) {
			if(trim($_GET['q'])=='') {
				header('Location: '.APP_PATH.'index.php?m=search');exit;
			}
			$typeid = empty($_GET['typeid']) ? 1: intval($_GET['typeid']);
			$time = empty($_GET['time']) || !in_array($_GET['time'],array('all','day','month','year','week')) ? 'all' : trim($_GET['time']);
			$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
			$pagesize = 10;
			$q = safe_replace(trim($_GET['q']));
			$q = new_html_special_chars(strip_tags($q));
			$q = str_replace('%', '', $q);	//过滤'%'，用户全文搜索
			$search_q = $q;	//搜索原内容
			
			//按时间搜索
			if($time == 'day') {
				$search_time = SYS_TIME - 86400;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'week') {
				$search_time = SYS_TIME - 604800;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'month') {
				$search_time = SYS_TIME - 2592000;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'year') {
				$search_time = SYS_TIME - 31536000;
				$sql_time = ' AND adddate > '.$search_time;
			} else {
				$search_time = 0;
				$sql_time = '';
			}
			if($page==1 && !$setting['sphinxenable']) {
				//精确搜索
				$commend = $this->db->get_one("`typeid` = '$typeid' $sql_time AND `data` like '%$q%'");
			} else {
				$commend = '';
			}
			//如果开启sphinx
			if($setting['sphinxenable']) {
				$sphinx = pc_base::load_app_class('search_interface', '', 0);
				$sphinx = new search_interface();
				
				$offset = $pagesize*($page-1);
				$res = $sphinx->search($q, array($siteid), array($typeid), array($search_time, SYS_TIME), $offset, $pagesize, '@weight desc');
				$totalnums = $res['total'];
				//如果结果不为空
				if(!empty($res['matches'])) {
					$result = $res['matches'];
				}
			} else {
				pc_base::load_sys_class('segment', '', 0);
				$segment = new segment();
				//分词结果
				$segment_q = $segment->get_keyword($segment->split_result($q));
/*
				//如果分词结果为空
				if(!empty($segment_q)) {
					$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND MATCH (`data`) AGAINST ('$segment_q' IN BOOLEAN MODE)";

					echo "分词不为空<br/>";
					echo $sql."<br/>";
				} else {
					$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND `data` like '%$q%'";

					echo "分词为空<br/>";
					echo $sql."<br/>";
				}
*/
				/* 方法二、
				$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND `data` like '%$q%'";
				*/

//				方法三

				//如果分词结果为空
				if(!empty($segment_q)) {
					$length = strlen($segment_q);
					$q_key = "'".$segment_q."'";
					if($length>=9){
						$sql = "`siteid`= '1' AND `typeid` = '$typeid' AND (SELECT (LENGTH(`data`)-LENGTH(REPLACE(`data`,$q_key,'')))) >17";
					}else{
						$sql = "`siteid`= '1' AND `typeid` = '$typeid' AND (SELECT (LENGTH(`data`)-LENGTH(REPLACE(`data`,$q_key,'')))) >11";
					}
				} else {
					$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' AND `data` like '%$q%'";
				}


				$result = $this->db->listinfo($sql, 'searchid DESC', $page, 10);
			}

			//如果开启相关搜索功能
			if($setting['relationenble']) {
				//如果关键词长度在8-16之间，保存关键词作为relation search
				$this->keyword_db = pc_base::load_model('search_keyword_model');

				if(strlen($q) < 17 && strlen($q) > 5 && !empty($segment_q)) {
					$res = $this->keyword_db->get_one(array('keyword'=>$q));
					if($res) {
						//关键词搜索数+1
						//$this->keyword_db->update(array('searchnums'=>'+=1'), array('keyword'=>$q));
					} else {
						//关键词转换为拼音
						pc_base::load_sys_func('iconv');
						$pinyin = gbk_to_pinyin($q);
						if(is_array($pinyin)) {
							$pinyin = implode('', $pinyin);
						}
						$this->keyword_db->insert(array('keyword'=>$q, 'searchnums'=>1, 'data'=>$segment_q, 'pinyin'=>$pinyin));
					}
				}
				//相关搜索
				if(!empty($segment_q)) {
					$relation_q = str_replace(' ', '%', $segment_q);
				} else {
					$relation_q = $q;
				}
				$relation = $this->keyword_db->select("MATCH (`data`) AGAINST ('%$relation_q%' IN BOOLEAN MODE)", '*', 10, 'searchnums DESC');
			}
				
			//如果结果不为空
			  if(!empty($result) || !empty($commend['id'])) {
				//开启sphinx后文章id取法不同
				if($setting['sphinxenable']) {
					foreach($result as $_v) {
						$sids[] = $_v['attrs']['id'];
					}
				} else {
					foreach($result as $_v) {
						$sids[] = $_v['id'];
					}
				}

				if(!empty($commend['id'])) {
					$sids[] = $commend['id'];
				}
				$sids = array_unique($sids);

				$where = to_sqls($sids, '', 'id');
				//获取模型id
				$model_type_cache = getcache('type_model_'.$siteid,'search');
				$model_type_cache = array_flip($model_type_cache);
				$modelid = $model_type_cache[$typeid];

				//是否读取其他模块接口
				if($modelid) {
					$this->content_db->set_model($modelid);
					
					/**
					 * 如果表名为空，则为黄页模型
					 */
					if(empty($this->content_db->model_tablename)) {
						$this->content_db = pc_base::load_model('yp_content_model');
						$this->content_db->set_model($modelid);
					}

					if($setting['sphinxenable']) {
						$data = $this->content_db->listinfo($where, 'id DESC', 1, $pagesize);
						$pages = pages($totalnums, $page, $pagesize);
					} else {
						$data = $this->content_db->select($where, '*');
						$pages = $this->db->pages;
						$totalnums = $this->db->number;
					}
				
					//如果分词结果为空
					if(!empty($segment_q)) {
						$replace = explode(' ', $segment_q);
						foreach($replace as $replace_arr_v) {
							$replace_arr[] =  '<font color=red>'.$replace_arr_v.'</font>';
						}
						foreach($data as $_k=>$_v) {
							$data[$_k]['title'] = str_replace($replace, $replace_arr, $_v['title']);
							$data[$_k]['description'] = str_replace($replace, $replace_arr, $_v['description']);
						}
					} else {
						foreach($data as $_k=>$_v) {
							$data[$_k]['title'] = str_replace($q, '<font color=red>'.$q.'</font>', $_v['title']);
							$data[$_k]['description'] = str_replace($q, '<font color=red>'.$q.'</font>', $_v['description']);
						}
					}
				} else {
					//读取专辑搜索接口
					$special_api = pc_base::load_app_class('search_api', 'special');
 					$data = $special_api->get_search_data($sids);
					$totalnums = count($data);
				}
			}
			$execute_time = execute_time();
			$pages = isset($pages) ? $pages : '';
			$totalnums = isset($totalnums) ? $totalnums : 0;
			$data = isset($data) ? $data : '';

			include	template('search','searchlist');
//			include	template('search','list');
		} else {
			include	template('search','index');
		}
	}
//修改过加注释有效
	public function init_mod_useful() {
		//获取siteid
		$siteid = isset($_REQUEST['siteid']) && trim($_REQUEST['siteid']) ? intval($_REQUEST['siteid']) : 1;
		$SEO = seo($siteid);

		//搜索配置
		$search_setting = getcache('search');
		$setting = $search_setting[$siteid];

		$search_model = getcache('search_model_'.$siteid);
		$type_module = getcache('type_module_'.$siteid);

		if(isset($_GET['q'])) {
			if(trim($_GET['q'])=='') {
				header('Location: '.APP_PATH.'index.php?m=search');exit;
			}
			$typeid = empty($_GET['typeid']) ? 1: intval($_GET['typeid']);
			$time = empty($_GET['time']) || !in_array($_GET['time'],array('all','day','month','year','week')) ? 'all' : trim($_GET['time']);
			$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
			$pagesize = 10;
			$q = safe_replace(trim($_GET['q']));
			$q = new_html_special_chars(strip_tags($q));
			$q = str_replace('%', '', $q);	//过滤'%'，用户全文搜索
			$search_q = $q;	//搜索原内容

			//按时间搜索
			if($time == 'day') {
				$search_time = SYS_TIME - 86400;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'week') {
				$search_time = SYS_TIME - 604800;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'month') {
				$search_time = SYS_TIME - 2592000;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'year') {
				$search_time = SYS_TIME - 31536000;
				$sql_time = ' AND adddate > '.$search_time;
			} else {
				$search_time = 0;
				$sql_time = '';
			}
			if($page==1 && !$setting['sphinxenable']) {
				//精确搜索
				$commend = $this->db->get_one("`typeid` = '$typeid' $sql_time AND `data` like '%$q%'");

				echo "精确搜索<br/>commend=<br/>";
			} else {
				$commend = '';
			}

			echo "到commend这里";
			echo "<pre>";
			print_r($commend);
			echo "<pre>";



			//如果开启sphinx
			if($setting['sphinxenable']) {
				$sphinx = pc_base::load_app_class('search_interface', '', 0);
				$sphinx = new search_interface();

				$offset = $pagesize*($page-1);
				$res = $sphinx->search($q, array($siteid), array($typeid), array($search_time, SYS_TIME), $offset, $pagesize, '@weight desc');
				$totalnums = $res['total'];
				//如果结果不为空
				if(!empty($res['matches'])) {
					$result = $res['matches'];
				}
				/*
                                echo "开启了sphinx";
                                echo $totalnums;exit();
                */
			} else {
				pc_base::load_sys_class('segment', '', 0);
				$segment = new segment();
				//分词结果
				$segment_q = $segment->get_keyword($segment->split_result($q));

				echo "分词结果：".$segment_q."<br/>";
				/*
                                //如果分词结果为空
                                if(!empty($segment_q)) {
                                    $sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND MATCH (`data`) AGAINST ('$segment_q' IN BOOLEAN MODE)";

                                    echo "分词不为空<br/>";
                                    echo $sql."<br/>";
                                } else {
                                    $sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND `data` like '%$q%'";

                                    echo "分词为空<br/>";
                                    echo $sql."<br/>";
                                }
                */
				/* 方法二、
				$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND `data` like '%$q%'";
				*/

//				方法三

				//如果分词结果为空
				if(!empty($segment_q)) {
					$length = strlen($segment_q);
					$q_key = "'".$segment_q."'";
					if($length>=9){
						$sql = "`siteid`= '1' AND `typeid` = '$typeid' AND (SELECT (LENGTH(`data`)-LENGTH(REPLACE(`data`,$q_key,'')))) >17";
					}else{
						$sql = "`siteid`= '1' AND `typeid` = '$typeid' AND (SELECT (LENGTH(`data`)-LENGTH(REPLACE(`data`,$q_key,'')))) >11";
					}
				} else {
					$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' AND `data` like '%$q%'";
				}


				$result = $this->db->listinfo($sql, 'searchid DESC', $page, 10);

				echo "未开启分词";
				echo "<pre>";
				print_r($result);
				echo "<pre>";

			}

			//如果开启相关搜索功能
			if($setting['relationenble']) {
				//如果关键词长度在8-16之间，保存关键词作为relation search
				$this->keyword_db = pc_base::load_model('search_keyword_model');

				if(strlen($q) < 17 && strlen($q) > 5 && !empty($segment_q)) {
					$res = $this->keyword_db->get_one(array('keyword'=>$q));
					if($res) {
						//关键词搜索数+1
						//$this->keyword_db->update(array('searchnums'=>'+=1'), array('keyword'=>$q));
					} else {
						//关键词转换为拼音
						pc_base::load_sys_func('iconv');
						$pinyin = gbk_to_pinyin($q);
						if(is_array($pinyin)) {
							$pinyin = implode('', $pinyin);
						}
						$this->keyword_db->insert(array('keyword'=>$q, 'searchnums'=>1, 'data'=>$segment_q, 'pinyin'=>$pinyin));
					}
				}
				//相关搜索
				if(!empty($segment_q)) {
					$relation_q = str_replace(' ', '%', $segment_q);
				} else {
					$relation_q = $q;
				}
				$relation = $this->keyword_db->select("MATCH (`data`) AGAINST ('%$relation_q%' IN BOOLEAN MODE)", '*', 10, 'searchnums DESC');
			}

			//如果结果不为空
			if(!empty($result) || !empty($commend['id'])) {

				echo "满足结果不为空的条件！<br/>";


				//开启sphinx后文章id取法不同
				if($setting['sphinxenable']) {
					foreach($result as $_v) {
						$sids[] = $_v['attrs']['id'];
					}
				} else {

					echo "没开启sphinx!<br/>";

					foreach($result as $_v) {
						$sids[] = $_v['id'];
					}

					echo "<pre>";
					print_r($sids);
					echo "<pre>";
					echo "result为空！<br/>";

				}

				if(!empty($commend['id'])) {
					$sids[] = $commend['id'];

					echo "<pre>";
					print_r($sids);
					echo "<pre>";

				}
				$sids = array_unique($sids);

				echo "<pre>";
				print_r($sids);
				echo "<pre>";

				$where = to_sqls($sids, '', 'id');
				//获取模型id
				$model_type_cache = getcache('type_model_'.$siteid,'search');
				$model_type_cache = array_flip($model_type_cache);
				$modelid = $model_type_cache[$typeid];

				echo "modelid=$modelid<br/>";

				//是否读取其他模块接口
				if($modelid) {
					$this->content_db->set_model($modelid);

					/**
					 * 如果表名为空，则为黄页模型
					 */
					if(empty($this->content_db->model_tablename)) {

						echo "表名为空！<br/>";
						$this->content_db = pc_base::load_model('yp_content_model');
						$this->content_db->set_model($modelid);

					}

					echo "表名不为空！<br/>";

					if($setting['sphinxenable']) {
						$data = $this->content_db->listinfo($where, 'id DESC', 1, $pagesize);
						$pages = pages($totalnums, $page, $pagesize);
					} else {

						echo "未设置sphinxenable！<br/>";

						$data = $this->content_db->select($where, '*');

						echo "这里取到了data<br/>";
						echo "<pre>";
						print_r($data);
						echo "<pre>";



						$pages = $this->db->pages;
						$totalnums = $this->db->number;
//问题
						echo "totalnums=$totalnums<br/>";

					}

					//如果分词结果为空
					if(!empty($segment_q)) {

						echo "分词结果不为空<br/>";
						echo "<pre>";
						print_r($segment_q);
						echo "<pre>";
						echo "11111<br/>";


						$replace = explode(' ', $segment_q);
						foreach($replace as $replace_arr_v) {
							$replace_arr[] =  '<font color=red>'.$replace_arr_v.'</font>';
						}
						foreach($data as $_k=>$_v) {
							$data[$_k]['title'] = str_replace($replace, $replace_arr, $_v['title']);
							$data[$_k]['description'] = str_replace($replace, $replace_arr, $_v['description']);
						}
					} else {

						echo "分词结果为空！<br/>";
						foreach($data as $_k=>$_v) {
							$data[$_k]['title'] = str_replace($q, '<font color=red>'.$q.'</font>', $_v['title']);
							$data[$_k]['description'] = str_replace($q, '<font color=red>'.$q.'</font>', $_v['description']);
						}
					}


					echo "<pre>";
					print_r($data);
					echo "<pre>";


				} else {

					echo "到这里------------aaaaa<br/>";

					//读取专辑搜索接口
					$special_api = pc_base::load_app_class('search_api', 'special');
					$data = $special_api->get_search_data($sids);
					$totalnums = count($data);

					echo $totalnums;exit();
				}
			}
			$execute_time = execute_time();
			$pages = isset($pages) ? $pages : '';
			$totalnums = isset($totalnums) ? $totalnums : 0;

			echo "totalnums=$totalnums<br/>";


			$data = isset($data) ? $data : '';
			/*
                        echo "<pre>";
                        print_r($data);
                        echo "<pre>";
                        exit();
            */
			include	template('search','searchlist');
//			include	template('search','list');
		} else {
			include	template('search','index');
		}
	}
//原生
	public function init_origin() {
		//获取siteid
		$siteid = isset($_REQUEST['siteid']) && trim($_REQUEST['siteid']) ? intval($_REQUEST['siteid']) : 1;
		$SEO = seo($siteid);

		//搜索配置
		$search_setting = getcache('search');
		$setting = $search_setting[$siteid];

		$search_model = getcache('search_model_'.$siteid);
		$type_module = getcache('type_module_'.$siteid);

		if(isset($_GET['q'])) {
			if(trim($_GET['q'])=='') {
				header('Location: '.APP_PATH.'index.php?m=search');exit;
			}
			$typeid = empty($_GET['typeid']) ? 48 : intval($_GET['typeid']);
			$time = empty($_GET['time']) || !in_array($_GET['time'],array('all','day','month','year','week')) ? 'all' : trim($_GET['time']);
			$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
			$pagesize = 10;
			$q = safe_replace(trim($_GET['q']));
			$q = new_html_special_chars(strip_tags($q));
			$q = str_replace('%', '', $q);	//过滤'%'，用户全文搜索
			$search_q = $q;	//搜索原内容

			//按时间搜索
			if($time == 'day') {
				$search_time = SYS_TIME - 86400;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'week') {
				$search_time = SYS_TIME - 604800;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'month') {
				$search_time = SYS_TIME - 2592000;
				$sql_time = ' AND adddate > '.$search_time;
			} elseif($time == 'year') {
				$search_time = SYS_TIME - 31536000;
				$sql_time = ' AND adddate > '.$search_time;
			} else {
				$search_time = 0;
				$sql_time = '';
			}
			if($page==1 && !$setting['sphinxenable']) {
				//精确搜索
				$commend = $this->db->get_one("`typeid` = '$typeid' $sql_time AND `data` like '%$q%'");
			} else {
				$commend = '';
			}
			//如果开启sphinx
			if($setting['sphinxenable']) {
				$sphinx = pc_base::load_app_class('search_interface', '', 0);
				$sphinx = new search_interface();

				$offset = $pagesize*($page-1);
				$res = $sphinx->search($q, array($siteid), array($typeid), array($search_time, SYS_TIME), $offset, $pagesize, '@weight desc');
				$totalnums = $res['total'];
				//如果结果不为空
				if(!empty($res['matches'])) {
					$result = $res['matches'];
				}
			} else {
				pc_base::load_sys_class('segment', '', 0);
				$segment = new segment();
				//分词结果
				$segment_q = $segment->get_keyword($segment->split_result($q));
				//如果分词结果为空
				if(!empty($segment_q)) {
					$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND MATCH (`data`) AGAINST ('$segment_q' IN BOOLEAN MODE)";
				} else {
					$sql = "`siteid`= '$siteid' AND `typeid` = '$typeid' $sql_time AND `data` like '%$q%'";
				}

				$result = $this->db->listinfo($sql, 'searchid DESC', $page, 10);
			}

			//如果开启相关搜索功能
			if($setting['relationenble']) {
				//如果关键词长度在8-16之间，保存关键词作为relation search
				$this->keyword_db = pc_base::load_model('search_keyword_model');

				if(strlen($q) < 17 && strlen($q) > 5 && !empty($segment_q)) {
					$res = $this->keyword_db->get_one(array('keyword'=>$q));
					if($res) {
						//关键词搜索数+1
						//$this->keyword_db->update(array('searchnums'=>'+=1'), array('keyword'=>$q));
					} else {
						//关键词转换为拼音
						pc_base::load_sys_func('iconv');
						$pinyin = gbk_to_pinyin($q);
						if(is_array($pinyin)) {
							$pinyin = implode('', $pinyin);
						}
						$this->keyword_db->insert(array('keyword'=>$q, 'searchnums'=>1, 'data'=>$segment_q, 'pinyin'=>$pinyin));
					}
				}
				//相关搜索
				if(!empty($segment_q)) {
					$relation_q = str_replace(' ', '%', $segment_q);
				} else {
					$relation_q = $q;
				}
				$relation = $this->keyword_db->select("MATCH (`data`) AGAINST ('%$relation_q%' IN BOOLEAN MODE)", '*', 10, 'searchnums DESC');
			}

			//如果结果不为空
			if(!empty($result) || !empty($commend['id'])) {
				//开启sphinx后文章id取法不同
				if($setting['sphinxenable']) {
					foreach($result as $_v) {
						$sids[] = $_v['attrs']['id'];
					}
				} else {
					foreach($result as $_v) {
						$sids[] = $_v['id'];
					}
				}

				if(!empty($commend['id'])) {
					$sids[] = $commend['id'];
				}
				$sids = array_unique($sids);

				$where = to_sqls($sids, '', 'id');
				//获取模型id
				$model_type_cache = getcache('type_model_'.$siteid,'search');
				$model_type_cache = array_flip($model_type_cache);
				$modelid = $model_type_cache[$typeid];

				//是否读取其他模块接口
				if($modelid) {
					$this->content_db->set_model($modelid);

					/**
					 * 如果表名为空，则为黄页模型
					 */
					if(empty($this->content_db->model_tablename)) {
						$this->content_db = pc_base::load_model('yp_content_model');
						$this->content_db->set_model($modelid);

					}

					if($setting['sphinxenable']) {
						$data = $this->content_db->listinfo($where, 'id DESC', 1, $pagesize);
						$pages = pages($totalnums, $page, $pagesize);
					} else {
						$data = $this->content_db->select($where, '*');
						$pages = $this->db->pages;
						$totalnums = $this->db->number;
					}

					//如果分词结果为空
					if(!empty($segment_q)) {
						$replace = explode(' ', $segment_q);
						foreach($replace as $replace_arr_v) {
							$replace_arr[] =  '<font color=red>'.$replace_arr_v.'</font>';
						}
						foreach($data as $_k=>$_v) {
							$data[$_k]['title'] = str_replace($replace, $replace_arr, $_v['title']);
							$data[$_k]['description'] = str_replace($replace, $replace_arr, $_v['description']);
						}
					} else {
						foreach($data as $_k=>$_v) {
							$data[$_k]['title'] = str_replace($q, '<font color=red>'.$q.'</font>', $_v['title']);
							$data[$_k]['description'] = str_replace($q, '<font color=red>'.$q.'</font>', $_v['description']);
						}
					}
				} else {
					//读取专辑搜索接口
					$special_api = pc_base::load_app_class('search_api', 'special');
					$data = $special_api->get_search_data($sids);
					$totalnums = count($data);
				}
			}
			$execute_time = execute_time();
			$pages = isset($pages) ? $pages : '';
			$totalnums = isset($totalnums) ? $totalnums : 0;
			$data = isset($data) ? $data : '';

			include	template('search','list');
		} else {
			include	template('search','index');
		}
	}
	
	public function public_get_suggest_keyword() {
		$url = $_GET['url'].'&q='.$_GET['q'];
		$trust_url = array('c8430fcf851e85818b546addf5bc4dd3');
		$urm_md5 = md5($url);
		if (!in_array($urm_md5, $trust_url)) exit;
		
		$res = @file_get_contents($url);
		if(CHARSET != 'gbk') {
			$res = iconv('gbk', CHARSET, $res);
		}
		echo $res;
	}
	
	/**
	 * 提示搜索接口
	 * TODO 暂时未启用，用的是google的接口
	 */
	public function public_suggest_search() {
		//关键词转换为拼音
		pc_base::load_sys_func('iconv');
		$pinyin = gbk_to_pinyin($q);
		if(is_array($pinyin)) {
			$pinyin = implode('', $pinyin);
		}
		$this->keyword_db = pc_base::load_model('search_keyword_model');
		$suggest = $this->keyword_db->select("pinyin like '$pinyin%'", '*', 10, 'searchnums DESC');
		
		foreach($suggest as $v) {
			echo $v['keyword']."\n";
		}

		
	}
}
?>