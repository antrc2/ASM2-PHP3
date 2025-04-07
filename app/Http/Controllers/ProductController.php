<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('category')
        ->whereHas('category', function ($q) {
            $q->where('status', 1); // chỉ lấy category có status khác 0
        });
        if ($request->has('search')){
            $query->where('name','like','%'.$request->search.'%');
        }
        $products = $query->orderBy('id','desc')->paginate(5);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where("status",1)->get();
        return view("admin.product.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        if ($data){
            if (Product::where("name",$request->name)->first() == NULL){
                if ($request->hasFile('image')){
                    $data['image'] = $request->file('image')->store('products','public');
                }
                Product::create($data);
                return redirect("/admin/products/")->with("success","Thêm sản phẩm thành công");
            } else {
                return redirect("/admin/products/")->with("error","Sản phẩm đã tồn tại");
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id',$id)->first();
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where("id",$id)->first();
        $categories = Category::where("status",1)->get();
        return view("admin.product.edit",compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {   
        $data = $request->validated();
        if (Product::where('name',$request->name)->where('id',"!=",$id)->first() == NULL){
            if ($request->hasFile('image')){
                $data['image'] = $request->file('image')->store('products','public');
            }
            Product::where('id',$id)->update($data); 
            return redirect('/admin/products')->with('success',"Sửa sản phẩm thành công");
        } else {
            return redirect('/admin/products')->with('error',"Sản phẩm đã tồn tại");
        }
        
        
        // return redirect()->route('products.index')->with('success','Sửa thành công');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where("id",$id)->update([
            "status"=>0
        ]);
        return redirect('/admin/products')->with("success","Xóa sản phẩm thành công");
    }
    public function undo(string $id){
        Product::where('id',$id)->update([
            'status'=>1
        ]);
        return redirect('/admin/products')->with("success","Hoàn tác sản phẩm thành công");
    }
}
