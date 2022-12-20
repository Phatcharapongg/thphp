<?PHP
ob_start();
date_default_timezone_set("Asia/Bangkok");

$_SESSION['uri'] = 'http://localhost';
$path = 'th';

$tokenNotify = 'fKQDDOdUh7YZTutVCu87a0sp30pilCK91NJ6rux0VUn';

$dataNow = date("Ymd H:i:s");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}

// ------------------------------------------------------------------------------------------------------- INSERT
// $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
// mysqli_query($conn, $sql);
// ------------------------------------------------------------------------------------------------------- INSERT

// ------------------------------------------------------------------------------------------------------- UPDATE
// $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
// mysqli_query($conn, $sql);
// ------------------------------------------------------------------------------------------------------- UPDATE

// $_SERVER['REQUEST_URI'];

class KTgetData
{
    public static function save_image($inPath, $outPath)
    { //Download images from remote server
        $in =    fopen($inPath, "rb");
        $out =   fopen($outPath, "wb");
        while ($chunk = fread($in, 8192)) {
            fwrite($out, $chunk, 8192);
        }
        fclose($in);
        fclose($out);
    }

    public static function convertTHDate($strDate, $show)
    {

        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strTime = date("H:i:s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        if ($show == "DMY") {
            return "$strDay $strMonthThai $strYear";
        } else if ($show == "MY") {
            return "$strMonthThai $strYear";
        } else if ($show == "Y") {
            return "$strYear";
        } else if ($show == "DMYT") {
            return "$strDay $strMonthThai $strYear $strTime";
        }
    }

    public static function LineNotifyMessage($token, $message)
    {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");

        $sToken     = $token;  //สร้างตัวแปรเก็บค่า token
        $sMessage     = $message; //สร้างตัวแปรเก็บค่า message
        $chOne         = curl_init();

        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);

        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);

        //Result error
        if (curl_error($chOne)) {
            return 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            return "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);
    }


    public static function LineNotifyImg($token, $message, $img)
    {

        $token = $token; // LINE Token
        //Message
        $mymessage = $message; //Set new line with '\n'
        $imageFile = new CURLFILE($img); // Local Image file Path
        $data = array(
            'message' => $mymessage,
            'imageFile' => $imageFile
        );
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, $data);
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer ' . $token,);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        //Check error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        }
        // else {
        //     $result_ = json_decode($result, true);
        //     echo "status : " . $result_['status'];
        //     echo "message : " . $result_['message'];
        // }
        //Close connection
        curl_close($chOne);
    }

    public static function LineNotifySticker($token, $message)
    {

        $token = $token; // LINE Token
        //Message
        $mymessage = $message; //Set new line with '\n'
        $sticker_package_id = '11537';  // Package ID sticker
        $sticker_id = '52002734';    // ID sticker
        $data = array(
            'message' => $mymessage,
            'stickerPackageId' => $sticker_package_id,
            'stickerId' => $sticker_id
        );
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, $data);
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer ' . $token,);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        //Check error
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        }
        // else {
        //     $result_ = json_decode($result, true);
        //     echo "status : " . $result_['status'];
        //     echo "message : " . $result_['message'];
        // }
        //Close connection
        curl_close($chOne);
    }

    public static function LinePushMessage($token, $sub, $message)
    {

        $accessToken = $token; //copy ข้อความ Channel access token ตอนที่ตั้งค่า
        $content = file_get_contents('php://input');
        $arrayJson = json_decode($content, true);
        $arrayHeader = array();
        $arrayHeader[] = "Content-Type: application/json";
        $arrayHeader[] = "Authorization: Bearer {$accessToken}";
        //รับข้อความจากผู้ใช้
        $message = $message;
        //รับ id ของผู้ใช้
        // $id = $arrayJson['events'][0]['source']['userId'];
        #ตัวอย่าง Message Type "Text + Sticker"
        if ($message == "สวัสดี") {
            $arrayPostData['to'] = $sub;
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "2";
            $arrayPostData['messages'][1]['stickerId'] = "34";
            pushMsg($arrayHeader, $arrayPostData);
        }
        function pushMsg($arrayHeader, $arrayPostData)
        {
            $strUrl = "https://api.line.me/v2/bot/message/push";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $strUrl);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
        }
        exit;
    }
}
?>