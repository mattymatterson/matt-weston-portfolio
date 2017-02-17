if($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['username']) && !empty($_POST['username])) {
    if (isset($_POST['password'] && !empty($_POST['password)) {
      $login = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $query = "select * from users where ( username='$login' OR email = $login ) and password='$mypassword'";
      
      $result = mysqli_query($db,$query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         session_register("myusername");
         $_SESSION['username'] = $row['username'];
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['firstname'] = $row['firstname'];
         $_SESSION['lastname'] = $row['lastname'];
         
         header("location: welcome.php");
      }else {
         header("location: login.html");
      }
    }
  }
}
