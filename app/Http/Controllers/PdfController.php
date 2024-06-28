<?php

namespace App\Http\Controllers;

use App\Contracts\PdfContract;
use App\Models\FeeChalan;
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
        $challan_no = FeeChalan::latest()->first();
        $generate_ch_no = $challan_no ? $challan_no->id + 1 : 1;

        $data = [
            'time' => Carbon::now(),
            'user' => $user,
            'challan_no' => 'RD' . $generate_ch_no,
        ];

        $pdf = Pdf::loadView('user.chalans.pdf', $data)->setPaper('A4', 'landscape');

        return $pdf->download('mns-uet-multan.pdf');
    }
}