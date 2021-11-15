<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function create()
    {
        return view('feedbacks.create');
    }

    public function store(Request $request)
    {
        // $data= request()->validate([
        //     'description'=>'required',
        // ]);

        $data=Feedback::create([
            'user_id'=>auth()->user()->id,
            'description'=>$request->description,
        ]);
        // auth()->user()->feetbacks()->create([
        //     'description'=> $data['description'],
        // ]);
      
        return redirect('/profile/' . auth()->user()->id);
    }
   
}
