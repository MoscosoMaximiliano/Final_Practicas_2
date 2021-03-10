<?php
    include("config.php");
    session_start();

    if(isset($_POST["signInBTN"])) {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($db,$_POST['usernameIn']);
        $mypassword = mysqli_real_escape_string($db,$_POST['passwordIn']); 

        if(isset($myusername) && isset($mypassword))
        {
            $sql = "SELECT user_ID FROM users WHERE user_name = '$myusername' and user_Pass = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            
            $count = mysqli_num_rows($result);
            
            
            
            if($count == 1) {
                $_SESSION['login_user'] = $myusername;
                $_SESSION['user_ID'] = $row['User_ID'];
                
                header("location: ../welcome.php");
            }else {
                header("location: ../index.php");
                $error = "Your Login Name or Password is invalid";
            }
        }
        
        
    }
?>