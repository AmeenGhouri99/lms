<?php

namespace App\Http\Controllers;

use App\Contracts\PdfContract;
use App\Models\Admission;
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
        $voucher_no = Admission::find($id)->voucher_no;

        $data = [
            'time' => Carbon::now(),
            'user' => $user,
            'voucher_no' => $voucher_no,
        ];

        // $data = [];
        $pdf = Pdf::loadView('user.chalans.pdf', $data)->setPaper('A4', 'landscape');

        return $pdf->stream('mns-uet-multan.pdf');
    }
}
