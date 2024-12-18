<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\FamiliesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Family;

class IndexController extends Controller
{
    public function index() {
        $model = Family::first();
        return response()->json([
            'model' => $model,
            'user' => User::count()
        ]);
    }

    public function import() {
        Excel::import(new FamiliesImport, 'data.xlsx');
        return "Imported";
    }

    public function populate() {
        $families = Family::all();
        foreach ($families as $family) {

            // Create Members of the Family
            for ($i=0; $i < $family->family_size; $i++) {
                $code = str_pad(strval(User::count() + 1), 4, "0", STR_PAD_LEFT);
                User::create([
                    'name' => $family->fullname,
                    'code' => "EKH/XMS/" . $code,
                    'family_id' => $family->fid
                ]);
            }
        }

        //
        return "Populated";
    }
}
