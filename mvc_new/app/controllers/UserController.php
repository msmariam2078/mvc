<?php
namespace controller;
// app/controllers/UserController.php
class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $users = $this->model->getUsers();
        
        include 'app/views/user_list.php';
    }

    public function addUser() {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username=$_POST['username'];
            $email=$_POST['password'];
            $data = [
                'username' =>$username ,
                'password' => $email ,
                'role'=>'admin'
            ];

            if ($this->model->addUser($data)) {
                echo "User added successfully!";
            } else {
                echo "Failed to add user.";
            }
        }
    }
    public function updateUser($id)
    {    $user=$this->model->getUser($id);
        // print_r($user);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $data=[
            'username'=>$_POST['username'],
            'password'=>$_POST['password']
        ];
        if($this->model->updateUser($data,$id)){

          echo 'updated now';
          
        }
        else{
            echo "failed";
        }
        }else{
      echo "<form method='post' action='#'>";
      echo "<input type=text name='username' value=".$user[0]['username']."><br><br>";
      echo "<input type=text name='password' value=".$user[0]['password']." ><br><br>";
      echo "<input type=submit name='submit' />";
      echo '</form>';}

      


      
       
    }
    public function deleteUser($id){

if($this->model->deleteUser($id))
{
    echo "deleted";

}else{

echo "not yet";

}
 


    }
}
?>
