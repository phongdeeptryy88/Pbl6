<?php
include "../model/connectdb.php";
global $conn;

if ($_POST) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $data = array(
        'user' => $user,
        'pass' => $pass
    );
    // Gửi yêu cầu POST đến proxy
    //$proxy_url = 'http://192.168.1.11:5000'; 
    $proxy_url = 'http://localhost:5000'; 
    $ch = curl_init($proxy_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
     // Xử lý phản hồi từ proxy
     if ($response == 'true') {
        $query = "SELECT * FROM tbl_user WHERE user = '$user' AND pass = '$pass'";
        $result = mysqli_query($conn, $query);    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];
            if ($role == '1') {
               header('Location: index.php');
               exit;
            } elseif ($role == '0') {
                header('Location: homeuser.php');
                exit;
            }    
        } else {
            $txt_erro = "Tên đăng nhập hoặc mật khẩu không đúng";
        }
    } else {
        $txt_erro = "ban da bị chan do nghi ngo tan cong sql ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/reset.css">
    <link rel="stylesheet"  href="css/app.css">
    <title>Document</title>
</head>
<body>
   <div id="wrapper">
       <form action="" id="form-login"  method="post">
            <h1 class="form-heading">
                 Form Login
            </h1>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Username" name="user" required>    
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Password" name="pass" required>
            </div>
            <input type="submit" class="form-submit" value="Login" name="dangnhap">
            <?php
                if(isset($txt_erro)&&($txt_erro!=""))
                {
                    echo "<font color='red'>" .$txt_erro."</font>";
                }            
            ?>
       </form>
   </div>
</body>
</html>