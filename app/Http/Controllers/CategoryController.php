<?php

namespace App\Http\Controllers;                                // Note:- here we are writing directly FOLDER_NAME instead of . 

use App\Category;                      // Note:- but here we have used file name which is also class name i,e category

use App\Blog;                       // functionality location which we are using
use Illuminate\Http\Request;        // eloquent full laravel functionality which is in vendor folder and cannot be overwrite,mistake of backward slash


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()                     // V.IMP NOTE:- it will show all inputs here
    {
        //
        $categories=Category::paginate(3);      // created variable for using Category MODEL default functionlities,using get or all or paginate method
       
        //dd($categories);
        return view('category.category_index')->withcategories($categories);  // alternatively can use compact and have to pass variable which is created and used in blade pages and withcategories accordance with variable defined at blade pages
                                                                         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.category_create');         // note:- it will take us to store page
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)           // mistake- forget to define variable used in the store function 
    {
        //dd($request);

        $request->validate([
            'name'=>'required|unique:categories,name,',             // mistake of comma happens here
            'description'=>'required'
        ]);                                                          // forget semicolon at last 
        // Mynote:- we have not taken id ,created_at,updated_at i,e they are backend default functionalities
        $category=new category;  //Note:- using new keyword it becomes object now // Also category written after new is nothing but model
        $category->name=$request->name;                 // LHS is what we have in backend and rhs is what we have on blade page i,e frontend
        $category->description=$request->description;

        $category->save();                                                                                              //since we are redirecting and did not have blade page

        session()->flash('success','category created successfully!');         // Note:- 'key','value' concept                                          // session flash type

        return redirect('/categories/index');          
        //dd($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category,$id)    
    {
        //
        $category=Category::withTrashed()->where('id',$id)->first();                                                     // used withTrashed method                         // column name , variable in it  // can also use find method

        return view('category.category_show',compact('category'));                                                      // mistake with compact object opertor not required
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        //
       // $categories=category::find($id);
       $category=Category::where('id',$id)->first();
        //dd($categories);
        return view('Category.category_edit')->withcategory($category);                                                 // mistake see whether it is withcategories or withcategory
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)                                                        // here no such variable with $id is used and also when FORM is used we have to use $request->id
    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]); 
        
        /*$category=Category::where('id',$request->id)->first();     // NOTE:- we used here $request->id
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();                                           
        */
        
        $category=Category::where('id',$request->id)->update(['name'=>$request->name,'description'=>$request->description]);

        session()->flash('success','category updated successfully!');

        return redirect('/categories/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        //
        $category=Category::withTrashed()->find($id);     // Important note:- here only variable required when find method used

        $blog=Blog::where('category_id',$id)->first();             // eventhough using model relationship functionality but for to use variable in if condition we need to define variable i,e category cannot be deleted when it is associated with blog

        if($blog)                                                      //OR if(Count($category->blogs)!=0)                                                                                       // public function and condition no semicolon
        {
            session()->flash("danger","category can't be deleted due to of blog" );                                                   // (category cannot be deleted)is the message
            
        }
        else
        {
            if($category->deleted_at)
            {
                $category->forceDelete();                                                                               // second word is capital
                session()->flash('danger','category permanent deleted!');

            }
           
            else
            {
                $category->delete();   // IMPORTANT:-all words of delete() method is small i,e softdeletes defined in model(because we cannot use softdeletes keyword since,not present in laravel framework or computer by default understand
                session()->flash('danger','category softdeleted!');

            }
        }
        return redirect('/categories/index');
    }

    public function soft_deletes_categories()     // IMPORTANT:- mistake in function(which is to be created ourselves) we write method 
    {       
        $categories=Category::onlyTrashed()->paginate(5);                                                                     // used onlyTrashed method

        return view('Category.soft_deletes_categories',compact('categories'));
    }

    public function soft_deletes_restore( Category $category,$id)
    {
        $category=Category::onlyTrashed()->find($id);

        $category->restore();

        session()->flash('warning','category restored!');
        return redirect('/categories/index');
    }

}
