/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
var contentsCss = typeof(CKEDITOR_CSS)!='undefined' && CKEDITOR_CSS!='' ? CKEDITOR_CSS : 'contents.css'/*tpa=http://js.cyzone.cn/statics/js/ckeditor/contents.css*/;
CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.contentsCss = contentsCss;
	config.uiColor = '#f7f5f4';
	config.width = '';
	config.removePlugins = 'elementspath,scayt';
	config.disableNativeSpellChecker = false;
	//config.pasteFromWordRemoveFontStyles = false;
	//config.pasteFromWordRemoveStyles = false;
	config.resize_dir = 'vertical';
	//设置快捷键 从上往下依次是：获取焦点，元素焦点，文本菜单，撤销，重做，重做，链接，粗体，斜体，下划线
	config.keystrokes = [
		[CKEDITOR.CTRL + 13 /*Enter*/, 'maximize'],
		[CKEDITOR.ALT + 121 /*F10*/
		, 'toolbarFocus'],
		[CKEDITOR.ALT + 122 /*F11*/
		, 'elementsPathFocus'],
		[CKEDITOR.SHIFT + 121 /*F10*/
		, 'contextMenu'],
		[CKEDITOR.CTRL + 90 /*Z*/
		, 'undo'],
		[CKEDITOR.CTRL + 89 /*Y*/
		, 'redo'],
		[CKEDITOR.CTRL + CKEDITOR.SHIFT + 90 /*Z*/
		, 'redo'],
		[CKEDITOR.CTRL + 76 /*L*/
		, 'link'],
		[CKEDITOR.CTRL + 66 /*B*/
		, 'bold'],
		[CKEDITOR.CTRL + 73 /*I*/
		, 'italic'],
		[CKEDITOR.CTRL + 85 /*U*/
		, 'underline'],
		[CKEDITOR.ALT + 109 /*-*/
		, 'toolbarCollapse']
	];
	config.extraPlugins = 'capture,videoforpc';
	//config.enterMode = CKEDITOR.ENTER_BR;
	//config.shiftEnterMode = CKEDITOR.ENTER_P;
	config.font_names='宋体/宋体;黑体/黑体;仿宋/仿宋_GB2312;楷体/楷体_GB2312;隶书/隶书;幼圆/幼圆;微软雅黑/微软雅黑;'+ config.font_names;
	config.skin = 'BootstrapCK-Skin';
};

CKEDITOR.on( 'instanceReady', function( ev ){ with (ev.editor.dataProcessor.writer) { setRules("p", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("h1", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("h2", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("h3", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("h4", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("h5", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("div", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("table", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("tr", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("td", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("iframe", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("li", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("ul", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); setRules("ol", {indent : false, breakAfterOpen : false, breakBeforeClose : false} ); } });
//CKEDITOR.plugins.load('pgrfilemanager');
function insert_page(editorid)
{
	var editor = CKEDITOR.instances[editorid];
	editor.insertHtml('[page]');
	if($('#paginationtype').val()) {
		$('#paginationtype').val(2);
		$('#paginationtype').css("color","red");
	}
}

function insert_page_title(editorid, insertdata) {
	if (insertdata) {
		var editor = CKEDITOR.instances[editorid];
		var data = editor.getData();
		var page_title_value = $("#page_title_value_" + editorid).val();
		if (page_title_value == '') {
			$("#msg_page_title_value_" + editorid).html("<font color='red'>请输入子标题</font>");
			return false;
		}
		page_title_value = '[page]' + page_title_value + '[/page]';
		editor.insertHtml(page_title_value);
		$("#page_title_value_" + editorid).val('');
		$("#msg_page_title_value_" + editorid).html('');
		$("#page_title_div_" + editorid).hide("fast");
		if ($('#paginationtype').val()) {
			$('#paginationtype').val(2);
			$('#paginationtype').css("color", "red");
		}
	} else {
		$("#page_title_div_" + editorid).slideDown("fast");
	}
}

var objid = MM_objid = key = 0;
function file_list(fn,url,obj) {
	$('#MM_file_list_editor1').append('<div id="MM_file_list_'+fn+'">'+url+' <a href=\'#\' onMouseOver=\'javascript:FilePreview("'+url+'", 1);\' onMouseout=\'javascript:FilePreview("", 0);\'>查看</a> | <a href="javascript:insertHTMLToEditor(\'<img src='+url+'>\',\''+fn+'\')">插入</A> | <a href="javascript:del_file(\''+fn+'\',\''+url+'\','+fn+')">删除</a><br>');
}

