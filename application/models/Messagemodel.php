<?php
class Messagemodel extends CI_model{

	public function allUser($query){
        if ($query == '') {
          $data= $this->db->query("SELECT  inbox.*, camaba.`name` ,camaba.`photo_profile` FROM inbox,camaba  WHERE pengirim != 'admin' AND inbox.`pengirim` = camaba.`id` GROUP BY pengirim
          ORDER BY waktu ASC ");
          if($data->num_rows() > 0){
            return $data->result_array();
          }else{
              return false;
          }
        } else {
          $data= $this->db->query("SELECT  inbox.*, camaba.`name` ,camaba.`photo_profile` FROM inbox,camaba  WHERE pengirim != 'admin' AND inbox.`pengirim` = camaba.`id` AND camaba.name like '%$query%' GROUP BY pengirim
        ORDER BY waktu ASC ");
        if($data->num_rows() > 0){
          return $data->result_array();
        }else{
            return false;
        }
        }
        
        
	}
	
}


?>