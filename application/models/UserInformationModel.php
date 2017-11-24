
<?php

class UserInformationModel extends CI_Model
{

    function UserInformationModel()
    {
        $this->load->database();
    }

    function changeUserInfoAll($uservia,$nickname,$user_id){


        $sql = "update user set nick_name = '".$nickname."' , user_via = '".$uservia."' where user_id=$user_id";
        $query = $this->db->query($sql);
      if($query){
        $sql1="select * from user where user_id=".$user_id;
          $query1 = $this->db->query($sql1);
           $query1=$query1->result_array();
          $query1=$query1[0];
            $this->session->set_userdata('nick_name',$query1['nick_name']);
        echo json_encode(array('result'=>'ok'));
      }else{
        echo json_encode(array('result'=>'no'));
      }

     
    }


  function changeUserInfoNickName($nickname,$user_id){


        $sql = "update user set nick_name = '".$nickname."' where user_id=$user_id";
        $query = $this->db->query($sql);
      if($query){
            $sql1="select * from user where user_id=".$user_id;
          $query1 = $this->db->query($sql1);
           $query1=$query1->result_array();
          $query1=$query1[0];
            $this->session->set_userdata('nick_name',$query1['nick_name']);
        echo json_encode(array('result'=>'ok'));
      }else{
        echo json_encode(array('result'=>'no'));
      }

     
    }


 
}
?>