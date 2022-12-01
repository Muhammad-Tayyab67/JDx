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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Properties List</h4>
                        @can('Add Property')
                        <a href="/scout/add" style="color: white; text-decoration:none;">
                            <button type="button" class="btn btn-rounded btn-primary"><span
                            class="btn-icon-left text-info"><i class="fa fa-plus color-theme"></i>
                        </span>Add Property</button></a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach ($scout as $serial => $item)
                                    <tr>
                                        <td width="100">{{$serial+1}}</td>
                                        <td width="900">{{$item->address}}</td>
                                        <td width="100">
                                            <div class="d-flex">
                                                @can('Edit Property')
                                                <a href="{{ url('scout/edit/'.encrypt($item->id)) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                @endcan
                                                {{-- @can('Delete Property')
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp" data-toggle="modal" data-target="#actionModal{{$serial}}"><i class="fa fa-trash"></i></a>
                                                @endcan --}}
                                                @can('Attachments List')
                                                <a href="{{ url('/property/files/list/'.encrypt($item->id)) }}" class="btn btn-secondary shadow btn-xs sharp" style="margin-left: 5px;">
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
                                            <div class="modal fade" id="actionModal{{$serial}}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Scout</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Are you sure you want to delete this scout?</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                            <a href={{ url('scout/destroy/'.encrypt($item->id)) }} type="button" class="btn btn-primary">Yes</a>
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
    <script>

    </script>
@endsection		