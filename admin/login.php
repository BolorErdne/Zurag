<?php include('../config/constants.php'); ?>

<html>
    <head>
       <title>Login - ZURAG System</title>
       <link rel="stylesheet " href="../css/admin.css">
    </head>
     <body>
       <div class="login">
           <h1 class = "text-center" >Логин</h1>
            <br><br>
            
          <?php 
               if(isset($_SESSION['login']))
               {
                   echo $_SESSION['login'];
                   unset($_SESSION['login']);
               }
               
               if(isset($_SESSION['no-login-message']))
               {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
               }
               
          ?>
            <br><br>
           <!-- Login Form Starts HEre -->
           <form action=""method="POST" class="text-center">
           Хэрэглэгчийн нэр : <br>
           <input type="text" name="username" placeholder="Хэрэглэгчийн нэр оруулна уу "><br><br>

           Нууц үг: <br>
           <input type="password" name="password" placeholder="Нууц үгээ оруулна "><br><br>

           <input type="submit" name="submit" value="Логин" class="btn-primary">
           <br><br>
           </form>
           <!-- Login Form Erds HEre -->
            
           <p class="text-center">Created By - <a href="">boloroo</a></p>
       </div>
    </body>
</html>

<?php 
if(isset($_POST['submit']))
{
      $username = $_POST['username'];
      $password = $_POST['password'];
     $sql = "SELECT * FROM t_admin WHERE username ='$username'AND password='$password'" ;
     $res = mysqli_query($conn, $sql);
     $count = mysqli_num_rows($res);
   
     if($count==1 )
     {
      

   
     header("Location:idex.php");
     }
    else 
    {
      
        $_SESSION['login'] = "<div class='error text-center'>Хэрэглэгчийн нэр эсвэл нууц үг таарахгүй байна .</div>";
        header('location:'.SITEURL.'admin/login.php');
    }

    }
?>