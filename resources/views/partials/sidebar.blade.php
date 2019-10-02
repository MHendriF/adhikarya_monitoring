<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a  href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dashboard_dr" class="collapse collapse-level-1">
						<li>
							<a class="active-page" href="{{ route('dashboard')}}">Main</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Promo Banner</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ecom_dr" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('banner.index') }}">List Banner</a>
						</li>
						<li>
							<a href="{{ route('slider.index') }}">List Slider</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Notification </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="app_dr" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('notification.customer.index') }}">Customer FCM</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{ route('news.index') }}"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">News Article</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="{{route ('inbox.index')}}"><div class="pull-left"><i class="fa fa-envelope mr-20"></i><span class="right-nav-text">Inbox</span></div><div class="pull-right"><span class="label label-warning">{{$inbox_count}}</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#site"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">Site & Unit</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="site" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('site.index') }}">Site List</a>
						</li>
						<li>
							<a href="{{ route('unit.index') }}">Unit List</a>
						</li>
						<li>
							<a href="{{route ('minat.index')}}">Minat Unit</a>
						</li>
					</ul>
				</li>
				@if(Auth::user()->hasRole('admin'))
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#master"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Master</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="master" class="collapse collapse-level-1">
							<li>
								<a href="{{ route('user.index') }}">User</a>
							</li>
							<li>
								<a href="{{ route('role.index') }}">Role</a>
							</li>
						</ul>
					</li>
				@endif
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Customer & Sales</span>
					<i class="zmdi zmdi-more"></i>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Customer</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="maps_dr" class="collapse collapse-level-1">
						<li>
							<a href="{{route ('customer.index')}}">Customer List</a>
						</li>
						<li>
							<a href="{{route ('customer.create')}}">add Customer</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#sales"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Sales</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="sales" class="collapse collapse-level-1">
						<li>
							<a href="{{route ('sales.index')}}">Sales List</a>
						</li>
						<li>
							<a href="{{route ('sales.create')}}">add Sales</a>
						</li>
						<li>
							<a href="{{route ('bonus.index')}}">Sales Bonus</a>
						</li>
					</ul>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>
				@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('finance'))
					<li class="navigation-header">
						<span>Report</span>
						<i class="zmdi zmdi-more"></i>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Generate XLS</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
							<li>
								<a href="{{route ('report')}}">Export</a>
							</li>
						</ul>
					</li>
				@endif
				@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('finance'))
				<li class="navigation-header">
					<span>Finance</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#finance"><div class="pull-left"><i class="fa fa-bar-chart-o mr-20"></i><span class="right-nav-text">Payment & Invoice</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="finance" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="{{route ('payment.index')}}">Payment</a>
						</li>
						<li>
							<a href="{{route ('konfirmasi')}}">Konfirmasi</a>
						</li>
 						<li>
							<a href="{{route ('invoice.index')}}">Invoice</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('manager'))
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#config"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Configuration</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="config" class="collapse collapse-level-1">
						<li>
							<a href="{{route ('contacts.index')}}">General</a>
						</li>
					</ul>
				</li>
				@endif

			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
