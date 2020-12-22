<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return CategoryResource::collection(Category::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo($request);
        /*
        

        
        $category = Category::create([
            'name' => $request['name'],
            'path' => $request['path'],
        ]);
        

        
        redirect()->route('post.index')->with('success', '标签「' . $request . '」创建成功.')
        echo $request;
        ->all()
                $this->validate($request, [
            'name'=>'required|min:2',
            'path' =>'required',
        ]);
        */

        
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        
        return ;
    }
}
