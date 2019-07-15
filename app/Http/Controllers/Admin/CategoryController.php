<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Validator;
use Redirect;
use View;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    public function fetch()
    {
        $categories = Category::where('parent','=',  NULL)->orderBy('updated_at', 'desc')->paginate(500);
        return response()->json($categories);
       
    }
    public function fetchsubcat($id)
    {
        $subcategories = Category::Where('parent','=',$id)->orderBy('updated_at', 'desc')->paginate(500);
        return response()->json($subcategories);

    }
    public function fetchsubsubcat($id)
    {
        $subcategories = Category::Where('parent','=',$id)->orderBy('updated_at', 'desc')->paginate(500);
        return response()->json($subcategories);

    }
    public function fetchsubs($id)
    {
        $subcategories = Category::Where('parent','=',$id)->orderBy('updated_at', 'desc')->paginate(500);
        return response()->json($subcategories);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request['name']);
        Log::info($request['description']);
        Log::info($request['parent']);
            
            $category = Category::create([
                'name'=>$request['name'],
                'description'=>$request['description'],
                'parent'=>$request['parent'],
                
            ]);
            return response()->json(['success' => 'success'],200);
            

       

       
        
    }
    public function delete(Category $id)
    {
        $id->delete();
        return response()->json(['key' => 'value'], 200);
    //return response()->json(['key' => 'value'], 503);
     }
     public function search(Request $request)
     {
 
         if (isset($request->id)){
             $data = Category::where('id','like','%'.$request->id.'%')->paginate(7);
         }
         if (isset($request->name)){
             $data = Category::where('name','like','%'.$request->name.'%')->paginate(7);
         }
         if (isset($request->title)){
             $data = Category::where('parent','like','%'.$request->parent.'%')->paginate(7);
         }
 
         return response()->json($data);
     }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
