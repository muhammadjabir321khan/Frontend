<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\User;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function index()
    {
    }
    public function store(Request $req)
    {
          $rider = new Rider();
        if ($req->file('image')) {
            $file = $req->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('./products'), $filename);
            $rider->name = $req->name;
            $rider->image = $filename;
            $rider->email = $req->email;
            $rider->address = $req->address;
            $rider->phone = $req->phone;
            $rider->save();
            return response()->json([
                'success' => 'Data is inserted successfully'
            ]);
        }
    }

    public function  orderRider()
    {
       
          
        
    }
}
