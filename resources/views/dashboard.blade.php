

@extends('layouts.master')

@section('title')
  <title>Dashboard</title>
@endsection


@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
                </div>

            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- ------------------------- toggle-sectiion---------------------------- --}}

    <div class="container-fluid" style="background: #f2f4f5">
        {{-- tab or toggle button  --}}
        <div class="toggle-section">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="custom_tab nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Invoices</button>
              <button class="custom_tab nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Pending List</button>
              <button class="custom_tab nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Paid List</button>
              {{-- @dd($client_type) --}}
              @foreach ($client_type as $data)
                <button class="custom_tab nav-link" data-bs-toggle="tab" type="button">{{$data->client_type_name}}</button>
              @endforeach
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            {{-- All Invoice List  --}}
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"   aria-labelledby="nav-home-tab">
                <div class="table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                    {{-- all invoices  --}}
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
                                    {{-- <th class="border-top-0 text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($temp_array2[1][11]) --}}
                                @for($i=0;$i<$num;$i++)
                                    <tr>
                                        <td style='text-align: center'>{{$i+1}}
                                        </td>
                                        @for($j=0;$j<$col_num;$j++)
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
                                        @endfor
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        

            {{-- Pending List  --}}
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="table-section bg-white p-5 rounded rounded-3 shadow bg-body">
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
                        {{-- @dd($pending_list) --}}
                        <tbody>
                            @for($i=1;$i<$pending_list_row_count;$i++)
                                <tr>

                                    <td style='text-align: center'>{{$i+1}}
                                    </td>
                                    @for($j=0;$j<$col_num+1;$j++)

                                        @if ($j==0)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }} </td>
                                        @elseif ($j==1)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }}</td>
                                        @elseif ($j==2)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }}</td>
                                        @elseif ($j==3)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }}</td>
                                        @elseif ($j==4)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }}</td>
                                        @elseif ($j==5)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }}</td>
                                        @elseif ($j==6)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }}</td>
                                        @elseif ($j==7)
                                        <td style='text-align: center'>{{$pending_list[$i][$j] }}</td>
                                        @elseif ($j==8)
                                        <td style='text-align: center'>{{date('d/m/Y',strtotime($pending_list[$i][$j])) }}</td>
                                        @elseif ($j==9)
                                        <td style='text-align: center'>{{date('d/m/Y',strtotime($pending_list[$i][$j])) }}</td>
                                        @elseif ($j==10)
                                        <td style='text-align: center'>
                                            <a target="_nobir" href="../storage/images/{{$pending_list[$i][10] }} ">{{$pending_list[$i][10] }}</a>
                                        </td>
                                        @endif
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                </div>
            </div>

            {{-- Paid List  --}}
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="table-section bg-white p-5 rounded rounded-3 shadow bg-body">
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
                                <th class="border-top-0 text-center">Paid Date </th>
                                <th class="border-top-0 text-center">Attachment </th>
                            </tr>
                        </thead>
                        <tbody>
                        {{-- @dd($paid_list) -->
                            @dd($paid_list) --}}
                            @for($i=1;$i<$paid_list_row_count;$i++)
                                <tr>

                                    <td style='text-align: center'>{{$i+1}}
                                    </td>
                                    @for($j=0;$j<$col_num+2;$j++)
                                        @if ($j==0)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==1)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==2)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==3)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==4)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==5)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==6)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==7)
                                        <td style='text-align: center'>{{$paid_list[$i][$j] }}</td>
                                        @elseif ($j==8)
                                        <td style='text-align: center'>{{date('d/m/Y',strtotime($paid_list[$i][$j])) }}</td>
                                        @elseif ($j==9)
                                        <td style='text-align: center'>{{date('d/m/Y',strtotime($paid_list[$i][$j])) }}</td>
                                        @elseif ($j==10)
                                        <td style='text-align: center'>{{date('d/m/Y',strtotime( $paid_list[$i][$j]))}}</td>
                                        @elseif ($j==11)
                                        <td style='text-align: center'> <a target="_nobir" href="../storage/images/{{$paid_list[$i][$j] }} ">{{$paid_list[$i][$j] }} </a></td>

                                        @endif
                                    @endfor 
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>



        {{--============================================================================================================= --}}
        {{--================================================ Dynamic table show ========================================= --}}
        {{--============================================================================================================= --}}
        {{-- Domain invoice show  --}}
        <div class="active table-section domain_table_show" style="display: none">
            <div class="row">      
                <div class="col-12   m-auto">
                    <div class="card">
                        <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Domain Invoice List </h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-domain" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">S.L.</th>
                                        <th class="border-top-0 text-center">Client Type</th>
                                        <th class="border-top-0 text-center">Client Name</th>
                                        <th class="border-top-0 text-center">Invoice Details</th>
                                        <th class="border-top-0 text-center">Total Time</th>
                                        <th class="border-top-0 text-center">Rate Per hour</th>
                                        <th class="border-top-0 text-center">Total Rate</th>
                                        <th class="border-top-0 text-center">Invoice Status</th>
                                        <th class="border-top-0 text-center">Invoice Date</th>
                                        <th class="border-top-0 text-center">Invoice Alert Date </th>
                                        <th class="border-top-0 text-center">Paid Date </th>
                                        <th class="border-top-0 text-center">Attachment </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($domain_invoice_list as $data)
                                        <tr>
                                            <td style='text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='text-align: center'>{{$data->client_type->client_type_name}}</td>
                                            <td style='text-align: center'>{{$data->client_info->c_name}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_details}}</td>
                                            <td style=' text-align: center'>{{$data->time_quote_hour.":".$data->time_quote_min}}hrs</td>
                                            <td style=' text-align: center'>{{$data->rate_per_hour}}</td>
                                            <td style=' text-align: center'>{{$data->total_rate}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_status}}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceDate )) }}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceAlertDate)) }}</td>
                                            @if($data->invoice_status=="paid")
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->updated_at)) }}</td>
                                            @else
                                            <td style=' text-align: center'>Yet not paid</td>
                                            @endif
                                            <td style=' text-align: center'>
                                                <a target="_nobir" href="../storage/images/{{$data->attachment}}">{{$data->attachment}}</a>
                                                {{$data->rate_per_hour}}
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


        {{-- Hosting invoice show  --}}
        <div class="hosting_table_show active table-section" style="display: none">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="card">
                    <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Hosting Invoice List</h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-hosting" class="table table-responsive table-hover table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">S.L.</th>
                                        <th class="border-top-0 text-center">Client Type</th>
                                        <th class="border-top-0 text-center">Client Name</th>
                                        <th class="border-top-0 text-center">Invoice Details</th>
                                        <th class="border-top-0 text-center">Total Time</th>
                                        <th class="border-top-0 text-center">Rate Per hour</th>
                                        <th class="border-top-0 text-center">Total Rate</th>
                                        <th class="border-top-0 text-center">Invoice Status</th>
                                        <th class="border-top-0 text-center">Invoice Date</th>
                                        <th class="border-top-0 text-center">Invoice Alert Date </th>
                                        <th class="border-top-0 text-center">Paid Date </th>
                                        <th class="border-top-0 text-center">Attachment </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hosting_invoice_list as $data)
                                        <tr>
                                            <td style='text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='text-align: center'>{{$data->client_type->client_type_name}}</td>
                                            <td style='text-align: center'>{{$data->client_info->c_name}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_details}}</td>
                                            <td style=' text-align: center'>{{$data->time_quote_hour.":".$data->time_quote_min}}hrs</td>
                                            <td style=' text-align: center'>{{$data->rate_per_hour}}</td>
                                            <td style=' text-align: center'>{{$data->total_rate}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_status}}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceDate )) }}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceAlertDate)) }}</td>
                                            @if($data->invoice_status=="paid")
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->updated_at)) }}</td>
                                            @else
                                            <td style=' text-align: center'>Yet not paid</td>
                                            @endif
                                            <td style=' text-align: center'>
                                                <a target="_nobir" href="../storage/images/{{$data->attachment}}">{{$data->attachment}}</a>
                                                {{$data->rate_per_hour}}
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

        {{--Domain and Hosting invoice show  --}}
        <div class="dh_table_show active table-section" style="display: none">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="card">
                    <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Domain And Hosting Invoice List</h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-hosting" class="table table-responsive table-hover table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">S.L.</th>
                                        <th class="border-top-0 text-center">Client Type</th>
                                        <th class="border-top-0 text-center">Client Name</th>
                                        <th class="border-top-0 text-center">Invoice Details</th>
                                        <th class="border-top-0 text-center">Total Time</th>
                                        <th class="border-top-0 text-center">Rate Per hour</th>
                                        <th class="border-top-0 text-center">Total Rate</th>
                                        <th class="border-top-0 text-center">Invoice Status</th>
                                        <th class="border-top-0 text-center">Invoice Date</th>
                                        <th class="border-top-0 text-center">Invoice Alert Date </th>
                                        <th class="border-top-0 text-center">Paid Date </th>
                                        <th class="border-top-0 text-center">Attachment </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dh_invoice_list as $data)
                                        <tr>
                                            <td style='text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='text-align: center'>{{$data->client_type->client_type_name}}</td>
                                            <td style='text-align: center'>{{$data->client_info->c_name}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_details}}</td>
                                            <td style=' text-align: center'>{{$data->time_quote_hour.":".$data->time_quote_min}}hrs</td>
                                            <td style=' text-align: center'>{{$data->rate_per_hour}}</td>
                                            <td style=' text-align: center'>{{$data->total_rate}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_status}}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceDate )) }}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceAlertDate)) }}</td>
                                            @if($data->invoice_status=="paid")
                                                <td style='text-align: center'>{{date('d/m/Y',strtotime($data->updated_at)) }}</td>
                                            @else
                                                <td style='text-align: center'>Yet not paid</td>
                                            @endif 
                                            <td style=' text-align: center'>
                                                <a target="_nobir" href="../storage/images/{{$data->attachment}}">{{$data->attachment}}</a>
                                                
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

        {{-- Project invoice show  --}}
        <div class="project_table_show active table-section" style="display: none">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="card">
                    <h4 style="padding: 10px 0px  10px 15px; font-weight: bold;text-align: center">Project Invoice List</h4>
                        <div class="table-responsive table-section bg-white p-5 rounded rounded-3 shadow bg-body">
                            <table id="datatable-hosting" class="table table-responsive table-hover table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">S.L.</th>
                                        <th class="border-top-0 text-center">Client Type</th>
                                        <th class="border-top-0 text-center">Client Name</th>
                                        <th class="border-top-0 text-center">Invoice Details</th>
                                        <th class="border-top-0 text-center">Total Time</th>
                                        <th class="border-top-0 text-center">Rate Per hour</th>
                                        <th class="border-top-0 text-center">Total Rate</th>
                                        <th class="border-top-0 text-center">Invoice Status</th>
                                        <th class="border-top-0 text-center">Invoice Date</th>
                                        <th class="border-top-0 text-center">Invoice Alert Date </th>
                                        <th class="border-top-0 text-center">Paid Date </th>
                                        <th class="border-top-0 text-center">Attachment </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($project_invoice_list as $data)
                                        <tr>
                                            <td style='text-align: center'>{{$loop->index+1}}
                                            </td>
                                            <td style='text-align: center'>{{$data->client_type->client_type_name}}</td>
                                            <td style='text-align: center'>{{$data->client_info->c_name}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_details}}</td>
                                            <td style=' text-align: center'>{{$data->time_quote_hour.":".$data->time_quote_min}}hrs</td>
                                            <td style=' text-align: center'>{{$data->rate_per_hour}}</td>
                                            <td style=' text-align: center'>{{$data->total_rate}}</td>
                                            <td style=' text-align: center'>{{$data->invoice_status}}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceDate )) }}</td>
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->invoiceAlertDate)) }}</td>
                                            @if($data->invoice_status=="paid")
                                            <td style=' text-align: center'>{{date('d/m/Y',strtotime($data->updated_at)) }}</td>
                                            @else
                                            <td style=' text-align: center'>Yet not paid</td>
                                            @endif 
                                            <td style=' text-align: center'>
                                                <a target="_nobir" href="../storage/images/{{$data->attachment}}">{{$data->attachment}}</a>
                                                {{$data->rate_per_hour}}
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



