<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\History;
use App\Models\Type;

use Carbon\Carbon;

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
        ->paginate(5);

        $current_month_total = History::whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->sum('amount');

        return view('history',
        [
            'user_name' => $user->name,
            'histories'=>$histories,
            'types'=>Type::all(),
            'is_login'=>true,
            'current_month_total'=>$current_month_total,
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

    public function destroy(Request $request){
        $user = Auth::user();
        
        $request->validate([
            'id' => 'required|integer',
        ]);

        $history = History::where('user_id',$user->id)
        ->where('id',$request->input('id'))
        ->first();

        if ($history) {
            $history->delete();
        }

        return redirect('/history');
    }

    public function search(Request $request){
        $user = Auth::user();

        $histories = History::where('user_id',$user->id)
        ->with('type')
        ->where('type_id',$request->type)
        ->orderBy('created_at','desc')
        ->paginate(5);

        $total_amount = History::where('user_id',$user->id)
        ->where('type_id',$request->type)
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('amount');

        return view('history',
        [
            'histories'=>$histories,
            'types'=>Type::all(),
            'is_login'=>true,
            'current_month_total'=>$total_amount,
        ]);
    }
}
