<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tag=Tag::paginate(2);
        //dd($tags);
        return view('tag.tag_index')->withtags($tag);                               // mistake withtags is what we used in foreach loop
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tag.tag_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $tag=new tag;
        $tag->name=$request->name;
        $tag->description=$request->description;
        $tag->save();
        session()->flash('success','tag created successfully!');
    
        return "tag created successfully!";                 // Note:- whenever we use return use double codes and without round parenthesis
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tags,$id)
    {
        //
        $tag=Tag::withTrashed()->where('id',$id)->first();           

        return view('tag.tag_show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag,$id)
    {
        //
        $tag=Tag::where('id',$id)->first();
        //dd($tags);

        return view('tag.tag_edit')->withtag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $request->validate([
            'name'=>'required|unique:tags,name,' .$request->id,                                                         // mistake after name , within single quotes
            'description'=>'required'
        ]); 

        $tag=Tag::where('id',$request->id)->first();
        $tag->name=$request->name;
        $tag->description=$request->description;
        $tag->save();
        
        
        //$tag=Tag::where('id',$request->id)->update(['name'=>$request->name,'description'=>$request->description]);
        session()->flash('success','tag updated successfully!');

        return redirect('/tags/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag,$id)
    {
        //
        $tag=Tag::withTrashed()->where('id',$id)->first();

        if($tag->deleted_at)                                                     // here dealing with DB
        {
            $tag->forceDelete();                                                  //permanent delete
            session()->flash('danger','tag deleted Permanently!');
        }
        else
        {
            $tag->delete();                                                       //soft delete (important)
            session()->flash('danger','Tag softdeleted!');
        }
       

       return redirect('/tags/index');           // mistake:- cannot use  return redirect()->back();
                                                // but can use return redirect()->route('t_index');
    }

    public function soft_deletes_tags()
    {
        $tags=Tag::onlyTrashed()->paginate(5);

    return view('tag.soft_deletes_tags',compact('tags'));
    }

    public function soft_deletes_restore($id)
    {
        $tag=Tag::onlyTrashed()->find($id);
        $tag->restore();
        session()->flash('warning','tags restore successfully!');
        return redirect('/tags/index');
    }
}

    

    
