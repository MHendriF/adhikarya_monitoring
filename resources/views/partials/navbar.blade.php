<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top no-print">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="{{url('assets/theme/img/logo_adhi.png')}}" style="max-height: 30px" alt="brand"/>
							<span class="brand-text">AdhiKarya</span>
						</a>
					</div>
				</div>
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

			</div>

			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('finance') || Auth::user()->hasRole('manager') )
						<li class="ft-12">
							<a href="{{ route('user.create') }}">
									<i class="fa fa-plus"></i> Add User
							</a>
						</li>
					@endif
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><i class="fa fa-user top-nav-icon"></i></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
							<li>
								<a href="#"><i class="fa fa-user"></i><span>{{Auth::user()->username}}</span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#"><i class="fa fa-calendar"></i><span>{{ $today }}</span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="{!! route('postLogout') !!}"><i class="zmdi zmdi-power"></i><span>Sign Out</span></a>
							</li>
						</ul>
					</li>

				</ul>
			</div>
		</nav>
		<!-- /Top Menu Items -->
