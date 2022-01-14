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

    function listProduct()
    {

        return Product::paginate(30);
    }

    function searchProduct(Request $req)
    {
        $product = DB::table('products')
            ->where('fullname', 'like', '%'.$req->input('term').'%')
            ->orWhere('mobile', 'like', '%'.$req->input('term').'%')
            ->get();

        if ($product != NULL) {
            return $product;
        }

        return ['message' => 'Lead not found'];
    }

    function deleteProduct($id)
    {

        $Lead = Product::find($id);

        if ($Lead != NULL) {
            $Lead->delete();
            return ['message' => 'Lead successfully deleted'];
        }

        return ['message' => 'Lead not found'];
    }

    function getProductbyID($id)
    {
        $Lead = Product::find($id);
        if ($Lead != NULL) {
            return $Lead;
        }

        return ['message' => 'Lead not found'];
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

    function updateProductFromDashboard(Request $req)
    {
        $product = Product::find($req->input('id'));

        // Address and Payment Details
        // ========================================
        !empty($req->input('member_code')) && $product->member_code = $req->input('member_code');
        !empty($req->input('order_product')) && $product->order_product = $req->input('order_product');
        !empty($req->input('order_code')) && $product->order_code = $req->input('order_code');
        !empty($req->input('order_status')) && $product->order_status = $req->input('order_status');
        !empty($req->input('fullname')) && $product->fullname = $req->input('fullname');
        !empty($req->input('email')) && $product->email = $req->input('email');
        !empty($req->input('mobile')) && $product->mobile = $req->input('mobile');
        !empty($req->input('landline')) && $product->landline = $req->input('landline');
        !empty($req->input('gender')) && $product->gender = $req->input('gender');
        !empty($req->input('civil_status')) && $product->civil_status = $req->input('civil_status');
        !empty($req->input('date_of_birth')) && $product->date_of_birth = $req->input('date_of_birth');
        !empty($req->file('slip_file_path')) && $product->slip_file_path = $req->file('slip_file_path')->store('products');   
        !empty($req->input('houseBuild_name')) && $product->houseBuild_name = $req->input('houseBuild_name');
        !empty($req->input('street')) && $product->street = $req->input('street');
        !empty($req->input('barangray')) && $product->barangray = $req->input('barangray');
        !empty($req->input('city')) && $product->city = $req->input('city');
        !empty($req->input('province')) && $product->province = $req->input('province');
        !empty($req->input('zipCode')) && $product->zipCode = $req->input('zipCode');
        !empty($req->input('delivery_option')) && $product->delivery_option = $req->input('delivery_option');
        !empty($req->input('delivery_fee')) && $product->delivery_fee = $req->input('delivery_fee');
        !empty($req->input('payment_option')) && $product->payment_option = $req->input('payment_option');
        !empty($req->input('payment_fee')) && $product->payment_fee = $req->input('payment_fee');  
        // !empty($req->input('discount')) && $product->discount = $req->input('discount');
        !empty($req->input('total')) && $product->total = $req->input('total');
      

        // Insert to DB-Packages Table
        // ===============================================
        $product->save();

        return $product;
    }

    function getProduct($order_code)
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
