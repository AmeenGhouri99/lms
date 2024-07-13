<?php

namespace App\Http\Controllers;

use App\Contracts\PdfContract;
use App\Models\FeeChalan;
use App\Models\GenerateChallanNo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PDFController extends Controller
{
    protected $pdf;

    public function __construct(PdfContract $pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $user = $this->pdf->create($id);
        $challan_no = GenerateChallanNo::where('admission_id', $id)->first();

        $data = [
            'time' => Carbon::now(),
            'user' => $user,
            'challan_no' => $challan_no->abbreviation . $challan_no->chalan_no,
        ];

        $pdf = Pdf::loadView('user.chalans.pdf', $data)->setPaper('A4', 'landscape');

        return $pdf->download('mns-uet-multan.pdf');
    }
}
