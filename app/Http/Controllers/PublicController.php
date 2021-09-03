<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        $ads = Ad::orderBy('created_at','desc')->take(6)->get();
        return view('welcome',compact('categories', 'ads'));
    }

    public function search(Request $request)
    {
        $q = $request->input(('q'));
        $ads = Ad::search($q)->get();
        return view('search', compact('q','ads'));
    }

    public function locale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
