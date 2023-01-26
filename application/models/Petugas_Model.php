<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_Model extends CI_Model
{

    public function all_pengaduan($status)
    {
        $this->db->select('*');
        $this->db->where('status',$status);
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function all_pengaduan_selesai($status)
    {
        $this->db->select('*');
        $this->db->where('status',$status);
        $this->db->from('tanggapan');
        $this->db->join('pengaduan','pengaduan.id_pengaduan=tanggapan.id_pengaduan');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik');
        $query = $this->db->get();
        return $query->result();
    }


    public function delete_data($where,$nik,$table)
    {
        $this->db->where($where,$nik);
        $this->db->delete($table);
    }


    public function all_masyarakat()
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->order_by('nik', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }


    public function all_tanggapan()
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->order_by('id_tanggapan', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }


    public function detail_tanggapan($status)
    {
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik');
        return $this->db->get_where('pengaduan',['status' => $status])->result();
    }


    public function create_masyarakat($data)
    {
        $this->db->insert('masyarakat', $data);
    }


    public function get_data($table)
    {
        return $this->db->get($table);
    }


    public function update_data($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }


    public function count_users()
    {
        $this->db->select('COUNT(nama) as total');
        $this->db->from('masyarakat');
        $query = $this->db->get();
        return $query->result();
    }


    public function count_laporan()
    {
        $this->db->select('COUNT(judul) as total');
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }


    public function count_laporan_proses($proses)
    {
        $this->db->select('COUNT(status) as total');
        $this->db->where('status',$proses);
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }


    public function count_laporan_selesai($selesai)
    {
        $this->db->select('COUNT(status) as total');
        $this->db->where('status',$selesai);
        $this->db->from('pengaduan');
        $query = $this->db->get();
        return $query->result();
    }
}




