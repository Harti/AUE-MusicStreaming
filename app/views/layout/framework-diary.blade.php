@extends('layout.framework')

@section('page-navigation')
<div class="fixed contain-to-grid">
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
		 	<li class="name">
	    		<h1><a href="{{ URL::to('/diary') }}"><img src="{{ URL::asset('img/ur.png') }}" height="32" width="70" /></a></h1>
			</li>
			<li class="toggle-topbar menu-icon">
				<a href="javascript:void(0);"><span>Menü</span></a>
			</li>
		</ul>

		<section class="top-bar-section">
			<!-- Right Nav Section -->
			<ul class="right">
				<li>
					<a href="{{ URL::to('/logout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
				</li>
			</ul>

			<!-- Left Nav Section -->
			<ul class="left">
				<li class="divider"></li>
				<li>
					<a href="{{ URL::to('/diary') }}"><i class="fa fa-home fa-lg"></i> Übersicht</a>
				</li>
				<li class="divider"></li>
			</ul>
		</section>
	</nav>
</div>
@stop