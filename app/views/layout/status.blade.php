@if(Session::get('error'))
<div id="status" class="error"><div class="row"><div class="small-12 columns">
{{ Lang::get(Session::get('error')) }}
</div></div></div>
@elseif(Session::get('warning'))
<div id="status" class="warning"><div class="row"><div class="small-12 columns">
{{ Lang::get(Session::get('warning')) }}
</div></div></div>
@elseif(Session::get('success'))
<div id="status" class="success"><div class="row"><div class="small-12 columns">
{{ Lang::get(Session::get('success')) }}
</div></div></div>
@endif
