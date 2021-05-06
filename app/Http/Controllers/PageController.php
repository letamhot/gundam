<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Category;
use App\Models\Size_product;
use App\Models\Product;
use App\Models\Producer;
use App\Models\Slide;
use App\Models\Bill;
use App\Models\MessageCenter;
use App\Models\BillDetail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;


class PageController extends Controller
{

    public function home(Request $request)
    {
        // Cart::destroy();
        // dd(Cart::content());
        $types = Category::all();
        $type = Category::where('id', '>', 0)->first();
        $type1 = Category::where('id', '>', 1)->get();
        // $id_product = Product::findOrfail($id);

        $products = Product::all();
        $product1 = Product::take(3)->get();
        $product2 = Product::where('id', '>', 3)->get();
        // dd($product2);
        $producers = Producer::all();
        $slides = Slide::where('id', '>', 0)->first();
        $slides1 = Slide::where('id', '>', 1)->get();


        return view('page.home', compact('types', 'type', 'type1', 'slides1', 'product1', 'product2', 'products', 'producers', 'slides'));
    }

    public function find_bill($id)
    {
        $id = Crypt::decrypt($id);
        $code_bills = Bill::withTrashed()->findOrFail($id);
        if (!Auth::user()) {
            return redirect()->route('home')->with('toast_error', 'You must log in to see your order !');
        } elseif ((Auth::user()->username == $code_bills->customers->username) || Auth::check()) {
            $code_bills_detail = BillDetail::withTrashed()->where('id_bill', $code_bills->id)->get();
            return view('fashi.code_bill', compact('code_bills', 'code_bills_detail'));
        } else {
            return redirect()->route('home')->with('toast_error', 'Invoice code or account is incorrect');
        }
    }


    // public function cart(Request $request)
    // {
    //     if (Auth::user()) {

    //         $product = null;
    //         $amount_product = null;
    //         foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
    //             $product[] = Product::find($cart->id);
    //             $check_amount = Product::find($cart->id);
    //             // $amount_product[] = Size_Product::where('id_size', $cart->options->size)->where('id_product', $cart->id)->sum('qty');
    //         }
    //         // dd($amount_product);
    //         return view('page.cart', compact('category', 'product', 'size_product', 'amount_product'));
    //     } else {
    //         return view('page.login');
    //     }
    // }
    public function findbill($id)
    {
        $id = Crypt::decrypt($id);
        $code_bills = Bill::withTrashed()->findOrFail($id);
        if (!Auth::user()) {
            return redirect()->route('pageHome')->with('toast_error', 'You must log in to see your order !');
        } elseif ((Auth::user()->name == $code_bills->customer->name) || Auth::check()) {
            $code_bills_detail = BillDetail::withTrashed()->where('id_bill', $code_bills->id)->get();
            return view('page.code_bill', compact('code_bills', 'code_bills_detail'));
        } else {
            return redirect()->route('pageHome')->with('toast_error', 'Invoice code or account is incorrect');
        }
    }
    public function blogsingle()
    {
        $products = Product::all();
        $types = Category::all();
        return view('page.blog-single', compact('types', 'products'));
    }
    public function shop()

    {
        $products = Product::orderBy('name', 'asc')->paginate(5);
        // dd($products);
        // $size_product = Size_product::all();
        // $categories = Category::where('slug', $id_product->slug)->paginate(5)->first();


        $category = Category::all();
        return view('page.shop', compact('category', 'products'));
    }
    
    public function checkout()
    {
        $products = Product::all();
        $types = Category::all();
        return view('page.checkout', compact('types', 'products'));
    }
    public function productdetail($id)
    {
        $id_product = Product::findOrfail($id);
        // dd($id_product);
        $amountProduct = Product::where('amount', $id_product->amount)->first();
        $categories = Category::where('slug', $id_product->slug)->paginate(5)->first();

        $products = Product::all();
        $category = Category::all();
        $product1 = Product::take(3)->get();
        $product2 = Product::where('id', '>', 3)->get();
        $comment = Comment::where('comment', $id_product->id)->first();
        // dd(Comment::where('comment', $id_product->id)->count('comment'));



        return view('page.product-detail', compact('comment', 'id_product','categories',  'category', 'products', 'product1', 'product2', 'amountProduct'));
    }
     public function categoryDetail($slug){
        $categories = Category::all();
        $products = Product::all();

        $category = Category::where('slug', $slug)->paginate(5)->first();
        $id_product = Product::findOrfail($category->id);

        // dd($category);
        $product1 = Product::take(3)->get();
        $product2 = Product::where('id', '>', 4)->get();
        return view('page.category-detail', compact('category','products','categories','id_product', 'product1', 'product2'));
        }        
    public function contact()
    {
        $products = Product::all();
        $types = Category::all();
        return view('page.contact-us', compact('types', 'products'));
    }
    public function error()
    {
        $products = Product::all();
        $types = Category::all();
        return view('page.404', compact('types', 'products'));
    }
    public function getDetailProduct($id)
    {
        $productKey = 'product_' . $id;

        if (!Session::has($productKey)) {
            Product::where('id', $id)->increment('view_count');
            Session::put($productKey, 1);
        }

        $product = Product::find($id);
        $id_product = Product::find($id);
        $related_product = Product::where('id_type', $product->id_type)->where('amount', '<>', 0)->where('id', '<>', $product->id)->inRandomOrder()->paginate(8);
        $id_type = Category::find($id);
        return view('page.detail_product', compact('product',  'related_products', 'id_product'));
    }
}
