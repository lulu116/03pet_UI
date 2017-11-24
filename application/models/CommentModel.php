
<?php

class CommentModel extends CI_Model
{

    function CommentModel()
    {
        $this->load->database();
    }

    //把评论数据插入到数据库中
    function insertComments($user_id,$note_id,$cmt_content,$cmt_time)
    {
        $sql = "insert into comment(user_id,note_id,cmt_content,cmt_time)values('$user_id','$note_id','$cmt_content','$cmt_time')";
        $query = $this->db->query($sql);
        
        echo $query;
    }

    function changeComments($note_id){
        $sql="select * from note where note_id = ".$note_id;
           $query = $this->db->query($sql);
           $query=$query->result_array();
          $query=$query[0];
            $cmt_num=$query['note_comment']+1;
         $sql1="update note set note_comment = ".$cmt_num." where note_id =".$note_id;
           $query = $this->db->query($sql1);


    }

    //从数据库取出数据   评论
    function getComments($note_id){
      $sql="select * from comment left join user on comment.user_id=user.user_id where comment.note_id=".$note_id."  order by cmt_time desc";
      $query=$this->db->query($sql);
      $comments=$query->result_array();
     return $comments;
      
    }
   
}