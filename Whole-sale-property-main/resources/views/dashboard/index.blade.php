{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="card bg-danger property-bx text-white">
									<div class="card-body">
										<div class="media d-sm-flex d-block align-items-center">
											<span class="mr-4 d-block mb-sm-0 mb-3">
												<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M31.8333 79.1667H4.16659C2.33325 79.1667 0.833252 77.6667 0.833252 75.8333V29.8333C0.833252 29 1.16659 28 1.83325 27.5L29.4999 1.66667C30.4999 0.833332 31.8333 0.499999 32.9999 0.999999C34.3333 1.66667 34.9999 2.83333 34.9999 4.16667V76C34.9999 77.6667 33.4999 79.1667 31.8333 79.1667ZM7.33325 72.6667H28.4999V11.6667L7.33325 31.3333V72.6667Z" fill="white"/>
													<path d="M75.8333 79.1667H31.6666C29.8333 79.1667 28.3333 77.6667 28.3333 75.8334V36.6667C28.3333 34.8334 29.8333 33.3334 31.6666 33.3334H75.8333C77.6666 33.3334 79.1666 34.8334 79.1666 36.6667V76C79.1666 77.6667 77.6666 79.1667 75.8333 79.1667ZM34.9999 72.6667H72.6666V39.8334H34.9999V72.6667Z" fill="white"/>
													<path d="M60.1665 79.1667H47.3332C45.4999 79.1667 43.9999 77.6667 43.9999 75.8334V55.5C43.9999 53.6667 45.4999 52.1667 47.3332 52.1667H60.1665C61.9999 52.1667 63.4999 53.6667 63.4999 55.5V75.8334C63.4999 77.6667 61.9999 79.1667 60.1665 79.1667ZM50.6665 72.6667H56.9999V58.8334H50.6665V72.6667Z" fill="white"/>
												</svg>
											</span>
											<div class="media-body mb-sm-0 mb-3 mr-5">
												<h4 class="fs-22 text-white">Total Properties</h4>
												<div class="progress mt-3 mb-2" style="height:8px;">
													<div class="progress-bar bg-white progress-animated" style="width: {{$total_propety_array[0]['Rate']}}%; height:8px;" role="progressbar">
														<span class="sr-only">86% Complete</span>
													</div>
												</div>
												<span class="fs-14 text-white">{{ $total_propety_array[0]['Master'] }} pending in Master list</span>
											</div>
											<span class="fs-46 font-w500 text-white">{{ $total_propety_array[0]['Total'] }}</span>
										</div>
									</div>
								</div>
							</div>
							<!-- Donut For Appointments -->
							@php
							if($total_propety_array[0]['Total'] == 0)
							{
							$total_propety_array[0]['Total'] = 1;
							}
							$appointmentrate = (\App\Models\Property::sum('appointments')/$total_propety_array[0]['Total'])*100;
							@endphp
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body mr-3">
												<h2 class="fs-36 text-black font-w600">{{ \App\Models\Property::sum('appointments') }}</h2>
												<p class="fs-18 mb-0 text-black font-w500">Properties for Appointments</p>
											</div>
											<div class="d-inline-block position-relative donut-chart-sale">
												<span class="donut1" data-peity='{ "fill": ["rgb(60, 76, 184)", "rgba(236, 236, 236, 1)"],   "innerRadius": 38, "radius": 10}'>{{\App\Models\Property::sum('appointments')}}/{{$total_propety_array[0]['Total']}}</span>
												<small class="text-primary">{{$appointmentrate}} %</small>
												<span class="circle bgl-primary"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Donut for contracts -->
							@php
							if($total_propety_array[0]['Total'] == 0)
							{
							$total_propety_array[0]['Total'] = 1;
							}
							$contractrate = (\App\Models\Property::sum('contracts')/$total_propety_array[0]['Total'])*100;
							@endphp
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body mr-3">
												<h2 class="fs-36 text-black font-w600">{{ \App\Models\Property::sum('contracts') }}</h2>
												<p class="fs-18 mb-0 text-black font-w500">Properties for Contracts</p>
											</div>
											<div class="d-inline-block position-relative donut-chart-sale">
												<span class="donut1" data-peity='{ "fill": ["rgb(55, 209, 90)", "rgba(236, 236, 236, 1)"],   "innerRadius": 38, "radius": 10}'>{{\App\Models\Property::sum('contracts')}}/{{$total_propety_array[0]['Total']}}</span>
												<small class="text-success">{{$contractrate}} %</small>
												<span class="circle bgl-success"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Total Revenue -->
					<div class="col-xl-6 col-xxl-12">
						<div class="card">
							<div class="card-header border-0 pb-0" style="background:white">
								<h3 class="fs-20 text-black">Total Revenue</h3>
							</div>
							<div class="card-body pt-2 pb-0">
								<div class="d-flex flex-wrap align-items-center">
									<span class="fs-36 text-black font-w600 mr-3">{{ \App\Models\Property::sum('revenue') }}</span>
									<p class="mr-sm-auto mr-3 mb-sm-0 mb-3">last month {{$lastmonth_revenue_array[0]['premonthrevenue']}}</p>
								</div>
								<div id="chartTimeline"></div>
							</div>
						</div>
					</div>
					<!-- Map  -->
					<div class="col-xl-12 col-xxl-12">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<h3 class="fs-20 text-white">Properties Location</h3>
								{{-- <div class="dropdown ml-auto">
									<div class="btn-link" data-toggle="dropdown" >
										<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="white" cx="5" cy="12" r="2"></circle><circle fill="white" cx="12" cy="12" r="2"></circle><circle fill="white" cx="19" cy="12" r="2"></circle></g></svg>
									</div>
									<div class="dropdown-menu dropdown-menu-right" >
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item" href="javascript:void(0);">Delete</a>
									</div>
								</div> --}}

							</div>

							<div class="card-body pt-2 pb-0">
								<div class="d-flex flex-wrap align-items-center">
									<div class="locmap" style="width: 100%; margin-bottom:30px;">
										{!! Mapper::render() !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			<style>
				@media screen and (max-width: 1440px) {
					.locmap {
						height: 400px;
					}
				}
				@media screen and (min-width: 1441px) {
					.locmap {
						height: 700px;
					}
				}
			</style>
@endsection

<script>
var revenue_generated_retreieve_array = @json($revenue_generated_retreieve_array);
console.log(revenue_generated_retreieve_array);

</script>
