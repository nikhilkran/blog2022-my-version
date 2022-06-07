<?php

namespace App\Http\Controllers;

use App\Blog;


use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)           // IMPORTANT Always MAIN VARIABLE is defined here
    {
        //
        
        //dd($request);
        $search=$request->searchBN ?$request->searchBN : '';
        
        // $blogs=Blog::search('name',$search)->get();
        $blogs=Blog::search('name',$search)->paginate(5);  // url little changes in frontend  // IMPORTANT name is column and $search is variable
        //dd($blog);                                            // IMPORTANT after action comes dump and die functionality                                                      
        return view('blog.index',compact('blogs','search'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mistake:- $blogs not required here
        $categories=Category::all();                // can also use get(); instead of all();
        $tags=Tag::all();

        return view('blog.create',compact('categories','tags'));  // Mistake:- blogs not come in compact() function also
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name'=>'required|unique:blogs,name|min:5,',
            'category'=>'required',
            'tags'=>'required',
            'content'=>'required'
        ]);
        
        
        $blog= new blog;
        $blog->name=$request->name;           //LEARN       // IMPORTANT- first name is column name (DB) and second is what we have to form through request i,e what used in name="" on blade page                                                              
        $blog->content=$request->content;                                                                                  
        $blog->category_id=$request->category;                                                                              

        $blog->file_path=$this->add_media($request->file('image'));  // $this is used for to call function which is not defined in current function , don't forget to add type of image
        
        $slug=str_replace(' ','$',strtolower($request->name));        // IMPORTANT $ comes inplace of space
        $random=Str::random(5);
        $blog->slug=$slug.$random;     // slug is db column

        $blog->save();                                                                   

        $blog->tags()->sync($request->tags);     // comes here only i,e after save() function // IMPORTANT sync is required for blog_tag(alphabetical order) relationship table created in db

        return redirect()->route('b_index'); 
        // return redirect()->back();                                                           
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug) // IMPORTANT variable can be $slug i,e can be taken anything but same have to be use everywhere including in route
        {
        //
        $blog=Blog::where('slug',$slug)->withTrashed()->first();  
        return view('blog.show',compact('blog'));
       /* if($blog)
            return view('Blog.show',compact('blog'));
        else
        {
            session()->flash('warning','Blog not found');
            return redirect()->route('b_index');
        }*/
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        
        // $blogs=Blog::where('id',$id)->first();   // Note:- no need to fetch data for blog by id since we have declare blog as a variable in our route 
        //dd($blog);
        $categories=Category::all();
        $tags=Tag::all();
        return view('blog.edit',compact('blog','categories','tags'));
    
        
        
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
       
        $request->validate([

            'name'=>'required|unique:blogs,name,'.$blog->id.'|min:5',    // mistake:- after name , necessary
            'category'=>'required',
            'tags'=>'required',
            'content'=>'required',
        ]);

        /* IMPORTANT- since using blog as variable in route
        $blog=Blog::where('id',$request->id)->first();
        $blog->name=$request->name;
        $blog->category_id=$request->category;
        $blog->content=$request->content;
        $blog->save();                                           
        
        or
        $blog=Blog::where('id',$request->id)->update(['name'=>$request->name,'description'=>$request->description]);*/
        

        $blog->name=$request->name;
        $blog->category_id=$request->category;
        $blog->content=$request->content;

        if($request->file('image'))   //Mistake- forget to add type of image
        {
            if ($blog->file_path)
            $result=$this->delete_image($blog->id); // only this line is executed after condition if nothing mention , for to delete existing image from path if new is added to existing one
                         
            $blog->file_path=$this->add_media($request->file('image'));  
        }
        //   dd($blog);
        $slug=str_replace(' ','$',strtolower($request->name));      // Mistake- FORGET TO DEFINE SLUG here since we are updating hence have to define here also
        $random=Str::random(5);
        $blog->slug=$slug.$random;
        
        $blog->save();

        $blog->tags()->sync($request->tags);

        session()->flash('success','Blog updated successfully');

        return redirect()->route('b_index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog,Request $request)
    {
        //
        $blog=Blog::withTrashed()->find($request->blog_id);           // can use where() and first () or find() // note:- we have defined blog_id in our blade pages

        //dd($blog);
        if($blog->deleted_at)
        {
            $blog->forceDelete();                                    // here delete means permanent delete
            session()->flash('danger','Blog Deleted Permanently!');
        }
        else
        {
            $blog->delete();                                       //here delete means softdelete
            session()->flash('danger','Blog softdeleted!');
        }
        return redirect()->back();
    }
    public function soft_deletes_blogs(Blog $blog,Request $request)
    {   
        $search=$request->searchBN ?$request->searchBN : '';   // Mistake:-have to define search whereever have to use 
        $blogs=Blog::search('name',$search)->onlyTrashed()->paginate(5);

        $type="nikhil";  
        // used for to not use things which is not defined,since we have used index page of blog for soft deleted page                                                       

        return view('blog.index',compact('blogs','type','search'));
    }

    public function soft_deletes_restore( Blog $blog,$id)
    {
        $blog=Blog::onlyTrashed()->find($id);

        $blog->restore();

        session()->flash('warning','blog restored!');
        return redirect('/blogs/index');
    }

    // used add_media and delete_image function in other functions

    public function add_media($file)                  
    {
        
        $tempName=time();     // Important:- taken time()function as name which changes automatically with time
        $extension=$file->getClientOriginalExtension();

        $fileName=$tempName.'.'.$extension;
        //$path = $file->storeAs('public/Blog',$fileName);                                                            
        //$path = $file->move(base_path('Blog'),$fileName);
        //$path = $file->move(public_path('Blog'),$fileName);
        $path = $file->move('Blog',$fileName);    // note:- Automatically creates path to your directory, blog is table name not column name
        // dd($path);
        return $path;
    }

    public function delete_image($id)
    {
        $blog=Blog::findOrFail($id);                                

        $filename = public_path($blog->file_path);
        unlink($filename);

        $blog->file_path="";
        $blog->save();

        return redirect()->back();
    }


        
}
