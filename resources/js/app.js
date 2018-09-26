require('./bootstrap');

var actionFormButton = $(".action_form_button");
var articleForm = $(".form__body");
var formCloseButton = $(".form__close");


actionFormButton.click(function(e) {
	articleForm.toggle("slow");
	actionFormButton.hide("slow");
});

formCloseButton.click(function(e) {
	articleForm.toggle("slow");
	actionFormButton.show("slow");
});


