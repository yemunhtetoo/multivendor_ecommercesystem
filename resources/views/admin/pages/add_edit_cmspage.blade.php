@extends('admin.layout.layout')
@section('content')
<style>
  #container {
      width: 1000px;
      margin: 20px auto;
  }
  .ck-editor__editable[role="textbox"] {
      /* editing area */
      min-height: 200px;
  }
  .ck-content .image {
      /* block images */
      max-width: 80%;
      margin: 20px auto;
  }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">CMS Page Mangement</h3>
                        <h6 class="font-weight-normal mb-0">CMS Page</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong>{{Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif

                  @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong>{{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif

                  @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif

                  <form class="forms-sample" @if(empty($cmspage['id'])) action="{{ url('admin/add-edit-cms-page') }}" @else action="{{ url('admin/add-edit-cms-page/'.$cmspage['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" placeholder="Enter cmspage Name" name="title" @if(!empty($cmspage['title']))  value="{{$cmspage['title']}}" @else value="{{ old('title')}}" @endif>
                    </div> 
                    {{-- <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="myeditorinstance" rows="3" class="form-control" > @if(!empty($cmspage['description'])) {{$cmspage['description']}} @endif</textarea>
                    </div>  --}}

                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="editor" rows="3" class="form-control" rows="3"> @if(!empty($cmspage['description'])) {{$cmspage['description']}} @endif</textarea>
                    </div> 
                    <div class="form-group">
                      <label for="url">URL</label>
                      <input type="text" class="form-control" id="url" placeholder="Enter Page URL" name="url" @if(!empty($cmspage['url']))  value="{{$cmspage['url']}}" @else value="{{ old('url')}}" @endif>
                    </div> 
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title" name="meta_title" @if(!empty($cmspage['meta_title']))  value="{{$cmspage['meta_title']}}" @else value="{{ old('meta_title')}}" @endif>
                    </div> 
                    <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <input type="text" class="form-control" id="meta_description" placeholder="Enter Meta Description" name="meta_description" @if(!empty($cmspage['meta_description']))  value="{{$cmspage['meta_description']}}" @else value="{{ old('meta_description')}}" @endif>
                    </div> 
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <input type="text" class="form-control" id="meta_keywords" placeholder="Enter Meta Keywords" name="meta_keywords" @if(!empty($cmspage['meta_keywords']))  value="{{$cmspage['meta_keywords']}}" @else value="{{ old('meta_keywords')}}" @endif>
                    </div> 
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
    </div>
    @include('admin.layout.footer')
</div>
<script>
  ClassicEditor
     .create( document.querySelector( '#editor' ),{
      ckfinder:{
        uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
      }
     })
     .catch( error => {
             console.error( error );
     } );
</script> 
@endsection