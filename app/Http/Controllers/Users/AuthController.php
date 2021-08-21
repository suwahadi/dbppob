<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Users\AuthHelper;
use App\Helpers\Users\AuthSetSessionHelper;
use App\Models\UserAccount;
use Hash;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function loginFunction(Request $request)
    {
        $checkAuth = $this->checkAuth($request);
        if ($checkAuth["status"]) {
            $setSessionAdmin = $this->setSession($request->post("username"));
            if ($setSessionAdmin["status"]) {
                return response()->json(["status" => "SUCCESS", "respMessage" => "Login Success"], 200);
            }else {
                return response()->json(["status" => "FAILED", "respMessage" => $setSessionAdmin["errorMessage"]], 200);
            }
        }else{
            return response()->json(["status" => "FAILED", "respMessage" => $checkAuth["errorMessage"]], 200);
        }
    }

    public function checkAuth($request)
    {
        $username = $request->post("username");
        $password = $request->post("password");

        if (UserAccount::where("username", $username)->count() > 0) {
            $user = UserAccount::where("username", $username)->first();
            if (Hash::check($password, $user->password)) {
                return [
                    "status" => true,
                    "errorMessage" => ""
                ];
            }else{
                return [
                    "status" => false,
                    "errorMessage" => "password does not match"
                ];
            }
        }
        return [
            "status" => false,
            "errorMessage" => "user does not exists"
        ];
    }

    public function setSession($username)
    {
        if($user = UserAccount::where("username", $username)->first()){
            $temp = [];
            $temp["userID"] = $user->id;
            $temp["fullName"] = $user->nama;
            $temp["username"] = $user->username;
            $temp["password"] = $user->password;

            Session::put('user', $temp);
            return [
                "status" => true,
                "errorMessage" => ""
            ];
        }else{
            return [
                "status" => false,
                "errorMessage" => "user does not exists"
            ];
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    public function profile()
    {
        $username = (session("user")["username"]);
        $params = [];
        $params["menu"] = "profile";
        $params["subMenu"] = "profile";
        $params["datas"] = UserAccount::where("username", $username)->first();

        return view('contents.profile', $params);
    }

    public function editProfile(Request $request)
    {
        $save = \DB::table('tblusers')->where('username', $request->post("username"))->update([
            "nama" => $request->post("nama"),
            "email" => $request->post("email"),
            "hp" => $request->post("hp"),
            "tanggal_lahir" => $request->post("tanggal_lahir")
        ]);

        return redirect()->back()->with("success","Profile update successfully!");
    }

    public function GetPassword(){
        $username = (session("user")["username"]);
        $params = [];
        $params["menu"] = "change password";
        $params["subMenu"] = "change password";
        $params["datas"] = UserAccount::where("username", $username)->first();

        return view('contents.change-password', $params);
    }

    public function ChangePassword (Request $request){
        $password = (session("user")["password"]);
		if (!(Hash::check($request->get('current-password'), $password))) {
		// The passwords matches
		return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
		}

		if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
		//Current password and new password are same
		return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
		}
		if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
			//New password and confirm password are not same
			return redirect()->back()->with("error","New Password should be same as your confirmed password. Please retype new password.");
		}
		//Change Password
        $ChangePass = \DB::table('tblusers')->where('username', $request->post("username"))->update([
            "password" => Hash::make($request->post("new-password"))
        ]);

		return redirect()->back()->with("success","Password changed successfully!");
	}

}