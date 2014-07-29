<script type="text/javascript" src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/vendor/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/foundation.min.js') }}"></script>
<script>
	var AJAX_URL = "{{ URL::to('/ajax/'); }}";
	$(function()
	{
		$(document).foundation();
	});
</script>
@yield('page-script')
