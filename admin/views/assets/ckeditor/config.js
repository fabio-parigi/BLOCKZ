/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	 config.filebrowserBrowseUrl = 'assets/ckeditor/ckfinder/ckfinder.html',
    config.filebrowserImageBrowseUrl = 'assets/ckeditor/ckfinder/ckfinder.html?type=Images',
    config.filebrowserFlashBrowseUrl = 'assets/ckeditor/ckfinder/ckfinder.html?type=Flash',
    config.filebrowserUploadUrl = 'assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Files',
    config.filebrowserImageUploadUrl = 'assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Images',
    config.filebrowserFlashUploadUrl = 'assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Flash'
	
};
