<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\OptiProduct;
use App\Models\DeliveryOption;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function addProduct(Request $req)
    {
        $product = new Product;
        // Member Details
        // ========================================
        !empty($req->input('member_code')) && $product->member_code = $req->input('member_code');
        $product->order_product = $req->input('order_product');
        $product->order_status = 'Order Payment';
        $product->order_code = strtoupper(Str::random(20));
        $product->fullname = $req->input('fullname');
        $product->email = $req->input('email');
        $product->mobile = $req->input('mobile');
        $product->landline = $req->input('landline');
        $product->gender = $req->input('gender');
        $product->civil_status = $req->input('civil_status');
        $product->date_of_birth = $req->input('date_of_birth');

        // Address and Payment Details
        // ========================================
        $product->houseBuild_name = $req->input('houseBuild_name');
        $product->street = $req->input('street');
        $product->barangray = $req->input('barangray');
        $product->city = $req->input('city');
        $product->province = $req->input('province');
        $product->zipCode = $req->input('zipCode');
        $product->delivery_option = $req->input('delivery_option');
        $product->delivery_fee = $req->input('delivery_fee');
        $product->payment_option = $req->input('payment_option');
        $product->payment_fee = $req->input('payment_fee');
        $product->total = $req->input('total');

        // Do not require fileUpload
        // ===============================================
        !empty($req->file('file_path')) && $product->slip_file_path = $req->file('file_path')->store('products');

        // Insert to DB-products Table
        // ===============================================
        $product->save();

        return $product;
    }

    function updateProduct(Request $req)
    {
        $product = Product::find($req->input('id'));

        // Address and Payment Details
        // ========================================
        $product->order_status = 'Payment Validation';
        $product->payment_option = $req->input('payment_option');
        $product->payment_fee = $req->input('payment_fee');
        $product->total = $req->input('total');

        // Do not require fileUpload
        // ===============================================
        !empty($req->file('file_path')) && $product->slip_file_path = $req->file('file_path')->store('products');

        // Insert to DB-Packages Table
        // ===============================================
        $product->save();

        return $product;
    }

    public function getProduct($order_code)
    {
        $product = Product::where('order_code', $order_code)->get();

        if ($product != NULL) {
            return $product;
        }

        return ['message' => 'Product not found'];
    }

    function listGuestOptiProducts()
    {

        return OptiProduct::where('category', 'Guest')
        ->get();
    }

    function listMemberOptiProducts()
    {

        return OptiProduct::where('category', 'Member')
        ->get();
    }
}
