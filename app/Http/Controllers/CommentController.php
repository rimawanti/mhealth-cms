<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Pasien;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::paginate(10);
        //return "lla";
        return view('comment/index')->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
          $listpasien = Pasien::pluck('nama', 'id');
          return view('comment.create',compact('$comments','listpasien')); //->with('listpasien',$listpasien);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //store to database
        $comment = new Comment;

        $comment->pasien_id     = $request->pasien_id;
        $comment->tanggal       = $request->tanggal;
        $comment->count_like    =  $request->count_like;
        $comment->isi           =  $request->isi;
        
       
        $comment->save();
        $request->session()->flash('success', 'The data was succesfully saved');

        //redirect to another page
        return redirect()->route('comment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find id
        $comment = comment::find($id);

        //return view
        return view('comment.show')->with('comment',$comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find id
        $comment = Comment::find($id);
        $listpasien = Pasien::pluck('nama', 'id');
          return view('comment.edit', compact ('listpasien','comment')); //->with('listpasien',$listpasien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //store to database
        $comment = Comment::find($id);

        $comment->pasien_id     = $request->input('pasien_id');
        $comment->tanggal       = $request->input('tanggal');
        $comment->count_like    =  $request->input('count_like');
        $comment->isi           =  $request->input('isi');
        
       
        $comment->save();
        $request->session()->flash('success', 'The data was succesfully saved');

        //redirect to another page
        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = comment::find($id);
       // Storage::delete($comment->foto);

        $comment->delete();
        Session::flash('success', 'The data was succesfully deleted');

         //redirect to another page
        return redirect()->route('comment.index');
    }
}
