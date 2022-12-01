{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
                <div class="form-head page-titles d-flex  align-items-center">
					<div class="mr-auto  d-lg-block">
						<h2 class="text-black font-w600">Reviews</h2>
						<ol class="breadcrumb">
							<li class="breadcrumb-item active"><a href="javascript:void(0)">Customer</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Reviews</a></li>
						</ol>
					</div>
					<a href="#" class="btn btn-primary rounded light mr-3">Refresh</a>
					<a href="#" class="btn btn-primary rounded"><i class="flaticon-381-settings-2 mr-0"></i></a>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<ul class="nav nav-pills review-tab">
							<li class="nav-item">
								<a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Review</a>
							</li>
							<li class="nav-item">
								<a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Published</a>
							</li>
							<li class="nav-item">
								<a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Deleted</a>
							</li>
						</ul>
						<div class="tab-content pt-4 bg-white">
							<div id="navpills-1" class="tab-pane active">
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/4.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Robert Patilson</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Friendly service
												Josh, Lunar and everyone at Just Property in Hastings deserved a big Thank You from us for moving us from Jakarta to Medan during the lockdown.
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/3.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Peter Parkur</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/2.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Emilia Sigh</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/4.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Robert Patilson</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Friendly service
												Josh, Lunar and everyone at Just Property in Hastings deserved a big Thank You from us for moving us from Jakarta to Medan during the lockdown.
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/3.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Peter Parkur</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/2.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Emilia Sigh</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="navpills-2" class="tab-pane">
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/3.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Peter Parkur</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/2.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Emilia Sigh</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/5.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Peter Parkur</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="navpills-3" class="tab-pane">
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/2.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Emilia Sigh</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Dealing with Syamsudin and Bakri was a joy. I got in touch with Just Property after seeing a couple of properties that caught my eye. Both Syamsudin and Bakri strive to deliver a professional service and surpassed my expectations - they were not only help.. 
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card review-table">
									<div class="media align-items-center">
										<img class="mr-3 img-fluid rounded" width="90"  src="{{ asset('images/customers/4.jpg') }}" alt="DexignZone">
										<div class="media-body d-lg-flex d-block row align-items-center">
											<div class="col-xl-4 col-xxl-5 col-lg-12 review-bx">
												<span class="text-primary d-block">#C01234</span>
												<h3 class="fs-20 text-black font-w600 mb-1">Robert Patilson</h3>
												<span class="d-block mb-xl-0 mb-3">Join on 26/04/2020, 12:42 AM</span>
											</div>
											<div class="col-xl-7 col-xxl-7 col-lg-12 text-dark mb-xl-0 mb-2">
												Friendly service
												Josh, Lunar and everyone at Just Property in Hastings deserved a big Thank You from us for moving us from Jakarta to Medan during the lockdown.
											</div>
										</div>
										<div class="media-footer d-sm-flex d-block align-items-center">
											<div class="mr-5 text-xl-center text-left  ml-xl-3 mb-sm-0 mb-3 ml-0">
												<span class="bgl-primary text-primary rounded p-1 pl-2 pr-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">EXCELENT</span>
												<span class="star-review d-block">
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-primary"></i>
													<i class="fa fa-star text-gray"></i>
												</span>
											</div>
											<div class="edit ml-auto">
												<a href="javascript:void(0);" class="btn btn-outline-success rounded  mr-2">Approve</a>
												<a href="javascript:void(0);" class="btn btn-outline-danger rounded">Reject</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			
@endsection			