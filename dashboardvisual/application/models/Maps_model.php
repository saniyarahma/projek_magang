<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps_model extends CI_Model 
{
    //simpan data ke tabel
    public function input_lokasi() 
    {
        $data = [
            "nama_lokasi" => $this->input->post("nama_lokasi"),
            "latitude" => $this->input->post("latitude"),
            "longitude" => $this->input->post("longitude"),
        ];

        $this->db->insert('maps', $data);
    }

    //mengambil semua data dari lokasi
    public function allData()
    {
        $this->db->select('*');
        $this->db->from('maps');
        return $this->db->get()->result();
    //     // $this->db->get('maps')->result_array();
    }

    //mengambil data berdasarkan id lokasi
    public function detail($id_lokasi)
    {
        $this->db->select('*');
        $this->db->from('maps');
        $this->db->where('id_lokasi', $id_lokasi);
        
        return $this->db->get()->row();
    }

    public function edit_maps($edit)
    {
        $this->db->where('id_lokasi', $edit['id_lokasi']);
        $this->db->update('maps', $edit);
        
    }

    public function delete_maps($id_lokasi)
    {
        $this->db->where('id_lokasi', $id_lokasi);
        $this->db->delete('maps');
        
    }
}
