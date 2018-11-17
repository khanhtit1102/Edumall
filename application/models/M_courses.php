<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Courses extends CI_Model
{
	function __construct()
	{
        parent::__construct();
    }

    public function showall($limit, $keyword, $filter)
    {
    	$offset=$this->uri->segment(2);
        // SELECT id_cs,thumb_cs,ten_cs,name_user,gia_cs FROM course, user WHERE course.id_user = user.id_user
    	$this->db->select('id_cs,thumb_cs,ten_cs,name_user,gia_cs');                  
        $this->db->from('course, user');
        $this->db->where('course.id_user = user.id_user');
		$this->db->or_like('ten_cs', $keyword);
        $this->db->or_like('name_user', $keyword);
        $this->db->or_like('id_cate', $keyword);
		$this->db->order_by($filter);          
		$this->db->limit($limit, $offset);

		$query_poster = $this->db->get();
		return $query_poster;
    }
    
    public function countrow($keyword)
    {
        $this->db->from('course')->like('ten_cs', $keyword)->or_like('id_user', $keyword)->or_like('id_cate', $keyword);
    	return $this->db->count_all_results();
    }

    # Count each catelogy
    public function row_cntt()
    {
        $this->db->from('course')->where('id_cate', 'cntt');
        return $this->db->count_all_results();
    }
    public function row_tk()
    {
        $this->db->from('course')->where('id_cate', 'tk');
        return $this->db->count_all_results();
    }
    public function row_ndc()
    {
        $this->db->from('course')->where('id_cate', 'ndc');
        return $this->db->count_all_results();
    }
    public function row_ptbt()
    {
        $this->db->from('course')->where('id_cate', 'ptbt');
        return $this->db->count_all_results();
    }
    public function row_kdkn()
    {
        $this->db->from('course')->where('id_cate', 'kdkn');
        return $this->db->count_all_results();
    }
    public function row_nn()
    {
        $this->db->from('course')->where('id_cate', 'nn');
        return $this->db->count_all_results();
    }
    public function row_mkt()
    {
        $this->db->from('course')->where('id_cate', 'mkt');
        return $this->db->count_all_results();
    }
    public function row_thvp()
    {
        $this->db->from('course')->where('id_cate', 'thvp');
        return $this->db->count_all_results();
    }

    // Free and Fee
    public function row_free()
    {
        $this->db->from('course')->where('gia_cs', 0);
        return $this->db->count_all_results();
    }
    public function row_fee()
    {
        $this->db->from('course')->where('gia_cs !=', 0);
        return $this->db->count_all_results();
    }
}