$(function(){
    $(".input-group").buttonGroupInput({
    	buttonAmount: 7,
        buttonCaption: ["<i class='fa fa-frown-o fa-2x'></i>", false, false, "<i class='fa fa-meh-o fa-2x'></i>", false, false, "<i class='fa fa-smile-o fa-2x'></i>"]
    });
    
    var submitForm = function()
	{
		if($("a#finish").hasClass("disabled")) return;
		
		$("form").submit();
	};
		
	$("a#finish").on("click", submitForm);
	
	
	var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate() + 1, 0, 0, 0, 0);

	$(".f-datepicker").fdatepicker({
       	'language': 'de',
		'format': 'dd.mm.yyyy',
       	'weekStart': 1,
		'onRender': function (date) {
            return date.valueOf() > now.valueOf() ? 'disabled' : '';
       	}
	});
});