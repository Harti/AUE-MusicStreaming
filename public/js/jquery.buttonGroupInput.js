/**
 * @author 	Hartmut Glücker
 * @email	hartgluecker@gmx.net 
 * 
 * This is a jQuery plugin to create Foundation button groups and make them behave like radio buttons. 
 * Make sure to include the CSS file!
 * 
 * USAGE EXAMPLES:
 * 
 * == markup:
 * <div class="input-group" data-name="videoRating"></div>
 * 
 * 
 * == script: * 
 * // standard button amount is 5
 * $(".input-group").buttonGroupInput({
 *		buttonDefault: 3, // neutral
 *		buttonCaption: ["<i class='fa fa-2x fa-frown-o'></i>", false, false, false, "<i class='fa fa-2x fa-smile-o'></i>"] // put a sad smiley face to where the 1 button is, and a happy one to where the 5 button is
 *	});
 * 
 * // limit the amount of buttons
 * $(".input-group").buttonGroupInput({
 *		buttonText: ["Ja", "Nein"],
 *		buttonValue: [1, 0],
 *		buttonAmount: 2	
 *	});
 */

$.fn.buttonGroupInput = function(options)
{
	 var opts = $.extend({
        buttonAmount: 		5,
        buttonDefault:		-1,
        buttonText: 		[false, false, false, false, false],
        buttonValue: 		[1, 	2, 	   3,     4,     5	  ],
        buttonCaption: 		[false, false, false, false, false],
    }, options);
    
    $(this).each(function()
    {
		var 
		selectedButtonValue = $(this).data('value') || 0;
		
		var 
		$buttonGroup 	= $("<ul class='button-group'></ul>"),
		$input			= $("<input type='hidden' name='" + $(this).data('name') + "' value='" + parseInt(selectedButtonValue) + "' />");
		
		$(this).append($buttonGroup, $input);		
		
		
		for(var i=0; i<opts.buttonAmount; i++)
		{
			$buttonGroup.append("<li><a class='" + (selectedButtonValue != opts.buttonValue[i] ? "secondary" : "") + " button' data-value='" + (opts.buttonValue[i] || i+1) + "'>" 
								+ (opts.buttonText[i] ? opts.buttonText[i] : opts.buttonValue[i] || i+1) 
								+ "</a>"
								+ (opts.buttonCaption[i] ? "<span>" + opts.buttonCaption[i] + "</span>" : "") 
								+ "</li>");
		}
		
		$buttonGroup.on("click", "a", function()
		{
			$buttonGroup.find("a").addClass("secondary");
			$(this).removeClass("secondary");
			$input.val($(this).data('value'));
			$(this).trigger("harti.buttongroup.change", $input.val());
		});
    });
};