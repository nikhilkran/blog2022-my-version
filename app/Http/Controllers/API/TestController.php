<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;    // this extra comes here
use Illuminate\Http\Request;
use App\Category;



class TestController extends Controller
{
    //
    private function response($msg,$data,$code){
    
        if($data){
        
            $status='success';
            return['status'=>$status,'message'=>$msg,'data'=>$data,'code'=>$code];  // status,message,data,code are keys
        }
        else
        {
            $status='failed';
            return['status'=>$status,'message'=>$msg,'data'=>$data,'code'=>$code];
        }
    }

    public function index(Request $request){     // here method allowed is get or post only

    $category=Category::all();
    $abc=$this->response('Category List',$category,'1000');  // Mistake of passing string as it is using single or double codes
    return $abc;                                // note:- Mistake before going to postman for testing api's start local development server by php artisan serve command
    }

    public function insert_category_through_api(Request $request)
    {
        // dd( $request);
        $xyz=new Category;
        $xyz->name=$request->name;
        $xyz->description=$request->description;
        $xyz->save();
    }

    public function show(Request $request)
    {
    $abc=Category::where('id',$request->id)->first();
    $pqr=$this->response('Category','$abc','1000');
    return $pqr;   // return $this->response('Category','$abc','1000);  // when private function response is not used return['status'=>$status,'message'=>$msg,'data'=>$data,'code'=>$code]; 
    }
}
