<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // Category::create($request->validated());
        if ($request->validated()){
            if (Category::where("name",$request->name)->first() == NULL){
                Category::create($request->validated());
                return redirect("/admin/categories/")->with('success','Thêm danh mục thành công');
            } else {
                return redirect("/admin/categories/")->with('error','Danh mục đã tồn tại');
            }
        }
        return redirect("/admin/categories/")->with('success','Thêm danh mục thành công');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id)->first();
        $products = Product::where("category_id",$id)->all();
        return view("admin.category.show",compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        if ($request->validated()){
            if (Category::where("name",$request->name)->first() == NULL){
                Category::where('id',$id)->update([
                    "name"=>$request->name
                ]);

            } else {
                return redirect("/admin/categories/")->with("error","Danh mục đã tồn tại");
            }
        }
        return redirect("/admin/categories/")->with('success','Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
