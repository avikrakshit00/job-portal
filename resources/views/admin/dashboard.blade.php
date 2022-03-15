@extends("admin.default")
@section('login_title')
Dashboard | Admin
@endsection
@section("custom_css")
<style type="text/css">
    .intLink { cursor: pointer; }
    img.intLink { border: 0; }
    #toolBar1 select { font-size:10px; }
    #textBox {
    width: 540px;
    height: 200px;
    border: 1px #000000 solid;
    padding: 12px;
    overflow: scroll;
    }
    #textBox #sourceText {
    padding: 0;
    margin: 0;
    min-width: 498px;
    min-height: 200px;
    }
    #editMode label { cursor: pointer; }
    #cke_1_toolbox{
      display: none !important;
    }
    </style>
<link rel="stylesheet" href="admin/css/login.css?cache=<?php echo time(); ?>">
<link rel="stylesheet" href="admin/css/style.css">
@endsection
@section("content")
<div class="wrapper d-flex align-items-stretch">
  <nav id="sidebar" class="active">
    <ul class="list-unstyled components mb-5">
      <li><h1><a href="index.html" class="logo-shivila logo">S</a></h1></li>
      <li class="active">
        <a href="#"><span class="fa fa-home"></span> Home</a>
      </li>
      <li>
        <a href="#" ><span class="fa fa-user"></span> About</a>
      </li>
      <li>
        <a href="#"><span class="fa fa-sticky-note"></span> Blog</a>
      </li>
      <li>
        <a href="#"><span class="fa fa-cogs"></span> Services</a>
      </li>
      <li class="nav-item" title="LogOut">
        <a class="nav-link" href="{{Route('logout')}}">
          <span class="fa fa-sign-out"></span>
          Logout
        </a>
      </li>
    </ul>
    <div class="footer">

    </div>
  </nav>
  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light narbar-custom-top">
      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Portfolio</a>
            </li>
            <li class="nav-item" title="LogOut">
              <a class="nav-link" href="{{Route('logout')}}">
                <i class="fa fa-sign-out btn-primary" style="font-size: 20px;padding: 2px;"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="main-container p-4">
      <section class="content">
        <div class="container-fluid container-fluid-top_main">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6 mb-3">
              <!-- small box -->
              <div class="small-box bg-info border-radius-box text-dark text-center">
                <div class="inner">
                  <h3 class="text-center pt-2">150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer register-ancore">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 mb-3">
              <!-- small box -->
              <div class="small-box bg-success border-radius-box text-dark text-center">
                <div class="inner">
                  <h3 class=" pt-2">53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer register-ancore">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 mb-3">
              <!-- small box -->
              <div class="small-box bg-warning border-radius-box text-dark text-center">
                <div class="inner">
                  <h3 class="r pt-2">654
                  </h3>
                  <p>User Registrations</p>
                </div>
                <buton class="small-box-footer more-fetch-data pb-4" style="cursor: pointer;">More info <i class="fa fa-users"></i></button>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 mb-3">
              <!-- small box -->
              <div class="small-box bg-danger border-radius-box text-dark text-center">
                <div class="inner">
                  <h3 class=" pt-2">65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer register-ancore">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          {{-- strat show all user section --}}
          <div class="w-100 text-center position-fixed  loader">
            <i class="fa fa-refresh fa-spin  text-danger text-center loader-icon d-none" style="font-size:60px">
          </i></div>
          <div class="container-fluid d-none bg-dark showUserAll text-white box-shadow box-shadow-lg p-3 ">
            {!! Toastr::message() !!}
            {{-- table form show user --}}
            <div class="w-100 bg-secondary p-1" style="min-height:60px">
              <h3 class="float-left p-2 text-white">All Users</h3>
            </div>
            <div class="show-all-data">
              <table class="table text-white table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th class="id_show_dyn">ID</th>
                    <th class="profile_show_dyn">PROFILE</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>CONTACT NO.</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            {{--end  table form show user --}}
          </div>
        </div>
      </div>
      {{-- end show all user section --}}

      <div class="container user_show_detils">

      </div>
      {{-- end main section --}}
      {{-- demo modal --}}
      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Open modal
      </button>
      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
          <div class="modal-content p-5">
            <!-- Modal Header -->
            {{--  <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> --}}
            <!-- Modal body -->
            <div class="modal-body border">
              <div class="row">
        <div class="col-6">
                  <input type="text" hidden class="session_email" value="{{session('email')}}" >
                  <label class="text-danger">Heading</label>
                  <input type="text" name="heading" required  class="heading form-control border-bottom mb-2 " >
                  <label class="text-danger">Company</label>
                  <input type="text" name="company" required class="company form-control border-bottom mb-2" >
                  <label class="text-danger">Experience</label>
                  <input type="number" name="experience" required class="experience form-control border-bottom mb-2" >
                  <label class="text-danger">Salary</label>
                  <input type="number" name="salary" required class="salary form-control border-bottom mb-2" >

                  <label class="text-danger">Job Last Date</label>
                  <input type="date" name="end_date" required class="end_date form-control border-bottom mb-2" >
                  <label class="text-danger">Location</label>
                  <input type="text" name="location" required class="location form-control border-bottom mb-2" >
        </div>

        <div class="col-6">
          <div class="container-fluid" style="width:-500px">
      <div id="toolBar2" style="margin-bottom: 5px;margin-top: 10px;">
        <button type="button" class="intLink" title="Bold" onclick="formatDoc('bold');">B</button>
        <button type="button" class="intLink" title="Italic" onclick="formatDoc('italic');"><i>I</i></button>
        <button type="button" class="intLink" title="Underline" onclick="formatDoc('underline');"><u>U</u></button>
        <button type="button" class="intLink" title="Left align" onclick="formatDoc('justifyleft');">LEFT</button>
        <button type="button" class="intLink" title="Center align" onclick="formatDoc('justifycenter');">CENTER</button>
        <button type="button" class="intLink" title="Right align" onclick="formatDoc('justifyright');">RIGHT</button>
        <button type="button" class="intLink" title="Numbered list" onclick="formatDoc('insertorderedlist');">U LIST</button>
        <button type="button" class="intLink" title="Dotted list" onclick="formatDoc('insertunorderedlist');">UN LIST</button>
        <button type="button" class="intLink" title="Hyperlink" onclick="var sLnk=prompt('Write the URL here','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){formatDoc('createlink',sLnk)}">IMG</button>
      </div>
      <form name="compForm">
        <div id="textBox" contenteditable="true"><p>Descripton
        </p></div>
        <p id="editMode" ><input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /> <label for="switchBox">Show HTML</label></p>
        <p>
          <button class="btn btn-danger mt-5 btn_create_post" type="submit">Submit</button>
        </form>
      </div>
        </div>
      </div>

            </div>
            <!-- Modal footer -->
            {{-- <div class="modal-footer">

            </div> --}}
          </div>
        </div>
      </div>
      {{--end demo modal --}}
    </section>
  </div>
