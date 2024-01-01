<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Bin-It">
    <meta property="og:url" />
    <meta property="og:type" content="truongbinit" />
    <meta property="og:title" content="Website TruongBin" />
    <meta property="og:description" content="Wellcome to my Website" />
    <style>
                <style>
            .table {
                border-collapse: collapse;
                width: 100%;
            }
            
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }
    </style>
    <title>Nhân Viên | Quản Lý Bán Hàng</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <!--===============================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!--===============================================================================================-->
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body onload="time()">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> QUẢN
                    LÝ NHÂN VIÊN</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#home" data-toggle="tooltip" data-placement="bottom"
                            title="NHÂN VIÊN">NHÂN VIÊN</a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="bottom" title="ĐIỂM DANH">ĐIỂM DANH</a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="bottom" title="TIỀN LƯƠNG">TIỀN LƯƠNG</a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="bottom" title="LỊCH CÔNG TÁC">LỊCH CÔNG TÁC</a>
                    </li>
                    <li><a href="#contact" data-toggle="tooltip" data-placement="bottom" title="BÁO CÁO">BÁO CÁO</a>
                    </li>
                    <li><a href="#tour" data-toggle="tooltip" data-placement="bottom" title="SỰ KIỆN">SỰ KIỆN</a></li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="TÀI KHOẢN"><b>Tài Khoản</b>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown">
                            <li><a href="login.php" data-toggle="tooltip" data-placement="bottom"
                                    title="ĐĂNG XUẤT"><b>Đăng xuất <i class="fas fa-sign-out-alt"></i></b></a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
              
   
    <div class="container">
  <h2>Danh sách nhân viên</h2>
  <table class="table">
    <thead>
      <tr>
        <th style="width: 20%;" >Họ và tên</th>
        <th style="width: 7%;" >Giới tính</th>
        <th style="width: 15%;" >Ngày sinh</th>
        <th style="width: 12%;">Số điện thoại</th>
        <th style="width: 26%;" >Địa chỉ</th>
        <th style="width: 20%;" >Chức vụ</th>
      </tr>
    </thead>
    <tbody>
    <?php
        include "../model/connectdb.php";
        global $conn;
        $query = "SELECT * FROM employee";
        $result = mysqli_query($conn, $query);    

        // Kiểm tra và hiển thị dữ liệu
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                $gender = $row["gender"];
                if ($gender == 1) {
                    echo "<td>Nam</td>";
                } elseif ($gender == 0) {
                    echo "<td>Nữ</td>";
                } else {
                    echo "<td></td>";
                }
                echo "<td>" . $row["birthday"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["position"] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "Không có dữ liệu.";
        }
        ?>        
    </tbody>
  </table>
</div>
</body>

</html>