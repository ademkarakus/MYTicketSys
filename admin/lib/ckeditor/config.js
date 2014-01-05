/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.language = 'tr';
	//config.uiColor = '#71A9D2';
	config.toolbarGroups = [
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },

		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		//{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		//{ name: 'forms' },
		//{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		//{ name: 'about' }
	];
	config.filebrowserBrowseUrl = '../ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '../ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '../ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type;=Files';
	config.filebrowserImageUploadUrl = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type;=Images';
	config.filebrowserFlashUploadUrl = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type;=Flash';
};
