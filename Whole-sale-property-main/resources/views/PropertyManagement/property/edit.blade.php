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
                                <h4 class="card-title">Edit Property</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ url('property/update/'.encrypt($property->id)) }}" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <textarea disabled class="form-control" name="address" cols="30" rows="2">{{ $property->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Homeowner Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Homeowner Name" name="owner_name" value={{$property->owner_name}}>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Revenue</label>
                                            <div class="col-sm-9">
                                                <input type="number" step="0.01" class="form-control" placeholder="Revenue" name="revenue" value={{$property->revenue}}>
                                            </div>
                                        </div>
                                        @foreach (\App\Models\OwnerInfo::where('property_id',$property->id)->where('Type','Email')->get() as $key2=> $email)
                                        <div class="form-group row row_count1" id="childTable">
                                            @if ($loop->iteration == 1)
                                            <label class="col-sm-3 col-form-label">Homeowner Email</label>                                                
                                            @else
                                            <label class="col-sm-3 col-form-label"></label>                                                
                                            @endif
                                            <div class="col-sm-9" id="Row_Count_email_{{$key2}}" class="input-group-append row_count1">
                                                <div class="input-group">
                                                    <input type="email" class="form-control" placeholder="Homeowner Email" name="owner_email[]" value={{ $email->Info }}>
                                                    <div class="input-group-append">
                                                        <select name="email_status[]" class="form-control">
                                                            <option @if ($email->Status == 'Confirmed') selected   
                                                            @endif value="Confirmed">Confirmed</option>
                                                            <option @if ($email->Status == 'Unknown') selected   
                                                            @endif value="Unknown">Unknown</option>
                                                            <option @if ($email->Status == 'No Service') selected   
                                                            @endif value="No Service">No Service</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group-append" >
                                                        <button style="border-radius:50%;margin:10px; height:40px;width:40px; margin-bottom:5px; color:white; padding:0px;" onclick="removeemail({{$key2}})" class="btn btn-danger" type="button">
                                                            <i class="fa fa-trash" style="text-align:center; vertical-align:center;margin-bottom:5px;margin-right:1px;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div id="addrowemail" class="addrowemail">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align: right">
                                                <button style="border-radius:50%;margin:10px; height:40px;width:40px; margin-bottom:5px; color:white; padding:0px;" class="btn btn-primary" type="button" onclick="childrenRow()">
                                                    <i class="fa fa-plus" style="text-align:center; vertical-align:center;padding:2px;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @foreach (\App\Models\OwnerInfo::where('property_id',$property->id)->where('Type','Number')->get() as $key => $number)
                                        <div class="form-group row row_count" id="childTable2">
                                            @if ($loop->iteration == 1)
                                            <label class="col-sm-3 col-form-label">Homeowner Phone Number</label>                                                
                                            @else
                                            <label class="col-sm-3 col-form-label"></label>                                                
                                            @endif
                                            <div class="col-sm-9" id="Row_Count_{{$key}}"  class="input-group-append row_count">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="Homeowner Phone Number" name="owner_no[]" value={{ $number->Info }}>
                                                    <div class="input-group-append">
                                                        <select name="no_status[]" class="form-control" style="border: none">
                                                                <option @if ($number->Status == 'Confirmed') selected   
                                                                @endif value="Confirmed">Confirmed</option>
                                                                <option @if ($number->Status == 'Unknown') selected   
                                                                @endif value="Unknown">Unknown</option>
                                                                <option @if ($number->Status == 'No Service') selected   
                                                                @endif value="No Service">No Service</option>
                                                        </select>
                                                    </div>
                                                {{-- </div> --}}
                                                    <div class="input-group-append">
                                                        <button style="border-radius:50%;margin:10px; height:40px;width:40px; margin-bottom:5px; color:white; padding:0px;" onclick="removeRow({{$key}})" class="btn btn-danger" type="button">
                                                            <i class="fa fa-trash" style="text-align:center; vertical-align:center;margin-bottom:5px;margin-right:1px;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div id="addrowphone" class="addrowphone">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align: right">
                                                <button style="border-radius:50%;margin:10px; height:40px;width:40px; margin-bottom:5px; color:white; padding:0px;" class="btn btn-primary" type="button" onclick="childrenRow2()">
                                                    <i class="fa fa-plus" style="text-align:center; vertical-align:center;padding:2px;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class="custom-control custom-checkbox mb-3 checkbox-danger">
                                                <input type="checkbox" class="custom-control-input" @if ($property->appointments == 1) checked @endif
                                                  id="Contracts" name="Contracts" value="Contracts">
                                                <label class="custom-control-label" for="Contracts">Contracts</label>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class="custom-control custom-checkbox mb-3 checkbox-danger">
                                                <input type="checkbox" class="custom-control-input" @if ($property->contracts == 1) checked @endif id="Appointments" name="Appointments" value="Appointments">
                                                <label class="custom-control-label" for="Appointments">Appointments</label>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
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
                function removeRow(key){
                    if(key===0)
                    {
                    }
                    else
                    {
                        $('#Row_Count_'+key).remove();
                    }
                }
                function removeemail(key){
                    if(key===0)
                    {
                    }
                    else
                    {
                        $('#Row_Count_email_'+key).remove();
                    }
                }

                function childrenRow() {
                    var row_count = $('.row_count1').length;
                    var key = row_count + 1;

                    $('.addrowemail').append('<div class="form-group row row_count1" id="Row_Count_email_'+key+'"><label class="col-sm-3 col-form-label"></label><div class="col-sm-9" class="input-group-append"><div class="input-group"><input type="email" class="form-control" placeholder="Homeowner Email" name="owner_email[]" value={{ $email->Info }}><div class="input-group-append"><select style="padding-right:15px; padding-left:15px; font-size:16px;" name="email_status[]" class="form-control"><option @if ($email->Status == 'Confirmed') selected @endif value="Confirmed">Confirmed</option><option @if ($email->Status == 'Unknown') selected  @endif value="Unknown">Unknown</option><option @if ($email->Status == 'No Service') selected @endif value="No Service">No Service</option></select></div><div class="input-group-append"><button style="border-radius:50%;margin:10px; height:40px;width:40px; margin-bottom:5px; color:white; padding:0px;" onclick="removeemail('+key+')" class="btn btn-danger" type="button"><i class="fa fa-trash" style="text-align:center; vertical-align:center;margin-bottom:5px;margin-right:1px;"></i></button></div></div></div>');
                }

                function childrenRow2() {
                     var row_count = $('.row_count').length;
                     var key = row_count + 1;
                    //  console.log(row_count, key);
                     
                    $('.addrowphone').append('<div class="form-group row row_count" id="Row_Count_'+key+'"><label class="col-sm-3 col-form-label"></label><div class="col-sm-9" class="input-group-append"><div class="input-group"><input type="number" class="form-control" placeholder="Homeowner Phone Number" name="owner_no[]" value={{ $number->Info }}><div class="input-group-append"><select style="padding-right:20px; padding-left:20px; font-size:16px;" name="no_status[]" class="form-control"><option @if ($number->Status == 'Confirmed') selected @endif value="Confirmed">Confirmed</option><option @if ($number->Status == 'Unknown') selected @endif value="Unknown">Unknown</option><option @if ($number->Status == 'No Service') selected @endif value="No Service">No Service</option></select></div><div class="input-group-append"><button style="border-radius:50%;margin:10px; height:40px;width:40px; margin-bottom:5px; color:white; padding:0px;" onclick="removeRow('+key+')" class="btn btn-danger" type="button"><i class="fa fa-trash" style="text-align:center; vertical-align:center;margin-bottom:5px;margin-right:1px;"></i></button></div></div></div>');
                }
            </script>
@endsection