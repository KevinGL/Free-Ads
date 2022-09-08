<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ads;
use App\Models\Category;

class AdsController extends Controller
{
    public function index()
    {
        $products = Ads::latest()->get();     //Lecture dans la BDD

        $categories = [];

        foreach($products as $prod)
        {
            $cat = Category::findOrFail($prod->category_id);

            array_push($categories, $cat);
        }

        //var_dump($category_names);

        return view("products.index", ["products" => $products, "categories" => $categories]);       //Envoi des résultats à la vue
    }

    public function show($id)
    {
        $product = Ads::findOrFail($id);

        $cat = Category::findOrFail($product->category_id);

        //var_dump($product->title);

        return view("products.show", ["product" => $product, "category" => $cat->title]);
    }
    
    public function form()
    {
        $categories = Category::latest()->get();     //Lecture dans la BDD

        return view("products.add", compact("categories"));       //Envoi des résultats à la vue
    }

    public function validAdd(Request $request)
    {
        Ads::create([
            'title' => $request->title,
            'category_id' => $request->category,
            //'category_name' => $name_cat->title,
            'description' => $request->description,
            'photo' => "pictures/" . $request->photo,
            'price' => $request->price,
            'location' => $request->location,
            'user_id' => Auth::id()
        ]);

        return redirect("dashboard");
    }

    public function edit($id)
    {
        $product = Ads::findOrFail($id);

        $categories = Category::latest()->get();

        return view("products.edit", ["product" => $product, "categories" => $categories]);
    }

    public function delete($id)
    {
        $product = Ads::findOrFail($id);

        return view("products.delete", compact("product"));
    }

    public function validDelete($id)
    {
        Ads::destroy($id);

        return redirect("dashboard");
    }

    public function validEdit($id, Request $request)
    {
        $product = Ads::findOrFail($id);
        
        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->photo = "pictures/" . $request->photo;
        $product->price = $request->price;
        $product->location = $request->location;

        $product->save();

        return redirect("dashboard");
    }

    public function search(Request $request)
    {
        //var_dump($request->name);

        $products = Ads::latest()->get();

        $productsFound = [];

        foreach($products as $prod)
        {
            if(str_contains(strtoupper($prod->title), strtoupper($request->search)))
            {
                //return redirect(route("product.show", $prod->id));
                array_push($productsFound, $prod);
            }
        }

        if(count($productsFound) == 0)
            return view("products.notfound");
        
        return view("products.showSeverals", compact("productsFound"));
    }
}
