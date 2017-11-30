
if (!RedactorPlugins) var RedactorPlugins = {};

RedactorPlugins.fontsize = {
	init: function()
	{
		var fonts = [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 24, 26, 28, 30];
		var that = this;
		var dropdown = {};

		jQuery.each(fonts, function(i, s)
		{
			dropdown['s' + i] = { title: s + 'px', callback: function() { that.setFontsize(s); } };
		});
		dropdown['remove'] = { title: 'Remove font size', callback: function() { that.resetFontsize(); } };
		this.buttonAddFirst( 'fontsize', 'Change font size', false, dropdown);
	},
	setFontsize: function(size)
	{
		this.inlineSetStyle('font-size', size + 'px');
	},
	resetFontsize: function()
	{
		this.inlineRemoveStyle('font-size');
	}
};