<?php

namespace App\Models;

use CodeIgniter\Model;

class m_barang extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';

    protected $allowedFields = ['id_barang', 'nama_barang','stok','harga'];

    public function getDataBarang()
    {
       return $this->findAll();
    }
}