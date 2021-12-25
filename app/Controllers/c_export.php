<?php

namespace App\Controllers;
use TCPDF;
use App\Models\m_barang;

class PDF extends TCPDF {
    public function header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';

        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'TOKO ALAT TULIS', 0, 1, 'C', 0, '', 0, true, 'T', 'C');
    }
}

class c_export extends BaseController
{
    public function index() {
        $m_barang = new m_barang();

        $data = [
            'data' => $m_barang->getDataBarang(),
        ];
        return view('v_export',$data);
    }
    
    public function exportPDF()
    {

        $m_barang = new m_barang();

        $data = [
            'data' => $m_barang->getDataBarang(),
        ];

        $html = view('v_table',$data);

        $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->AddPage();
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $this->response->setContentType('application/pdf');
        $date = date('d-m-y');
        $pdf->Output($date.'-data-barang.pdf', 'I');

    }
}


