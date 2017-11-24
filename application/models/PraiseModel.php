
<?php

class PraiseModel extends CI_Model
{

    function PraiseModel()
    {
        $this->load->database();
    }
 
function getPraise($note_id){
  $sql="select praise_likes from note where note_id = '".$note_id."'";
        // 查询数据库
        $query = $this->db->query($sql);
        // 以数组形式返回查询结果
        return $query->result_array();
}

 
 //点赞之前检查是否有点赞记录
  function isPraise($user_id,$note_id){
      $sql="select * from praise where user_id = ".$user_id." and note_id= ".$note_id;

     $query = $this->db->query($sql);
     $query = $query->result_array();
      if($query!=[]){
        return 'haved';      
      }
      else{
        return 'no';
      }
  }
  
    //把数据插入到数据库中
    function insertPraise($user_id,$note_id,$praise_time)
    {
        $sql = "insert into praise(user_id,note_id,praise_time)values('$user_id','$note_id','$praise_time')";
        $query = $this->db->query($sql);
        return $query;
    }
    //更新信息
     function updata($praise_likes, $note_id)
    {
        $sql = "update note set note_likes = ".$praise_likes." where note_id =".$note_id;
        $query = $this->db->query($sql);
        return $query;
    }

   
}
?>