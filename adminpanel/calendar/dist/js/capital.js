
   jQuery(document).ready(function($) {
  $('#accounts').keyup(function(event) {
    var textBox = event.target;
    var start = textBox.selectionStart;
    var end = textBox.selectionEnd;
    textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1).toUpperCase();
    textBox.setSelectionRange(start, end);
  });
});
jQuery(document).ready(function($) {
$('#member_first').keyup(function(event) {
 var textBox = event.target;
 var start = textBox.selectionStart;
 var end = textBox.selectionEnd;
 textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1).toUpperCase();
 textBox.setSelectionRange(start, end);
});
});
