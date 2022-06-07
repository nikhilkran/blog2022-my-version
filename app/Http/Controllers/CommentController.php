<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

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
        $comments=Comment::all();                                // defined variable comments which is have to use on bladepage
        return view('comment.comm_index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comment.comm_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
       /* $request->validate([
            'name'=>'required|unique:categories,name,',             // mistake of comma happens here
            'email'=>'required'
        ]);*/      
        $comment=new comment;
        $comment->name=$request->name;   // mistake interchange of object operator with = sign
        $comment->email=$request->email;
        
        // dd($comment);
        $comment->save();
        session()->flash('success','comment created successfully!');
        return redirect()->route('c_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment,$id)
    {
        //
        $comment=comment::where('id',$id)->first();
        return view('comment.comm_show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment,$id)
    {
        //
       $comment=Comment::where('id',$id)->first();                          //note:- whenever variable problem arises it always assumes controller true and point out at blade page
       return view('comment.comm_edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
        $comment=comment::where('id',$request->id)->update(['name'=>$request->name,'email'=>$request->email]);
        session()->flash('success','comment updated successfully!');
        return redirect()->route('c_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment,$id)
    {
        //
        $comment=comment::where('id',$id)->first();
        $comment->delete();
        return redirect()->route('c_index');
    }
}
