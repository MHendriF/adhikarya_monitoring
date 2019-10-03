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
							<a href="#">List Banner</a>
						</li>
						<li>
							<a href="#">List Slider</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Notification </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="app_dr" class="collapse collapse-level-1">
						<li>
							<a href="#">Customer FCM</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">News Article</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="#"><div class="pull-left"><i class="fa fa-envelope mr-20"></i><span class="right-nav-text">Inbox</span></div><div class="pull-right"><span class="label label-warning">1</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#site"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">Site & Unit</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="site" class="collapse collapse-level-1">
						<li>
							<a href="#">Site List</a>
						</li>
						<li>
							<a href="#">Unit List</a>
						</li>
						<li>
							<a href="#">Minat Unit</a>
						</li>
					</ul>
				</li>
				@role('Admin')
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#master"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Master</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="master" class="collapse collapse-level-1">
							<li>
								<a href="#">User</a>
							</li>
							<li>
								<a href="#">Role</a>
							</li>
						</ul>
					</li>
				@endrole
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Customer & Sales</span>
					<i class="zmdi zmdi-more"></i>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Customer</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="maps_dr" class="collapse collapse-level-1">
						<li>
							<a href="#">Customer List</a>
						</li>
						<li>
							<a href="#">add Customer</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#sales"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Sales</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="sales" class="collapse collapse-level-1">
						<li>
							<a href="#">Sales List</a>
						</li>
						<li>
							<a href="#">add Sales</a>
						</li>
						<li>
							<a href="#">Sales Bonus</a>
						</li>
					</ul>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>
				@role('Admin')
					<li class="navigation-header">
						<span>Report</span>
						<i class="zmdi zmdi-more"></i>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Generate XLS</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
							<li>
								<a href="#">Export</a>
							</li>
						</ul>
					</li>
					<li class="navigation-header">
						<span>Finance</span>
						<i class="zmdi zmdi-more"></i>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#finance"><div class="pull-left"><i class="fa fa-bar-chart-o mr-20"></i><span class="right-nav-text">Payment & Invoice</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="finance" class="collapse collapse-level-1 two-col-list">
							<li>
								<a href="#">Payment</a>
							</li>
							<li>
								<a href="#">Konfirmasi</a>
							</li>
	 						<li>
								<a href="#">Invoice</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#config"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Configuration</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="config" class="collapse collapse-level-1">
							<li>
								<a href="#">General</a>
							</li>
						</ul>
					</li>
				@endrole

			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
