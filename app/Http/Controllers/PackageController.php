<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Package;
use App\Models\OptiPackage;
use App\Models\DeliveryOption;
use App\Models\PaymentOption;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{

    function addPackage(Request $req)
    {



        $package = new Package;
        // Member Details
        // ========================================
        $package->membership_package = $req->input('membership_package');
        $package->order_status = 'Order Payment';
        $package->order_code = strtoupper(Str::random(15));
        $package->fullname = $req->input('fullname');
        $package->email = $req->input('email');
        $package->mobile = $req->input('mobile');
        $package->landline = $req->input('landline');
        $package->gender = $req->input('gender');
        $package->civil_status = $req->input('civil_status');
        $package->date_of_birth = $req->input('date_of_birth');

        // Address and Payment Details
        // ========================================
        $package->houseBuild_name = $req->input('houseBuild_name');
        $package->street = $req->input('street');
        $package->barangray = $req->input('barangray');
        $package->city = $req->input('city');
        $package->province = $req->input('province');
        $package->zipCode = $req->input('zipCode');
        $package->delivery_option = $req->input('delivery_option');
        $package->delivery_fee = $req->input('delivery_fee');
        $package->payment_option = $req->input('payment_option');
        $package->payment_fee = $req->input('payment_fee');
        $package->total = $req->input('total');

        // Do not require fileUpload
        // ===============================================
        !empty($req->file('file_path')) && $package->slip_file_path = $req->file('file_path')->store('products');

        // Insert to DB-Packages Table
        // ===============================================
        $package->save();

        return $package;
    }

    function updatePackage(Request $req)
    {
        $package = Package::find($req->input('id'));

        // Address and Payment Details
        // ========================================
        $package->order_status = 'Payment Validation';
        $package->payment_option = $req->input('payment_option');
        $package->payment_fee = $req->input('payment_fee');
        $package->total = $req->input('total');

        // Do not require fileUpload
        // ===============================================
        !empty($req->file('file_path')) && $package->slip_file_path = $req->file('file_path')->store('products');

        // Insert to DB-Packages Table
        // ===============================================
        $package->save();

        return $package;
    }

    function getPackage($order_code)
    {
        // return either Package or Product depending on Order_Code Length
        //================================================================
        if (strlen($order_code) == 15) {
            $package = Package::where('order_code', $order_code)->get();
            if ($package != NULL) {
                return $package;
            }

            return ['message' => 'Package not found'];
        } else {
            $product = Product::where('order_code', $order_code)->get();

            if ($product != NULL) {
                return $product;
            }

            return ['message' => 'Product not found'];
        }
    }


    function listOptiPackages()
    {

        return OptiPackage::get();
    }

    function listDeliveryOptions()
    {

        return DeliveryOption::get();
    }

    function listPaymentOptions()
    {

        return PaymentOption::get();
    }
}
