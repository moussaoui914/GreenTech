<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $products = Produit::with('category')->paginate(3); 
        
        return view('index', compact('products'));
    }

    
}