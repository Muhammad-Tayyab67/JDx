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
            <div class="col">
                <div class="card">
                    @can('Upload Attachments')
                    <div class="card-header">
                        <h4 class="card-title">Files</h4>
                        <a href="/scout_form" style="color: white; text-decoration:none;" data-toggle="modal" data-target="#upload">
                            <button type="button" class="btn btn-rounded btn-primary"><span
                            class="btn-icon-left text-info"><i class="fa fa-upload"></i>
                        </span>Upload</button></a>	
                    </div>
                    @endcan
                    <div class="modal fade" id="upload">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                @can('Upload Attachments')
                                <div class="modal-header">
                                    <h5 class="modal-title">Upload Image</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                @endcan
                                <form method="POST" action="{{ url('image/store/'.encrypt($id)) }}"class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                         <div class="form-group row">
                                             <div class="col-sm-12">
                                                 <div class="input-group mb-3">
                                                     <div class="input-group-prepend">
                                                         <span class="input-group-text">Upload</span>
                                                     </div>
                                                     <div class="custom-file">
                                                         <input type="file" required class="custom-file-input" multiple="multiple" id="image" name="image[]" >
                                                         <label class="custom-file-label">Choose file</label>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                            <div class="col-sm-12" id="carousel">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3master" class="display">
                                <thead>
                                    <tr>
                                        <th>Files</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($files as $key => $file)
                                    <tr>
                                        <td>
                                            <a data-toggle="modal" data-target="#basicModal{{$key}}" style="color :#0096FF;">{{$file->URL}}</a>
                                            <div class="modal fade" id="basicModal{{$key}}">
                                                <div class="modal-dialog" role="document" style="margin: 30px 30px 30px 40px; max-width:100%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Image Preview</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div style="width:100%; text-align:center; content-align:center;">
                                                                <img class="fit-picture" 
                                                                style="width: 100%;"
                                                                src={{Storage::disk('s3')->url($file->URL)}}
                                                                alt=".jpeg">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                            {{-- <a href={{ url('image/delete'.{{Storage::disk('s3')->url($file->URL)}}) }} type="button" class="btn btn-primary" >Delete</a> --}}
                                                            <a href={{ url('image/delete/'.encrypt($file->URL)) }} type="button" class="btn btn-primary">Delete</a>
                                                            <a href={{ url('image/download/'.encrypt($file->URL)) }} type="button" class="btn btn-primary">Download</a>
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
        window.onload = function () {
        $("#image").change(function() {    

            [].forEach.call(this.files, function(file, index){

                var reader = new FileReader();

            reader.onload = (function(theFile) {
                return function(e) {
                // Render the image.
                var div = document.createElement('div');
                div.innerHTML = theFile.name;
                    $("#carousel").append(div);
                
                };
            })(file);

            reader.readAsDataURL(file);

            });    
        });
        }
    </script>
@endsection