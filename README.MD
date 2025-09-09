Use this command to create a pot file
`wp i18n make-pot . languages/my.pot`

If there is two text-domain and need two pot for eeach then use like this `wp i18n make-pot legacy legacy/languages/legacy.pot --slug=legacy-text-domain && wp i18n make-pot revamp revamp/languages/revamp.pot --slug=revamp-text-domain`

Run it on plugin folder

var _wp$i18n = wp.i18n;
	var __ = _wp$i18n.__;
	var _x = _wp$i18n._x;
	var _n = _wp$i18n._n;
	var _nx = _wp$i18n._nx;
  
  Add this code in js file
  
  
  For more https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
