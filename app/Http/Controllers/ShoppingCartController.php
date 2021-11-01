<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use stdClass;

class ShoppingCartController extends Controller
{
    public function setCookie(Request $request){
        $id = $request->get('id');
        $event = Event::find($id);
        $array = []; // ít nhất phải là một mảng rỗng
        if (Session::has('recent_view')){ // kiểm tra sự tồn tại của session cũ
            $array = Session::get('recent_view'); // lưu lại vào session
        }
        array_push($array,$id);
        Session::put('recent_view',$array);
//        return "setCookie name = ${name}";
        return redirect('/demo/get-cookie');
    }

    public function getCookie(){
        return Session::get('recent_view');
    }
//////////////////////
    public function getProduct(){
        $products= Product::all();
        return view('client.demo.list',['products'=>$products]);
    }

    public function getProductDetail($id){
        $product= Product::find($id);
        $array = []; // ít nhất phải là một mảng rỗng
        if (Session::has('recent_view')){ // kiểm tra sự tồn tại của session cũ
            $array = Session::get('recent_view'); // lưu lại vào session
        }
        // kiểm tra có sản phẩm chưa
        if (!in_array($id,$array)){
            // nếu chưa thì thêm vào
            // nếu nếu size quá lớn thì remove phần tử đầu tiên
            if (sizeof($array) >= 3){
                array_shift($array);
            }
            array_push($array,$id);
        }
        Session::put('recent_view',$array);
        return view('client.demo.detail-product',['product'=>$product]);
    }

    public function getRecentView(){
        if (Session::has('recent_view')){
            $products= Product::findMany(Session::get('recent_view'));
            return view('client.demo.list',['products'=>$products]);
        }
        return "have no recent product";
    }

    ////////////////////////////////

    public function show(){
        // kiểm tra sự tồn tại của shopping cart trong session.
        $shoppingCart = null;
        // nếu có shopping cart rồi thì lấy ra
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            // nếu chưa có thì tạo shopping cart mới.
            $shoppingCart = [];
        }
        return view('client.demo.products', [
            'shoppingCart' => $shoppingCart
        ]);
    }

    // Thêm sản phẩm vào giỏ hàng kèm số lượng sản phẩm.
    public function add(Request $request)
    {
        // lấy thông tin sản phẩm.
        $productId = $request->get('id');
        // lấy số lượng sản phẩm cần thêm vào giỏ hàng.
        $productQuantity = $request->get('quantity');
        if($productQuantity <= 0){
            return view('client.demo.404quantity', [
                'msg' => 'Số lượng sản phẩm cần lớn hơn 0.'
            ]);
        }
        // 1. Kiểm tra sự tồn tại của sản phẩm.
        $obj = Product::find($productId);
        // nếu không tồn tại thì trả về 404.
        if ($obj == null) {
            return view('client.demo.404product', [
                'msg' => 'Không tìm thấy sản phẩm'
            ]);
        }
        // nếu có sản phẩm trong db.
        // 2. Check số lượng tồn kho. Nếu như số lượng mua lớn hơn số lượng trong kho thì báo lỗi.

        // kiểm tra sự tồn tại của shopping cart trong session.
        $shoppingCart = null;
        // nếu có shopping cart rồi thì lấy ra
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            // nếu chưa có thì tạo shopping cart mới.
            $shoppingCart = [];
        }
        // kiểm tra sản phẩm có tồn tại trong giỏ hàng không.
        if (array_key_exists($productId, $shoppingCart)) {
            // nếu có sản phẩm rồi thì update số lượng
            $existingCartItem = $shoppingCart[$productId];
            // tăng số lượng theo số lượng cần mua thêm.
            $existingCartItem->quantity += $productQuantity;
            // và lưu lại vào đối tượng shopping cart.
            $shoppingCart[$productId] = $existingCartItem;
        } else {
            // nếu chưa có tạo ra một cartItem mới, có thông tin trùng với thông tin sản phẩm từ
            // trong database.
            $cartItem = new stdClass();
            $cartItem->id = $obj->id;
            $cartItem->name = $obj->description;
            $cartItem->unitPrice = $obj->price;
            $cartItem->quantity = $productQuantity;
            // đưa cartItem vào trong shoppingCart.
            $shoppingCart[$productId] = $cartItem;
        }
        // update thông tin shopping cart vào session.
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }

    public function update(Request $request)
    {
        // lấy thông tin sản phẩm.
        $productId = $request->get('id');
        // lấy số lượng sản phẩm cần thêm vào giỏ hàng.
        $productQuantity = $request->get('quantity');
        if($productQuantity <= 0){
            return view('client.demo.404quantity', [
                'msg' => 'Số lượng sản phẩm cần lớn hơn 0.'
            ]);
        }
        // 1. Kiểm tra sự tồn tại của sản phẩm.
        $obj = Product::find($productId);
        // nếu không tồn tại thì trả về 404.
        if ($obj == null) {
            return view('client.demo.404product', [
                'msg' => 'Không tìm thấy sản phẩm'
            ]);
        }
        // nếu có sản phẩm trong db.
        // 2. Check số lượng tồn kho. Nếu như số lượng mua lớn hơn số lượng trong kho thì báo lỗi.

        // kiểm tra sự tồn tại của shopping cart trong session.
        $shoppingCart = null;
        // nếu có shopping cart rồi thì lấy ra
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            // nếu chưa có thì tạo shopping cart mới.
            $shoppingCart = [];
        }
        // kiểm tra sản phẩm có tồn tại trong giỏ hàng không.
        if (array_key_exists($productId, $shoppingCart)) {
            // nếu có sản phẩm rồi thì update số lượng
            $existingCartItem = $shoppingCart[$productId];
            // tăng số lượng theo số lượng cần mua thêm.
            $existingCartItem->quantity = $productQuantity;
            // và lưu lại vào đối tượng shopping cart.
            $shoppingCart[$productId] = $existingCartItem;
        }
        // update thông tin shopping cart vào session.
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }

    public function remove(Request $request)
    {
        $productId = $request->get('id');
        $shoppingCart = null;
        // nếu có shopping cart rồi thì lấy ra
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        } else {
            // nếu chưa có thì tạo shopping cart mới.
            $shoppingCart = [];
        }
        unset($shoppingCart[$productId]); // Xoá giá trị theo key ở trong map với php.
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/cart/show');
    }
}
