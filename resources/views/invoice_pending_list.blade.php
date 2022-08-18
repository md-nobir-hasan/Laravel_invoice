@extends('layouts.master')

@section('title')
<title>Invoice Pending List</title>
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
                        <h4 class="page-title">Pending List</h4>
                    </div>

                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Pending List </li>
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
                                            <th class="border-top-0 text-center">Invoice Status</th>
                                            <th class="border-top-0 text-center">Invoice Date</th>
                                            <th class="border-top-0 text-center">Invoice Alert Date </th>
                                            <th class="border-top-0 text-center">Attachment</th>
                                        </tr>
                                    </thead>
                                    {{-- @dd($temp_array2[0][10]) --}}
                                    <tbody>
                                        @for($i=0;$i<$num;$i++)
                                        <tr>

                                            <td style='text-align: center'>{{$i+1}}
                                            </td>
                                            @for($j=0;$j<$num2+1;$j++)

                                            @if ($j==0)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }} </td>
                                            @elseif ($j==1)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }}</td>
                                            @elseif ($j==2)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }}</td>
                                            @elseif ($j==3)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }}</td>
                                            @elseif ($j==4)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }}</td>
                                            @elseif ($j==5)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }}</td>
                                            @elseif ($j==6)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }}</td>
                                            @elseif ($j==7)
                                            <td style='text-align: center'>{{$temp_array2[$i][$j] }}</td>
                                            @elseif ($j==8)
                                            <td style='text-align: center'>{{date('d/m/Y',strtotime($temp_array2[$i][$j])) }}</td>
                                            @elseif ($j==9)
                                            <td style='text-align: center'>{{date('d/m/Y',strtotime($temp_array2[$i][$j])) }}</td>
                                            @elseif ($j==10)
                                            <td style='text-align: center'>
                                                <a target="_nobir" href="../storage/images/{{$temp_array2[$i][10] }} ">{{$temp_array2[$i][10] }}</a>
                                            </td>

                                            @endif

                                            {{-- <td style='text-align: center'>{{$temp_array2[$i][$j]}} --}}
                                            @endfor
                                            {{-- <td class='td_css' style='text-align: center'>
                                            <a id="edit_btn" class="edit_btn" pid="{{$data->id}}" name="btn_edit" class="btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>
                                            <form class="spacing" method="POST" action='{{url("admin/delete/clientInfoModel/$data->id")}}'>
                                                @csrf
                                                @method('delete')
                                                <button id='custom-btn' class="btn btn-danger" onclick="return confirm('Are you sure??')"> <i class="bi bi-trash"></i></button>
                                             </form>
                                            </td> --}}

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


$('#client_name').change(function(){
    // $('#client_name').removeAttr("disabled");
    var c_id = $(this).val();
                if(c_id!="first"){
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
                    // $.ajax({
                    //     type: "GET",
                    //     dataType: 'json',
                    //     url: "client_info_ajax/"+c_id,
                    //     success:function(respose){
                    //         console.log(respose);
                    //         var data = '<option value="">Select Client Name</option>';
                    //         $.each(respose,function(key,value){
                    //             data = data + '<option value="'+value.id+'">'+value.c_name+'</option>';

                    //         });
                    //         $('#client_name').html(data);
                    //     }
                    // });
                }
    });


        </script>

        @endsection



