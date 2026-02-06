<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function show_Admin_Dashboard()
    {
        $totalProducts = Produit::count();
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalCategories = Category::count();
        $recentProducts = Produit::with('category')->latest()->take(5)->get();
        $lowStockCount = Produit::where('stock', '<', 10)->count();
        

        $productsPerCategory = $totalCategories > 0 ? round($totalProducts / $totalCategories, 1) : 0;
        
        return view('admin/admin_dashboard', [
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalCategories' => $totalCategories,
            'recentProducts' => $recentProducts,
            'lowStockCount' => $lowStockCount,
            'productsPerCategory' => $productsPerCategory,
        ]);
    }    


}