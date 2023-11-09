<?php
namespace user;
// app/models/UserModel.php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUsers() {
        return $this->db->get('user');
    }
    public function getUser($id) {
       
        return $this->db->where('id',$id)->get('user');
    }

    public function addUser($data) {
        return $this->db->insert('user', $data);
    }
    public function updateUser($data,$id) {
        return $this->db->where('id',$id)->update('user',$data);
    }
    public function deleteUser($id) {
        return $this->db->where('id',$id)->delete('user');
    }
}
?>
