/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
        { name: 'texttransform', groups: [ 'TransformTextToUppercase', 'TransformTextToLowercase', 'TransformTextCapitalize', 'TransformTextSwitcher' ] },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	config.colorButton_backStyle = {
		element: 'span',
		styles: { 'background-color': '#(color)' }
	};



	config.colorButton_colors = '00923E,F8C100,28166F';

	config.colorButton_colors = 'FontColor1/FF9900,FontColor2/0066CC,FontColor3/F00';
	
	// CKEditor color palette available before version 4.6.2.
	config.colorButton_colors =
		'000,800000,8B4513,2F4F4F,008080,000080,4B0082,696969,' +
		'B22222,A52A2A,DAA520,006400,40E0D0,0000CD,800080,808080,' +
		'F00,FF8C00,FFD700,008000,0FF,00F,EE82EE,A9A9A9,' +
		'FFA07A,FFA500,FFFF00,00FF00,AFEEEE,ADD8E6,DDA0DD,D3D3D3,' +
		'FFF0F5,FAEBD7,FFFFE0,F0FFF0,F0FFFF,F0F8FF,E6E6FA,FFF';

	config.colorButton_enableMore = false;
	config.colorButton_enableAutomatic = false;



	config.colorButton_foreStyle = {
		element: 'span',
		styles: { color: '#(color)' }
	};


///////////////////////////////////////////////
config.chart_height = 400;
config.chart_maxItems = 12;
config.chart_colors =
{
	// Colors for Bar/Line chart.
	fillColor: 'rgba(151,187,205,0.5)',
	strokeColor: 'rgba(151,187,205,0.8)',
	highlightFill: 'rgba(151,187,205,0.75)',
	highlightStroke: 'rgba(151,187,205,1)',
	// Colors for Doughnut/Pie/PolarArea charts.
	data: [ '#B33131', '#B66F2D', '#B6B330', '#71B232', '#33B22D', '#31B272', '#2DB5B5', '#3172B6', '#3232B6', '#6E31B2', '#B434AF', '#B53071' ]
};
config.chart_configBar = { animation: false };
config.chart_configDoughnut = { animateRotate: false };











	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	//config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	config.extraPlugins = 'pagebreak, print,justify,texttransform,colorbutton,panelbutton,floatpanel,button,panel,find,font,indentblock,uploadfile';
	
	//allowedContent:true
	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.language = 'es';

};
