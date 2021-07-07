<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persone;
use App\traits\generaltrait;
use App\Http\Resources\personResource;
use App\Http\Resources\personResourceCollection;
class PersonController extends Controller
{

    public function show(Persone $Persone)
    {

        return new personResource(Persone::find($Persone));

    }

    public function index(): personResourceCollection
    {
          return new personResourceCollection(persone::paginate());
    }



}
