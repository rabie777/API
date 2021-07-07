<?php

namespace App\Http\Controllers\api;

use App\Models\sector;
use App\traits\generaltrait;
use Illuminate\Http\Request;
use  App\Http\Controllers\controller;
class CategoryController extends Controller
{

    use generaltrait;
    public function index()
    {
       $cat=sector::select('id','name_'.app()->getlocale(),'active')->get();
       //return Response() ->json($cat);
return $this->returnData("sectors",$cat);

    }

    public function show(Request $request)
    {
     $cat=sector::select('id','name_'.app()->getlocale(),'active')->get()->find($request->id);
      //return Response() ->json($cat);
      $item=sector::select()->find($request->id);
if(!$item)
{
   return $this->returnError('500','error ');
}
else
      return  $this->returnData('data',$cat ,"success");
    }



    public function status(Request $request)
    {
       //$cat=sector::select('id','name_'.app()->getlocale())->get();
       $item=sector::select()->find($request->id);
 if(!$item)
 {
    return $this->returnError('500','error ');
 }
        sector::where('id',$request->id)->update(['active'=>$request->active]);
       return $this->changeStatus("done");

    }

}
