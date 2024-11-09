<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    //

    function index(Request $request){
        $search = $request->get('search');
        
        $sort = $request->get('sort');

    $query = Products::query();

    if ($search) {
        $query->where('product_id', 'LIKE', "%{$search}%")
              ->orWhere('description', 'LIKE', "%{$search}%");
    }

    if ($sort) {
        switch ($sort) {
            case 'Sort By Name ASC':
                $query->orderBy('name', 'asc');
                break;
            case 'Sort By Name DESC':
                $query->orderBy('name', 'desc');
                break;
            case 'Sort By Price ASC':
                $query->orderBy('price', 'asc');
                break;
            case 'Sort By Price DESC':
                $query->orderBy('price', 'desc');
                break;
        }
    }

    if (!$search && !$sort) {
        $query->latest();
    }

    $products = $query->paginate(5);

        return view("index",["products"=>$products]);
    }

    function create(Request $request){
        return view("create");
    }

    function store(Request $request){
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $product_description = $request->input('product_description');
        $product_price = $request->input('product_price');
        $product_stock = $request->input('product_stock');

        $product_img = $request->file('product_image');
        
        if($product_img){
            $img_name = time() . '-' . $product_img->getClientOriginalName();
            $product_img->move(public_path('uploads'),$img_name);
        }else{
            $img_name = "null";
        }

        Products::create([
            "product_id" => $product_id,
            "name" => $product_name,
            "description" => $product_description,
            "price" => $product_price,
            "stock" => $product_stock,
            "image" => $img_name
        ]);


        return redirect()->route('products.create');
    }

    function show(Request $request,$product_id){
       
        $product = Products::where('product_id','=',$product_id)->get();

        return view('show',["product"=>$product]);
    }

    function edit(Request $request, $product_id){
        $product = Products::where('product_id','=',$product_id)->get();

        return view('edit',["product"=>$product]);
    }

    function update(Request $request,$product_id){
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $product_description = $request->input('product_description');
        $product_price = $request->input('product_price');
        $product_stock = $request->input('product_stock');
        $previous_img = $request->input('previous_image');

        $product_img = $request->file('product_image');

        if($product_img){
            $img_name = $product_img->getClientOriginalName();
            $product_img->move(public_path('uploads'),$img_name);
        }else{
            $img_name = $previous_img;
        }
        

         Products::where('product_id','=',$product_id)
                   ->update(
                    [
                        "product_id" => $product_id,
                        "name" => $product_name,
                        "description" => $product_description,
                        "price" => $product_price,
                        "stock" => $product_stock,
                        "image" => $img_name
                    ]
                   );

        return redirect()->route('products');

    }

    function delete(Request $request, $product_id){
    
        Products::where('product_id', $product_id)->delete();

        return redirect()->route('products');
    }
}
