<?php

namespace App\Http\Controllers;
use App\Models\MedicinePersonal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MedicinePersonalImport;
use Session;


class MedicinePersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tableStats() {
        
        return view('table');
    }

    public function getMedicinePersonal(Request $request) {
        $med_per = MedicinePersonal::select('id', 'user', 'client', 'client_type',
            'date', 'duration', 'type_of_call', 'external_call_score')
            ->where('duration', '>', 10)->orderBy('id')->get()->toArray();
        return response()->json(['data' => $med_per]);
    }

//    public function averageValue(Request $request) {
//        $avg_value = MedicinePersonal::select('user', 'external_call_score')->groupBy('user')->avg('external_call_score')->get()->toArray();
//        dd($avg_value);
//        return $avg_value;
//    }

    public function addRow(Request $request) {

        $request->validate([
           'user' => 'required',
           'client' => 'required',
           'client_type' => 'required',
           'date' => 'required',
           'duration' => 'required',
           'type_of_call' => 'required',
           'external_call_score' => 'required'
        ]);

        $addRow = MedicinePersonal::create([
           'user' => $request->user,
           'client' => $request->client,
           'client_type' => $request->client_type,
           'date' => $request->date,
           'duration' => $request->duration,
           'type_of_call' => $request->type_of_call,
           'external_call_score' => $request->external_call_score,
        ]);

        if ($addRow) {
            return response()->json(["success" => true, "message" => "Row was successfully added"]);
        } else {
            return response()->json(["success" => false, "message" => "Error"]);
        }
    }

    public function editRow(Request $request) {
        $request->validate([
            'user_edit' => 'required',
            'client_edit' => 'required',
            'client_type_edit' => 'required',
            'date_edit' => 'required',
            'duration_edit' => 'required',
            'type_of_call_edit' => 'required',
            'external_call_score_edit' => 'required'
        ]);

        $id_edit = $request->id_edit;
        $user_edit = $request->user_edit;
        $client_edit = $request->client_edit;
        $client_type_edit = $request->client_type_edit;
        $date_edit = $request->date_edit;
        $duration_edit = $request->duration_edit;
        $type_of_call_edit = $request->type_of_call_edit;
        $external_call_score_edit = $request->external_call_score_edit;

        $idRow = MedicinePersonal::find($id_edit);
        $idRow_update = $idRow->update([
           "user" => $user_edit,
           "client" => $client_edit,
           "client_type" => $client_type_edit,
           "date" => $date_edit,
           "duration" => $duration_edit,
           "type_of_call" => $type_of_call_edit,
           "external_call_score" => $external_call_score_edit,
        ]);

        if ($idRow_update) {
            return response()->json(["success" => true, "message" => "Successfully updated."]);
        } else {
            return response()->json(["success" => false, "message" => "All fields are required for update row"]);
        }
    }

    public function deleteRow() {
        $row_id = request()->id;
        $delete = MedicinePersonal::destroy($row_id);
        if ($delete) {
            return response()->json(["success" => true, "message" => "Successfully deleted row."]);
        } else {
            return response()->json(["success" => false, "message" => "Error."]);
        }
    }

}
