<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lead;

class LeadController extends Controller
{
    function addLead(Request $req)
    {

        $Lead = new Lead;
        $Lead->fullname = $req->input('fullname');
        $Lead->email = $req->input('email');
        $Lead->mobile = $req->input('mobile');
        $Lead->stage = $req->input('stage') == NULL ? "Marketing Acquired Lead" : $req->input('stage');
        $Lead->status = $req->input('status') == NULL ? "Open" : $req->input('status');
        $Lead->message = $req->input('message');
        $Lead->save();

        return $Lead;
    }

    function listLead()
    {
        return Lead::paginate(30);
    }

    function searchLead(Request $req)
    {
        $Lead = DB::table('leads')
            ->where('fullname', 'like', '%'.$req->input('term').'%')
            ->orWhere('mobile', 'like', '%'.$req->input('term').'%')
            ->get();

        if ($Lead != NULL) {
            return $Lead;
        }

        return ['message' => 'Lead not found'];
    }

    function deleteLead($id)
    {

        $Lead = Lead::find($id);

        if ($Lead != NULL) {
            $Lead->delete();
            return ['message' => 'Lead successfully deleted'];
        }

        return ['message' => 'Lead not found'];

    }

    function getLead($id)
    {
        $Lead = Lead::find($id);
        if ($Lead != NULL) {
            return $Lead;
        }

        return ['message' => 'Lead not found'];
    }

    function getLeadForm(Request $req)
    {
        $Lead = DB::table('leads')
            ->where('emailaddress', '=', $req->input('emailaddress'))
            ->where('phonenumber', '=', $req->input('phonenumber'))
            ->limit(1)
            ->get();

        if ($Lead != NULL) {
            return $Lead;
        }

        return ['message' => 'Lead not found'];
    }

    function updateLead(Request $req)
    {
        $Lead = Lead::find($req->input('id'));

        $Lead->fullname = $req->input('fullname');
        $Lead->email = $req->input('email');
        $Lead->mobile = $req->input('mobile');
        $Lead->stage = $req->input('stage');
        $Lead->status = $req->input('status');
        $Lead->message = $req->input('message');
        $Lead->updated_at = date("Y-m-d H:i:s");

        $Lead->save();
        //return $Lead;
        return $req;
    }
}
