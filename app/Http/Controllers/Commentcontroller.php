<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use DB;
class Commentcontroller extends Controller
{

    public function index()
    {
      
        $comment = Comment::all();
        return view('detaile', compact('comment'));
    }

    public function poster(request $request)
    {
     
        $request->validate([
            'content' => 'required',
            'user_id' => 'required',
            'announcement_id' => 'required',

        ]);


        Comment::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
            'announcement_id' => $request->announcement_id,

        ]);

        return redirect()->route('annonce.detaile', ['id' => $request->announcement_id])->with('success', 'Post ajouté avec succès');
    }

    public function destroy(request $request , $id)
    {
        Comment::find($id)->delete();
        return redirect(session('previous_url'));
    }

    public function edit( $id)
    {

        $comment = Comment::find($id);

        return view('form', compact('comment'));
    }

    public function update(request $request ,$id){
       
      $content = $request->input('content');
      DB::update('update comments set content = ? where id = ? ',[$content,$id]);
        return redirect(session('previous_url'));
    }


}
