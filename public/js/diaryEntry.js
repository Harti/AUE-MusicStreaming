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
        }

        if($("input[name=listening_duration]").is(":checked"))
        {
            groupsFilled++;
        }

        // TODO Slider für Wiedergabemodi checken
        
        if(parseInt($("input[name=recommendations_quality]").val()) !== 0)
        {
            groupsFilled++;
        }


        if($("input[name=recommendations_comparison]").is(":checked"))
        {
            groupsFilled++;
        }

        if($("input[name=most_listened]").is(":checked"))
        {
            groupsFilled++;
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
    $(document).on("harti.buttongroup.change", ".input-group", checkForm);
	
	
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

//    ________                                    __             __      __                     
//   |        \                                  |  \           |  \    |  \                    
//   | $$$$$$$$______   __    __  _______    ____| $$  ______  _| $$_    \$$  ______   _______  
//   | $$__   /      \ |  \  |  \|       \  /      $$ |      \|   $$ \  |  \ /      \ |       \ 
//   | $$  \ |  $$$$$$\| $$  | $$| $$$$$$$\|  $$$$$$$  \$$$$$$\\$$$$$$  | $$|  $$$$$$\| $$$$$$$\
//   | $$$$$ | $$  | $$| $$  | $$| $$  | $$| $$  | $$ /      $$ | $$ __ | $$| $$  | $$| $$  | $$
//   | $$    | $$__/ $$| $$__/ $$| $$  | $$| $$__| $$|  $$$$$$$ | $$|  \| $$| $$__/ $$| $$  | $$
//   | $$     \$$    $$ \$$    $$| $$  | $$ \$$    $$ \$$    $$  \$$  $$| $$ \$$    $$| $$  | $$
//    \$$      \$$$$$$   \$$$$$$  \$$   \$$  \$$$$$$$  \$$$$$$$   \$$$$  \$$  \$$$$$$  \$$   \$$
    /* var foundationSliders = $(".foundation-sliders-group .slider");
    foundationSliders.each(function(index){
        var slider = $(this),
            sliderInput = slider.find(".slider-input"),
            rangeSlider = slider.find(".range-slider");

        var sliderListener = function(){
            rangeSlider.on('change.fndtn.slider', function(event){
                console.log('bacon');
                var value = rangeSlider.attr('data-slider');
                sliderInput.val(value);
                updateOtherValues();
            });
        };

        function updateOtherValues(){
            var total = 0;
            foundationSliders.each(function(){
                total += parseInt($(this).find(".range-slider").attr("data-slider"));
            });

            var delta = 100 - total;
            var otherSliders = foundationSliders.not(slider);
            otherSliders.each(function(){
                var otherSlider = $(this),
                    value = parseInt(otherSlider.find(".range-slider").attr("data-slider"));


                var newValue = value + (delta/otherSliders.length);

                if(newValue < 0 || slider.value === 100){
                    newValue = 0;
                } else if (newValue > 100) {
                    newValue = 100;
                }

                var otherRangeSlider = $(otherSlider).find(".range-slider");
                // otherRangeSlider.off('change.fndtn.slider');
                // otherRangeSlider.foundation('slider', 'set_value', newValue);
                // otherRangeSlider.on('change.fndtn.slider', sliderListener);
                $(otherSlider).find(".slider-input").val(newValue);
            });
        }

        function registerSliderListener(){
            rangeSlider.on('change.fndtn.slider', sliderListener);
        }

        sliderInput.on('change', function(event){
            var value = parseInt($(sliderInput).val());
            $(rangeSlider).foundation('slider', 'set_value', value);

            updateOtherValues();
        });

        registerSliderListener();
    }); */

//              ______                                          
//             /      \                                         
//         __ |  $$$$$$\ __    __   ______    ______   __    __ 
//        |  \| $$  | $$|  \  |  \ /      \  /      \ |  \  |  \
//         \$$| $$  | $$| $$  | $$|  $$$$$$\|  $$$$$$\| $$  | $$
//        |  \| $$ _| $$| $$  | $$| $$    $$| $$   \$$| $$  | $$
//        | $$| $$/ \ $$| $$__/ $$| $$$$$$$$| $$      | $$__/ $$
//        | $$ \$$ $$ $$ \$$    $$ \$$     \| $$       \$$    $$
//   __   | $$  \$$$$$$\  \$$$$$$   \$$$$$$$ \$$       _\$$$$$$$
//  |  \__/ $$      \$$$                              |  \__| $$
//   \$$    $$                                         \$$    $$
//    \$$$$$$                                           \$$$$$$ 


    var jquerySliderContainers = $(".jquery-ui-sliders-group .slider-container");
    
    function updateOtherSliders(sliderContainer, value){
            var total = 0,
                numActiveSliders = 0,
                sliderInput = $(sliderContainer).find(".slider-input");
                otherSliders = $(jquerySliderContainers).not(sliderContainer);

            $(sliderInput).val(value);

            otherSliders.each(function(){
                var otherValue  = $(this).find(".jquery-slider").slider("value");
                if(otherValue === 0){
                    return;
                } else {
                    total += otherValue;
                    numActiveSliders++;
                }
            });

            total += value;

            var delta = 100 - total;

            otherSliders.each(function(){
                var currentValue = parseInt($(this).find(".jquery-slider").slider("value"));
                var newValue = 0;

                if(numActiveSliders === 0){
                    newValue = currentValue + (delta/otherSliders.length);
                } else {
                    newValue = currentValue + (delta/numActiveSliders);
                }

                if (newValue < 0){
                    newValue = 0;
                } else if (newValue > 100){
                    newValue = 100;
                } else if (currentValue === 0){
                    newValue = 0;
                }

                $(this).find(".jquery-slider").slider('value', newValue);
                $(this).find(".slider-input").val(newValue);
            });
    }

    jquerySliderContainers.each(function(){
        var sliderContainer = $(this),
            slider = $(sliderContainer).find(".jquery-slider"),
            sliderInput = $(sliderContainer).find(".slider-input");

        $(slider).slider({
            range: "max",
            min: 0,
            max: 100,
            orientation: "horizontal",
            animate: 0,
            slide: function(event, ui){
                updateOtherSliders(sliderContainer, ui.value);
            }
        });

        $(sliderInput).on('change', function(){
            var value = parseInt($(this).val());
            $(slider).slider("value", value);

            updateOtherSliders(sliderContainer, value);
        });
    });
});
