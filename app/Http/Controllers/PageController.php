<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $query = Product::with('category');
        
        // Lọc theo tên nếu có
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
    
        // Lọc theo giá nếu có
        if ($request->has('price')) {
            $price = $request->price;
            if ($price == 500000) {
                $query->where('price', '<', 500000);
            } elseif ($price == 1000000) {
                $query->whereBetween('price', [500000, 1000000]);
            } elseif ($price == 1500000) {
                $query->whereBetween('price', [1000000, 1500000]);
            } elseif ($price == 'over_1500000') {
                $query->where('price', '>', 1500000);
            }
        }
    
        $query->where("status", 1);
        $products = $query->orderBy("id", "DESC")->paginate(3);
    
        return view('user.page.index', compact('products'));
    }
    

    public function detail(string $id){
        $product = Product::with("category")->find($id)->first();
        return view("user.page.detail",compact('product'));
    }
    public function category(string $id){
        $products = Product::where("category_id",$id)->where('status',1)->paginate(3);
        return view('user.page.index',compact('products'));
    }
    public function forbidden(){
        http_response_code(403);
        return view("user.page.forbidden");
    }
}