@section("javaScript")

    <script>
        $('.custom_tab').each(function(index){
                $(this).click(function(){
                   var project_name = $(this).text().toLowerCase();
                   if(project_name=='domain')
                   {
                    $(".domain_table_show").attr('style','display: show !important');
                    $(".hosting_table_show").attr('style','display: none !important');
                    $(".dh_table_show").attr('style','display: none !important');
                    $(".project_table_show").attr('style','display: none !important');
                    $("#nav-home").attr('style','display: none !important');
                    $("#nav-profile").attr('style','display: none !important');
                    $("#nav-contact").attr('style','display: none !important');
                   }
                   if(project_name=='hosting')
                   {
                    // console.log('this is hosting');
                    $(".domain_table_show").attr('style','display: none !important');
                    $(".hosting_table_show").attr('style','display: show !important');
                    $(".dh_table_show").attr('style','display: none !important');
                    $(".project_table_show").attr('style','display: none !important');
                    $("#nav-home").attr('style','display: none !important');
                    $("#nav-profile").attr('style','display: none !important');
                    $("#nav-contact").attr('style','display: none !important');
                   }
                   if(project_name=='domain and hosting')
                   {
                    $(".domain_table_show").attr('style','display: none !important');
                    $(".hosting_table_show").attr('style','display: none !important');
                    $(".dh_table_show").attr('style','display: show !important');
                    $(".project_table_show").attr('style','display: none !important');
                    $("#nav-home").attr('style','display: none !important');
                    $("#nav-profile").attr('style','display: none !important');
                    $("#nav-contact").attr('style','display: none !important');
                   }
                   if(project_name=='project')
                   {
                    // console.log('this is projecte');
                    $(".domain_table_show").attr('style','display: none !important');
                    $(".hosting_table_show").attr('style','display: none !important');
                    $(".dh_table_show").attr('style','display: none !important');
                    $(".project_table_show").attr('style','display: show !important');
                    $("#nav-home").attr('style','display: none !important');
                    $("#nav-profile").attr('style','display: none !important');
                    $("#nav-contact").attr('style','display: none !important');
                   }
                   if(project_name !='project' && project_name !='domain and hosting' && project_name !='hosting' && project_name !='domain'){
                    $("#nav-home").attr('style','display: show !important');
                    $("#nav-profile").attr('style','display: show !important');
                    $("#nav-contact").attr('style','display: show !important');
                    $(".domain_table_show").attr('style','display: none !important');
                    $(".hosting_table_show").attr('style','display: none !important');
                    $(".dh_table_show").attr('style','display: none !important');
                    $(".project_table_show").attr('style','display: none !important');
                   }
                });
            });
    </script>

@endsection
