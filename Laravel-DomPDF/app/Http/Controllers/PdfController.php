<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    public function create()
    {
        $data = [
            'imagePath' => 'https://img.icons8.com/bubbles/200/google-logo.png',
            'webName'   => 'www.codehafeez.com',
        ];
        
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('Report.pdf');
    }
}
