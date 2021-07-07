<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Persone;
use App\traits\generaltrait;
use App\Http\Resources\personResource;
use App\Http\Resources\personResourceCollection;
class PostsController extends Controller
{
use generaltrait;
   public function index()
   {
     $posts= new personResourceCollection(Persone::paginate(7));
     return $this->returnData("data",$posts);
    // return Response($posts,200);
   }
   public function show($id)
   {
     $posts= new personResource(Persone::find($id));
     return $this->returnData("data",$posts);
    // return Response($posts,200);
   }
   public function create(request $request)
   {
     $posts=Persone::create([
           'First_name'=> $request -> firstname,
           'Last_name'=>$request -> lastname,
           'email'=>$request -> email,
           'phone'=>$request -> phone,
           'city'=>$request -> city
     ]);

     if($posts)
      {
        return $this->returnData("data",$posts);
      }
    //  return response($posts);

    // return Response($posts,200);
   }
}
