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
                                <h4 class="card-title">Edit Roles</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ url('role/update/'.encrypt($role->id)) }}" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Name" id="role_name" name="role_name" value={{ $role->name }}>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="4" id="role_description" name="role_description">{{ $role->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Permissions</label>
                                            <div class="col-sm-9">
                                                <select id="single-select"  id="role_permissions" name="role_permissions[]" multiple="multiple">
                                                 @foreach($permissions as $permission)
                                                 <option @if($role->hasPermissionTo($permission->name)) selected @endif>{{ $permission->name }}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button class="btn btn-danger"><a href="/roles" style="color: white; text-decoration:none;">Cancel</a></button>
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