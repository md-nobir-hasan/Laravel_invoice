  @extends('layouts.master')
  @section('title')
  <title>Project</title>
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
                        <h4 class="page-title">Add Project Info</h4>
                    </div>

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Project Information</li>
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
                <div class="alert alert-danger">
                    <p>Successfully deleted</p>

                </div>
            @elseif(session()->get('message')=='inserted')
                <div class="alert alert-success">
                    <p>Successfully Added</p>

                </div>
            @elseif(session()->get('message')=='existed')
                <div class="alert alert-success">
                    <p>Successfully Added</p>

                </div>
            @elseif(session()->get('message')=='updated')
                <div class="alert alert-success">
                    <p>Successfully Updated</p>

                </div>
            @elseif(session()->get('message')=='select_client')
                <div class="alert alert-success">
                    <p>Please,Select a client type </p>

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
                <div id="insert_form" class="col-12  w-75 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                            <form action='{{url("admin/insert_project_info")}}' method="POST"  class="form-horizontal form-material mx-2" id="project_form">
                              @csrf
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Client Type</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="c_type" name='c_type_id' class="form-select shadow-none form-control-line" value='' required>
                                            <option value="first">Select Client Type</option>
                                            @foreach($query_c_type as $data)
                                            <option value="{{$data->id}}">{{$data->client_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                                <div class="form-group d-flex" >
                                    <label class="col-sm-12" style="width: 25%;" >Client Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select disabled name='c_info_id' id="client_name_select" class="form-select shadow-none form-control-line"  value='' required >
                                            <option value="">Select Client Name</option>
                                            @foreach($query_c_info as $data)
                                            <option value="{{$data->id}}">{{$data->c_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex domain">
                                    <label class="col-sm-12" style="width: 25%;">Domain Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='domain_name' id="domain_name" type="text" placeholder="Insert Domain Name" class="form-control form-control-line" >
                                    </div>
                                </div>

                                <div class="form-group d-flex domain" >
                                    <label class="col-sm-12" style="width: 25%;" >Domain Registrar  Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select  name='domain_registar_id' id="domain_registar_id" class="form-select shadow-none form-control-line">
                                            <option value="">Select Domain Registrar  Name</option>
                                            @foreach($domain_registars as $data)
                                            <option value="{{$data->id}}">{{$data->domain_registars_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex domain">
                                    <label class="col-sm-12" style="width: 25%;">Number of Year</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='d_number_of_year'  type="number" class="number_of_year form-control form-control-line" >
                                    </div>
                                </div>

                                <div class="form-group d-flex domain">
                                    <label class="col-sm-12" style="width: 25%;">Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='s_domain_date' type="date" id="date_time" placeholder="dd-mm-y" class="start_date form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group d-flex domain">
                                    <label class="col-sm-12" style="width: 25%;">End Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='e_domain_date'id="e_domain_date" type="text" class="end_date form-control form-control-line">
                                    </div>
                                </div>

                                {{-- Hosting  --}}
                                <div class="form-group d-flex hosting">
                                    <label class="col-sm-12" style="width: 25%;">Hosting Package</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='hosting_name' id="hosting_name" type="text" placeholder="Insert Hosting Package" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex hosting" >
                                    <label class="col-sm-12" style="width: 25%;" > Hosting Provider Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select  name='hosting_provider_id' id="hosting_provider_id" class="form-select shadow-none form-control-line">
                                            <option value="">Select Hosting Provider Name</option>
                                            @foreach($hosting_providers as $data)
                                            <option value="{{$data->id}}">{{$data->hosting_provider_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex hosting">
                                    <label class="col-sm-12" style="width: 25%;">Domain Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='hosting_domain_name' id="hosting_domain_name" type="text" placeholder="Domain Name" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex hosting">
                                    <label class="col-sm-12" style="width: 25%;">Number of Year</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name="h_number_of_year" type="number" class="number_of_year form-control form-control-line" value="">
                                    </div>
                                </div>

                                <div class="form-group d-flex hosting">
                                    <label class="col-sm-12" style="width: 25%;">Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='s_hosting_date' id="s_hosting_date" type="date" class="start_date form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex hosting">
                                    <label class="col-sm-12" style="width: 25%;">End Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='e_hosting_date' id="e_hosting_date" type="text" class="end_date form-control form-control-line" >
                                    </div>
                                </div>


                                {{-- Domain and Hosting  --}}

                                 <div class="form-group d-flex DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Hosting Package</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_hosting_name' id="hosting_name" type="text" placeholder="Insert Hosting Package" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex DomainAndhosting" >
                                    <label class="col-sm-12" style="width: 25%;" >Hosting Provider Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select  name='dh_hosting_provider_id' id="hosting_provider_id" class="form-select shadow-none form-control-line">
                                            <option value="">Select Hosting Provider Name</option>
                                            @foreach($hosting_providers as $data)
                                            <option value="{{$data->id}}">{{$data->hosting_provider_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Domain Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_domain_name' id="hosting_domain_name" type="text" placeholder="Domain Name" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex DomainAndhosting" >
                                    <label class="col-sm-12" style="width: 25%;" >Domain Registrar  Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select  name='dh_domain_registrar_id' id="domain_registar_id" class="form-select shadow-none form-control-line">
                                            <option value="">Select Domain Registrar  Name</option>
                                            @foreach($domain_registars as $data)
                                            <option value="{{$data->id}}">{{$data->domain_registars_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Number of Year</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_number_of_year' id="number_of_year" type="number" class="number_of_year form-control form-control-line" >
                                    </div>
                                </div>

                                <div class="form-group d-flex DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_start_date' id="dh_start_date" type="date" class="start_date form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">End Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_end_date' type="text" class="end_date form-control form-control-line" placeholder="mm-dd-yyyy">
                                    </div>
                                </div>

                                {{-- Project --}}
                                <div class="form-group d-flex project">
                                    <label class="col-sm-12" style="width: 25%;">Project Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='project_name' id="project_name" type="text" placeholder="Insert Project Name" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex project">
                                    <label class="col-sm-12" style="width: 25%;">Project Details</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <textarea name='project_details' id="project_details" rows="3" class="form-control form-control-line"  placeholder="Project Details"></textarea>
                                    </div>
                                </div>
                                <div class="form-group d-flex project">
                                    <label class="col-sm-12" style="width: 25%;">Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='project_start_date' id="s_project_date" type="date"  class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex project">
                                    <label class="col-sm-12" style="width: 25%;">Time Quote</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='porject_time_quote' id="project_quote" type="text" class="form-control form-control-line" >
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button  class="btn btn-success text-white" id="insert_project">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>








    {{-- Edit form  --}}
                <div id="edit_form" style="display: none" class="edit_form col-12  w-75 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                        <form action='{{url("admin/update_project_info")}}' method="POST" class="form-horizontal form-material mx-2">
                                @csrf
                                @method('PUT')

                            <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Edit Client Type</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="select_input_edit" name='c_type_id_edit' class="form-select shadow-none form-control-line" value=''>
                                            <option value="">Select Client Type</option>
                                            @foreach($query_c_type as $data)
                                            <option value="{{$data->id}}">{{$data->client_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex" >
                                    <label class="col-sm-12" style="width: 25%;" >Edit Client Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select disabled name='c_info_id' id="client_name_select_edit" class="form-select shadow-none form-control-line" >
                                            <option value="">Select Client Name</option>
                                            @foreach($query_c_info as $data)
                                            <option value="{{$data->id}}">{{$data->c_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group d-flex edit_domain">
                                    <label class="col-sm-12" style="width: 25%;">Edit Domain Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='domain_name_edit' id="edit_domain_name" type="text" placeholder="Insert Domain Name" class="form-control form-control-line" >
                                        <input type="hidden" id="domain_id_edit" name="domain_id_edit" value="">
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_domain" >
                                    <label class="col-sm-12" style="width: 25%;" >Edit Domain Registrar  Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select name='domain_registar_id' id="domain_registar_id" class="form-select shadow-none form-control-line" >
                                            <option value="">Select Domain Registrar  Name</option>
                                            @foreach($domain_registars as $data)
                                            <option value="{{$data->id}}">{{$data->domain_registars_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_domain">
                                    <label class="col-sm-12" style="width: 25%;">Edit Number of Year</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='d_number_of_year' id="edit_dh7" type="number" class="number_of_year form-control form-control-line" >
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_domain">
                                    <label class="col-sm-12" style="width: 25%;">Edit Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='s_domain_date' id="s_domain_date_edit" type="date" data-date-date="dd-mm-YYYY" class="start_date form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex edit_domain">
                                    <label class="col-sm-12" style="width: 25%;">Edit End Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='e_domain_date'id="e_domain_date_edit" type="text" class="end_date form-control form-control-line">
                                    </div>
                                </div>

                               {{-- Edit  Hosting  --}}

                                <div class="form-group d-flex edit_hosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Hosting Package</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='hosting_name' id="hosting_name_edit" type="text" placeholder="Insert Hosting Package" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_hosting" >
                                    <label class="col-sm-12" style="width: 25%;" >Edit Hosting Provider Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select  name='hosting_provider_id' id="hosting_provider_id" class="form-select shadow-none form-control-line">
                                            <option value="">Select Hosting Provider Name</option>
                                            @foreach($hosting_providers as $data)
                                            <option value="{{$data->id}}">{{$data->hosting_provider_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_hosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Domain Name </label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='hosting_domain_name' id="hosting_domain_name_edit" type="text" placeholder="Insert Domain Name" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_hosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Number of Year</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='h_number_of_year' id="edit_dh7" type="number" class="number_of_year form-control form-control-line" >
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_hosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='s_hosting_date' id="s_hosting_date_edit" type="date" class="start_date form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex edit_hosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit End Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='e_hosting_date' id="e_hosting_date_edit" type="text" class="end_date form-control form-control-line" >
                                    </div>
                                </div>`


                                {{-- Edit Domain and Hosting --}}
                                <div class="form-group d-flex edit_DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Hosting Package</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_hosting_name' id="edit_dh3" type="text" placeholder="Insert Hosting Package" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_DomainAndhosting" >
                                    <label class="col-sm-12" style="width: 25%;" >Edit Hosting Provider Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select  name='dh_hosting_provider_id' class="form-select shadow-none form-control-line">
                                            <option value="">Select Hosting Provider Name</option>
                                            @foreach($hosting_providers as $data)
                                            <option value="{{$data->id}}">{{$data->hosting_provider_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Domain Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_domain_name' id="edit_dh5" type="text" placeholder="Domain Name" class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_DomainAndhosting" >
                                    <label class="col-sm-12" style="width: 25%;" >Edit Domain Registrar  Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select  name='dh_domain_registrar_id' class="form-select shadow-none form-control-line">
                                            <option value="">Select Domain Registrar  Name</option>
                                            @foreach($domain_registars as $data)
                                            <option value="{{$data->id}}">{{$data->domain_registars_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Number of Year</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_number_of_year' id="edit_dh7" type="number" class="number_of_year form-control form-control-line" >
                                    </div>
                                </div>

                                <div class="form-group d-flex edit_DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_start_date' id="edit_dh8" type="date" class="start_date form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex edit_DomainAndhosting">
                                    <label class="col-sm-12" style="width: 25%;">Edit End Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='dh_end_date' id="edit_dh9" type="text" class="end_date form-control form-control-line" placeholder="mm-dd-yyyy">
                                    </div>
                                </div>

                                {{-- Edit Project  --}}

                                <div class="form-group d-flex edit_project">
                                    <label class="col-sm-12" style="width: 25%;">Edit Project Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='project_name' id="project_name_edit" type="text" placeholder="Insert Project Name" class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex edit_project">
                                    <label class="col-sm-12" style="width: 25%;">Edit Project Details</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <textarea name='project_details' id="project_details_edit" rows="3" class="form-control form-control-line"  placeholder="Project Details"></textarea>
                                    </div>
                                </div>
                                <div class="form-group d-flex edit_project">
                                    <label class="col-sm-12" style="width: 25%;">Edit Start Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='project_start_date' id="s_project_date_edit" type="date"  class="form-control form-control-line" >
                                    </div>
                                </div>
                                <div class="form-group d-flex edit_project">
                                    <label class="col-sm-12" style="width: 25%;">Edit Time Quote</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='porject_time_quote' id="project_quote_edit" type="text" class="form-control form-control-line" >
                                    </div>
                                </div>



                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button  class="btn btn-success text-white">Update</button>
                                        <button id="back" type="button" href='back_insert' class="btn btn-success text-white">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





{{-- =======================================================================================================
    ==============================       Show show table        ===========================================
    ==================================================================================================== --}}

    {{-- Tab/toggle buttons  --}}
    <div class="toggle-btn">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            @foreach($query_c_type as $data)
                <button class="nav-link custom_tab" data-bs-toggle="tab" type="button" style="padding: 10px 10px  10px 15px; font-weight: bold">{{$data->client_type_name}}</button>
            @endforeach
        </div>
      </div>


        {{-- Domain show --}}
        <div class="active table-section domain_table_show" >
            <div class="row">
                    <!-- column -->
                <div class="col-12   m-auto">
                     <div class="card">
                        <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Domain Details</h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-domain" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                            <th class="border-top-0 text-center" style="display:none !important;">S.L-temporary.</th>
                                            <th class="border-top-0 text-center">S.L.</th>
                                            <th class="border-top-0 text-center">Client Type</th>
                                            <th class="border-top-0 text-center">Client Name</th>
                                            <th class="border-top-0 text-center">Domain Name</th>
                                            <th class="border-top-0 text-center">Domain Registrar  Name</th>
                                            <th class="border-top-0 text-center">Number of the year</th>
                                            <th class="border-top-0 text-center">Start Date</th>
                                            <th class="border-top-0 text-center">End Date</th>
                                            <th class="border-top-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($query_domain_info as $data)
                                        <tr>
                                        <!--  -->
                                            <input type="hidden" id="domain_unique_id" name="custId" value="{{$data->c_type_id}}">


                                            <td id="domain_id" style='text-align: center; display:none !important;'>{{$data->id}}
                                            </td>
                                            <td style='text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='text-align: center'>{{$data->client_type_name}}</td>
                                            <td style='text-align: center'>{{$data->c_name}}</td>
                                            <td style=' text-align: center'>{{$data->domain_name}}</td>
                                            <td style=' text-align: center'>{{$data->domain_registars_name}}</td>
                                            <td style=' text-align: center'>{{$data->number_of_year}}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->domain_start_date)) }}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->domain_end_date)) }}</td>
                                            <td class='td_css' style='text-align: center'>
                                            <a id="edit_btn" class="edit_btn" pid="{{$data->id}}" name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                            <form class="spacing" action='{{url("admin/delete/DomainModel/$data->id")}}'>
                                                @method('delete')
                                                @csrf

                                                <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
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


        {{-- Domain and Hosting show  --}}
        <div class="dh_table_show active table-section" style="display: none">
            <div class="row">
                <!-- column -->
                <div class="col-12 m-auto">
                    <div class="card">
                    <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Domain and Hosting</h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-hosting" class="table table-responsive table-hover table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center" style="display:none !important;">S.L-temporary.</th>

                                        <th class="border-top-0 text-center">S.L.</th>
                                        <th class="border-top-0 text-center">Client Type</th>
                                        <th class="border-top-0 text-center">Client Name</th>
                                        <th class="border-top-0 text-center">Hosting Package</th>
                                        <th class="border-top-0 text-center">Hosting Provider Name</th>
                                        <th class="border-top-0 text-center">Domain Name</th>
                                        <th class="border-top-0 text-center">Domain Registrar</th>
                                        <th class="border-top-0 text-center">Number of the year</th>
                                        {{-- <th class="border-top-0 text-center">Number of the year</th> --}}
                                        <th class="border-top-0 text-center">Start Date</th>
                                        <th class="border-top-0 text-center">End Date</th>
                                        <th class="border-top-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($domain_and_hosting->client_type) --}}
                                @foreach($domain_and_hosting as $data)
                                    <tr>

                                        <input type="hidden" id="edit_DomainAndhosting_id" name="custId" value="{{$data->c_type_id}}">
                                        <td id="hosting_id" style='text-align: center; display:none !important;'>{{$data->id}}
                                        <td style='text-align: center'>{{$loop->index+1}}
                                        </td>
                                        <td style='text-align: center'>{{$data->client_type->client_type_name}}</td>
                                        <td style='text-align: center'>{{$data->client_info->c_name}}</td>
                                        <td style=' text-align: center'>{{$data->dh_hosting_name}}</td>
                                        <td style=' text-align: center'>{{$data->hosting_providers->hosting_provider_name}}</td>
                                        <td style=' text-align: center'>{{$data->dh_domain_name}}</td>
                                        <td style=' text-align: center'>{{$data->domain_registars->domain_registars_name}}</td>
                                        <td style=' text-align: center'>{{$data->dh_number_of_year}}</td>
                                        <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->dh_start_date))}}</td>
                                        <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->dh_end_date))}}</td>
                                        <td class='td_css' style='text-align: center'>
                                        <a id="edit_btn" class="edit_btn" pid="{{$data->id}}" name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                        <form class="spacing" method="POST" action='{{url("admin/delete/DomainAndHostingModel/$data->id")}}'>
                                            @csrf
                                            @method('delete')
                                            <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
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


        {{-- Hosting show  --}}
        <div class="hosting_table_show active" style="display: none">
            <div class="row">
                <!-- column -->
                <div class="col-12 m-auto">
                    <div class="card">
                    <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Hosting Package Details</h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-hosting" class="table table-responsive table-hover table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center" style="display:none !important;">S.L-temporary.</th>

                                        <th class="border-top-0 text-center">S.L.</th>
                                        <th class="border-top-0 text-center">Client Type</th>
                                        <th class="border-top-0 text-center">Client Name</th>
                                        <th class="border-top-0 text-center">Domain Name</th>
                                        <th class="border-top-0 text-center">Hosting Package</th>
                                        <th class="border-top-0 text-center">Hosting Provider</th>
                                        <th class="border-top-0 text-center">Number of the year</th>
                                        <th class="border-top-0 text-center">Start Date</th>
                                        <th class="border-top-0 text-center">End Date</th>
                                        <th class="border-top-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($query_hosting_info as $data)
                                    <tr>
                                    <!--  -->
                                    <input type="hidden" id="hosting_unique_id" name="custId" value="{{$data->c_type_id}}">

                                        <!-- <input type="hidden" id="domain_id" name="domain_id" value="{{$data->id}}"> -->
                                        <td id="hosting_id" style='text-align: center; display:none !important;'>{{$data->id}}
                                        <td style='text-align: center'>{{$loop->index+1}}
                                        </td>
                                        <td style='text-align: center'>{{$data->client_type_name}}</td>
                                        <td style='text-align: center'>{{$data->c_name}}</td>
                                        <td style=' text-align: center'>{{$data->hosting_domain_name}}</td>
                                        <td style=' text-align: center'>{{$data->hosting_provider_name}}</td>
                                        <td style=' text-align: center'>{{$data->hosting_name}}</td>
                                        <td style=' text-align: center'>{{$data->number_of_year}}</td>
                                        <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->hosting_start_date))}}</td>
                                        <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->hosting_end_date))}}</td>
                                        <td class='td_css' style='text-align: center'>
                                        <a id="edit_btn" class="edit_btn" pid="{{$data->id}}" name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                        <form class="spacing" method="POST" action='{{url("admin/delete/HostingModel/$data->id")}}'>
                                            @csrf
                                            @method('delete')
                                            <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
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



        {{-- Project show  --}}
        <div class="project_table_show active" style="display: none">
            <div class="row">
                <!-- column -->
                <div class="col-12   m-auto">
                    <div class="card">
                        <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Project Details</h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-project" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">S.L.</th>
                                        <th class="border-top-0 text-center">Client Type</th>
                                        <th class="border-top-0 text-center">Client Name</th>
                                        <th class="border-top-0 text-center">Project Name</th>
                                        <th class="border-top-0 text-center">Project Details</th>
                                        {{-- <th class="border-top-0 text-center">Number of the year</th> --}}
                                        <th class="border-top-0 text-center">Project Start Date</th>
                                        <th class="border-top-0 text-center">Project Time Quote</th>
                                        <th class="border-top-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($query_other_project_info as $data)
                                    <tr>
                                    <!--  -->
                                    <input type="hidden" id="project_unique_id" name="custId" value="{{$data->c_type_id}}">

                                        <td id="project_id" style='text-align: center; display:none !important;'>{{$data->id}} </td>
                                        <td style='text-align: center'>{{$loop->index+1}}
                                        </td>
                                        <td style='text-align: center'>{{$data->client_type_name}}</td>
                                        <td style='text-align: center'>{{$data->c_name}}</td>
                                        <td style=' text-align: center'>{{$data->project_name}}</td>
                                        <td style=' text-align: center'>{{$data->project_details}}</td>
                                        {{-- <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->dh_number_of_year))}}</td> --}}
                                        <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->project_start_date))}}</td>
                                        <td style=' text-align: center'>{{$data->project_time_quote}}</td>
                                        <td class='td_css' style='text-align: center'>
                                        <a id="edit_btn" class="edit_btn" pid="{{$data->id}}" name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                        <form class="spacing" method="POST" action='{{url("admin/delete/otherProjectModel/$data->id")}}'>
                                            @csrf
                                            @method('delete')
                                            <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
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


        @section('javaScript')
        <script>



                $('.edit_btn').each(function(i)
                {

                    $(this).on('click',function()
                    {
                        var id = $(this).attr('pid');
                        var tr = $(this).closest("tr");

                        $('#insert_form').hide();
                        $('#edit_form').show();

                        var c_type = $(tr).find("td:eq("+2+")").text().toLowerCase();
                        // var c_type_val = $(tr).find("td:eq("+2+")").val();


                        var c_type_id = ""
                        // console.log("yes",c_type,c_type_val)
                        $('html, body').animate({ scrollTop: 0 }, 1000);
                        // console.log($('.edit_domain').css("display"))
                        if(c_type == 'domain'){ // or this.value == 'volvo'
                    // console.log($('.domain').css("display"));
                            c_type_id = $('#domain_unique_id').val()

                            if($('.edit_domain').css("display")=="none"){
                                $('.edit_domain').attr('style', 'display: flex !important');
                                $('.edit_hosting').attr('style', 'display: none !important');
                                $('.edit_DomainAndhosting').attr('style', 'display: none !important');
                                $('.edit_project').attr('style', 'display: none !important');


                            }

                            $('#edit_domain_name').val($(tr).find("td:eq("+4+")").text())
                            $('#domain_id_edit').val($(tr).find("td:eq("+0+")").text())
                            // console.log("sss",$(tr).find("td:eq("+0+")").text())
                            $('#s_domain_date_edit').val($(tr).find("td:eq("+5+")").text())
                            $('#e_domain_date_edit').val($(tr).find("td:eq("+6+")").text())
                            $("#select_input_edit option:eq(1)").text($(tr).find("td:eq("+2+")").text()).prop('selected', true)

                            // $('.hosting').attr('style', 'display: none !important');
                            // $('.project').attr('style', 'display: none !important');
                            $('#client_name_select_edit').removeAttr("disabled");
                            // var rowCount = $('#datatable-domain tbody tr').length;
                            // console.log("yes",rowCount);

                            $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: "client_info_ajax/"+c_type_id,
                            success:function(respose){
                                console.log(respose);
                                var data = '<option value="">Select Client Name</option>';
                                $.each(respose,function(key,value){
                                    data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';
                                    console.log(data)
                                });
                                data_val = '<option value="">Select Client Type</option>';
                                c_type_1 = $(tr).find("td:eq("+2+")").text()
                                data_val = data_val+'<option value="'+c_type_id+'">'+c_type_1+'</option>';
                                $('#client_name_select_edit').html(data);
                                $('#select_input_edit').html(data_val);

                                i = i+1
                                $("#client_name_select_edit option:eq("+i+")").text($(tr).find("td:eq("+3+")").text()).prop('selected', true)
                                $("#select_input_edit option:eq(1)").prop('selected', true)

                            }
                        });
                    }

                    else if (c_type == 'hosting'){
                        $('html, body').animate({ scrollTop: 0 }, 1000);
                        if($('.edit_hosting').css("display")=="none"){
                            $('.edit_hosting').attr('style', 'display: flex !important');
                            $('.edit_domain').attr('style', 'display: none !important');
                            $('.edit_DomainAndhosting').attr('style', 'display: none !important');
                            $('.edit_project').attr('style', 'display: none !important');
                            // $('.project').attr('style', 'display: none !important');

                        }
                        $('#client_name_select_edit').removeAttr("disabled");
                        c_type_id = $('#hosting_unique_id').val()
                        $('#hosting_name_edit').val($(tr).find("td:eq("+4+")").text())
                        $('#domain_id_edit').val($(tr).find("td:eq("+0+")").text())
                        console.log("sss",$(tr).find("td:eq("+0+")").text())
                        $('#s_hosting_date_edit').val($(tr).find("td:eq("+5+")").text())
                        $("#select_input_edit option:eq(2)").text($(tr).find("td:eq("+2+")").text()).prop('selected', true)
                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: "client_info_ajax/"+c_type_id,
                            success:function(respose){
                                console.log(respose);
                                var data = '<option value="">Select Client Name</option>';
                                $.each(respose,function(key,value){
                                    data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';

                                });

                                $('#client_name_select_edit').html(data);

                                data_val = '<option value="">Select Client Type</option>';
                                c_type_1 = $(tr).find("td:eq("+2+")").text()
                                data_val = data_val+'<option value="'+c_type_id+'">'+c_type_1+'</option>';
                                i = i+1
                                $('#select_input_edit').html(data_val);
                                console.log(i)
                                console.log($(tr).find("td:eq("+3+")").text());
                                $("#select_input_edit option:eq(1)").prop('selected', true)
                                $("#client_name_select_edit option:eq("+i+")").text($(tr).find("td:eq("+3+")").text()).prop('selected', true)
                            }
                        });

                    }
                    // domain and hosting
                    else if (c_type == 'domain and hosting'){
                        $('html, body').animate({ scrollTop: 0 }, 1000);
                        if($('.edit_DomainAndhosting').css("display")=="none"){
                            $('.edit_DomainAndhosting').attr('style', 'display: flex !important');
                            $('.edit_hosting').attr('style', 'display: none !important');
                            $('.edit_domain').attr('style', 'display: none !important');
                            $('.edit_project').attr('style', 'display: none !important');
                            // $('.project').attr('style', 'display: none !important');

                        }
                        $('#client_name_select_edit').removeAttr("disabled");
                        c_type_id = $('#edit_DomainAndhosting_id').val()
                        $('#edit_dh3').val($(tr).find("td:eq("+3+")").text());
                        // console.log($(tr).find("td:eq("+3+")").text());
                        $('#edit_dh4').html($(tr).find("td:eq("+4+")").text());
                        // console.log($(tr).find("td:eq("+4+")").text());
                        $('#edit_dh5').val($(tr).find("td:eq("+5+")").text());
                        // console.log($(tr).find("td:eq("+5+")").text())
                        $('#edit_dh6').val($(tr).find("td:eq("+6+")").text());
                        // console.log($(tr).find("td:eq("+6+")").text())
                        $('#edit_dh7').val($(tr).find("td:eq("+7+")").text());
                        // console.log($(tr).find("td:eq("+7+")").text())
                        $('#edit_dh8').val($(tr).find("td:eq("+8+")").text());
                        console.log($(tr).find("td:eq("+8+")").text());
                        $('#edit_dh9').val($(tr).find("td:eq("+9+")").text());
                        // console.log($(tr).find("td:eq("+9+")").text())
                        $('#domain_id_edit').val($(tr).find("td:eq("+0+")").text())
                        // alert($(this).closest('tr').find('td:eq(0)').text());
                        // console.log("sss",$(tr).find("td:eq("+0+")").text())
                        $('#s_hosting_date_edit').val($(tr).find("td:eq("+5+")").text())
                        $("#select_input_edit option:eq(2)").text($(tr).find("td:eq("+2+")").text()).prop('selected', true)
                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: "client_info_ajax/"+c_type_id,
                            success:function(respose){
                                console.log(respose);
                                var data = '<option value="">Select Client Name</option>';
                                $.each(respose,function(key,value){
                                    data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';

                                });

                                $('#client_name_select_edit').html(data);

                                data_val = '<option value="">Select Client Type</option>';
                                c_type_1 = $(tr).find("td:eq("+2+")").text()
                                data_val = data_val+'<option value="'+c_type_id+'">'+c_type_1+'</option>';
                                i = i+1
                                $('#select_input_edit').html(data_val);
                                console.log(i)
                                console.log($(tr).find("td:eq("+3+")").text());
                                $("#select_input_edit option:eq(1)").prop('selected', true)
                                $("#client_name_select_edit option:eq("+i+")").text($(tr).find("td:eq("+3+")").text()).prop('selected', true)
                            }
                        });

                    }
                    else{
                        $('html, body').animate({ scrollTop: 0 }, 1000);
                        $('.edit_hosting').attr('style', 'display: none !important');
                        $('.edit_domain').attr('style', 'display: none !important');
                        $('.edit_project').attr('style', 'display: flex !important');
                        $('#client_name_select_edit').removeAttr("disabled");

                        c_type_id = $('#project_unique_id').val()
                        $('#project_name_edit').val($(tr).find("td:eq("+4+")").text())
                        $('#domain_id_edit').val($(tr).find("td:eq("+0+")").text())
                        console.log("sss",$(tr).find("td:eq("+0+")").text())
                        $('#project_details_edit').val($(tr).find("td:eq("+5+")").text())
                        $('#s_project_date_edit').val($(tr).find("td:eq("+6+")").text())
                        $('#project_quote_edit').val($(tr).find("td:eq("+7+")").text())
                        $("#select_input_edit option:eq(3)").text($(tr).find("td:eq("+2+")").text()).prop('selected', true)

                        $.ajax({
                            type: "GET",
                            dataType: 'json',
                            url: "client_info_ajax/"+c_type_id,
                            success:function(respose){
                                console.log(respose);
                                var data = '<option value="">Select Client Name</option>';
                                $.each(respose,function(key,value){
                                    data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';

                                });

                                $('#client_name_select_edit').html(data);
                                data_val = '<option value="">Select Client Type</option>';
                                c_type_1 = $(tr).find("td:eq("+2+")").text()
                                data_val = data_val+'<option value="'+c_type_id+'">'+c_type_1+'</option>';
                                i = i+1
                                $('#select_input_edit').html(data_val);
                                console.log(i)
                                console.log($(tr).find("td:eq("+3+")").text());
                                $("#select_input_edit option:eq(1)").prop('selected', true)
                                $("#client_name_select_edit option:eq("+i+")").text($(tr).find("td:eq("+3+")").text()).prop('selected', true)
                            }
                        });
                    }
                });

            });




            $('#back').on('click',function(){

                $('#edit_form').hide();
                $('#insert_form').show();
            });


        $(document).ready(function(){
            $('.DomainAndhosting').attr('style','display:none !important');
        });

            $('#c_type').change(function(){
                // console.log();

                var value = $(this).find("option:selected").text().toLowerCase();
                // alert(value);
                // consol.log(value);
                if(value == 'domain'){ // or this.value == 'volvo'
                    // console.log($('.domain').css("display"));
                    if($('.domain').css("display")=="none"){
                        $('.domain').attr('style', 'display: flex !important');
                        $('.hosting').attr('style', 'display: none !important');
                        $('.DomainAndhosting').attr('style', 'display: none !important');
                        $('.project').attr('style', 'display: none !important');
                        $('#client_name_select').removeAttr("disabled");
                    }

                }
                else if (value == 'hosting'){
                    if($('.hosting').css("display")=="none"){
                        $('.hosting').attr('style', 'display: flex !important');
                        $('.domain').attr('style', 'display: none !important');
                        $('.DomainAndhosting').attr('style', 'display: none !important');
                        $('.project').attr('style', 'display: none !important');
                        $('#client_name_select').removeAttr("disabled");
                        // consol.log(value);
                    }
                }
                else if (value == 'domain and hosting'){
                    if($('.DomainAndhosting').css("display")=="none"){
                        $('.DomainAndhosting').attr('style', 'display: flex !important');
                        $('.domain').attr('style', 'display: none !important');
                        $('.hosting').attr('style', 'display: none !important');
                        $('.project').attr('style', 'display: none !important');
                        $('#client_name_select').removeAttr("disabled");
                    }
                }
                else if (value == 'project'){
                    if($('.DomainAndhosting').css("display")=="none"){
                        $('.DomainAndhosting').attr('style', 'display: none !important');
                        $('.domain').attr('style', 'display: none !important');
                        $('.hosting').attr('style', 'display: none !important');
                        $('.project').attr('style', 'display: flex !important');
                        $('#client_name_select').removeAttr("disabled");
                    }
                }
                else if ($(this).find("option:selected").val() == 'first'){
                    $('.hosting').attr('style', 'display: none !important');
                    $('.domain').attr('style', 'display: none !important');
                    $('.DomainAndhosting').attr('style', 'display: none !important');
                    $('.project').attr('style', 'display: none !important');
                    $( "#client_name_select" ).prop( "disabled", true );
                }
                else{
                    $('.hosting').attr('style', 'display: none !important');
                    $('.domain').attr('style', 'display: none !important');
                    $('.DomainAndhosting').attr('style', 'display: none !important');
                    $('.project').attr('style', 'display: none !important');
                    $( "#client_name_select" ).prop( "disabled", false );

                }

                var client_type_id = $(this).val();
                if(client_type_id!="first"){
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
                    $.ajax({
                        type: "GET",
                        dataType: 'json',
                        url: "client_info_ajax/"+client_type_id,
                        success:function(respose){
                            console.log(respose);
                            var data = '<option value="">Select Client Name</option>';
                            $.each(respose,function(key,value){
                                data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';

                            });
                            $('#client_name_select').html(data);
                        }
                    });
                }
            });

            $('#select_input_edit').change(function(){
                // console.log();

                var value = $(this).find("option:selected").text().toLowerCase();
                if(value == 'domain'){ // or this.value == 'volvo'
                    // console.log($('.domain').css("display"));
                    if($('.domain').css("display")=="none"){
                        $('.domain').attr('style', 'display: flex !important');
                        $('.hosting').attr('style', 'display: none !important');
                        $('.project').attr('style', 'display: none !important');
                        $('#client_name_select').removeAttr("disabled");
                    }

                }
                else if (value == 'hosting'){
                    if($('.hosting').css("display")=="none"){
                        $('.hosting').attr('style', 'display: flex !important');
                        $('.domain').attr('style', 'display: none !important');
                        $('.project').attr('style', 'display: none !important');
                        $('#client_name_select').removeAttr("disabled");
                    }
                }
                else if ($(this).find("option:selected").val() == 'first'){
                    $('.hosting').attr('style', 'display: none !important');
                    $('.domain').attr('style', 'display: none !important');
                    $('.project').attr('style', 'display: none !important');
                    $( "#client_name_select" ).prop( "disabled", true );
                }
                else{
                    $('.hosting').attr('style', 'display: none !important');
                    $('.domain').attr('style', 'display: none !important');
                    $('.project').attr('style', 'display: show !important');
                    $( "#client_name_select" ).prop( "disabled", false );

                }

                var client_type_id = $(this).val();
                if(client_type_id!="first"){
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
                    $.ajax({
                        type: "GET",
                        dataType: 'json',
                        url: "client_info_ajax/"+client_type_id,
                        success:function(respose){
                            console.log(respose);
                            var data = '<option value="">Select Client Name</option>';
                            $.each(respose,function(key,value){
                                data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';

                            });
                            $('#client_name_select_edit').html(data);
                        }
                    });
                }
            });

            // $("#insert_project").click(function(){
            //     var c_type_id = $("#c_type option:selected").val();
            //     var client_info_id = $("#client_name_select option:selected").val();
            //     var c_type_name = $("#c_type option:selected").text().toLowerCase()
            //     var domain_name = $("#domain_name").val();
            //     var s_domain_date = $("#s_domain_date").val();
            //     var e_domain_date = $("#e_domain_date").val();
            //     var url1 = '{{ url('admin/insert_project_info') }}';
            //     if(c_type_name=="domain"){
            //         console.log(e_domain_date);
            //         $.ajaxSetup({
            //             headers: {
            //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                 }
            //         });
            //         $.ajax({
            //             url: "insert_project_info",
            //             type: "POST",
            //             // dataType: 'json',
            //             data:{
            //                 c_type_id:c_type_id,
            //                 client_info_id:client_info_id,
            //                 c_type_name:c_type_name,
            //                 domain_name:domain_name,
            //                 s_domain_date:s_domain_date,
            //                 e_domain_date:e_domain_date
            //             },


            //             success:function(respose){
            //                 console.log("yes");
            //                 // var data = '<option value="">Select Client Name</option>';
            //                 // $.each(respose,function(key,value){
            //                 //     data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';

            //                 // });
            //                 // $('#client_name_select').html(data);
            //             }
            //         });

            //     }
            //     console.log(c_type_id,client_info_id);

            // });\


            $('.custom_tab').each(function(index){
                $(this).click(function(){

                   var project_name = $(this).text().toLowerCase();

                   if(project_name=='domain'){
                    $(".domain_table_show").attr('style','display: show !important');
                    $(".hosting_table_show").attr('style','display: none !important');
                    $(".dh_table_show").attr('style','display: none !important');
                    $(".project_table_show").attr('style','display: none !important');
                   }
                   if(project_name=='hosting'){
                    // console.log('this is hosting');
                    $(".domain_table_show").attr('style','display: none !important');
                    $(".hosting_table_show").attr('style','display: show !important');
                    $(".dh_table_show").attr('style','display: none !important');
                    $(".project_table_show").attr('style','display: none !important');
                   }
                   if(project_name=='domain and hosting'){
                    $(".domain_table_show").attr('style','display: none !important');
                    $(".hosting_table_show").attr('style','display: none !important');
                    $(".dh_table_show").attr('style','display: show !important');
                    $(".project_table_show").attr('style','display: none !important');
                   }
                   if(project_name=='project'){
                    // console.log('this is projecte');
                    $(".domain_table_show").attr('style','display: none !important');
                    $(".hosting_table_show").attr('style','display: none !important');
                    $(".dh_table_show").attr('style','display: none !important');
                    $(".project_table_show").attr('style','display: show !important');
                   }
                });
            });



        $(".start_date").each(function(index){
            $(this).change(function(){
               var start_date = $(this).val();
                console.log(start_date);
              var number_of_year =  $(".number_of_year:eq("+index+")").val();
              number_of_year = parseInt(number_of_year);
              console.log(number_of_year);

            var arr = start_date.split('-');
            var start_year = arr[0];
            year = parseInt(start_year);
            var regex = /^\d+$/;
            if(regex.test(number_of_year)){
                var end_year = year+number_of_year;
                var end_date = arr[1]+"-"+arr[2]+"-"+end_year;
                $(".end_date:eq("+index+")").val(end_date);
            }else{
                alert('Please,Select the "Number of Year" and reselect "Start date"');
            }

            });
        });


        </script>

        @endsection



