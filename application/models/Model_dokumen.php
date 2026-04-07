<?php 
class Model_dokumen extends CI_model{

    public function search_data($keyword, $limit, $offset)
    {
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('tahun', $keyword);
        }
        $this->db->limit($limit, $offset);
        $query = $this->db->get('v_hukum');
        return $query->result();
    }

    public function count_data($keyword)
    {
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('tahun', $keyword);
        }
        $query = $this->db->get('v_hukum');
        return $query->num_rows();
    }

}