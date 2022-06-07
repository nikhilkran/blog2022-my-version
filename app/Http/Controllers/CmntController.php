<?php

namespace App\Http\Controllers;

use App\cmnt;
use App\Blog;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CmntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cmnts=cmnt::paginate(20);     
    
        //dd($categories);
        return view('cmnt.cmnt_index',compact('cmnts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blogs=Blog::all();                             // since used blogId variable in route  
        return view('cmnt.cmnt_create',compact('blogs')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // calling from create page and then going to routes in web.php

    public function store(Request $request)
    {
        //
        $cmnt= new cmnt;     
        
        $cmnt->cmnt=$request->comment;
        $cmnt->blog_id=$request->blog;
        $cmnt->user_id=Auth::id();

        $cmnt->file_path=$this->add_media($request->file('image'));    // left one i,e file_path is column in DB
        
        $slug=str_replace(' ','$',strtolower($request->cmnt));
        $random=Str::random(5);
        $cmnt->slug=$slug.$random;   

        //dd($cmnt);
        $cmnt->save();
        return redirect()->route('cmnt_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cmnt  $cmnt
     * @return \Illuminate\Http\Response
     */
    public function show(cmnt $cmnt,$slug)
    {
        //
        
        $cmnt=cmnt::where('slug',$slug)->first();
        //dd($cmnt);  
        return view('cmnt.cmnt_show',compact('cmnt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cmnt  $cmnt
     * @return \Illuminate\Http\Response
     */
    public function edit(cmnt $cmnt,$id)
    {
        //
        $cmnt=cmnt::where('id',$id)->first();  
        $blogs=Blog::all();
        return view('cmnt.cmnt_edit',compact('cmnt','blogs'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cmnt  $cmnt
     * @return \Illuminate\Http\Response
     */


    // calling from edit page and then going to routes in web.php


    public function update(Request $request, cmnt $cmnt)
    {
        //
        $cmnt=cmnt::where('id',$request->id)->first();
        $cmnt->cmnt=$request->comment;
        $cmnt->blog_id=$request->blog;
        $cmnt->user_id=Auth::id();

        $slug=str_replace(' ','$',strtolower($request->cmnt));
        $random=Str::random(5);
        $cmnt->slug=$slug.$random;

        $cmnt->save();
        return redirect('/cmnts/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cmnt  $cmnt
     * @return \Illuminate\Http\Response
     */
    public function destroy(cmnt $cmnt,$id)
    {
        //
        $cmnt=cmnt::find($id);
        $cmnt->delete();
        session()->flash('warning','cmnt deleted!');
        return redirect('/cmnts/index');
    }
    public function add_media($file)  
    {
        $tempName=time();
        $extension=$file->getClientOriginalExtension();
        $fileName=$tempName.'.'.$extension;
        $path = $file->move('cmnt',$fileName);     // note:- inside blog by filename
        // dd($path);
        return $path;
    }
}

