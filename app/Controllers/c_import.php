<?php

namespace App\Controllers;
use App\Models\m_barang;

class c_import extends BaseController
{
    public function __construct(){
        helper('form');
    }

    public function importExcel()
    {
        $file = $this->request->getFile('fileexcel');
        $ext = $file->getClientExtension();
        $m_barang = new m_barang();

        if($ext == '.xls'){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($file);

        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach($sheet as $key => $excel) {
            if($key == 0) {
                continue;
            }
            $m_barang->insert([
                'id_barang' => $excel['0'],
                'nama_barang' => $excel['1'],
                'harga' => $excel['2'],
                'stok' => $excel['3'],
            ]);
        }
        

        $data = [
            'data' => $m_barang->getDataBarang(),
        ];

        
        

		return view('v_barang',$data);
    }
}
