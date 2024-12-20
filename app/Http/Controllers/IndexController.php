<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\FamiliesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Family;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use function Spatie\LaravelPdf\Support\pdf;
use Barryvdh\DomPDF\Facade\Pdf;

class IndexController extends Controller
{
    public function index() {
     
        $users = User::where('category', '5-night')->get();
        $pdf = Pdf::loadView('pdf', [
            'users' => $users
        ]);

        return $pdf->download('invoice.pdf');


        // return count($users);
    }

    public function import() {
        Excel::import(new FamiliesImport, 'data_c.xlsx');
        return "Imported";
    }

    public function populate() {
        $families = Family::all();
        foreach ($families as $family) {
            // Create Members of the Family
            for ($i=0; $i < $family->family_size; $i++) {

                $qr = User::count() + 1;
                $code = "EKH/XMS/" . str_pad(strval($qr), 4, "0", STR_PAD_LEFT);
                $path = public_path('codes/' . strval($qr) . '.png');

                //
                $this->createQR($path, $code);

                User::create([
                    'code' => $code,
                    'qr_path' => $path,
                    'family_id' => $family->fid,
                    'name' => $family->fullname,
                    'category' => $family->package_type
                ]);
            }
        }

        //
        return User::count();
    }

    private function createQR($path, $code) {
        QrCode::size(500)->format('png')->generate($code, $path);
    }
}
