
<?php

class UserHomeModel extends CI_Model
{

    function UserHomeModel()
    {
        $this->load->database();
    }

    function getUser($user_id){
        // $sql="select * from note where belong = 0";
 $sql="select * from user where user_id = ".$user_id;
           $query = $this->db->query($sql);
          $user=$query->result_array();
         return $user;
    }
      function getTypeCatNote($note_type,$start=0){
        // $sql="select * from note where belong = 0";
         $sql="select * from note right join user on note.user_id = user.user_id  where belong = 0 and note_type = ".$note_type." limit ".$start." , 5" ;
         $query = $this->db->query($sql);
          $typecats=$query->result_array();

         return $typecats;
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