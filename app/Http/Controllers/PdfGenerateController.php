<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

class PdfGenerateController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $users = DB::table("tbl_member_datas")->get();
        view()->share('users',$users);

        if($request->has('download')){
        	// Set extra option

            $pdf = PDF::loadView('pdf.invoice', $data);
            return $pdf->download('invoice.pdf');

        	//PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            //$pdf = PDF::loadView('pdfview');
            // download pdf
            //return $pdf->download('pdfview.pdf');
        }
        return view('admin.members.index');
    }
}