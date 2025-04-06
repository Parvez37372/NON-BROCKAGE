<?php include('includes/header.php') ?>
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
                            <a href="index.php">EXIT
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M4.72667 8.39333L5.66667 9.33333L9 6L5.66667 2.66667L4.72667 3.60667L6.44667 5.33333H0V6.66667H6.44667L4.72667 8.39333ZM10.6667 0H1.33333C0.593333 0 0 0.6 0 1.33333V4H1.33333V1.33333H10.6667V10.6667H1.33333V8H0V10.6667C0 11.4 0.593333 12 1.33333 12H10.6667C11.4 12 12 11.4 12 10.6667V1.33333C12 0.6 11.4 0 10.6667 0Z" fill="black" />
                                </svg>
                            </a>
                        </div>
                        <div class="realestate-login-form-signup log_hide__cl">
                            <img src="assets/images/forgot_pass.png" alt="forgot-password" width="100px">
                            <h3>Forgot Your Password?</h3>
                            <p>Not to worry, we got you! Let’s get you a new password. Please enter your registered mobile number.</p>
                            <form action="#" method="post" id="verifyOtpForms" class="realestate-user-logins personal">
                                <div class="realestate-user-logins-group">
                                    <label for="personal_email">Mobile Number</label>
                                    <input type="text" name="mobile" id="forgetpass" maxlength="10" placeholder="Enter Mobile Number*" required>
                                    <div class="usermsg" style="color:red"></div>
                                </div>
                                <input type="submit" class="show_otp" value="Reset Password" name="changePassword" id="lg_btn">
                            </form>
                        </div>
                    </div>
                    
                    <div class="verify_otp">
                        <div class="inner_otp__sec">
                            <div class="form-inner">
                                <div class="otp_title">
                                    <h2>OTP <br> Verification Code</h2>
                                    <p>We have sent a verification code to your mobile number</p>
                                </div>
                                <form method="POST" id="verifyOtpForm" class="otp-form">
                                    <div class="customer-login-register text-center">
                                        <div class="login-form my-form">
                                            <p class="showoptmsg" style="color: red"></p>
                                            <div class="form-fild">
                                                <input type="hidden" id="mobilenumber" value="">
                                                <input id="codeBox1" class="codeBox" type="number" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" onKeyPress="if(this.value.length==1) return false;" />
                                                <input id="codeBox2" class="codeBox" type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" onKeyPress="if(this.value.length==1) return false;" />
                                                <input id="codeBox3" class="codeBox" type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" onKeyPress="if(this.value.length==1) return false;" />
                                                <input id="codeBox4" class="codeBox" type="number" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" onKeyPress="if(this.value.length==1) return false;" />
                                            </div>
                                            <div class="register-submit mt-4 mb-4">
                                                <button type="submit" id="otpsubmit" class="btn btn-success" name="submit">Verify</button>
                                            </div>
                                            <p class="usermsge"></p>
                                            <p class="usermsgee" style="color: green"></p>
                                            <div id="timerdotp"><span id="timerd"></span></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <img class="realestate-login-form-image" src="assets/images/login-form-image.png" alt="login">
</section>
<?php include('includes/footer.php') ?>
<script>
    function getCodeBoxElement(index) {
        return document.getElementById('codeBox' + index);
    }

    function onKeyUpEvent(index, event) {
        const eventCode = event.which || event.keyCode;
        if (getCodeBoxElement(index).value.length === 1) {
            if (index !== 4) {
                getCodeBoxElement(index + 1).focus();
            } else {
                getCodeBoxElement(index).blur();
                // Submit code
                console.log('submit code ');
            }
        }
        if (eventCode === 8 && index !== 1) {
            getCodeBoxElement(index - 1).focus();
        }
    }

    function onFocusEvent(index) {
        for (item = 1; item < index; item++) {
            const currentElement = getCodeBoxElement(item);
            if (!currentElement.value) {
                currentElement.focus();
                break;
            }
        }
    }
</script>
<script>
    $('.verify_otp').hide();
    // $('.show_otp').click(function() {
    //     $('.verify_otp').show();
    //     $('.forgot_pass').hide();
    // })
</script>

<script type="text/javascript">
    $('#verifyOtpForms').on('submit', function(e) {
        e.preventDefault();
        var mobile = $('#forgetpass').val();
        $.ajax({
            url: 'check_mobile.php',
            method: 'post',
            data: { mobile: mobile },
            success: function(dataa) {
                var result = JSON.parse(dataa);

                if (result.status === 'notregisterd') {
                    $('.usermsg').html(result.msg);
                }
                if (result.status === 'sendopt') {
                    $('#mobilenumber').val(mobile);
                    $('.forgot_pass').hide();
                    $('.verify_otp').show();
                    $('.showoptmsg').text(result.msg);
                    htimer(60);
                }
            }
        });
    });

    $('#verifyOtpForm').on('submit', function(e) {
        e.preventDefault();
        var mobile = $('#mobilenumber').val();
        var otp = $('#codeBox1').val() + $('#codeBox2').val() + $('#codeBox3').val() + $('#codeBox4').val();
        
        $.ajax({
            url: 'verify_otp.php',
            method: 'post',
            data: { mobile: mobile, otpmobile: otp },
            success: function(mdata) {
                var mresult = JSON.parse(mdata);

                if (mresult.status === 'failed') {
                    $('.codeBox').val(''); // Clear all OTP input fields
                    $('.usermsge').html(mresult.message);
                    $('.hibeutton').show();
                }
                if (mresult.status === 'success') {
                    $('.codeBox').val(''); // Clear all OTP input fields
                    $('.usermsge').html('');
                    $('.usermsgee').text(mresult.message);
                    $('#timerdotp').hide();
                    setTimeout(function() {
                        window.location.href = "confirm-password.php?token=" + mresult.tokenmob + "&tokentwo=" + mresult.tokentwo;
                    }, 1000);
                }
            }
        });
    });

    function htimer(remaining) {
        let timerOn = true;
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        $('#timerd').text(m + ':' + s);
        remaining -= 1;

        if (remaining >= 0 && timerOn) {
            setTimeout(function() {
                htimer(remaining);
            }, 1000);
            return;
        }

        if (!timerOn) {
            return;
        }

        $('#timerd').html('<a class="btn btn-primary" onClick="sendOTPh();">Resend OTP</a>');
    }

    function sendOTPh() {
        var mobile = $('#mobilenumber').val();
        $('.usermsge').text('');
        $('.codeBox').val(''); 

        $.ajax({
            url: 'check_mobile.php',
            method: 'post',
            data: { mobile: mobile },
            success: function(dataa) {
                var result = JSON.parse(dataa);

                if (result.status === 'sendopt') {
                    htimer(60);
                }
            }
        });
    }
</script>