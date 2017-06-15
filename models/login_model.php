<?php

// require 'login.php';

class Login_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    
public function run() {
global $db;	
if (isset($_POST['login'])){
$email = $_POST['email'];
$pass = md5($_POST['password']);
if ($email && $pass){
	
	$query = mysqli_query($db, "SELECT * FROM g_users WHERE email='$email'");
	$numrows = mysqli_num_rows($query);
	
	if ($numrows != 0){
		while ($row = mysqli_fetch_assoc($query)){
			$dbname = $row['email'];
			$dbpassword = $row['password'];
			$id = $row['id'];
			}
		if ($email==$dbname){
			if ($pass==$dbpassword){
		 	$result = array('id' => $id, 'email' => $dbname, 'pass' => $dbpassword);
		   $email = $dbname;
            $loc = "login";	 
			$insert = mysqli_query($db, "insert into time_count (user,location) values ('$email','$loc')"); 
		
			 return $result;
         		}else{
			$result = "Invalid Password";			
	        return $result;
			
  		}
			}else{
			$result = "Invalid Email";			
	        return $result;
						}
		}else{
			$result = "Invalid Email";			
	        return $result;
  	}
	}
	else
	{
				$result = "Error, Try Again";			
	        return $result;
}

}
	

}


 }






    


?>