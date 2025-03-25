<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\History;

class HistoryController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $histories = History::where('user_id',$user->id)->get();
        return view('history',['histories'=>$histories]);
    }
}
