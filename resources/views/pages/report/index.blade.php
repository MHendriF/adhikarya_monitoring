@extends('layouts.app')

@section('content')
@section('title', 'Report Generate XLS')
<!-- Main Content -->
<div class="page-wrapper">
	<div class="container-fluid pt-25">

		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Report Generate XLS</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="{{route ('dashboard')}}">Dashboard</a></li>
					<li class="active"><span>Report</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
 		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default card-view panel-refresh">
  						<div class="panel-heading">
  							<div class="clearfix"></div>
						</div>
					<div class="refresh-container">
						<div class="la-anim-1"></div>
					</div>

					<div class="clearfix"></div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body row pa-0">
							<div class="table-wrap">
								<div class="table-responsive">
									<div class="col-sm-12">
										<!-- Row -->
										<div class="row">
											<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
												<div class="panel panel-default card-view pa-0">
													<div class="panel-wrapper collapse in">
														<div class="panel-body pa-0">
															<div class="sm-data-box bg-red">
																<div class="container-fluid">
																	<div class="row">
																		<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
																			 </span>
																			<span class="weight-500 uppercase-font txt-light block font-13">Sales</span>
																		</div>
																		<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
																			<i class="fa  fa-shopping-cart txt-light data-right-rep-icon"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
												<div class="panel panel-default card-view pa-0">
													<div class="panel-wrapper collapse in">
														<div class="panel-body pa-0">
															<div class="sm-data-box bg-yellow">
																<div class="container-fluid">
																	<div class="row">
																		<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
																			 </span>
																			<span class="weight-500 uppercase-font txt-light block font-13">Bonus</span>
																		</div>
																		<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
																			<i class="fa  fa-trophy txt-light data-right-rep-icon"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
												<div class="panel panel-default card-view pa-0">
													<div class="panel-wrapper collapse in">
														<div class="panel-body pa-0">
															<div class="sm-data-box bg-blue">
																<div class="container-fluid">
																	<div class="row">
																		<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
																			 </span>
																			<span class="weight-500 uppercase-font txt-light block font-13">Payment</span>
																		</div>
																		<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
																			<i class="fa  fa-credit-card txt-light data-right-rep-icon"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
												<div class="panel panel-default card-view pa-0">
													<div class="panel-wrapper collapse in">
														<div class="panel-body pa-0">
															<div class="sm-data-box bg-green">
																<div class="container-fluid">
																	<div class="row">
																		<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
																			 </span>
																			<span class="weight-500 uppercase-font txt-light block font-13">Customer</span>
																		</div>
																		<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
																			<i class="fa  fa-users txt-light data-right-rep-icon"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
										<!-- /Row -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- Row -->
				</div>


				<!-- /Main Content -->
				@endsection
				@section('custom-footer')
 				@endsection

				@section('custom-header')
				@endsection
