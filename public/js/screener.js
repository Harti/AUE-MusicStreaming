$(function()
{
	var stepForward = function()
	{
		if($(this).hasClass("disabled")) return;
		var $section = $(this).parents("section"),
		sectionID = parseInt($section.data("id"), 10);
		
		$section.hide("drop", {direction: "left"}, 400, function() 
		{
			$("section#step" + (sectionID+1)).show("drop", {direction: "right"}, 400);
		});
	},
	
	checkForm = function()
	{
		var groupsFilled = 0;
		
		if($("input[name=preferred-service]").is(":checked"))
		{
			console.log("1");
			groupsFilled++;
		}
		
		if($("input[name=disliked-service]").is(":checked"))
		{
			console.log("2");
			groupsFilled++;
		}
		
		if($("input[name=preferred-known]").is(":checked")
		|| $("input[name=preferred-look]").is(":checked")
		|| $("input[name=preferred-features]").is(":checked")
		|| $("input[name=preferred-other]").is(":checked"))
		{
			console.log("3");
			groupsFilled++;
		}
		
		if($("input[name=disliked-known]").is(":checked")
		|| $("input[name=disliked-look]").is(":checked")
		|| $("input[name=disliked-features]").is(":checked")
		|| $("input[name=disliked-other]").is(":checked"))
		{
			groupsFilled++;
		}
		
		if(groupsFilled == 4)
		{
			$("a#finish").removeClass("disabled");
		}
		else
		{
			$("a#finish").addClass("disabled");
		}
	},
	
	submitForm = function()
	{
		checkForm();
		
		if($("a#finish").hasClass("disabled")) return;
		
		$("form").submit();
	};
	
	$("a.button.forward").on("click", stepForward);	
	$("a#finish").on("click", submitForm);
	$("input").on("change", checkForm);
});
