<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Masyarakat_Model extends CI_Model
{
    public function all_laporan($nik)
    {
        $this->db->select('*');
        $this->db->where('nik',$nik);
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }

    public function all_pengaduan_selesai($status,$nik)
    {
        $this->db->select('*');
        $this->db->where('status',$status);
        $this->db->where('nik',$nik);
        $this->db->from('tanggapan');
        $this->db->join('pengaduan','pengaduan.id_pengaduan=tanggapan.id_pengaduan');
        $query = $this->db->get();
        return $query;
    }


    public function delete_data($where,$id_laporan,$table)
    {
        $this->db->where($where,$id_laporan);
        $this->db->delete($table);
    }


    public function get_data($table)
    {
        return $this->db->get($table);
    }


    public function update_data($table, $data, $where)
    
    {
        return $this->db->update($table, $data, $where);
    }


      public function create_laporan($data)
    {
        $this->db->insert('pengaduan', $data);
    }


    public function get_data_where($nik,$table,$where)
    {
       $this->db->where('nik',$nik);
       return $this->db->get_where($table,$where);
    }


    public function count_laporanku($nik)
    {
        $this->db->select('COUNT(judul) as total');
        $this->db->where('nik',$nik);
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function count_laporan_proses($nik,$proses)
    {
        $this->db->select('COUNT(status) as total');
        $this->db->where('nik',$nik);
        $this->db->where('status',$proses);
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }


    public function count_laporan_selesai($nik,$selesai)
    {
        $this->db->select('COUNT(status) as total');
        $this->db->where('nik',$nik);
        $this->db->where('status',$selesai);
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }
}