</div>
</div>
{{-- model form edit user data --}}
<!-- The Modal -->
<div class="modal" id="edit_user_model">
<div class="modal-dialog w-75">
  <div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header  text-center">
      <h4 class="modal-title">Edit User Details </h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <!-- Modal body -->
    <div class="modal-body pl-3 pr-3">
      <label>User Name</label>
      <input type="text" name="name" class="form-control border-bottom mb-2  user_name require">
      <label>User DOB</label>
      <input type="text" name="dob" class="form-control border-bottom mb-2  user_dob require">
      <label>User AGE</label>
      <input type="text" name="age" class="form-control border-bottom mb-2  user_age require" >
      <label>User GENDER</label>
      <input type="text" name="gender" class="form-control border-bottom mb-2  user_gender require" >
      <label>User Location</label>
      <input type="text" name="location" class="form-control border-bottom mb-2  user_location require" >
      <label>User Qulification</label>
      <input type="text" name="qulification" class="form-control border-bottom mb-2  user_qulification require" >
      <label>User Specialization</label>
      <input type="text" name="specialization" class="form-control border-bottom mb-2  user_specialization require"  >
      <label>User Skills</label>
      <input type="text" name="skills" class="form-control border-bottom mb-2  user_skills require" >
      <label>User Othre Skills</label>
      <input type="text" name="other_skills" class="form-control border-bottom mb-2  user_other_skills require" >
      <label>User Mobile</label>
      <input type="text" name="mobile" class="form-control border-bottom mb-2  user_mobile require" >
      <label>User Email</label>
      <input type="email" name="email" class="form-control border-bottom mb-2  user_email require ">
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
      <button class="btn btn-primary user_id" id="update_user">Update</button>
      <button type="button" class="btn btn-danger" >Close</button>
    </div>
  </div>
</div>
</div>
{{-- add user modal --}}
<div class="modal" id="adduser" >
<div class="modal-dialog w-75">
  <div class="modal-content">
    <!-- Modal Header -->
    <div class="modal-header  text-center">
      <h4 class="modal-title">Add New User</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <!-- Modal body -->
    <div class="modal-body pl-3 pr-3">
      <label>User Email</label>
      <input type="email" name="email" class="form-control border-bottom mb-2 " >
      <label>Paasword</label>
      <input type="password" name="email" class="form-control border-bottom mb-2" >
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" >Next</button>
    </div>
  </div>
</div>
</div>
{{-- end add user modal --}}
{{-- delete model  --}}
<div class="container">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<div class="modal" id="deleteuser" >
  <div class="modal-dialog w-75">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header  text-center">
        <h4 class="modal-title">Delete User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body pl-3 pr-3">
        <label>User Name</label>
        <input type="email" name="email" class="form-control border-bottom mb-2 delete_username" disabled="disabled" >
        <label>Use Email</label>
        <input type="text" name="email" class="form-control border-bottom mb-2 delete_useremail" disabled="disabled">
        <p  style="color: red;font-size: 15px;">Are You Sure ? want to delete this data ?</p>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn bg-warning" data-dismiss="modal">CENCEL</button>
        <button type="button" class="btn btn-danger delete_user" id="delete-user" class="close" data-dismiss="modal" >Yes Delete</button>
      </div>
    </div>
  </div>
</div>
</div>
{{-- delete model  --}}
{{-- end model edit user --}}
@endsection
@section("custom_js")
</script>
    <style type="text/css">
    .intLink { cursor: pointer; }
    img.intLink { border: 0; }
    #toolBar1 select { font-size:10px; }
    #textBox {
    width: 540px;
    height: 200px;
    border: 1px #000000 solid;
    padding: 12px;
    overflow: scroll;
    }
    #textBox #sourceText {
    padding: 0;
    margin: 0;
    min-width: 498px;
    min-height: 200px;
    }
    #editMode label { cursor: pointer; }
    </style>
<script src="admin/js/main.js"?cache="<?php echo time();?>"></script>
@endsection
