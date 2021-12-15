<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\DeliveryOption;

class SeederController extends Controller
{
    function addDeliveryOption(Request $req)
    {
        try {

            $deliveryOption = new DeliveryOption;
            // DB::table('delivery_options')->insert([
            //     'delivery_option' => $req->input('delivery_option'),
            //     'delivery_fee' => $req->input('delivery_fee'),
            //     'created_at' => date("Y-m-d H:i:s"),
            //     'updated_at' => date("Y-m-d H:i:s")
            // ]);

            $deliveryOption->delivery_option = $req->input('delivery_option');
            $deliveryOption->delivery_fee = $req->input('delivery_fee');
            $deliveryOption->created_at = date("Y-m-d H:i:s");
            $deliveryOption->updated_at = date("Y-m-d H:i:s");
            $deliveryOption->save(); 
 
            return ['message' => 'Option added successfully'];
        } catch (\Throwable $th) {
            return ['message' => 'Error:' . $th->getMessage()];
        }
    }

    function updateDeliveryOption(Request $req)
    {

        try {
            DB::table('delivery_options')
                ->where('delivery_option', $req->input('delivery_option'))
                ->update([
                    'delivery_option' => $req->input('delivery_option'),
                    'delivery_fee' => $req->input('delivery_fee'),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);

            return ['message' => 'Option added successfully'];
        } catch (\Throwable $th) {
            return ['message' => 'Error:' . $th->getMessage()];
        }
    }

    function addPaymentOption(Request $req)
    {
        try {
            DB::table('payment_options')->insert([
                'payment_option' => $req->input('payment_option'),
                'payment_fee' => $req->input('payment_fee'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            return ['message' => 'Option added successfully'];
        } catch (\Throwable $th) {
            return ['message' => 'Error:' . $th->getMessage()];
        }
    }

    function updatePaymentOption(Request $req)
    {

        try {
            DB::table('payment_options')
                ->where('payment_option', $req->input('payment_option'))
                ->update([
                    'payment_option' => $req->input('payment_option'),
                    'payment_fee' => $req->input('payment_fee'),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);

            return ['message' => 'Option added successfully'];
        } catch (\Throwable $th) {
            return ['message' => 'Error:' . $th->getMessage()];
        }
    }

    function addOptiPackage(Request $req)
    {
        try {
            DB::table('opti_packages')->insert([
                'membership_package' => $req->input('membership_package'),
                'price' => $req->input('price'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            return ['message' => 'Option added successfully'];
        } catch (\Throwable $th) {
            return ['message' => 'Error:' . $th->getMessage()];
        }
    }

    function updateOptiPackage(Request $req)
    {

        try {
            DB::table('opti_packages')
                ->where('membership_package', $req->input('membership_package'))
                ->update([
                    'membership_package' => $req->input('membership_package'),
                    'price' => $req->input('price'),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);

            return ['message' => 'Option added successfully'];
        } catch (\Throwable $th) {
            return ['message' => 'Error:' . $th->getMessage()];
        }
    }
}
