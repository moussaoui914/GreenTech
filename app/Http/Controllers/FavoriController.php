<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\UseItem;

class FavoriController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $favoris = $user->favoriteProducts()->with('category')->paginate(12);
        
        return view('favoris', compact('favoris'));
    }


    public function toggle(Request $request, $produitId)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if ($user->isFavorite($produitId)) {
            $user->favoriteProducts()->detach($produitId);
            $message = 'Produit retiré des favoris.';
            $isFavorite = false;
        } else {
            $user->favoriteProducts()->attach($produitId);
            $message = 'Produit ajouté aux favoris !';
            $isFavorite = true;
        }

        return back()->with('success', $message);
    }

    public function destroy($produitId)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->favoriteProducts()->detach($produitId);

        return back()->with('success', 'Produit retiré des favoris.');
    }
}