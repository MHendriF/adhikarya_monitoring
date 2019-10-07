<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a  href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-home mr-20"></i><span class="right-nav-text">DASHBOARD</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="dashboard_dr" class="collapse collapse-level-1">
						<li>
							<a class="active-page" href="{{ route('dashboard')}}">Main</a>
						</li>
					</ul>
				</li>
				<li class="navigation-header">
					<span>Document</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#eng"><div class="pull-left"><i class="zmdi zmdi-memory mr-20"></i><span class="right-nav-text">ENGINEERING</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="eng" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('engineering.index') }}">List Dokumen</a>
						</li>
						<li>
							<a href="{{ route('engineering.create') }}">Input Dokumen</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#prod"><div class="pull-left"><i class="zmdi zmdi-store mr-20"></i><span class="right-nav-text">PRODUCTION</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="prod" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('production.index') }}">List Dokumen</a>
						</li>
						<li>
							<a href="{{ route('production.create') }}">Input Dokumen</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#finance"><div class="pull-left"><i class="zmdi zmdi-card mr-20"></i><span class="right-nav-text">FINANCE</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="finance" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('finance.index') }}">List Dokumen</a>
						</li>
						<li>
							<a href="{{ route('finance.create') }}">Input Dokumen</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#sekre"><div class="pull-left"><i class="zmdi zmdi-balance mr-20"></i><span class="right-nav-text">SEKRETARIAT</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="sekre" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('sekretariat.index') }}">List Dokumen</a>
						</li>
						<li>
							<a href="{{ route('sekretariat.create') }}">Input Dokumen</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#mutu"><div class="pull-left"><i class="zmdi zmdi-check-circle mr-20"></i><span class="right-nav-text">MUTU</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="mutu" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('mutu.index') }}">List Dokumen</a>
						</li>
						<li>
							<a href="{{ route('mutu.create') }}">Input Dokumen</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#hse"><div class="pull-left"><i class="zmdi zmdi-hospital mr-20"></i><span class="right-nav-text">HSE / K3L</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="hse" class="collapse collapse-level-1">
						<li>
							<a href="{{ route('hse.index') }}">List Dokumen</a>
						</li>
						<li>
							<a href="{{ route('hse.create') }}">Input Dokumen</a>
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
						<span>Configuration</span>
						<i class="zmdi zmdi-more"></i>
					</li>

					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#master"><div class="pull-left"><i class="zmdi zmdi-menu mr-20"></i><span class="right-nav-text">Master Data</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="master" class="collapse collapse-level-1">
							<li>
								<a href="{{ route('user.index') }}">User</a>
							</li>
							<li>
								<a href="{{ route('lembaga.index') }}">Lembaga</a>
							</li>
							<li>
								<a href="{{ route('divisi.index') }}">Divisi</a>
							</li>
							<li>
								<a href="{{ route('jabatan.index') }}">Jabatan</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#config"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Configuration</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
						<ul id="config" class="collapse collapse-level-1">
							<li>
								<a href="{{ route('role.index') }}">Role</a>
							</li>
							<li>
								<a href="{{ route('permission.index') }}">Permission</a>
							</li>
						</ul>
					</li>
				@endrole

			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
