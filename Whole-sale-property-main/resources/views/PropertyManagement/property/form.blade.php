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
                                <h4 class="card-title">Add Property</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form onsubmit="">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Homeowner Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Homeowner Name">
                                            </div>
                                        </div>
                                        <div class="form-group row" id="childTable">
                                            <label class="col-sm-3 col-form-label">Homeowner Email</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="email" class="form-control" placeholder="Homeowner Email" name="owner_email">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Confirmed</a>
                                                            <a class="dropdown-item" href="#">No Service</a>
                                                            <a class="dropdown-item" href="#">Unknown</a>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="button" onclick="childrenRow()">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="childTable2">
                                            <label class="col-sm-3 col-form-label">Homeowner Phone Number</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="Homeowner Phone Number" name="owner_no">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Confirmed</a>
                                                            <a class="dropdown-item" href="#">No Service</a>
                                                            <a class="dropdown-item" href="#">Unknown</a>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="button" onclick="childrenRow2()">+</button>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Scout Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Scout Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Photograph</label>
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
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button class="btn btn-danger"><a href="/property/list" style="color: white; text-decoration:none;">Cancel</a></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
            <script>
                function childrenRow() {
                $('#childTable').find('.col-sm-9').append('<div class="col-sm-12" style="padding:10px 0px 0px 0px; margin:0px;"><div class="input-group" ><input type="email" class="form-control" placeholder="Homeowner Email" name="owner_email"><div class="input-group-append"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status</button><div class="dropdown-menu"><a class="dropdown-item" href="#">Confirmed</a><a class="dropdown-item" href="#">No Service</a><a class="dropdown-item" href="#">Unknown</a></div></div></div></div>');
                }
                function childrenRow2() {
                $('#childTable2').find('.col-sm-9').append('<div class="col-sm-12" style="padding:10px 0px 0px 0px; margin:0px;"><div class="input-group" ><input type="number" class="form-control" placeholder="Homeowner Phone Number" name="owner_no"><div class="input-group-append"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status</button><div class="dropdown-menu"><a class="dropdown-item" href="#">Confirmed</a><a class="dropdown-item" href="#">No Service</a><a class="dropdown-item" href="#">Unknown</a></div></div></div></div>');
                }
            </script>
@endsection