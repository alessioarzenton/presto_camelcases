<?php

namespace App\Http\Controllers;

use App\Mail\RevisorMessage;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
   {
       $this->middleware('auth');
   }

    public function profile()
    {
        if (Auth::user()->is_revisor == true) {
            $categories = Category::all();
            $ads = Ad::orderBy('created_at','desc')->take(5)->get();
            return view('welcome',compact('categories', 'ads'));
        } else {
            return view('user.profile');
        }
    }

    public function messageRevisor(Request $request)
    {
        $contact = $request->all();

        Mail::to('info@presto.it')->send(new RevisorMessage($contact));

        return redirect()->back()->with('message', __('ui.messaggio_invio'));
    }
}
