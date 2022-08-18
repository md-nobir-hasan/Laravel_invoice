  @extends('layouts.master')
  @section('title')
  <title>Update Client Information</title>
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
                        <h4 class="page-title">Add Client Info</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Client Information</li>
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
                <div id="insert_form" class="col-12  w-75 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                            <form action='{{url("admin/update_client_info/$query_c_info->id")}}' method="POST" class="form-horizontal form-material mx-2">
                              @csrf
                              @method('put')
                            <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Client Type</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select name='c_type_id' class="form-select shadow-none form-control-line">
                                            <option value="">Select Client Type</option>
                                            @foreach($query_c_type as $data)
                                            <option value="{{$data->id}}">{{$data->client_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='c_name' type="text" placeholder="Insert Client Name" class="form-control form-control-line" required value="{{$query_c_info->c_name}}">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Website</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='c_website' type="url" placeholder="Insert Client Website" class="form-control form-control-line" required value="{{$query_c_info->c_website}}">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">E-Mail</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='c_email' type="email" placeholder="Insert Client E-Mail" class="form-control form-control-line" required value="{{$query_c_info->c_email}}">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Phone</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='c_phone' type="tel" placeholder="Insert Client phone" class="form-control form-control-line" required value="{{$query_c_info->c_phone}}">
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Address</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <textarea name="c_address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$query_c_info->c_address}}</textarea>


                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button href='insert_ps' class="btn btn-success text-white">Update</button>
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





{{-- =======================================================================================================
    ==============================       Show show table        ===========================================
    ==================================================================================================== --}}


                {{-- =======================================================================================================
    ==============================     End Show show table        ===========================================
    ==================================================================================================== --}}







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





