{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

			<div class="container-fluid">
                <!-- row -->
                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Property Scout</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ url('scout/store') }}"class="forms-sample" enctype="multipart/form-data">
                                       @csrf
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Street</label>
                                        <div class="col-sm-9">
                                            <input type="text" required class="form-control" placeholder="Street" id="street" name="street">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Unit</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Unit" id="unit" name="unit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">City</label>
                                            <div class="col-sm-9">
                                                <input type="text" required class="form-control" placeholder="City" id="city" name="city">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">State</label>
                                            <div class="col-sm-9">
                                                <select id="single-select" name="state">
                                                    <option disabled>Select State</option>
                                                    @foreach ($states as $state)
                                                    <option>{{$state->abbr}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Zip Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" required class="form-control" placeholder="Zip Code" id="zip" name="zip">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Zip Code</label>
                                            <div class="col-sm-9">
                                                <select id="single-select">
                                                    <option>Zip Code</option>
                                                    <option value="AL">46000</option>
                                                    <option value="WY">48000</option>
                                                    <option value="UI">49000</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        
                                       
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Photograph</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" multiple="multiple" id="image" name="image[]" >
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">S3 Bucket</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button class="btn btn-danger"><a href="/scout/list" style="color: white; text-decoration:none;">Cancel</a></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
			
@endsection