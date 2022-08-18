@extends('layouts.master')
@section('title')
<title>Invoice</title>
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
                        <h4 class="page-title">Invoice</h4>
                    </div>

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
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



                <div id="insert_form" class="col-12  w-75 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h2 class="card-title text-center" style="text-transform: uppercase;">Add Police Station</h2>-->
                            <form action='{{url("admin/insert_invoice_info")}}' method="POST" class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group d-flex">
                                <label class="col-sm-12" style="width: 25%;">Client Type</label>
                                <div class="col-sm-12" style="width: 75%;">
                                    <select name='c_type_id' id="c_type"  class="form-select shadow-none form-control-line"  value='' required>
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
                                        <select disabled id="client_name" name='c_name' class="form-select shadow-none form-control-line"  value='' required>
                                            <option value="first">Select Client</option>
                                            @php
                                                $i = 0

                                            @endphp

                                            @foreach($query_client as $data)
                                                <option value="{{$data->id}}">{{$data->c_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Project Name</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <select id="project_name" name='project_name' class="form-select shadow-none form-control-line" disabled>
                                            <option value="first">Select Project</option>
                                            @foreach($query_c_info as $data)
                                            <option value="{{$data->id}}">{{$data->c_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Invoice Details</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <textarea name="invoice_details" class="form-control invoice_enable" id="invoice_details" rows="3" placeholder="Please Write Invoice Details" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Time Quote</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='time_quote_hour'  id="time_quote_hour" type="text" placeholder="Insert Time Quote (Hour)" class="form-control form-control-line invoice_enable" disabled>
                                        <br>
                                        <input name='time_quote_minute'  id="time_quote_minute" type="text" placeholder="Insert Time Quote (Minute)" class="form-control form-control-line invoice_enable" disabled>

                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Rate Per Hour</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='rate_per_hour' id="rate_per_hour" type="text" placeholder="Rate Per Hour" class="form-control form-control-line invoice_enable without_ampm" disabled>
                                    </div>
                                </div>

                                <div class="form-group d-flex total_rate">
                                    <label class="col-sm-12" style="width: 25%;">Total Rate</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input  name='total_rate' id="total_rate" type="text"  class="form-control form-control-line invoice_enable without_ampm" disabled>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Currency Type</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input invoice_enable" type="radio" name="currency_type" id="inlineRadio1" value="€" disabled />
                                        <label class="form-check-label" for="inlineRadio1">Euro (€)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input invoice_enable" type="radio" name="currency_type" id="inlineRadio2" value="$" disabled />
                                        <label class="form-check-label" for="inlineRadio2">Dollar ($)</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input invoice_enable" type="radio" name="currency_type" id="inlineRadio3" value="৳" disabled />
                                        <label class="form-check-label" for="inlineRadio3">BDT (৳)</label>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Invoice Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='invoiceDate' type="date" disabled   class="form-control form-control-line invoice_enable" required>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Invoice Alert Date</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='invoiceAlertDate' type="date" disabled   class="form-control form-control-line invoice_enable" required>
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <label class="col-sm-12" style="width: 25%;">Attachement</label>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <input name='attachement' type="file" disabled   class="form-control form-control-line invoice_enable" required>
                                    </div>
                                </div>



                                <div class="form-group d-flex">
                                    <div class="col-sm-12" style="width: 25%;"></div>
                                    <div class="col-sm-12" style="width: 75%;">
                                        <button href='insert_ps' class="btn btn-success text-white">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>










{{-- =======================================================================================================
    ==============================       Show show table        ===========================================
    ==================================================================================================== --}}
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
                                            <th class="border-top-0 text-center">Invoice status</th>
                                            <th class="border-top-0 text-center">Invoice  Date</th>
                                            <th class="border-top-0 text-center">Invoice Alert Date</th>
                                            <th class="border-top-0 text-center">Attachment</th>
                                            <th class="border-top-0 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- @dd($temp_array2[1][11]) --}}
                                    @for($i=0;$i<$num;$i++)
                                        <tr>

                                            <td style='text-align: center'>{{$i+1}}
                                            </td>

                                            @for($j=0;$j<$num2;$j++)
                                            @if ($j==-1)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==0)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==1)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==2)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==3)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==4)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==5)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==6)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==7)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j]}}
                                            </td>
                                            @elseif ($j==8)
                                            <td style='text-align: center'>

                                                {{date('d/t/Y',strtotime($temp_array2[$i][$j])) }}
                                            </td>
                                            @elseif ($j==9)
                                            <td style='text-align: center'>

                                                {{date('d/m/Y',strtotime($temp_array2[$i][$j])) }}
                                            </td>
                                            <td style='text-align: center'>
                                                <a target="_nobir" href="../storage/images/{{$temp_array2[$i][11]}}">{{$temp_array2[$i][11]}}</a>
                                            </td>

                                            @endif
                                            {{-- <td style='text-align: center'>{{$temp_array2[$i][$j]}} --}}
                                            </td>

                                            @endfor

                                            @php
                                                $id = $temp_array2[$i][10]
                                            @endphp
                                            <td class='td_css' style='text-align: center'>
                                            <a href="{{url("/admin/update_page_invoice_info/$id")}}" id="edit_btn" class="edit_btn" pid="{{$id}}" name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                            <form class="spacing" method="POST" action='{{url("admin/delete/invoiceModel/$id")}}'>
                                                @csrf
                                                @method('delete')
                                                <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
                                             </form>
                                            </td>

                                        </tr>
                                        @endfor

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

            $('#edit_c_type').change(function(){
                $('#edit_client_name').removeAttr("disabled");
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

                $('.edit_btn').each(function()
                {

                    $(this).on('click',function()
                    {
                        var id = $(this).attr('pid');
                        var tr = $(this).closest("tr");
                        var length = $(tr).find("td").length;


                        // console.log($(tr).find("td").length)
                        // console.log($(tr).find("td:eq(0)").text());
                        // $("#c_type_name").val(tdProx);
                        $('#insert_form').hide();
                        $('#edit_form').show();
                        // $("#input""").val($(tr).find("td:eq("+i+")").text());

                        for(let i=0;i<length-1;i++)
                        {
                                // console.log($(tr).find("td:eq("+i+ ")").text())
                             $("#input"+i+"").val($(tr).find("td:eq("+i+")").text());
                        }

                        $('#id').val(id);
                       });

                });

            $('#back').on('click',function(){

                $('#edit_form').hide();
                $('#insert_form').show();
            });



            $('#client_name').change(function(){
                var client_name_id = $(this).val();
                if(client_name_id=="first"){
                    $("#project_name").prop( "disabled", true );
                    $(".invoice_enable").prop( "disabled", true );
                }
                else{
                    $("#project_name").prop( "disabled", false );
                }

                if(client_name_id!="first"){
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
                    $.ajax({
                        type: "GET",
                        dataType: 'json',
                        url: "project_info_ajax/"+client_name_id,
                        success:function(respose){
                            // console.log(respose);
                            var data = '<option value="first">Select Project</option>';
                            $.each(respose,function(key,value){
                                if(value.hosting_name){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Hosting: '+value.hosting_name+'</option>';
                                }
                                else if(value.domain_name){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Domain Name: '+value.domain_name+'</option>';
                                }
                                else if(value.project_name){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Project Name: '+value.project_name+'</option>';

                                }
                                else if(value.dh_hosting_name ){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Domain and Hosting: '+value.dh_hosting_name +'</option>';

                                }


                            });
                            $('#project_name').html(data);
                        }
                    });
                }

            });

            $('#project_name').change(function(){
                var project_name_id = $(this).val();
                console.log(project_name_id);
                if(project_name_id=="first"){
                    // $("#client_name").prop( "disabled", true );
                    $(".invoice_enable").prop( "disabled", true );
                }
                else{
                    $(".invoice_enable").prop( "disabled", false );
                }
            });


            $('#edit_client_name').change(function(){
                var client_name_id = $(this).val();
                if(client_name_id=="first"){
                    $("#edit_project_name").prop( "disabled", true );
                    $(".invoice_enable").prop( "disabled", true );
                }
                else{
                    $("#edit_project_name").prop( "disabled", false );
                }

                if(client_name_id!="first"){
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
                    $.ajax({
                        type: "GET",
                        dataType: 'json',
                        url: "project_info_ajax/"+client_name_id,
                        success:function(respose){
                            // console.log(respose);
                            // alert(respose);
                            var data = '<option value="first">Select Project</option>';


                            $.each(respose,function(key,value){
                                if(value.hosting_name){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Hosting: '+value.hosting_name+'</option>';
                                }
                                else if(value.domain_name){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Domain Name: '+value.domain_name+'</option>';
                                }
                                else if(value.project_name){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Project Name: '+value.project_name+'</option>';

                                }
                                else if(value.dh_hosting_name){
                                    data = data + '<option value="'+value.id+'/'+value.c_type_id+'">Domain and Hosting: '+value.dh_hosting_name+'</option>';

                                }



                            });
                            $('#edit_project_name').html(data);
                        }
                    });
                }

            });

            $('#edit_project_name').change(function(){
                var project_name_id = $(this).val();
                console.log(project_name_id);
                if(project_name_id=="first"){
                    // $("#client_name").prop( "disabled", true );
                    $(".invoice_enable").prop( "disabled", true );
                }
                else{
                    $(".invoice_enable").prop( "disabled", false );
                }
            });


        </script>

        @endsection



