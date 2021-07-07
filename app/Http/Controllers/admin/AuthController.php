<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Admin;
use App\traits\generaltrait;
use Validator;
use Auth;
class AuthController extends Controller
{
  use generaltrait;
 public function login(Request $request)
 {

   try{
$rules=[
  "email"=>"required",
  "password"=>"required"
];
//validation
   $validator=Validator::make($request->all(),$rules);
   if($validator->fails()){
     $code=$this->returnCode($validator);
     return $this->returnvalidationError($code,$validator);
   }
//login
   $credentails=$request->only(['email','password']);
  $token=Auth::guard('admin_api') -> attempt($credentails);
  if(! $token)
    return $this->returnError('000','Login faild');
      $admin= auth::guard('admin_api')->user();
      $admin->api_token=  $token;
 return $this->returnData("token",$admin);

}
catch(\Exception $ex){
  return $this->returnError($ex->getcode(),$ex->getmessage());
}

 }



public function logout(Request $request)
{
  $token=$request->header('api_token');
  if($token){
    try {
    JWTAuth::settoken($token)->invalidate();
  }
  catch(\Tymon\JWTAuth\Exceptions\TokenInvalidException $e)
  {
    return  $this -> returnError('','some thing went wrongs');
  }
    return $this->changeStatus("logged out successfuly");

  }
  else {
      return $this->returnError('000',"wrong");
  }


}

}
