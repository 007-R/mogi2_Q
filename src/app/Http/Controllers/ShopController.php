<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $favorites = Favorite::where('user_id', $user_id)->get()->toArray();
        $favorite_shop = [];
        foreach($favorites as $favorite){
            array_push($favorite_shop, $favorite['shop_id']);
        }
        return view('shop', compact('shops', 'areas', 'genres'))->with("favorite_shop", $favorite_shop);
    }
    public function detail($id)
    {
        $shop = Shop::find($id);
        return view('shop_detail', compact('shop'));
    }
    public function add(Request $request)
    {
        $user_id = Auth::id();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        Favorite::create([
            'user_id' => $user_id,
            'shop_id' => $request->favorite_shop,
        ]);

        $favorites = Favorite::where('user_id', $user_id)->get()->toArray();
        $favorite_shop = [];
        foreach ($favorites as $favorite) {
            array_push($favorite_shop, $favorite['shop_id']);
        }
        return view('shop', compact('shops', 'areas', 'genres'))->with("favorite_shop", $favorite_shop);
    }
    public function del(Request $request)
    {
        $user_id = Auth::id();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();

        Favorite::where('user_id', $user_id) -> where('shop_id',$request->favorite_shop) -> delete();

        $favorites = Favorite::where('user_id', $user_id)->get()->toArray();
        $favorite_shop = [];
        foreach ($favorites as $favorite) {
            array_push($favorite_shop, $favorite['shop_id']);
        }
        return view('shop', compact('shops', 'areas', 'genres'))->with("favorite_shop", $favorite_shop);
    }
}
