<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Category;
use App\Mail\ShoppingMail;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // dd(Cart::instance(Auth::user()->id)->content());


        if (Auth::user()) {

            // $product = Product::all();

            $product = null;
            $amount_product = null;
            // dd(Cart::instance(Auth::user()->id)->total());
            foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
                $product = Product::find($cart->id);
                $check_amount = Product::find($cart->id);
                // $amount_product = Product::where('amount', $product->amount)->first();
                // dd($amount_product);
            }

            $category = Category::all();
            return view('page.cart', compact('category', 'product', 'amount_product'));
        } else {
            return view('page.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


            if(empty(Auth::user()->phone) || empty(Auth::user()->address)){
                return redirect()->route('details.profile')->with('error', '
                Please enter phone number or address');
            }
                $i = 0;
            foreach (Cart::content() as $check_amount) {
                $id_product = Product::findOrFail($check_amount->id);
                if (request('qty') > request("check_availability")) {
                    return back()->with('error', 'Nhập sai');
                }
                $i++;
            }
            
            $bool = true;
            foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
                $product = Product::find($cart->id);
                $amountProduct = Product::where('amount', $product->amount)->first();
                if ($cart->qty > $amountProduct->amount) {
                    Cart::instance(Auth::user()->id)->update($cart->rowId, $amountProduct->amount);
                    $bool = false;
                }
            }
            if ($bool == false) {
                return back()->with('error', 'Out of stock can not order');
            }
    
            $oderdetail = array();
    
            if (request('qty') > request('check_availability')) {
                return redirect()->back()->with('error', 'The quantity of products you entered is incorrect');
            } else {
                if (Auth::user()) {
                    $check_user = User::where('email', Auth::user()->email)->first();
    
                    // Check if user current have made a previous purchase
                    if ($check_user == true) {
                        $id_user = $check_user->id;
                    } else {
                        $user = new User();
                        $user->name = Auth::user()->name;
                        $user->email = Auth::user()->email;
                        $user->address = Auth::user()->address;
                        $user->phone = Auth::user()->phone;
                        $user->save();
                    }
                    
                    $data = $request->all();
                    if ($check_user == true) {
                        $data['id_user'] = $id_user;
                        $data['phone']= $check_user->phone;
                        $data['address']= $check_user->address;
                    } else {
                        $data['id_user'] = $user->id;
                        $data['phone']= $user->phone;
                        $data['address']= $user->address;
                    }
                   
                    $data['priceTotal'] = Cart::instance(Auth::user()->id)->priceTotal(0,0, '');
                    // dd($data);
                    $bills = Auth::user()->bills()->create($data);
    
                    $id_order = $bills->id;
                    $bill_detail = [];
    
                    $i = 0;
                    foreach (Cart::instance(Auth::user()->id)->content() as $key => $cart) {
                        $product = Product::find($cart->id);

                        $bill_detail['id_bill'] = $id_order;
                        $bill_detail['id_product'] = $cart->id;
                        $bill_detail['quantity'] = $cart->qty;
                        $bill_detail['price'] = $cart->price;
                        $oderdetail[$key] = BillDetail::create($bill_detail);
                        $amountProduct = Product::where('amount', $product->amount)->first();

                        $amountProduct->amount -= $cart->qty;
                        $amountProduct->save();
                    }
                    // dd($amountProduct);
    
                    Mail::to($check_user->email)->send(new ShoppingMail($bills, $oderdetail));
                    Cart::instance(Auth::user()->id)->destroy();
                    return redirect()->route('gumdamstore')->with('success', 'Order Success');
                } else {
                    return redirect()->route('login');
                }
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

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
        $amount = Cart::instance(Auth::user()->id)->get($id)->id;
        if ($request->ajax()) {
            if (request('qty') <= 0) {
                return response()->json(['error' => 'Minimum quantity is 1']);
            }
            $product = Product::find($amount);
            // $products = Product::findOrfail($amount);
            if (request('qty') > $product->amount) {
                return response()->json(['error' => "Quantity of <b>$product->name</b> is less than"]);
            }
            Cart::instance(Auth::user()->id)->update($id, request('qty'));
            return response()->json(['result' => 'Update quantity success']);
        }
    }

    public function saveListItemCart(Request $request, $id, $qty)
    {
        $id_cart = Cart::instance(Auth::user()->id)->get($id);
        $id_product = Product::findOrFail($id_cart->id);
        $amountProduct = Product::where('amount', $id_product->amount)->first();


        if ($request->ajax()) {
            if (($qty > $amountProduct->amount)) {
                Cart::instance(Auth::user()->id)->update($id, $amountProduct->amount);
                return response()->json([
                    'status' => 'Wrong',
                    'msg' => 'Error'
                ]);
            }
        }

        if ($qty < 1) {
            $amount = Cart::instance(Auth::user()->id)->get($id);
            $qtyy = $amount->qty;
            Cart::instance(Auth::user()->id)->update($id, $qtyy);
        }else{
            Cart::instance(Auth::user()->id)->update($id, $qty);

        }

        $product = null;
        $amount_product = null;

       foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
            $product = Product::find($cart->id);
            $check_amount = Product::find($cart->id);
            $amount_product[]= Product::where('amount', $product->amount)->sum('amount');
        }

        $category = Category::all();
        return view('page.cartajax', compact('category', 'product', 'amountProduct', 'amount_product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $cart = Cart::find($id);
        Cart::instance(Auth::user()->id)->destroy();
        return back()->with('success', "Cart $cart->name delete!");
    }


    public function addCartPost($id, $qty, Request $request)
    {
        if (Auth::user()) {

            $product = Product::findOrFail($id);
            $bool = true;
            $total = $qty;
            $amountProduct = Product::where('amount', $product->amount)->first();
            // dd($amountProduct);


            foreach (Cart::instance(Auth::user()->id)->content() as $item) {
                if ($item->qty == $request['qty']) {
                    $total = $item->qty;
                    if ($total > $amountProduct->amount) {
                        $bool = false;
                    }
                }
            }
            // dd(Cart::instance(Auth::user()->id)->content());

            // dd($total);
            if ($request->ajax()) {
                if ($qty > $amountProduct->amount || $bool == false || $qty < 1) {
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'Error'
                    ]);
                }
            }

           
                $price = $product->price;
            Cart::instance(Auth::user()->id)->add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $total,
                'price' => $price,
                'weight' => 0,
                'taxRate' => 0,
                'options' => [
                    'img' => $product->image,


                ]
            ]);

            return view('page.partials.header_ajax');
        } else {
            return redirect()->route('login');
        }
    }

    public function deleteCart($id)
    {
        Cart::instance(Auth::user()->id)->remove($id);
        return view('page.cart');
    }
    public function deleteListCart($id, Request $request)
    {
        Cart::instance(Auth::user()->id)->remove($id);

        $product = null;
        $amount_product = null;
            foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
                $product = Product::find($cart->id);
                $check_amount = Product::find($cart->id);
                $amount_product[] = Product::where('amount', $product->amount)->sum('amount');
            }
    
            $types = Category::all();
        if($amount_product){

            return view('page.cart', compact('product', 'types','amount_product'));
        }
        else{
            return redirect()->route('cartt.index');
        }
        
    }

    public function updatedeleteCart(Request $request)
    {
        $product = null;
        $amount_product = null;
        foreach (Cart::instance(Auth::user()->id)->content() as $cart) {
            $check = $product[] = Product::find($cart->id);
        }
        return view('page.cartajax', compact('product'));
    }

    
}
