<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Luigel\Paymongo\Facades\Paymongo;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class PaymongoController extends Controller
{
    function gcashSource()
    {

        $gcashSource = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => 102.00,
            'currency' => 'PHP',
            'redirect' => [
                'success' => 'https://malasakitoneopti.netlify.app/success',
                'failed' => 'https://malasakitoneopti.netlify.app/failed'
            ]
        ]);

        // Setting, SerialSazing and Saving to table
        //=========================================
        $transaction = new Transaction;
        $transaction->type = $gcashSource->type;
        $transaction->source_id = $gcashSource->id;
        $transaction->source_type = $gcashSource->source_type;
        $transaction->status = $gcashSource->status;
        $transaction->amount = $gcashSource->amount;
        $temp = $gcashSource->redirect;
        $transaction->checkout_url = $temp['checkout_url'];
        $transaction->response_source = json_encode($gcashSource->getData());
        $transaction->save();

        // Decoding JSON using Find (plain OBJECT) - Working
        // =========================================================
        // $record = Transaction::find(29);
        // $json = json_decode($record->response_source, true);
        // return $json;

        // Decoding JSON using Where (plain COLLECTION) - Working
        // ==========================================================
        // $record = DB::table('transactions')
        //     ->where('source_id', 'src_M1R5sfpFPp55XJF4tATnV5wr')
        //     ->get();
        // $json = json_decode($record[0]->response_source, true);
        // return $json;


        //return $record;
        return  $transaction;
    }

    function grabPaySource()
    {
        $grabPaySource = Paymongo::source()->create([
            'type' => 'grab_pay',
            'amount' => 100.00,
            'currency' => 'PHP',
            'redirect' => [
                'success' => 'https://malasakitoneopti.netlify.app/success',
                'failed' => 'https://malasakitoneopti.netlify.app/failed'
            ]
        ]);

        // Setting and Serializing from table
        //=========================================
        $transaction = new Transaction;
        $transaction->type = $grabPaySource->type;
        $transaction->source_id = $grabPaySource->id;
        $transaction->source_type = $grabPaySource->source_type;
        $transaction->status = $grabPaySource->status;
        $transaction->amount = $grabPaySource->amount;
        $temp = $grabPaySource->redirect;
        $transaction->checkout_url = $temp['checkout_url'];
        $transaction->response_source = json_encode($grabPaySource->getData());
        $transaction->save();

        return  $transaction;
    }


    function sourceChargeable(Request $req)
    {

        // Get Record
        // =======================================================
        $record = DB::table('transactions')
            ->where('source_id', $req->input('data.attributes.data.id'))
            ->where('status', 'chargeable')
            ->limit(1)
            ->get();

        if ($record->isEmpty()) {

            // Save to DB
            // =======================================================
            $transaction = new Transaction;
            $transaction->type = $req->input('data.type');
            $transaction->source_id = $req->input('data.attributes.data.id');
            $transaction->source_type = $req->input('data.attributes.data.attributes.type');
            $transaction->status = $req->input('data.attributes.data.attributes.status');
            $transaction->amount = floatval($req->input('data.attributes.data.attributes.amount') / 100);
            $transaction->checkout_url = $req->input('data.attributes.data.attributes.redirect.checkout_url');
            $transaction->response_source = json_encode($req->input('data'));
            $transaction->save();

            // Create Payment
            // =======================================================
            $this->createPayment($transaction);
        }


        // Responsd 200 to WebHook
        // =======================================================
        return  response()->noContent(204);
    }


    function createPayment($transaction)
    {

        $payment = Paymongo::payment()
            ->create([
                'amount' => $transaction->amount,
                'currency' => 'PHP',
                'description' => 'Testing payment',
                'statement_descriptor' => 'Test Paymongo',
                'source' => [
                    'id' => $transaction->source_id,
                    'type' => 'source'
                ]
            ]);

        // Get Record
        // =======================================================
        $record = DB::table('transactions')
            ->where('source_id', $payment->id)
            ->where('status', 'paid')
            ->limit(1)
            ->get();

        if ($record->isEmpty()) {

            // Setting, SerialSazing and Saving to table
            //=========================================
            $transaction = new Transaction;
            $transaction->type = $payment->type;
            $transaction->source_id = $payment->id;
            $transaction->source_type = $payment->source_type;
            $transaction->status = $payment->status;
            $transaction->amount = $payment->amount;
            $temp = $payment->redirect;
            $transaction->checkout_url = $temp['checkout_url'];
            $transaction->response_source = json_encode($payment->getData());
            $transaction->save();
        }



        //return  '$transaction';
        return  response()->noContent(204);
    }

    function testCreatePayment(Request $req)
    {

        // $payment = Paymongo::payment()
        //     ->create([
        //         'amount' => $transaction->amount,
        //         'currency' => 'PHP',
        //         'description' => 'Testing payment',
        //         'statement_descriptor' => 'Test Paymongo',
        //         'source' => [
        //             'id' => $transaction->source_id,
        //             'type' => 'source'
        //         ]
        //     ]);

        // Setting, SerialSazing and Saving to table
        //=========================================
        // $transaction = new Transaction;
        // $transaction->type = $payment->type;
        // $transaction->source_id = $payment->id;
        // $transaction->source_type = $payment->source_type;
        // $transaction->status = $payment->status;
        // $transaction->amount = $payment->amount;
        // $temp = $payment->redirect;
        // $transaction->checkout_url = $temp['checkout_url'];
        // $transaction->response_source = json_encode($payment->getData());
        // $transaction->save();

        //return  response()->noContent(204);

        // Save to DB
        // =======================================================
        $record = DB::table('transactions')
            ->where('source_id', $req->input('data.attributes.data.id'))
            ->where('status', $req->input('data.attributes.data.attributes.status'))
            ->limit(1)
            ->get();


        return $record;
    }
}
