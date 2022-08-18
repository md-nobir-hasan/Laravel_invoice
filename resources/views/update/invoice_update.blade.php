@extends('layouts.master')
@section('title')
<title>Update Invoice</title>
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
                        <h4 class="page-title">Add Invoice Info</h4>
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
                    @endif
                @endif
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice Information</li>
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
                            <form action='{{url("/admin/update_invoice_info")}}' method="POST"  class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <input type="number" name="id" value="{{$invoice_join_query_filter[0]->id}}" hidden>

                              <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;">Client Type</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <select id="c_type" name='c_type_id' class="form-select shadow-none form-control-line" disabled>
                                        <option value="{{$invoice_join_query_filter[0]->client_type_name}}">{{$invoice_join_query_filter[0]->client_type_name}}"</option>
                                        
                                    </select>
                                </div>
                        </div>


                            <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Client Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select disabled id="client_name" name='c_name' class="form-select shadow-none form-control-line" required>
                                            <option value="{{$invoice_join_query_filter[0]->c_name}}">{{$invoice_join_query_filter[0]->c_name}}</option>
                                           
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Project Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="project_name" name='project_name' class="form-select shadow-none form-control-line" disabled>
                                            <option value="">
                                                @if(isset($invoice_join_query_filter[0]->domain_name))
                                                {{$invoice_join_query_filter[0]->domain_name}}
                                            @endif

                                            @if (isset($invoice_join_query_filter[0]->hosting_name))
                                                {{$invoice_join_query_filter[0]->hosting_name}}
                                            @endif

                                            @if (isset($invoice_join_query_filter[0]->dh_hosting_name))
                                                {{$invoice_join_query_filter[0]->dh_hosting_name}}
                                            @endif
                                            @if (isset($invoice_join_query_filter[0]->project_name))
                                                {{$invoice_join_query_filter[0]->project_name}}
                                            @endif
                                            </option>
                                            {{-- @foreach($query_c_info as $data)
                                            <option value="{{$data->id}}">{{$data->c_name}}</option>
                                            @endforeach --}}
                                        </select>
                                        {{-- @dd($invoice_join_query_filter) --}}
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Invoice Details</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <textarea name="invoice_details" class="form-control invoice_enable" id="invoice_details" rows="3" >{{$invoice_join_query_filter[0]->invoice_details}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Time Quote</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='time_quote_hour'  id="time_quote_hour" type="text" placeholder="Insert Time Quote (Hour)" class="form-control form-control-line invoice_enable" value="{{$invoice_join_query_filter[0]->time_quote_hour}}">
                                        <br>
                                        <input name='time_quote_minute'  id="time_quote_minute" type="text" placeholder="Insert Time Quote (Minute)" class="form-control form-control-line invoice_enable" value="{{$invoice_join_query_filter[0]->time_quote_min}}">

                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Rate Per Hour</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rate_per_hour' id="rate_per_hour" type="text" placeholder="Rate Per Hour" class="form-control form-control-line invoice_enable without_ampm" value="{{$invoice_join_query_filter[0]->rate_per_hour}}">
                                    </div>
                                </div>

                                <div class="form-group d-flex total_rate">
                                    <label class="col-sm-12" style="width: 25%;">Total Rate</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input  name='total_rate' id="total_rate" type="text"  class="form-control form-control-line invoice_enable without_ampm" value="{{$invoice_join_query_filter[0]->total_rate}}">
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Currency Type</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input invoice_enable" type="radio" name="currency_type" id="inlineRadio1" value="€"/>
                                        <label class="form-check-label" for="inlineRadio1">Euro (€)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input invoice_enable" type="radio" name="currency_type" id="inlineRadio2" value="$" />
                                        <label class="form-check-label" for="inlineRadio2">Dollar ($)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input invoice_enable" type="radio" name="currency_type" id="inlineRadio3" value="৳" />
                                        <label class="form-check-label" for="inlineRadio3">BDT (৳)</label>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Invoice Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='invoiceDate' type="date"   class="form-control form-control-line invoice_enable" value="{{$invoice_join_query_filter[0]->invoiceDate}}" required>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Invoice Alert Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='invoiceAlertDate' type="date"    class="form-control form-control-line invoice_enable" value="{{$invoice_join_query_filter[0]->invoiceAlertDate}}" required>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Attachement</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='attachement' type="file"   class="form-control form-control-line invoice_enable" required>
                                    </div>
                                </div>



                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button type="submit" href='insert_ps' class="btn btn-success text-white">Update</button>
                                    </div>
                                </div>
                            </form>
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


        @section('javaScript')
        <script>
           var timer = null;
                $("#rate_per_hour").keydown(function(){
                    clearTimeout(timer);
                    timer = setTimeout(doStuff, 1000)

                });
                function doStuff(){

                var quote_hour = parseInt($("#time_quote_hour").val());
                var quote_hour_min = quote_hour*60;
                var quote_min = parseInt($("#time_quote_minute").val());
                var t_time = quote_min + quote_hour_min;
                var rate_per_hour = parseInt($("#rate_per_hour").val());
                total_rate_v1 = (t_time*rate_per_hour)/(60);
                // console.log(quote_hour_min,rate_per_hour,total_rate_v1)
                $('.total_rate').attr('style', 'display: flex !important');
                $('#total_rate').val(total_rate_v1);
                var quote_hour_nobir = $("#rate_per_hour").val();
                var regex = /^\d+$/;
                // console.log(quote_hour_nobir);
                if(regex.test(quote_hour_nobir)){
                    console.log('true');
                    $('#total_rate').val(total_rate_v1);
                }else{
                    console.log('flase');
                    $('.total_rate').attr('style', 'display: none !important');
                }

                }



    </script>

        @endsection



