$(function(){
    $(".input-group").buttonGroupInput({
    	buttonAmount: 7,
        buttonCaption: ["<i class='fa fa-frown-o fa-2x'></i>", false, false, "<i class='fa fa-meh-o fa-2x'></i>", false, false, "<i class='fa fa-smile-o fa-2x'></i>"]
    });

    var checkForm = function(){
        var groupsFilled = 0;

        if($("input[name=day]").val() !== '' &&
            $("input[name=day]").val() !== null)
        {
            groupsFilled++;
            console.log("date ok");
        }

        if($("input[name=listening_duration]").is(":checked"))
        {
            groupsFilled++;
            console.log("listening duration ok");
        }

        // TODO Slider für Wiedergabemodi checken
        
        if(parseInt($("input[name=recommendations_quality]").val()) !== 0)
        {
            groupsFilled++;
            console.log("recommendations quality ok");
        }


        if($("input[name=recommendations_comparison]").is(":checked"))
        {
            groupsFilled++;
            console.log("recommendations comparison ok");
        }

        if($("input[name=most_listened]").is(":checked"))
        {
            groupsFilled++;
            console.log("most listened ok");
        }

        // number of groups WITHOUT the sliders for testing purposes
        // when sliders are added, bump up to 6
        if(groupsFilled == 5)
        {
            $("a#finish").removeClass("disabled");
        } else {
            $("a#finish").addClass("disabled");
        }
    };
    
    var submitForm = function()
	{
        checkForm();

		if($("a#finish").hasClass("disabled")) return;
		
		$("form").submit();
	};
		
	$("a#finish").on("click", submitForm);
    $("input").on("change", checkForm);
    $(".button-group .button").on("click", function()
    {
        // nasty hack wait with the form check until after the jquery button group plugin
        // has updated the input element
        setTimeout(checkForm, 50);
    });
	
	
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

    checkForm();
});
