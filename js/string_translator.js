const { __ } = wp.i18n;
window.addEventListener('load',function(event){
   alert( __('This string is from js file', 'string_translator'));
   alert(object_name.some_string );
   alert(parseInt( object_name.a_value,10));
},false);