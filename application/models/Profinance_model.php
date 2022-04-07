<?php

class Profinance_model extends CI_Model{

    public function data_revenue()
    {
        // $tahun = $this->input->get('tahun');
        $tahun = date('Y');
        // $tahun = '2021';

        $this->db->select("sum(jumlah) as jumlah,  date_trunc('month', tanggal) as month, to_char(tanggal, 'YYYY') as tahun");
        $this->db->group_by("month, tahun");
        $this->db->order_by('month', 'ASC');
        $data_pemasukan = $this->db->get('transaksi.pemasukan');

        $array_pemasukan = [];

        foreach($data_pemasukan->result() as $key => $value){

            if($value->tahun == $tahun){

                $array_pemasukan[] = (int)$value->jumlah;
            }else{
                
                $array_pemasukan[] = (int)$value->jumlah;
            }
            
        }
        
        /**
         * 
         * ====================================================================================================
         * 
         */

        $this->db->select("sum(jumlah) as jumlah,  date_trunc('month', tanggal) as month, to_char(tanggal, 'YYYY') as tahun");
        $this->db->group_by("month, tahun");
        $this->db->order_by('month', 'ASC');
        $data_pengeluaran = $this->db->get('transaksi.pengeluaran');

        $array_pengeluaran = [];

        foreach($data_pengeluaran->result() as $key => $value){

            if($value->tahun == $tahun){

                $array_pengeluaran[] = (int)$value->jumlah;
            }else{
                
                $array_pengeluaran[] = (int)$value->jumlah;
            }
            
        }

        $this->db->select_max('jumlah');
        $max = $this->db->get('transaksi.pemasukan');

        return [
            'min' => 0,
            'max' => end($max->result()),
            'data_pemasukan' => $array_pemasukan,
            'data_pengeluaran' => $array_pengeluaran
        ];
    }
}