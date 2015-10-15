seajs.config({
	base : 'http://tpl0.cyzone.cn/templates/cyzonev2/js/',
	alias:{
		func : 'lib/function',
		validform : 'lib/validform',
		cookie : 'lib/jquery.cookie',
		layer : 'lib/layer.min',
		unslider : 'lib/unslider',
		tongji : 'lib/tongji'
	},
	map: [
	[ /^(.*\/templates\/cyzonev2\/js\/.*\.(?:css|js))(?:.*)$/i, '$1?201509014' ]
	],
	vars:{
		temp : '/templates/cyzonev2/'
	},
	charset : 'utf-8'
});
seajs.use(['init']);