<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\profileModel;
use App\Models\Classes;
use App\Models\list_kelas;
use DB;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;




class userController extends Controller
{

    public function userManagement(){

        $data_profile = profileModel::where('superadmin_status',1)->get();


        $contain = array();

        for($i=0; $i<sizeof($data_profile); $i++){
            $data_user = User::where('id', $data_profile[$i]->user_id)->first();
            array_push($contain,
                ["name"=>$data_user->name,
                "email"=>$data_user->email,
                "id"=>$data_user->id]
            );
        }



        return view('pages.user_management', ["data"=>$contain]);
    }
    
    public function update_status_user($id){
        profileModel::where('user_id',$id)->update([
            'superadmin_status'=>2 //ini untuk admin
        ]);
        return redirect('/user-management');
    }

    public function delete_user($id){
        profileModel::where('user_id','=',$id)->delete();
        User::where('id','=',$id)->delete();
        return redirect('/user-management');
    }

    public function update_profile(Request $request){
        $data = User::where('id',$request->id)->first();
        $data_profile = profileModel::where('user_id',$request->id)->first();

        return view('pages.profile', ["data"=>$data, "data_profile"=>$data_profile]);
    }

    public function update($id, Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $name_user = $request->name;
        $email_user = $request->email;
        $address_user = $request->address;

        User::where('id',$id)->update([
            'name'=> $name_user,
            'email'=> $email_user,
        ]);

        profileModel::where('user_id',$id)->update([
            'alamat'=>$address_user,
        ]);

        return redirect('/dashboard');
    }


    public function dashboard(){

        $data = profileModel::where('user_id',Auth::id())->first();

        $class_data = list_kelas::where('user_kelas_id',Auth::id())->orderBy('created_at', 'desc')->first();

        if($class_data == null){  
            return view('pages.dashboard_user', ["data"=>$data, "class_quantity"=>0]);
        } else{
            
            $item = Classes::where('id',$class_data->kelas_user_id)->first();
            return view('pages.dashboard_user', ["data"=>$data,"item"=>$item, "class_quantity"=>1]);
        }
        
        
    }

}
