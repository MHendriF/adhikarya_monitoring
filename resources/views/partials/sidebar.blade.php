<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a  href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">DASHBOARD</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dashboard_dr" class="collapse collapse-level-1">
						<li>
							<a class="active-page" href="{{ route('dashboard')}}">Main</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#eng"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">ENGINEERING</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="eng" class="collapse collapse-level-1">
						<li>
							<a href="#">List A</a>
						</li>
						<li>
							<a href="#">List B</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#prod"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">PRODUCTION</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="prod" class="collapse collapse-level-1">
						<li>
							<a href="#">A</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">FINANCE</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#sekre"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">SEKRETARIAT</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="sekre" class="collapse collapse-level-1">
						<li>
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#mutu"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">MUTU</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="mutu" class="collapse collapse-level-1">
						<li>
							<a href="#">A</a>
						</li>
						<li>
							<a href="#">B</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#hse"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">HSE / K3L</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="hse" class="collapse collapse-level-1">
						<li>
							<a href="#">A</a>
						</li>
						<li>
							<a href="#">B</a>
						</li>
					</ul>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>
				@role('Admin')
					<!-- <li class="navigation-header">
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
					</li> -->
					<li class="navigation-header">
						<span>Konfiguration</span>
						<i class="zmdi zmdi-more"></i>
					</li>

					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#master"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Master Data</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="master" class="collapse collapse-level-1">
							<li>
								<a href="#">User</a>
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
