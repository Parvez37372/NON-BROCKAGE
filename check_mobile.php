<?php
require('config.php');

function generateOtp($type, $userInfo, $action) {
    global $con;
    $otp = "1234"; // Replace with `rand(1000, 9999)` for dynamic OTP generation
    
    $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    $currentDateTime = $dateTime->format('Y-m-d H:i:s');
    
    $query = "INSERT INTO user_tmp_table (user_info, type, otp,datentime) VALUES ('$userInfo', '$type', '$otp','$currentDateTime')";
    if (mysqli_query($con, $query)) {
        if ($action =='change_pass') {
                $msg = "is your OTP to change your password on Non Brokerage. Do not share your OTP with anyone.";
        }
        // Here you would call a function to actually send the OTP (e.g., sendMobileOtp)
        // return sendMobileOtp($otp, $userInfo, $msg);
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['mobile'])) {
		$mobile = $_POST['mobile'];
		$query = "SELECT * FROM user where mobile = $mobile AND status='Active'";
		$runquery = mysqli_query($con,$query);
		if(mysqli_num_rows($runquery)>0){
			$Rundata = mysqli_fetch_array($runquery);

				$sendotp = generateOtp('mobile',$mobile, 'change_pass');
				if($sendotp==true){
					$array = array('status'=>"sendopt",'msg'=>"",'varifistatus'=>"mobile_varified");
				}
				else{
					$array = array('status'=>"otpnotsent",'msg'=>"");
				}
		}else{
			$array = array('status'=>'notregisterd', 'msg'=>"<span style='color:red;'>Account not exists.</span.");
		}
		echo json_encode($array);
}

?>