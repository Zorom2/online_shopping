<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

use Session;
use App\Cart;

class FrontController extends Controller
{
    public function categoryView()
    {
        $category_id        = request()->id;

        $products           = Product::where("category_id", "=",$category_id)->get();

        return view('front.view-product',compact('products'));
    }

    public function detailView()
    {
        $product_id         = request()->id;
        
        $product            = Product::find($product_id);

        return view('front.detail-product',compact('product'));
    }

    public function getAddToCartQty(Request $request)
    {
        $pid        = request()->id;
        $pqty       = request()->pqty;        
        $item       = Product::find($pid);
       
        $oldCart     = Session::has('cart') ? Session::get('cart') : null;

        $cart        = new Cart($oldCart);

        $cart->addQty($item, $pid, $pqty);

        $request->session()->put('cart',$cart);

        return back()->with('info',"Product added to Cart Successfully !");
    }

    public function getCart(Request $request)
    {
        if(!Session::has('cart'))
        {
            return view('front.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart    = new Cart($oldCart);

        return view('front.shopping-cart', [     'products'        => $cart->items, 
                                                'totalPrice'      => $cart->totalPrice,
                                                'totalQty'        => $cart->totalQty,
                                         ]);
    }

    public function getSubToCart(Request $request)
    {
        $id         = request()->id;
        $item       = Product::find($id);

        $oldCart    = Session::has('cart') ? Session::get('cart'): null;
        $cart       = new Cart($oldCart);

        $cart->sub($item, $id);

        $request->session()->put('cart',$cart);

        return back();
    }

    public function getAddToCart(Request $request)
    {
        $id         = request()->id;
        $item       = Product::find($id);

        $oldCart    = Session::has('cart') ? Session::get('cart'): null;
        $cart       = new Cart($oldCart);

        $cart->add($item, $id);

        $request->session()->put('cart',$cart);

        return back();
    }
    
    public function getRemoveFromCart(Request $request)
    {
        $id         = request()->id;
        $item       = Product::find($id);

        $oldCart    = Session::has('cart') ? Session::get('cart'): null;
        $cart       = new Cart($oldCart);

        $cart->remove($item, $id);

        $request->session()->put('cart',$cart);

        $checkcart = $request->session()->get("cart");
        if($checkcart->totalQty == 0)
        {
            return redirect('/product/clearCart');
        }

        return back();
    }

    public function getClearCart(Request $request)
    {
        if(session::has('cart'))
        {
            $request->session()->forget('cart');

            return redirect("/");
        }
        else
        {
            return redirect("/");
        }
    }

    public function getOrder(Request $request)
    {
        if(!Session::has('cart'))
        {
            return redirect("/");
        }


        $oldCart = Session::get('cart');
        $cart    = new Cart($oldCart);


        $order = new Order();
            
            $order->user_id        = auth()->user()->id;
            $order->totalPrice     = $cart->totalPrice;         
            $order->totalQty       = $cart->totalQty;
            $order->status         = "";           
            $order->remark         = "";           
         
        $order->save();


        $products = $cart->items;


        foreach($products as $product)         
        {           
            $orderitem = new OrderItem();

            
                    $orderitem->order_id          = $order->id;
                    $orderitem->user_id           = auth()->user()->id;                 
                    
                    $orderitem->product_id        = $product['item']['id'];
                    $orderitem->name              = $product['item']['name'];
                    $orderitem->price             = $product['item']['price'];
                    $orderitem->qty               = $product['qty'];               
                    $orderitem->amount            = $product['item']['price'] * $product['qty']; 
                    $orderitem->status            = "";                   
                    $orderitem->remark            = "";                   
                 
            $orderitem->save();

        }


        $order      = Order::find($order->id);
        $orderitems = OrderItem::where('order_id','=',$order->id)->get();

        if(Session::has('cart'))
        {
            $request->session()->forget('cart');
        }

        return view('boucher',compact('order','orderitems'));
    }

    public function getPayment(Request $request)
    {

        $order_id       = request()->order_id;
       
        $payment_amount = Order::where("id","=","$order_id")->value("totalPrice");

        return view('payment',compact('order_id','payment_amount'));
    }

    public function createPayment(Request $request)
    {
        $order_id           = request()->order_id;
        $amount             = request()->payment_amount;
        $phone              = request()->phone;
        $transaction        = request()->transaction;
        $payment_method     = request()->payment_method;

        $payment = new Payment();

            $payment->order_id      = $order_id;
            $payment->amount        = $amount;
            $payment->phone         = $phone;
            $payment->transaction   = $transaction;
            $payment->payment_method= $payment_method;

        $payment->save();

        return redirect("/")->with('info',"အားပေးမှုကို ကျေးဇူးတင်ပါသည်");

    }
}
