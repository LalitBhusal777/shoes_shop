<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $latestProducts = Product::latest()->limit(3)->get();
        return view('home', compact('latestProducts'));
    }

    public function product()
    {
        $latestProducts = Product::latest()->limit(3)->get();
        return view('product', compact('latestProducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function categoryProducts($catid)
    {
        $category = Category::find($catid);

        if (!$category) {
            abort(404, 'Category not found');
        }

        $products = Product::where('category_id', $catid)->paginate(3);
        return view('categoryproducts', compact('products', 'category'));
    }

    public function viewProduct($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            abort(404, 'Product not found');
        }
    
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $id)
                                  ->get();
    
        return view('viewproduct', compact('product', 'relatedProducts'));
    }
    

    public function myProfile()
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized access');
        }

        $orders = Order::where('user_id', $user->id)->get();
        return view('myprofile', compact('orders'));
    }
}
