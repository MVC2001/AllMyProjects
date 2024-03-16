<!-- This file performs the user authentication function -->
<?php
 session_start();
include("./Config/connection.php");
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password= md5($_POST['password']);

        $qry="SELECT * FROM users where email='$email' and password='$password' limit 1 ";

        $login=mysqli_query($conn,$qry);

        if(!$login) 
        {
            echo mysqli_error($login);
        }
        
        else{
        $rows=mysqli_num_rows($login);
        if($rows==0){
            header('location:./index.php?fail');
           
        }
        else{
            $res=mysqli_fetch_array($login);
            $user_id=$res['user_id'];
            $name=$res['name'];
            $role=$res['role'];
            

            // session creation
            $_SESSION['user_id']=$user_id;
            $_SESSION['name']=$name;
            $_SESSION['role']=$role;
        
            if($role=='Adminstrator')
            {
                header('Location:ADashboard.php');
            }
             else if($role=='HQAdmin')
            {
                header('Location:hqAdmin_Dashboard.php');

            }

             else if($role=='')
            {
                header('Location:hqAdmin_Dashboard.php');

            }
            
            
            else
            {
                
                header('Location:index.php');
            }
                
        
            
        }
           
        }
    }
    ?>