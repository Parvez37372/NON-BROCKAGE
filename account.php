<?php 
session_start();
include('includes/header.php');
if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] === true) {
    // Redirect to the user dashboard
    header('Location: user/index.php');
}

?>
<!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<style>
    header.realestate-header.home2 {
        display: none;
    }

    footer.footer-style1 {
        display: none;
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
    p.realestate-forget-pasword a {
    color: #070026;
    font-size: 13px;
}
p.realestate-forget-pasword i {
    position: unset !important;
    color: #070026 !important;
}
@media(max-width:768px) {
.realestate-login-form-content {
    padding: 10px;
}
}
</style>
<section class="account_section">
    <div class="realestate-login-form-content h-100">
        <div class="row h-100 align-items-center">

            <div class="col-lg-5 col-md-12 m-auto">
                <div class="realestate-login-form">
                    <div class="realestate-close-login-modal">
                        <a href="index.php"> EXIT<svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path
                                    d="M4.72667 8.39333L5.66667 9.33333L9 6L5.66667 2.66667L4.72667 3.60667L6.44667 5.33333H0V6.66667H6.44667L4.72667 8.39333ZM10.6667 0H1.33333C0.593333 0 0 0.6 0 1.33333V4H1.33333V1.33333H10.6667V10.6667H1.33333V8H0V10.6667C0 11.4 0.593333 12 1.33333 12H10.6667C11.4 12 12 11.4 12 10.6667V1.33333C12 0.6 11.4 0 10.6667 0Z"
                                    fill="black" />
                            </svg></a>
                    </div>
                    <div class="realestate-login-form-signup log_hide__cl">
                        <h3>Log In</h3>

                        <form action="javascript:void(0);" method="post" class="login formSubmit realestate-user-logins personal" id="login_form">
                            <div class="realestate-user-logins-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" name="mobile" id="mobile" placeholder="Mobile" maxlength="10" autocomplete="off" oninput="validateMobile(event)">
                                    <div class="err_msg" id="mobileErrMsg" style="color: red;"></div>
                                    
                                    

                            </div>
                       
                            <input type="hidden" name="login" value="login">
                            <input type="submit" value="Login" class="loginnew">
                            <div class="err_msg" id="credentialsErrMsg" style="color: red; text-align: center;"></div>

                        </form>
                    

                        <div class="form-saprater">
                            <p>or</p>
                        </div>
                        <div class="realestate-user-social-logins">
                            <p class="login-user-form-show user-signup-form-triger">Don't have an account?
                                <span>Register Here</span>
                            </p>
                        </div>
                    </div>
                    <div class="realestate-login-form-signup realestate-hide hny">
                        <h3>Register</h3>
                        <p style="text-align: center;">Please Enter Your Details Below to Continue</p>
                        <form action="javascript:void(0);" method="post" id="signup-user" class="realestate-user-logins login" enctype="multipart/form-data">
                            <div class="row">
                                <div class="realestate-user-logins-group col-lg-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="full-name" placeholder="Enter Name">
                                </div>
                        
                                <div class="realestate-user-logins-group col-lg-6">
                                    <label for="mobileNumber">Phone</label>
                                    <input type="text" name="mobileNumber" id="phone-number" placeholder="Enter Number" maxlength="10" oninput="this.value = this.value.replace(/\D/g, '').slice(0, 10);">

                                    <div style="font-size:9px;color:red;" class="err_msg" id="mobileNumberErrMsg"></div>
                                </div>
                            </div>
                        
                            <div class="realestate-user-logins-group">
                                <label for="email">Email</label>
                                <input type="email" name="emailId" id="email" placeholder="example@email.com" onkeyup="validateEmail(this.value)">
                                    <div class="err_msg" style="font-size:9px;color:red;" id="emailIdErrMsg"></div>
                                    

                            </div>
                        
                             <input type="hidden" name="register" value="register">
                            <input type="button" value="Sign Up" class="userRegBtn show_otp__box" id="signUpBtn" disabled>
                        </form>

                        <div class="form-saprater">
                            <p>or</p>
                        </div>
                        <div class="realestate-user-social-logins">
                            <p class="login-user-form-show user-login-form-triger">Already a member?
                                <span>Login here</span>
                            </p>
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
                                            <div class="form-fild">
                                                <!-- OTP Input Boxes -->
                                                <input id="codeBox1" class="codeBox" type="number" maxlength="1" oninput="maskInput(1)" />
                                                <input id="codeBox2" class="codeBox" type="number" maxlength="1" oninput="maskInput(2)" />
                                                <input id="codeBox3" class="codeBox" type="number" maxlength="1" oninput="maskInput(3)" />
                                                <input id="codeBox4" class="codeBox" type="number" maxlength="1" oninput="maskInput(4)" />
                                                
                                                <!-- Hidden fields to store the actual OTP -->
                                                <input type="hidden" id="hiddenBox1" name="otp[]">
                                                <input type="hidden" id="hiddenBox2" name="otp[]">
                                                <input type="hidden" id="hiddenBox3" name="otp[]">
                                                <input type="hidden" id="hiddenBox4" name="otp[]">

                                            </div>
                                            <div class="register-submit mt-4 mb-4">
                                                <input type="hidden" name="userInfo" id="userInfo" value="">
                                                <button type="submit" class="verfy_top__ds" id="otpsubmit">Verify</button>
                                            </div>
                                            <div class="text-center" id="verifyOtpFormMsg"></div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    // $('.show_otp__box').click(function() {
    //     $('.verify_otp').show();
    //     $('.realestate-hide').hide();
    //     $('.log_hide__cl').hide();
    // })
    
    function maskInput(index) {
    let inputBox = document.getElementById('codeBox' + index);
    let hiddenBox = document.getElementById('hiddenBox' + index);
    
    hiddenBox.value = inputBox.value;
    
    if (inputBox.value.length === 1) {
        inputBox.type = 'text'; 
        inputBox.value = '*';   
        
        if (index < 4) {
            document.getElementById('codeBox' + (index + 1)).focus();
        }
    }
    
    if (inputBox.value.length === 0) {
        inputBox.type = 'number';
    }
}

</script>

<script>
$(document).ready(function () {
  // Phone number validation
  
    $('#phone-number').on('keyup', function () {
        var phno = $(this).val();
        var regexPattern = /^[0-9]{10}$/; // Only 10-digit numbers allowed
        var signUpBtn = $('.userRegBtn');
        var errorMsg = $('#mobileNumberErrMsg');
        
        if (!regexPattern.test(phno)) {
            errorMsg.text("Please enter a valid 10-digit number");
          //  $('.userRegBtn').hide(); 
        } else {
            errorMsg.text('');
          //  $('.userRegBtn').show();
        }
    });

  // Password validation
  $('#password').on('keyup', function () {
      var value = $(this).val();
      var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (!regex.test(value)) {
          $('#userPasswordErrMsg').text("Password must be at least 8 characters, Eg. User@123");
         // $('.userRegBtn').hide();
      } else {
          $('#userPasswordErrMsg').text('');
        //  $('.userRegBtn').show();
      }
  });

    $('.show_otp__box').on('click', function (e) {
        e.preventDefault(); 

        var formData = new FormData($('#signup-user')[0]); 

        $.ajax({
            url: 'ajax/user.php',
            type: 'POST',
            data: formData,
            contentType: false, // Required for file upload
            processData: false, // Required for file upload
            beforeSend: function () {
                Swal.fire({
                    title: "<span>Please Wait... <br> <div class='SWLoader'></div></span>",
                    html: "Request under processing, please do not lock the screen or leave the page.",
                    showCancelButton: false,
                    showConfirmButton: false,
                });
            },
            success: function (response) {
                try {
                    var data = JSON.parse(response);

                    if (data.status === "failed") {
                        for (var key in data.errMessage) {
                            $("#" + key + "ErrMsg").html(data.errMessage[key]);
                            
                        }
                    } else if (data.status === "registered") {
                        
                        $(".realestate-login-form-signup").hide();
                        $('.log_hide__cl').hide(); // Hide the registration form
                        $(".verify_otp").show(); // Show the OTP verification form
                        $("#userInfo").val(data.mobileNumber);
                        Swal.fire({
                            title: 'Verify your Mobile Number',
                            html: "We've sent a message to verify your Mobile Number and activate your account.",
                            icon: "info",
                            confirmButtonText: 'OK'
                        });
                    } else if (data.status === "formMsg") {
                        Swal.fire({
                            title: 'Error',
                            text: data.result,
                            icon: 'error',
                            confirmButtonText: 'Try Again'
                        });
                    }
                } catch (error) {
                    console.error("Error parsing JSON response: ", error);
                }
            },
            complete: function () {
                Swal.close();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX error: ", textStatus, errorThrown);
            }
        });
    });

});

</script>

<script>
$("#verifyOtpForm").on("submit", function (e) {
    e.preventDefault(); // Prevent default form submission

    var formData = $(this).serialize(); // Serialize form data

    $.ajax({
        url: 'ajax/verify-otp.php',
        type: 'POST',
        data: formData,
        beforeSend: function() {
            Swal.fire({
                title: "Please Wait...",
                html: "<div class='SWLoader'></div> Request under processing...",
                showCancelButton: false,
                showConfirmButton: false,
                onOpen: function() {
                    Swal.showLoading();
                }
            });
            $('body').css('pointer-events', 'none'); 
        },
        success: function (data) {
            data = JSON.parse(data); // Parse the JSON response

            // Display the message
            $("#verifyOtpFormMsg").html("<div style='color:" + (data.status === 'success' ? '#008000' : '#f00') + ";'>" + data.message + "</div>");

            if (data.status === "success") {
             //   $(".verify_otp").hide();
                window.location.href = "payrent.php";
            }

        },
        complete: function () {
            $('body').css('pointer-events', 'auto');
            Swal.close();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
        }
    });
});
</script>

<script>
    $('.loginnew').on('click', function (e) {
        e.preventDefault(); 
        var formData = new FormData($('#login_form')[0]);

        $.ajax({
            url: 'ajax/user.php',
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            beforeSend: function () {
                Swal.fire({
                    title: "<span>Please Wait... <br> <div class='SWLoader'></div></span>",
                    html: "Request under processing, please do not lock the screen or leave the page.",
                    showCancelButton: false,
                    showConfirmButton: false,
                });
            },
            success: function (response) {
                try {
                    var data = JSON.parse(response);

                    // Clear previous error messages
                    $(".err_msg").html("");

                    if (data.status === "failed") {
                        $(".err_msg").html("");
                    
                        for (var key in data.errMessage) {
                           // $("#" + key).html(data.errMessage[key]); 
                           $('.log_hide__cl').hide();
                           $('.realestate-hide').show();
                            if (data.mobileNum) {
                                console.log(data.mobileNum);
                                $("#phone-number").val(data.mobileNum);
                            }
                        }
                    } else if (data.status === "unverify") {
                        $('.log_hide__cl').hide();
                        $(".verify_otp").show(); 
                        $("#userInfo").val(data.mobileNumber);
                        Swal.fire({
                            title: 'Verify your Mobile Number',
                            html: "We've sent a message to verify your Mobile Number and activate your account.",
                            icon: "info",
                            confirmButtonText: 'OK'
                        });
                    } else if (data.status === "success") {
                        window.location.href = data.redirect;
                    } else if (data.status === "formMsg") {
                        Swal.fire({
                            title: 'Error',
                            text: data.result,
                            icon: 'error',
                            confirmButtonText: 'Try Again'
                        });
                    }
                } catch (error) {
                    console.error("Error parsing JSON response: ", error);
                }
            },
            complete: function () {
                Swal.close();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX error: ", textStatus, errorThrown);
            }
        });
    });
</script>
<script>
    function validateEmail(email) {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const errorMsg = document.getElementById('emailIdErrMsg');
        const signUpBtn = document.getElementById('signUpBtn');
        
        if (email.indexOf('@') === -1) {
            errorMsg.textContent = 'Email must contain @ symbol.'; // Show error message if @ is missing
            signUpBtn.disabled = true; // Disable button if email is invalid
        } else if (emailPattern.test(email)) {
            errorMsg.textContent = ''; // Clear the error message if the email is valid
            signUpBtn.disabled = false; // Enable button if email is valid
        } else {
            errorMsg.textContent = 'Please enter a valid email address.';
            signUpBtn.disabled = true; // Disable button if email is invalid
        }
    }
</script>
<script>
    function validateMobile(event) {
        const mobileInput = document.getElementById('mobile');
        const mobileErrMsg = document.getElementById('mobileErrMsg');
        const signUpBtn = document.getElementById('signUpBtn');
        
        // Only allow numbers
        mobileInput.value = mobileInput.value.replace(/\D/g, '');
    
        // Check if the length is 10 digits
        if (mobileInput.value.length > 10) {
            mobileErrMsg.textContent = "Only 10 digits are allowed.";
            mobileInput.value = mobileInput.value.slice(0, 10); // Restrict to 10 digits
            signUpBtn.disabled = true;
        } else {
            mobileErrMsg.textContent = "";
            signUpBtn.disabled = false;
        }
    }
</script>
 <script>
        $(function() {
            $('.codeBox').on('input', function() {
                $(this).attr('data-real-value', $(this).val()).val('*');
            }).on('focus', function() {
                $(this).val($(this).attr('data-real-value'));
            }).on('blur', function() {
                if ($(this).val()) $(this).val('*');
            }).on('keydown', function(e) {
                if ($(this).val().length && e.key !== 'Backspace') e.preventDefault();
            });
        });
    </script>


