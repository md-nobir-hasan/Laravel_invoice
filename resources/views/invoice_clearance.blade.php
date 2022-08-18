@extends('layouts.master')
@section('title')
<title>Invoice Clearance</title>
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
                        <h4 class="page-title">Invoice Clearance</h4>
                    </div>

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice Clearance</li>
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
                    @elseif(session()->get('message')=='noData')
                        <div class="alert alert-success">
                            <p>No data available for this client</p>

                        </div>
                    @endif

                @endif
                @if (isset($noData))
                <div class="alert alert-warning">
                    <p style="font-size: 18px;color: blue">No data available for this client</p>
                </div>

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
                            <form action='{{route("clearance.filter")}}' method="POST" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;">Client Type</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <select id="c_type" name='c_type_id' class="form-select shadow-none form-control-line" >
                                        <option value="first">Select Client Type</option>
                                        @foreach($query_c_type as $data)
                                        <option value="{{$data->id}}">{{$data->client_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>


                            <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Client Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select disabled id="client_name" name='c_name' class="form-select shadow-none form-control-line" required>

                                        </select>

                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button href='insert_ps' class="btn btn-success text-white">Search </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




{{-- =======================================================================================================
    ==============================       Show show table        ===========================================
    ==================================================================================================== --}}

            @if(isset($invoice_join_query_filter))
            {{-- @dd($invoice_join_query_filter) --}}
                <div class="row">
                    <!-- column -->
                    <div class="col-12   m-auto">
                        <div class="card">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 text-center">S.L.</th>
                                            <th class="border-top-0 text-center">Client Type</th>
                                            <th class="border-top-0 text-center">Client Name</th>
                                            <th class="border-top-0 text-center">Project Name</th>
                                            <th class="border-top-0 text-center">Invoice Details</th>
                                            <th class="border-top-0 text-center">Total Time</th>
                                            <th class="border-top-0 text-center">Rate Per hour</th>
                                            <th class="border-top-0 text-center">Total Rate</th>
                                            <th class="border-top-0 text-center">Invoice Date</th>
                                            <th class="border-top-0 text-center">Invoice Alert Date</th>
                                            <th class="border-top-0 text-center">Invoice Status</th>
                                            <th class="border-top-0 text-center">Attachment</th>
                                            <th class="border-top-0 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_body">
                                        {{-- @dd() --}}
                                        {{-- @for($i=0;$i<$num;$i++) --}}
                                        @foreach ($invoice_join_query_filter as $data)


                                        <tr>

                                            <td style='text-align: center'>{{$loop->index+1}}
                                            </td>
                                            {{-- @for($j=0;$j<$num2;$j++) --}}
                                        <!--  -->

                                            <td style='text-align: center'>{{$data->client_type_name}}
                                            <td style='text-align: center'>{{$data->c_name}}
                                            <td style='text-align: center'>

                                                @if(isset($data->domain_name))
                                                    {{$data->domain_name}}
                                                @endif

                                                @if (isset($data->hosting_name))
                                                    {{$data->hosting_name}}
                                                @endif

                                                @if (isset($data->dh_hosting_name))
                                                    {{$data->dh_hosting_name}}
                                                @endif
                                                @if (isset($data->project_name))
                                                    {{$data->project_name}}
                                                @endif
                                            </td>
                                            <td style='text-align: center'>{{$data->invoice_details}}</td>
                                            <td style='text-align: center'>{{$data->time_quote_hour.'.'.$data->time_quote_min}} hours</td>
                                            <td style='text-align: center'>{{$data->rate_per_hour}}</td>
                                            <td style='text-align: center'>{{$data->total_rate}}</td>
                                            <td style='text-align: center'>{{date('d/m/Y',strtotime($data->invoiceDate))}}</td>
                                            <td style='text-align: center'>{{date('d/m/Y',strtotime($data->invoiceAlertDate)) }}</td>
                                            <td style='text-align: center'>{{$data->invoice_status}} </td>
                                            <td style='text-align: center'><a target="_nobir" href="../storage/images/{{$data->attachment}} ">{{$data->attachment}} </a></td>
                                            <td style='text-align: center'>
                                                @if ($data->invoice_status!='paid')
                                                <form  method="POST" action='{{route("invoice.statusChange")}}'>
                                                    @csrf
                                                    <input type="number" name="id" value="{{$data->id}}" hidden>
                                                    <button class="btn btn-green" onclick="return confirm('Do you want to paid??')" type="submit">Paid</button>
                                                </form>
                                                @else
                                                <form  method="POST" action='{{route("invoice.statusChange")}}'>
                                                    @csrf
                                                    <input type="number" name="id" value="{{$data->id}}" hidden>
                                                    <button class="btn btn-green" onclick="return confirm('Confirm??Do you want to unpaid??')"  type="submit" >Unpaid</button>
                                                </form>
                                            </td>

                                            @endif

                                        </tr>
                                        @endforeach

                                        @endif

                                    </tbody>
                                </table>
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



$('#c_type').change(function(){
    $('#client_name').removeAttr("disabled");
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
                            $('#client_name').html(data);
                        }
                    });
                }
});




        </script>

        @endsection



