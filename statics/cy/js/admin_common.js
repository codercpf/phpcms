function confirmurl(url,message) {
	url = url+'&pc_hash='+pc_hash;
	if(confirm(message)) redirect(url);
}
function redirect(url) {
	location.href = url;
}
//滚动条
$(function(){
	$(":text").addClass('input-text');
})

/**
 * 全选checkbox,注意：标识checkbox id固定为为check_box
 * @param string name 列表check名称,如 uid[]
 */
function selectall(name) {
	if ($("#check_box").attr("checked")==false || $("#check_box").attr("checked")==undefined) {
		$("input[name='"+name+"']").each(function() {
			this.checked=false;
		});
	} else {
		$("input[name='"+name+"']").each(function() {
			this.checked=true;
		});
	}
}
function openwinx(url,name,w,h) {
	url = url+'&pc_hash='+pc_hash;
	if (!w && !h) {
		window.open(url,name);
	} else {
		if(!w) w=screen.width-4;
		if(!h) h=screen.height-95;
		window.open(url,name,"top=100,left=400,width=" + w + ",height=" + h + ",toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,status=no");
	}
}

function opentab(url) {
	var a = $("<a href='"+url+"' target='_blank'></a>").get(0);
	var e = document.createEvent('MouseEvents');
    e.initEvent('click', true, true);
    a.dispatchEvent(e);
    // console.log('event has been changed');
}

//弹出对话框
function omnipotent(id,linkurl,title,close_type,w,h) {
	if(!w) w=780;
	if(!h) h=440;
	art.dialog({id:id,iframe:linkurl, title:title, width:w, height:h, lock:true}, function(){
		if(close_type==1) {
			art.dialog({id:id}).close()
		} else {
			var d = art.dialog({id:id}).data.iframe;
			var form = d.document.getElementById('dosubmit');form.click();
		}
		return false;
	}, function(){
		art.dialog({id:id}).close()
	});
	void(0);
}

function wxomnipotent(id,linkurl,title,close_type,w,h) {
	if(!w) w=780;
	if(!h) h=440;
	window.top.art.dialog({id:id,iframe:linkurl, title:title, width:w, height:h, lock:true}, function(){
		if(close_type==1) {
			window.top.art.dialog({id:id}).close()
		} else {
			var d = window.top.art.dialog({id:id}).data.iframe;
			var form = d.document.getElementById('dosubmit');form.click();
		}
		return false;
	}, function(){
		window.top.art.dialog({id:id}).close()
	});
	void(0);
}