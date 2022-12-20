<?PHP

ob_start();
session_start();

//Connect DB
require('config/server.php');

if (isset($_SESSION['empBNID'])) {
    header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main");
    exit(0);
}

if (
    isset($_POST["type"]) && $_POST["type"] == 'login'
    && isset($_POST["username"]) && $_POST["username"] != ''
    && isset($_POST["password"]) && $_POST["password"] != ''
) {
    $Username = trim($_POST["username"]);
    $Password = trim($_POST["password"]);

    $ChkUserSQL = "SELECT * FROM employees WHERE empUsername = '" . $Username . "'";
    $ChkUserARR = mysqli_query($conn, $ChkUserSQL);
    $ChkUserNUM = mysqli_num_rows($ChkUserARR);

    if ($ChkUserNUM == 1) {
        $ChkPassSQL = "SELECT * FROM employees WHERE empPassword = '" . $Password . "'";
        $ChkPassARR = mysqli_query($conn, $ChkPassSQL);
        $ChkPassNUM = mysqli_num_rows($ChkPassARR);

        if ($ChkPassNUM == 1) {
            $ChkEmployeeSQL = "SELECT * FROM employees WHERE empUsername = '" . $Username . "' AND empPassword = '" . $Password . "' AND empStatus = '1'";
            $ChkEmployeeARR = mysqli_query($conn, $ChkEmployeeSQL);
            $ChkEmployeeNUM = mysqli_num_rows($ChkEmployeeARR);

            if ($ChkEmployeeNUM == 1) {
                foreach ($ChkEmployeeARR as $ChkEmployee) {
                    $_SESSION['empBNID'] = $ChkEmployee['empBadgenumber'];
                }
                header("location: " . $_SESSION['uri'] . "/" . $path . "/pages/main");
                exit(0);
            } else {
                header("location: " . $_SESSION['uri'] . "/" . $path . "?year=$dataNow&yearcrd=" . md5($dataNow) . "&err=fail-03&u=$Username&ucrd=" . md5($Username));
                exit(0);
            }
        } else {
            header("location: " . $_SESSION['uri'] . "/" . $path . "?year=$dataNow&yearcrd=" . md5($dataNow) . "&err=fail-02&u=$Username&ucrd=" . md5($Username));
            exit(0);
        }
    } else {
        header("location: " . $_SESSION['uri'] . "/" . $path . "?year=$dataNow&yearcrd=" . md5($dataNow) . "&err=fail-01&u=$Username&ucrd=" . md5($Username));
        exit(0);
    }
}
// err=fail-00    ---------------> เข้าผิดวิธี
// err=fail-01    ---------------> Username ผิด
// err=fail-02    ---------------> Password ผิด
// err=fail-03    ---------------> ยังไม่สามารถใช้งานระบบได้
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>THONSAP CENTER LOGIN</title>
    <link rel="shortcut icon" href="dist/img/FK_Logo.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
</head>

<?PHP
// ================================================================================================================================= START ALERT
if (isset($_GET["err"])) {
    switch ($_GET["err"]) {
        case 'fail-00':
            $alert = 1;
            $title = 'ท่านกำลังเข้าแบบผิดวิธี';
            $icon  = 'error';
            break;
        case 'fail-01':
            $alert = 1;
            $title = 'ไม่พบ Username นี้ กรุณาตรวจสอบอีกครั้ง';
            $icon  = 'error';
            break;
        case 'fail-02':
            $alert = 1;
            $title = 'Password ไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง';
            $icon  = 'error';
            break;
        case 'fail-03':
            $alert = 1;
            $title = 'ยังไม่สามารถใช้งานระบบได้ กรุณาติดต่อทางแอดมินอีกครั้ง';
            $icon  = 'error';
            break;
        default:
            $alert = 0;
            break;
    }
}
?>
<script>
    $(document).ready(function() {
        if (<?= $alert; ?> == 1) {
            toastr.<?= $icon; ?>('<?= $title; ?>')
        }
    });
</script>

<?PHP // =============================================================================================================================== END ALERT
?>

<body class="hold-transition login-page" style="font-family: 'Kanit', sans-serif;">
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center animate__animated animate__flipInX">
                <p class="h2 "><b>ล็อกอินเข้าใช้งาน</b></p>
            </div>
            <div class="card-body">
                <?PHP
                if (isset($_GET['err']) && $_GET['err'] == 'fail-03') {
                ?>
                    <center style="font-size: 13px;" class="text-danger">ท่านยังไม่สามารถใช้งานระบบได้ กรุณาติดต่อแอดมิน</center>
                <?PHP } ?>
                <form action="" method="POST">
                    <input type="hidden" name="type" value="login">
                    <?PHP
                    if (isset($_GET['err']) && $_GET['err'] == 'fail-01') {
                    ?>
                        <span style="font-size: 13px;" class="text-danger">ไม่พบ Username นี้ กรุณาตรวจสอบอีกครั้ง</span>
                    <?PHP } ?>
                    <div class="input-group mb-3">
                        <?PHP
                        $valUsr = '';
                        if (
                            isset($_GET['u']) && isset($_GET['ucrd'])
                            && md5($_GET['u']) == $_GET['ucrd']
                        ) {
                            $valUsr = $_GET['u'];
                        }
                        ?>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $valUsr; ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?PHP
                    if (isset($_GET['err']) && $_GET['err'] == 'fail-02') {
                    ?>
                        <span style="font-size: 13px;" class="text-danger">Password ไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง</span>
                    <?PHP } ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success btn-block">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
</body>

</html>