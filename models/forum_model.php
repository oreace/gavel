<?php

// require 'login.php';

class Forum_Model extends Model {

  function __construct() {
    parent::__construct();
  }

  
  public function memberList() {
    $resultset = $this->find_all();
    return $resultset;
  }

  public function memberFound($sql = "") {
    if ($sql == "") {
      if (isset($_POST['searchfield']) && !empty($_POST['searchfield'])) {
        $members = $_POST['searchfield'];

        $sql = "select * from " . Member_Model::$table_name;
        $sql .= " where fname like '%" . $members . "%'";
        $sql .= " or lname like '%" . $members . "%'";
        $_POST['searchfield'] = "";
      } else {
        redirect_to(member);
      }
    }
    $resultset = $this->find_by_sql($sql);

    return $resultset;
  }

  public function postForum() {
if (isset($_SESSION['email'])){
    global $db;
    
    $user_id = $_SESSION['email'];
    $post_text = mysqli_real_escape_string($db, $_POST['post_text']);
	  $filename1 = $_FILES['post_content']['name'];
	  $ext1 = strtolower(pathinfo($filename1, PATHINFO_EXTENSION));
		if($ext1 == 'png' || $ext1 == 'jpeg' || $ext1 == 'jpg') 
		{
        $temp1 = explode(".", $_FILES['post_content']['name']);
        $newfilename1 = substr($user_id,0,2).round(microtime(true)).".".end($temp1);
        move_uploaded_file($_FILES['post_content']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."gavel/public/img/forum/".$newfilename1);
        
        $run = mysqli_query($db, "insert into g_forum_post (user_id,post_text,post_content) values ('$user_id','$post_text','$newfilename1')");
        $result = "Success";
        return $result;
    }else{
      $result = "Image should be in picture format only";
      return $result;

    }

}else{
  $result =  "Login First";
  return $result;
}

}

public function like($id){
if (isset($_SESSION['email'])){

  $this->id = $id;
  global $db;
  $user_id = $_SESSION['email'];
  $count = mysqli_num_rows(mysqli_query($db, "select * from g_forum_poll where forum_id='$id' and user_id='$user_id'"));
if ($count == 0){

  $run = mysqli_query($db, "insert into g_forum_poll (user_id, type,forum_id) values ('$user_id','like','$id')");
  $result = "Success";
  return $result;
}else{
  $result= "Liked this post before";
  return $result;
}

}else{
  $result =  "Login First";
  return $result;
}

}

  public function deleteMember($memberid) {
    $this->id = $memberid;

    $this->delete();
  }

  public function editMember($id) {
    $result = $this->find_by_id($id);
    return $result;
  }

  public function updateMember() {
    $this->id = $_POST['id'];
    $this->fname = $_POST['fname'];
    $this->lname = $_POST['lname'];
    $this->phone = $_POST['phone'];
    $this->email = $_POST['email'];
    $this->sex = $_POST['sex'];
    $this->address = $_POST['address'];

    $response = $this->update();
    return $response;
  }

}

?>