<?php

namespace App\Http\Controllers\AdminMain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\admin\Personal_detail;

class AdminLoginController extends Controller
{

    public function adminLloginViewpage(){

        if(session()->has('admin_email_session'))
        {
             return view('admin.dashboard');
        }else{
            return view('admin.welcome');
             }

        }

    //check login page open code
    public function checkAdminLoigin() {
        if(session()->has('admin_email_session'))
        {
             return view('admin.dashboard');
        }else{
            return view('admin.welcome');
             }

        }

        // check admin login id paasword
    public function loginAdmin(Request $req)
    {
        if(session()->has('admin_email_session')){
            return redirect('/dashboard');
        }
        else{
            $email=$req->admin_email;
            $password=$req->admin_password;
            $user=DB::table('admins')->where('admin_email',$email)->first();
            if(is_null($user)){
                  return redirect("/");
            }
            else{
               // if(is_null($user))
            $userPass=$user->admin_password;
            //Hash::check($password,$userPass)   for encrypt password
            if($password == $userPass){
                $session=session()->put('admin_email_session',$email);
                //return response()->view("/dashboard",array("data"=>$user));
                return redirect('/dashboard');

                }else{
                     echo 'Paasword not found';

                    return redirect("/");
                }
            }


            }
    }

    //  this logout function
    public function flush(Request $request) {
      $request->session()->flush();
      return redirect('/');
    }

    // fetch data from presnal details
    public function fetchDataPresanalDetails(){

        // $test = DB::table('Personal_details')->get();
         $Personal_details = Personal_detail::all();

        return response()->json(['Personal_details'=>$Personal_details]);

    }


    public function edit_user($id){

         $edit_Personal_details = Personal_detail::find($id);
         if ($edit_Personal_details) {
             return response()->json(['status'=>200,'edit_Personal_details'=>$edit_Personal_details]);
         }else{
            return response()->json(['status'=>404,'edit_Personal_details'=>'User Id Not Found']);
         }
    }


    public function update_user(Request $request, $id){

            $user_update = Personal_detail::find($id);
            $user_update->name = $request->input('name');
            $user_update->dob = $request->input('dob');
            $user_update->age = $request->input('age');
            $user_update->gender = $request->input('gender');
            $user_update->location = $request->input('location');
            $user_update->qualification = $request->input('qulification');
            $user_update->specialization = $request->input('specialization');
            $user_update->skills = $request->input('skills');
            $user_update->other_skills = $request->input('other_skills');
            $user_update->mobile = $request->input('mobile');
            $user_update->email = $request->input('email');
            $succesUpdate = $user_update->update();
            if ($succesUpdate) {

                return response()->json(['status'=>200,'edit_Personal_details'=>$user_update]);

            }

            else{

                return response()->json(['status'=>503,'edit_Personal_details'=>$user_update]);

            }
    }

    public function delete_user(Request $request, $id)
        {
            $user_delete = Personal_detail::find($id);
            $success_del = $user_delete->delete();

            if($success_del)
            {
                return response()->json(['status'=>200,'delete_user'=>"Delete success"]);
            }
            else{
                return response()->json(['status'=>200,'delete_user'=>"Delete Not success plz try again"]);
            }
        }

}
