<!DOCTYPE html>
<html lang="en">
  <head>
    @section('title')
    Add Language
    @endsection
    @include('includes.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('includes.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('includes.header')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(session()->has('success'))

          <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">x</button>

          {{session()->get('success')}}

          </div>
          @endif
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 style="color: red" class="card-title">Add Language</h4>
              {{-- <p class="card-description"> Basic form elements </p> --}}
              <form class="forms-sample" action="{{route('languages.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Title</label>
                  <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleInputName1" placeholder="title">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Slogan</label>
                  <select name="slogan" class="form-control" id="exampleSelectGender">
                    <option value="{{null}}">add slogan</option>
                    <option value="en">English</option>
                    <option value="ar">Arabic</option>
                    <option value="sp">Spanish</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>File upload</label>
                  <input type="file" name="image" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder='File upload'>
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-secondary" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
       </div>
      <!-- page-body-wrapper ends -->
      @include('includes.footer')
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('includes.scripts')
  </body>
</html>