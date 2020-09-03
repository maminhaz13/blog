<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Mail;
use Image;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\PasswordChangeMail;

class ProfileController extends Controller
{
    function profile(){
        
        return view('admin.profile.index');
    }

    function edit_profile(Request $request){

        //Validating The Profile Start
        $request->validate([
            'profile_name' => 'required|alpha'
        ],[
            'profile_name.required' => 'Fill up the form correctly',
            'profile_name.alpha' => 'Alpha character is val id only'
        ]);
        //Validating The Profile End

        //Profile Time Count and Update Start
        if( Auth::user()->updated_at->addDays(30) < Carbon::now()){
        User::find(Auth::id())->update([
            'name' => $request->profile_name,
            'updated_at' => Carbon::now(),
        ]);
        //Profile Time Count and Update End

        return back()->with('name_change_success', 'Your name changed successfully');       

        }

        else {
        //Changing period Error Start 
        $left_days = Carbon::now()->diffInDays(Auth::user()->updated_at->addDays(30)) +1;
        return back()->with( 'error_name_time_period' , 'You can not change your name after '.$left_days.' days');        
        //Changing period Error End 
        
        }
    }
        
    function edit_password( Request $request){

        //Updating The Password Start            
            $request->validate([
                'password' => 'confirmed'
            ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {

            if ($request->old_password == $request->password) {
            
            return back()->with('error_reenter_old', 'You entered your old password. Please try new password');            
            } 
            
            else {

                User::find(Auth::id())->update([
                    'password' => Hash::make($request->password),
                    'updated_at' => Carbon::now(),
                ]);

                // //Sending password changing notification email start 
                Mail::to(Auth::user()->email)->send(new PasswordChangeMail(Auth::user()->name));
                echo "done";
                // //Sending password changing notification email end 

                return back()->with('password_change_success', 'Your password changed successfully');
            }
        //Updating The Password End
        }
        
        else{

            return back()->with('error_password_hash_unmatched', 'Your old password does not matched. Please try again..');        
        }    
    }

    function change_propicture(Request $request){

        //Uploading Profile Picture Start
        if($request->hasFile('profile_picture')){

            if(Auth::user()->profile_pictures != 'default.png'){
                $old_picture_location = 'public/uploads/profile_pictures/'.Auth::User()->profile_pictures;
                unlink(base_path($old_picture_location));
            }

            $uploaded_picture = $request->file('profile_picture');
            $photo_file_extention = Auth::id().".".$uploaded_picture->getClientOriginalExtension('profile_picture');
            $picture_new_location = 'public/uploads/profile_pictures/'.$photo_file_extention;
            Image::make($uploaded_picture)->resize(1024,1024)->save(base_path($picture_new_location), 20);
            User::find(Auth::id())->update([
                'profile_pictures' => $photo_file_extention,
                'updated_at' => Carbon::now(),
            ]);
        //Uploading Profile Picture End

            return back()->with('pro_picture_change_done', 'Your profile picture changed successfully');
        }

        else{
            return back()->with('error_pro_picture_change_unselected', 'You didnot select your desired profile picture');
        }
    }

    function userlist(){
        //Showing User's Info Start
        $users = User::latest()->Paginate(7);
        $total_users = User::count();
        return view('admin/profile/users', compact('users','total_users'));
        //Showing User's Info End
    }

}
