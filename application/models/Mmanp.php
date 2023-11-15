<?php
class Mmanp extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //testing function
    function get_rev()
    {
        $sql = "SELECT * FROM internal.tbm_rev where is_dlt='0'";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    function get_employee()
    {
        $sql = "SELECT * FROM internal.tbm_emp ";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    function get_manpower()
    {
        $sql = "SELECT * FROM internal.tb_m_planning where is_dlt='0'";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    function get_date_rev()
    {

        $sql = "SELECT year, rev_no FROM internal.tbm_rev where is_dlt = '0'";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    function get_mpp_rev()
    {
        $sql = "SELECT * FROM internal.tbm_rev where is_dlt = '0'";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    function get_mmp_rev_sch()
    {
        $sql = "SELECT * FROM internal.tbm_rev_sch where is_dlt='0'";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_priv_rev($rev_id)
    {
        $sql = "SELECT * from internal.tbm_rev where rev_id='$rev_id' ";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_rev_sch($rev_id)
    {
        $sql = "SELECT * from internal.tbm_rev_sch where rev_id='$rev_id' order by rev_sch_id asc";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_each_rev($rev_id)
    {
        $sql = "SELECT * from internal.tbm_rev_sch where rev_sch_id='$rev_id'";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_temp_rev_ptct()
    {
        $sql = "SELECT * from internal.tbt_rev_sch where ent='ptct'  order by temp_rev_id asc ";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_temp_rev_scn()
    {
        $sql = "SELECT * from internal.tbt_rev_sch where ent='scn' order by temp_rev_id  asc ";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_temp_rev_sg()
    {
        $sql = "SELECT * from internal.tbt_rev_sch where ent='sg'  order by temp_rev_id asc ";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_temp_rev_dat()
    {
        $sql = "SELECT * from internal.tbt_rev_sch order by temp_rev_id asc";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_temp_spec($rev_id)
    {
        $sql = "SELECT * from internal.tbt_rev_sch where temp_rev_id='$rev_id' AND rev_id = '5' ";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function check_data_av()
    {
        $sql = "SELECT * from internal.tbt_rev_sch ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 2;
        }
    }



    public function get_latest_create()
    {
        $sql = "SELECT COALESCE(MAX(create_id),  '0') AS latest_create_id FROM internal.tbt_rev_sch";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function check_max_dat()
    {
        $sql = "SELECT COUNT(*) FROM internal.tbt_rev_sch;";
        $query = $this->db->query($sql);
        return $query->result();
        $this->db->close();
    }

    public function get_add_rev($create_id, $ent)
    {
        $sql = "SELECT * FROM internal.tbt_rev_sch where create_id = '$create_id' and ent = '$ent'";
        $query = $this->db->query($sql);
        $result = $query->result();
        $this->db->close();
    }
}
