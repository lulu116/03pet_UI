
<?php

class CatMesModel extends CI_Model
{

    function CatMesModel()
    {
        $this->load->database();
    }

    function findcatmsg(){
  $search="select * from messages where msg_isnew = 0 limit 1";//限制每次读出一条数据，便于修改其已读flag
$query=$this->db->query($search);
 $onemsg=$query->result_array();
  return $onemsg;  
}
function getAllMyMes($receiveuser_id){
$search="select * from messages right join user on user.user_id=messages.senduser_id where receiveuser_id = ".$receiveuser_id." order by message_id desc";

//将所有消息设置为已读
$update="update messages set msg_isnew = 1 where receiveuser_id = ".$receiveuser_id;
$this->db->query($update);

$query=$this->db->query($search);
 $mess=$query->result_array();
  return $mess;  

}
function findnew($receiveuser_id){
  $search="select * from messages where msg_isnew = 0 and receiveuser_id = ".$receiveuser_id;
  $query=$this->db->query($search);
  $query=$query->result_array();
   if($query!=[]){
        echo json_encode(array('res'=>'have'));  
        exit;
      }else{
        echo json_encode(array('res'=>'no'));
      }


}

function changecatmsg(){
    $sql = "update messages set msg_isnew = 1 where msg_isnew = 0 limit 1";
        $query = $this->db->query($sql);
}


    function insertcatmes($content,$receiveuser_id,$senduser_id,$msg_time){
              $sql = "insert into messages(senduser_id,receiveuser_id,msg_content,msg_time,msg_belong) values('$senduser_id','$receiveuser_id','$content','$msg_time','0')";
        $query = $this->db->query($sql);
       if($query){
         echo  json_encode(array('res'=>'ok'));       
    }else{
          echo  json_encode(array('res'=>'no'));    
    }


}
}
?>