
  @extends('layouts.master')

  @section('title')
  <title>Domain Registrar</title>
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
                  <h4 class="page-title">Domain Registrar</h4>
              </div>

              <div class="col-7 align-self-center">
                  <div class="d-flex align-items-center justify-content-end">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item">
                                  <a href="#">Home</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">Domain Registrar</li>
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
                      <form action='{{route('admin.insertDomainRegistar')}}' method="POST" id="main_form" class="form-horizontal form-material mx-2">
                        @csrf

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;"> Domain Registrar Name</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input name='domain_registars_name' type="text" placeholder="Insert Domain Registrar Name" class="form-control form-control-line">
                            </div>
                        </div>

                          <div class="form-group d-flex">
                              <div class="col-sm-12" style="width: 25%;"></div>
                              <div class="col-sm-12" style="width: 75%;">
                                  <button class="btn btn-success text-white">Save</button>
                              </div>
                          </div>

                      </form>

           {{-- Edit form  --}}
                      <form action='{{route('admin.updateDomainRegistar')}}' id="edit_form" method="POST" class="form-horizontal form-material mx-2" style="display: none">
                        @csrf

                        <div class="form-group d-flex">
                            <label class="col-sm-12" style="width: 25%;"> Hosting Provider Name</label>
                            <div class="col-sm-12" style="width: 75%;">
                                <input  name='domain_registars_name' id="domain_registar_name" type="text" placeholder="Insert Doamin Registrar Name" class="form-control form-control-line">
                            </div>
                        </div>

                        <input type="number" id="carry_id" name="id" hidden>

                          <div class="form-group d-flex">
                              <div class="col-sm-12" style="width: 25%;"></div>
                              <div class="col-sm-12" style="width: 75%;">
                                  <button class="btn btn-success text-white">Update</button>
                                  <button type="button" id="back" class="btn btn-success text-white">Back</button>
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



          <div class="row">
              <!-- column -->
              <div class="col-12   m-auto">
                  <div class="card">
                      <div class="table-responsive">
                          <table id="datatable" class="table table-hover table-bordered">
                              <thead>
                                  <tr>
                                      <th class="border-top-0 text-center">SL</th>
                                      <th class="border-top-0 text-center">Domain Registrar Name</th>
                                      <th class="border-top-0 text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($domain_registars as $data)
                                  <tr>
                                  <!--  -->
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$loop->index+1}}
                                      </td>
                                      <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->domain_registars_name}}</td>
                                      {{-- <td style='line-height: 0.5;padding: .5rem;text-align: center'>{{$data->hosting_provider_name}}</td> --}}

                                      <td class='td_css' style='line-height: 0.5;padding: .5rem;text-align: center'>

                                      <a id="edit_btn" pid="{{$data->id}}"  href='#hosting_provider_name' name="btn_edit" class="edit_btn  btn btn-info" style='line-height: 0.5;padding: .5rem'><i class="bi bi-pen"></i></a>

                                      <form class="spacing" method="POST" action='{{url("admin/delete/domainRegistarModel/$data->id")}}' >
                                        @csrf
                                       @method('delete')
                                        <button id='custom-btn' onclick="return confirm('Are you sure??')" class="btn btn-danger"> <i class="bi bi-trash"></i> </button>
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

  @section('javaScript')

<script>
    $('.edit_btn').each(function(){

        $(this).on('click',function(){
            var id = $(this).attr('pid');
            var domain_registar_name= $(this).closest('tr').find("td:eq(1)").text();
            console.log(id);
            $("#domain_registar_name").val(domain_registar_name);
            $("#carry_id").val(id);
            $("#main_form").hide();
           $("#edit_form").show();
        })
    });

    $('#back').on('click',function(){
        $("#edit_form").hide();
        $("#main_form").show();
    })
</script>

  @endsection




