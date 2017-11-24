
<?php

class DetailModel extends CI_Model
{

    function DetailModel()
    {
        $this->load->database();
    }

    function getDetail($note_id){
        // $sql="select * from note where belong = 0";
        $sql="select * from note right join user on note.user_id = user.user_id where note.note_id = '".$note_id."' order by note_id desc";
        // 查询数据库
        $query = $this->db->query($sql);
        //var_dump($query);
        // 以数组形式返回查询结果
       $row=$query->result_array();
       // var_dump($row);
       return $row;
    }
}
?>