@extends("admin.default")
@section('login_title')
    Login | Admin
@endsection


@section("custom_css")
    <link rel="stylesheet" href="admin/css/login.css?cache=<?php echo time();?>">
@endsection

@section("custom_js")
 <script src="admin/js/main.js"?cache=<?php echo time();?> ></script>
@endsection

@section("content")
     {!! Toastr::message() !!}
    <div class="bg-white container  shadow-lg my-4 overflow-hidden" style="min-height: 500px ">
        <div class="row " style="min-height:600px;">
            <div class="col-md-6 welcome-image">
            </div>
            <div class="col-md-5 mt-5" >
              <div class="branding">
                  <h1>SHIVILA</h1>
                  <p>SHIVILA ADMIN PANEL</p>
              </div>
              <div class="welcome-form p-4 ">
                <form class="admin-form" autocomplete="off" action="/loginAdmin"  method="POST">
                    @csrf
                    {{-- start step one --}}
                    <div class="step-1 login-page">
                        <div class="form-group mb-4 overflow-hidden">
                            <label class="d-none" for="">Admin Email</label>
                            <input type="email" name="admin_email" class="form-control welcome-form-input rounded-0" placeholder="ADMIN EMAIL" required="required">
                        </div>

                        <div class="form-group mb-4 overflow-hidden">
                            <label class="d-none" for="">Password</label>
                            <input type="Password" name="admin_password" class="form-control welcome-form-input rounded-0" placeholder="PASSWORD" required="required">
                        </div>

                         <div class="form-group">
                            <button type="submit" class="btn float-right next-btn btn-primary step-1-next-btn mb-4"> Login</button>
                        </div>
                    </div>
                    {{-- end step one --}}
                   {{--  {!! Toastr::message() !!} --}}
                </form>
              </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        </div>

@endsection

