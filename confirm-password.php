<?php include('includes/header.php');

$mobile = "";
if (isset($_GET['token'])) {
    $mobile = $_GET['token'];
    $userid = $_GET['tokentwo'];
} else {
?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
}
?>

<style>
    header.realestate-header.home2 {
        display: none;
    }

    footer.footer-style1 {
        display: none;
    }

    p.realestate-forget-pasword a {
        color: #070026;
        font-size: 13px;
    }

    p.realestate-forget-pasword i {
        position: unset !important;
        color: #070026 !important;
    }

    .realestate-login-form h3 {
        font-size: 25px;
        text-align: left;
    }

    .realestate-login-form-signup.log_hide__cl p {
        font-size: 14px;
        color: black;
    }
</style>
<section class="account_section">
    <div class="realestate-login-form-content h-100">
        <div class="row h-100 align-items-center">

            <div class="col-lg-5 col-md-12 m-auto">
                <div class="realestate-login-form">
                    <div class="forgot_pass">
                        <div class="realestate-close-login-modal">
                            <a href="index.php"> EXIT<svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path
                                        d="M4.72667 8.39333L5.66667 9.33333L9 6L5.66667 2.66667L4.72667 3.60667L6.44667 5.33333H0V6.66667H6.44667L4.72667 8.39333ZM10.6667 0H1.33333C0.593333 0 0 0.6 0 1.33333V4H1.33333V1.33333H10.6667V10.6667H1.33333V8H0V10.6667C0 11.4 0.593333 12 1.33333 12H10.6667C11.4 12 12 11.4 12 10.6667V1.33333C12 0.6 11.4 0 10.6667 0Z"
                                        fill="black" />
                                </svg></a>
                        </div>
                        <div class="realestate-login-form-signup log_hide__cl">
                            <img src="assets/images/forgot_pass.png" alt="forgot-password" width="100px">
                            <h3>Set new password</h3>
                            <p>Please create a new password that you don’t use on any other site.</p>

                            <form action="#" method="post" id="confirmPasswordotpcic" class="realestate-user-logins personal">
                                <input type="hidden" name="" id="mobileotp" value="<?php echo $mobile; ?>">
                                <input type="hidden" name="" id="userid" value="<?php echo $userid; ?>">
                            
                                <div class="realestate-user-logins-group">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" name="newPassword" id="newPassword" placeholder="********">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </div>
                                <div class="realestate-user-logins-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="********">
                                    <i class="fa-solid fa-eye-slash"></i>
                                    <div class="err_msg" id="userPasswordErrMsg"></div>
                                </div>
                                <span style="display:none;color:red;" id="errorpassmatch">Password and confirm password don't match</span>
                            
                                <input type="submit" value="Change Password" id="lg_btn">
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <img class="realestate-login-form-image" src="assets/images/login-form-image.png" alt="login">
</section>
<?php include('includes/footer.php') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#confirmPasswordotpcic').on('submit', function(e) {
            e.preventDefault();
            var mobileotp = $('#mobileotp').val();
            var newPassword = $('#newPassword').val();
            var userid = $('#userid').val();
            var confirmPassword = $('#confirmPassword').val();
            $('#lg_btn').hide();
            $('#errorW').text('Please wait...');
            
            if (newPassword !== confirmPassword) {
                $('#lg_btn').show();
                $('#errorW').text('Passwords do not match. Please try again.');
                return false;
            } else {
                $.ajax({
                    url: 'changepassword.php',
                    method: 'post',
                    data: {
                        token: mobileotp,
                        userid: userid,
                        passw: confirmPassword
                    },
                    success: function(data) {
                        var result = JSON.parse(data);
                        if (result.status == "success") {
                            $('#errorW').text('');
                            $('.sucesotp').text(result.message);
                            window.location.href = "account.php";
                        } else {
                            $('#lg_btn').show();
                            $('#errorW').text(result.message);
                        }
                    }
                });
            }
        });

        $(".password").on("keyup", function(e) {
            var value = $(this).val();
            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/;
            var isValid = regex.test(value);
            if (!isValid) {
                $(".err_msg").html("<div class='err_msg' id='" + this.id + "ErrMsg'>Password must be between 6 to 15 characters, containing at least one numeric digit, one uppercase, and one lowercase letter</div>");
            } else {
                $("#" + this.id + "ErrMsg").remove();
            }
        });

        $("#confirmPassword").on("change", function() {
            var password = $("#newPassword").val();
            if (password !== this.value) {
                $('#errorpassmatch').show();
                $('#lg_btn').prop('disabled', true);
            } else {
                $('#errorpassmatch').hide();
                $('#lg_btn').prop('disabled', false);
            }
        });
    });
</script>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var password = document.getElementById("newPassword");
            var confirm_password = document.getElementById("confirmPassword");
            var errorpassmatch = document.getElementById('errorpassmatch');
            var otpBtn2 = document.getElementById('lg_btn');

            confirm_password.addEventListener("change", function() {
                if (password.value !== confirm_password.value) {
                    errorpassmatch.style.display = 'block';
                    otpBtn2.disabled = true;
                } else {
                    errorpassmatch.style.display = 'none';
                    otpBtn2.disabled = false;
                }
            });
        });
    </script>


