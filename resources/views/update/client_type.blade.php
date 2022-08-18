
  @extends('layouts.master')

  @section('title')
  <title>Update Client Type</title>
  @endsection
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  @section('content')

  <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
          <div class="row">
              <div class="col-5 align-self-center">
                  <h4 class="page-title">Client Type</h4>
              </div>
            @if(session()->has('message'))
                @if(session()->get('message')=='exist')
                    <div class="alert alert-danger">
                        <p>These values are exist</p>

                    </div>
                @elseif(session()->get('message')=='delete')
                    <div class="alert alert-success">
                        <p>Successfully deleted</p>

                    </div>
                @elseif(session()->get('message')=='insert')
                    <div class="alert alert-success">
                        <p>Successfully Added</p>

                    </div>
                @elseif(session()->get('message')=='updated')
                    <div class="alert alert-success">
                        <p>Successfully Updated</p>

                    </div>
                @endif
            @endif
              <div class="col-7 align-self-center">
                  <div class="d-flex align-items-center justify-content-end">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="#">Home</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">Client Type</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      @if ($errors->any())
      <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
            @endforeach
         </ul>
         </div>
         @endif
      <!-- ============================================================== -->
      <!-- End Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">

          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <div class="col-12  w-75 m-auto">
              <div class="card">
                  <div class="card-body">
                      <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                      <form action='{{url("admin/update_client_type/$query_client_type->id")}}' method="POST" class="form-horizontal form-material mx-2">
                        @csrf
                        @method('put')

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;"> Client Type</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='client_type_name' type="text" placeholder="Insert Client Type" class="form-control form-control-line" value="{{$query_client_type->client_type_name}}">
                            </div>
                        </div>

                          <div class="form-group d-flex">
                              <div class="col-sm-12" style="width: 25%;"></div>
                              <div class="col-sm-12" style="width: 75%;">
                                  <button class="btn btn-success text-white">update</button>
                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>

          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Add Police Station -->
          <!-- ============================================================== -->







      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        All Rights Reserved by
        <a target="_nobir" href="https://www.euitsols.com">European IT Solutions</a>
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
  </div>


  @endsection




