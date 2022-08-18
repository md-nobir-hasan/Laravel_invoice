
  @extends('layouts.master')

  @section('title')
  <title> Client Type</title>
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
      @if(session()->has('message'))
      @if(session()->get('message')=='existed')
          <div class="alert alert-danger">
              <p>These values are exist</p>

          </div>
      @elseif(session()->get('message')=='deleted')
          <div class="alert alert-success">
              <p>Successfully deleted</p>

          </div>
      @elseif(session()->get('message')=='inserted')
          <div class="alert alert-success">
              <p>Successfully Added</p>

          </div>
      @elseif(session()->get('message')=='updated')
          <div class="alert alert-success">
              <p>Successfully Updated</p>

          </div>
      @endif
  @endif

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
                      <form action='{{route('insert_client_type')}}' method="POST" class="form-horizontal form-material mx-2">
                        @csrf

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;"> Client Type</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='client_type_name' type="text" placeholder="Insert Client Type" class="form-control form-control-line">
                            </div>
                        </div>
                          <div class="form-group d-flex">
                              <div class="col-sm-12" style="width: 25%;"></div>
                              <div class="col-sm-12" style="width: 75%;">
                                  <button class="btn btn-success text-white">Save</button>
                              </div>
                          </div>

                      </form>
                  </div>
              </div>
          </div>




          <div class="row">
              <!-- column -->
              <div class="col-12   m-auto">
                  <div class="card">
                      <div class="table-responsive">
                          <table id="datatable" class="table table-hover table-bordered">
                              <thead>
                                  <tr>
                                      <th class="border-top-0 text-center">SL</th>
                                      <th class="border-top-0 text-center">Client Type</th>
                                      <th class="border-top-0 text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($query_client_type as $data)
                                  <tr>
                                  <!--  -->
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                      </td>
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->client_type_name}}</td>

                                      <td class='td_css' style='line-height: 0.5;padding: .5rem;text-align: center'>

                                      <a  href='{{url("admin/update_page_client_type/$data->id")}}' name="btn_edit" class="edit_btn btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>

                                        <form class="spacing" method="POST" action='{{url("admin/delete/clienType/$data->id")}}' >
                                            @csrf
                                        @method('delete')
                                            <button id='custom-btn' onclick="return confirm('Ate you sure??')" class="btn btn-danger"> <i class="bi bi-trash"></i> </button>
                                        </form>

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




