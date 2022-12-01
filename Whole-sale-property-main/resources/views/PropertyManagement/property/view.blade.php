{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
        <strong>Success!</strong>{{ $message }}
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
    </div>
    @endif
    
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Warning!</strong> {{ $message }}
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
    </div>
    @endif  
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Property Management</h4>
                        @can('Export Master Property')
                        <div class="table-btns">
                                <button onclick="ExportPropertyFiles()" type="button" class="btn btn-rounded btn-warning"><span
                                    class="btn-icon-left text-warning"><i class="fa fa-download color-warning"></i>
                                </span>Export</button>
                        </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home">Master List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile">Downloaded List</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <table id="example3" class="display">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" class="SelectAllFiles"></th>
                                                        <th>#</th>
                                                        <th>Address</th>
                                                        <th>H.o Name</th>
                                                        <th>H.o Number</th>
                                                        <th>H.o Email</th>
                                                        <th>Scout Name</th>
                                                        <th>Date Created</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (\App\Models\Property::where('download_status','no')->get() as $serial => $item)
                                                    <tr @if($item->notify == 1 && Auth::user()->roles[0]->name == 'Super Admin'){ style="color: blue" } @endif>
                                                        <td><input type="checkbox" name="columns_checkbox[]" value={{$item->id}}></td>
                                                        <td>{{ $serial + 1 }}</td>
                                                        <td>{{$item->address}}</td>
                                                        <td>{{{$item->owner_name}}}</td>
                                                        <td>{{$item->owner_no}}</td>
                                                        <td>{{$item->owner_email}}</td>
                                                        <td>{{ (!empty($item->user->name)) ?  $item->user->name : 'N/A' }}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                               @can('Edit Master Property')
                                                               <a href="{{ url('/property/edit/'.encrypt($item->id)) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                               @endcan
                                                               @can('Delete Master Property')
                                                               <a href="#" class="btn btn-danger shadow btn-xs sharp" data-toggle="modal" data-target="#basicModal"><i class="fa fa-trash"></i></a>
                                                               @endcan
                                                               @can('Attachments List')
                                                               <a  class="btn btn-secondary shadow btn-xs sharp" href="{{ url('/property/files/list/'.encrypt($item->id)) }}"  style="margin-left: 5px;">
                                                                    <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                                    </svg>
                                                                </a>
                                                               @endcan 
                                                            </div>	
                                                            <div class="modal fade" id="basicModal">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Delete Property</h5>
                                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">Are you sure you want to delete all the relative data (Emails and Phone Numbers) of this property permanently?</div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                            <a href={{ url('property/destroy/'.encrypt($item->id)) }} type="button" class="btn btn-primary">Yes</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>									
                                                        </td>												
                                                    </tr>
                                                    @endforeach 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <table id="example3master" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Address</th>
                                                        <th>H.O Name</th>
                                                        <th>H.o Number</th>
                                                        <th>H.o Email</th>
                                                        <th>Scout Name</th>
                                                        <th>Date Created</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (\App\Models\Property::where('download_status','yess')->get() as $key => $item)
                                                    <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td>{{$item->address}}</td>
                                                        <td>{{{$item->owner_name}}}</td>
                                                        <td>{{$item->owner_no}}</td>
                                                        <td>{{$item->owner_email}}</td>
                                                        <td>{{ (!empty($item->user->name)) ?  $item->user->name : 'N/A' }}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                @can('Edit Master Property')
                                                               <a href="{{ url('/property/edit/'.encrypt($item->id)) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                               @endcan
                                                               @can('Delete Master Property')
                                                               <a href="#" class="btn btn-danger shadow btn-xs sharp" data-toggle="modal" data-target="#basicModal1"><i class="fa fa-trash"></i></a>
                                                               @endcan
                                                               @can('Attachments List')
                                                               <a  class="btn btn-secondary shadow btn-xs sharp" href="{{ url('/property/files/list/'.encrypt($item->id)) }}"  style="margin-left: 5px;">
                                                                    <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                                    </svg>
                                                                </a>
                                                               @endcan 
                                                            </div>
                                                            <div class="modal fade" id="basicModal1">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Delete Property</h5>
                                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">Are you sure you want to delete all the relative data(Emails and Phone Numbers) of this property permanently?</div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                            <a href={{ url('property/destroy/'.encrypt($item->id)) }} type="button" class="btn btn-primary">Yes</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>										
                                                        </td>												
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
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
            $('.SelectAllFiles').click(function() {
                if ($(this).is(':checked')) {
                    $('div input[name="columns_checkbox[]"]').attr('checked', true);
                } else {
                    $('div input[name="columns_checkbox[]"]').attr('checked', false);
                }
            });
    </script>
      <script>
        function ExportPropertyFiles(){
    
                var array = []
                var checkboxes = document.querySelectorAll('input[name="columns_checkbox[]"]:checked')
                for (var i = 0; i < checkboxes.length; i++) 
                {
                array.push(checkboxes[i].value)
                }
                if(array.length<1)
                {
                    alert('Please select a property first')
                }
            $.ajax({
                type: "POST",
                url: '{{ route('export') }}',
                data:{
                    "_token": "{{ csrf_token() }}",
                    array:array,
                },
                cache: false,
                xhrFields:{
                    responseType: 'blob'
                },
                success: function(data)
                {
                    console.log(data);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(new Blob([data]));
                    link.download = `PropertyExport.xlsx`;
                    link.click();
                    location.reload();
                },
                fail: function(data) {
                    alert('Not downloaded');
                    
                }
            });

        }
      </script>
      </div>
@endsection