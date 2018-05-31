<?php
  Class User extends CI_Model
  {
    function login($username, $password)
    {
      $this -> db -> select('agency_id, username, password');
      $this -> db -> from('sagency');
      $this -> db -> where('username', $username);
      $this -> db -> where('password', $password);
      $this -> db -> limit(1);
     
      $query = $this -> db -> get();
     
      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }

    function searchvictimdetail($triggered_id)
    {
      /*$query = $this->db->query("SELECT victim.mobilenumber
                                FROM victim
                                JOIN public
                                ON victim.mobilenumber = public.mobilenumber
                                WHERE trigger_id = $trigger_id
                                ");
      return $query;*/

      //print_r($triggered_id);
      $this->db->select('*');
      $this->db->from('victim');
      $this->db->join('public', 'victim.mobilenumber = public.mobilenumber');
      $this->db->join('sagency', 'sagency.agency_id = victim.fetched_by');
      $this->db->where("victim.mobilenumber", "$triggered_id");
      $query = $this->db->get();

      return $query;
    }

    function getlocation()
    {
      $return = array();

      $this->db->select("trigger_id, mobilenumber, latitude, longitude, triggered_status");
      $this->db->from("victim");
      $this->db->where("triggered_status = 1");
      
      $query = $this->db->get();
      
      if($query->num_rows() > 0)
      {
        foreach ($query->result() as $row)
        {
          array_push($return, $row);
        }
        return $return;    
      }
      else
      {
        return false;
      }
    
    }

    function getvictimdetail($fetchvictim)
    {
      $this->db->select('*');
      $this->db->from('public');
      $this->db->where('public.mobilenumber', $fetchvictim);
      $query = $this->db->get();

      return $query;
    }

    function getRequiredUser($agency_id)
    {
      $this->db->select("*");
      $this->db->from("sagency");
      $this->db->where("agency_id",$agency_id);
      $query = $this->db->get();
      
      if($query->num_rows() > 0)
      {
        $result = $query->result_array();
      //$value = $result[0]['column name'];
      return $result;
      }
      else
      {
        return false;
      }
    }

    function save($data)
    {
      if($this->db->insert("sagency",$data))
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    function updatets($Feeds, $vid)
    {
      $this->db->set("feedback", $Feeds);
      $this->db->set("triggered_status", "0");
      $this->db->where("mobilenumber",$vid);
      if($this->db->update("victim"))
      {
        return true;
      }
      else
      {
        return false;
      }
    }

     public function branchlist()
    {
      $this->db->select('branch');
      $this->db->from('sagency');
      $query = $this->db->get();

      return $query;
    }

    public function update($data, $agency_id)
    {
      $this->db->set($data, $agency_id);
      $this->db->where("agency_id",$agency_id);
      if($this->db->update("sagency"))
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function delete($id = null)
    {
      $this->db->where("id",$id);
      if($this->db->delete("user"))
      {
      
      return true;
      }
      else
      {
        return false;
      }
    }
  }
?>