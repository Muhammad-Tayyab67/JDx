{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
			<div class="container-fluid">
            <div class="row">
				<div class="col-xl-12 col-xxl-12">
                <div class="form-head page-titles d-flex  align-items-center">
					<div class="mr-auto  d-lg-block">
						<h2 class="text-black font-w600">Analytics</h2>
						<ol class="breadcrumb">
							<!-- <li class="breadcrumb-item active"><a href="javascript:void(0)">Property</a></li> -->
							<li class="breadcrumb-item"><a href="javascript:void(0)">Analytics</a></li>
						</ol>
					</div>
				</div>
                <!-- Leads  Generated Graph -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header" style="background:white; border-color:white;">
                                <h4 class="card-title" style="color:black;">Leads Generated </h4>
                            </div>
                            <div class="card-body">
                                <canvas id="LeadsGraph" name="1"></canvas>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- Leads  Generated  Data Table -->
				<div class="row">	
					<div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background:white; border-color:white;">
                                <h4 class="card-title" style="color:black;">Leads Generated per Bird Dog</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Aug</th>
                                                <th>Sep</th>
                                                <th>Oct</th>
                                                <th>Nov</th>
                                                <th>Dec</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($leads_generated_permonth_final as $key => $leads)
                                          <tr>
                                            @if ($leads['name'] != "Super Admin") 
                                            <td>{{ $leads['name'] }}</td>
                                            @foreach ($leads['data'] as $key => $data)
                                                <td>{{ $leads['data'][$key] }}</td>
                                            @endforeach    
                                            @endif
                                          </tr>
                                          @endforeach
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>					
				</div>
                <!-- Contracts Generated Graph -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header" style="background:white; border-color:white;">
                                <h4 class="card-title" style="color:black;">Contracts Generated </h4>
                            </div>
                            <div class="card-body">
                                <canvas id="ContractsGraph" name="1"></canvas>
                            </div>
                        </div>
                    </div>
				</div>
                  <!-- Contracts  Generated  Data Table -->
				<div class="row">	
					<div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background:white; border-color:white;">
                                <h4 class="card-title" style="color:black;">Contracts Generated per Bird Dog</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Aug</th>
                                                <th>Sep</th>
                                                <th>Oct</th>
                                                <th>Nov</th>
                                                <th>Dec</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($contracts_generated_permonth_final as $key => $contract)
                                          <tr>
                                            @if ($contract['name'] != "Super Admin")
                                            <td>{{ $contract['name'] }}</td>
                                            <td>{{ $contract['data'][0] }}</td>
                                            <td>{{ $contract['data'][1] }}</td>
                                            <td>{{ $contract['data'][2] }}</td>
                                            <td>{{ $contract['data'][3] }}</td>
                                            <td>{{ $contract['data'][4] }}</td>
                                            <td>{{ $contract['data'][5] }}</td>
                                            <td>{{ $contract['data'][6] }}</td>
                                            <td>{{ $contract['data'][7] }}</td>
                                            <td>{{ $contract['data'][8] }}</td>
                                            <td>{{ $contract['data'][9] }}</td>
                                            <td>{{ $contract['data'][10] }}</td>
                                            <td>{{ $contract['data'][11] }}</td>    
                                            @endif
                                          </tr>
                                          @endforeach
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>					
				</div>
                 <!-- Appointments Generated Graph -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header" style="background:white; border-color:white;">
                                <h4 class="card-title" style="color:black;">Appointments Generated </h4>
                            </div>
                            <div class="card-body">
                                <canvas id="AppointmentsGraph" name="1"></canvas>
                            </div>
                        </div>
                    </div>
				</div>
                 <!-- Appointments  Generated  Data Table -->
				<div class="row">	
					<div class="col-12">
                        <div class="card">
                            <div class="card-header" style="background:white; border-color:white;">
                                <h4 class="card-title" style="color:black;">Appointments Generated per Bird Dog</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Aug</th>
                                                <th>Sep</th>
                                                <th>Oct</th>
                                                <th>Nov</th>
                                                <th>Dec</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($appointments_generated_permonth_final as $key => $appointment)
                                          <tr>
                                            @if ($appointment['name'] != "Super Admin")
                                            <td>{{ $appointment['name'] }}</td>
                                            <td>{{ $appointment['data'][0] }}</td>
                                            <td>{{ $appointment['data'][1] }}</td>
                                            <td>{{ $appointment['data'][2] }}</td>
                                            <td>{{ $appointment['data'][3] }}</td>
                                            <td>{{ $appointment['data'][4] }}</td>
                                            <td>{{ $appointment['data'][5] }}</td>
                                            <td>{{ $appointment['data'][6] }}</td>
                                            <td>{{ $appointment['data'][7] }}</td>
                                            <td>{{ $appointment['data'][8] }}</td>
                                            <td>{{ $appointment['data'][9] }}</td>
                                            <td>{{ $appointment['data'][10] }}</td>
                                            <td>{{ $appointment['data'][11] }}</td>    
                                            @endif
                                          </tr>
                                          @endforeach
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>					
				</div>
            </div>
			
			
@endsection	


<script>
var contracts_generated_retreieve_array = @json($contracts_generated_retreieve_array);  
var leads_generated = @json($leads_generated);
var appointments_generated_retreieve_array = @json($appointments_generated_retreieve_array);
</script>
