
<?php

class CatMsgModel extends CI_Model
{

    function CatMsgModel()
    {
        $this->load->database();
    }

    function findcatmsg(){
     

  

  $search="select * from messages where msg_isnew = 0 limit 1";//限制每次读出一条数据，便于修改其已读flag
$query=$this->db->query($search);
 $onemsg=$query->result_array();
  return $onemsg;  
}


function changecatmsg(){
 

    $sql = "update messages set msg_isnew = 1 where msg_isnew = 0 limit 1";
        $query = $this->db->query($sql);
       

}


    function insertcatmsg($senduser_id,$msg_content,$msg_time){
              $sql = "insert into messages(senduser_id,msg_content,msg_time,msg_belong)values('$senduser_id','$msg_content','$msg_time','0')";
        $query = $this->db->query($sql);
        return $query;
    }



















      function getTypeCatNote($note_type,$start=0){
        // $sql="select * from note where belong = 0";
         $sql="select * from note right join user on note.user_id = user.user_id  where belong = 0 and note_type = ".$note_type." limit ".$start." , 5" ;
         $query = $this->db->query($sql);
          $typecats=$query->result_array();

         return $typecats;
    }


    function getUser($user_name,$password)
    {
           
         $sql="select * from user where user_name = '".$user_name."'";
        

        // 查询数据库
        $query = $this->db->query($sql);
        // 以数组形式返回查询结果
       $row=$query->result_array();

             //检查账号是否存在
             $row=$row[0];
        if(!$row){
            // echo '账号不存在'; 
            //PHP里面如何输出JSON格式的数据：json_encode(数组);
            $row['res'] = 'no_exit_admin_name';
          echo json_encode($row);
            exit;
        }
        //检查密码是否正确
        if($password!= $row['password']){
            //PHP里面如何输出JSON格式的数据：json_encode(数组);
            $row['res'] = 'invail_admin_passwd';
            echo json_encode($row);
            exit;
        }
        $SESSION['user_name']=$row['user_name'];
         $row['res'] = 'ok';
            echo json_encode($row);
    }
    

    function insertSinger()
    {
        $sql = "insert into singer(name,introduce)values('king','123')";
        $query = $this->db->query($sql);
        
        echo $query;
    }

    function insertSinger2()
    {
        $data = array(
            'name' => "wwesdd",
            'introduce' => "33535y4erth"
        );

        $query = $this->db->insert('singer', $data);

        echo $query;
    }

    function updataSinger1($name, $id)
    {
        $sql = "update singer set name = $name where id=$id";
        $query = $this->db->query($sql);
        echo $query;
    }

    function updataSinger2()
    {
        $this->db->set('name', 'field+1');

        $this->db->where('id', 30);

        $query=$this->db->update('singer');

        echo $query;
    }
    
    function deleteSinger1(){
        $sql = "delete from singer where id =30 ";
        $query = $this->db->query($sql);
        echo $query;
    }
    
    
    function deleteSinger2(){
       $this->db->where('id', 31);
       $query =$this->db->delete('singer');
        echo $query;
    }
}
?>