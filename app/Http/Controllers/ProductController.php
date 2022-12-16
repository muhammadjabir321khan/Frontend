<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return response()->json([
            'product' => $product
        ]);
    }
    public function store(Request $req)
    {
        $user_Id = User::all();
        foreach ($user_Id as $user_Id) {
            if ($user_Id->exists()) {
                $product = new Product();
                if ($req->file('image')) {
                    $file = $req->file('image');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('./Image'), $filename);
                    $product->name = $req->name;
                    $product->image = $filename;
                    $product->price = $req->price;
                    $product->user_id = $user_Id->id;
                    $product->description = $req->description;
                    $product->save();
                    return response()->json([
                        'success' => 'Data is inserted successfully'
                    ]);
                }
            }
        }
    }




}
