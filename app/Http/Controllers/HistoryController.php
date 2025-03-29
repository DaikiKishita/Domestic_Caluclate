<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\History;
use App\Models\Type;

class HistoryController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if (is_null($user)){
            return redirect('/login');
        }

        $histories = History::where('user_id',$user->id)
        ->with('type')
        ->orderBy('created_at','desc')
        ->get();

        $types = Type::all();

        return view('history',
        [
            'histories'=>$histories,
            'types'=>$types,
            'is_login'=>true,
        ]);
    }

    public function store(Request $request){
        $user = Auth::user();


        $request->validate([
            'type_id' => 'required|integer',
            'amount' => 'required|integer',
            'comment' => 'nullable|string|max:255',
        ]);

        $history = new History();
        $history->user_id = $user->id;
        $history->type_id = $request->input('type_id');
        $history->amount = $request->input('amount');
        $history->comment = $request->input('comment');
        $history->save();

        return redirect('/history');
    }
}
