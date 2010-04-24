/*
 * JavaScript file
 *
 */

function doAjaxPost(action, form) {
	jsonText = '';
	for (i = 0; i < form.length; i++) {
		', ' + form.elements[i].name + " : '" + form.elements[i].value + "'";
	}
	// remove the first comma
	jsonText = jsonText.substring(1);
	jsonText = '{ ' + jsonText + ' }';
}

function doNormalPost(form) {

}
