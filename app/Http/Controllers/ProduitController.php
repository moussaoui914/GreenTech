<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    



    public function afficherDetails(int $id){
        $produit = Produit::find($id);

        return view('productDetails',compact('produit'));
    }

    public function ajouterProduit(){
        $categories = Category::all();
        return view('createForm', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'category_id'=> 'required|integer',
            'prix'=> 'required|numeric',
            'stock'=>'required|integer',
            'description'=>'nullable|string'
        ]);
        Produit::create($request->all());

        return redirect()->route('homePage');
    }

    public function edit(int $id){
        $produit = Produit::find($id);
        $categories = Category::all();
        return view('editForm',compact('produit','categories'));
    }

    public function update(int $id,Request $request){
        $produit = Produit::find($id);
            $request->validate([
            'name'=>'required|string|max:255',
            'category_id'=> 'required|integer',
            'prix'=> 'required|numeric',
            'stock'=>'required|integer',
            'description'=>'nullable|string'
        ]);
        $produit->fill($request->all())->save();
        return redirect()->route('homePage');
    }

    public function destroy($id){
        Produit::destroy($id);
        return back();
    }

    public function my_search(Request $request){
        $search = $request->search;
        $products = Produit::where('name','LIKE','%'.$search.'%')->paginate(3)->withQueryString();
        return view('index',compact('products'));
    }

    public function toggleFavorite(Produit $product)
{
    $user_id = Auth::user()->id;

    $user = User::find($user_id);

    $exists = $user->favoriteProducts()->where('product_id', $product->id)->exists();
    
    if ($exists) {
        $user->favoriteProducts()->detach($product->id);
        return response()->json(['status' => 'removed']);
    } else {
        $user->favoriteProducts()->attach($product->id);
        return response()->json(['status' => 'added']);
    }
}


}
