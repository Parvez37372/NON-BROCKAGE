<?php include('includes/header.php') ?>
<style>
    .bredcurm_section {
        height: auto;
    }

    .realestate-section7-form-location-map {
        background-color: white;
    }
</style>
<div class="bredcurm_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner_drd__crm pb-5">
                    <h1>Contact Us</h1>
                   
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:;">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="realestate-section7-form-location-map">
 
    <div class="container position-relative">
        <div class="contact-schedule">
            <div class="contact-us">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-6">
                        <div class="realestate-section7-form">
                            <form id="section7" class="contact-from" action="javascript:void(0);" method="post">
                                <div class="realestate-section7-form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="realestate-section7-form-group">
                                                <input type="text" class="form-control realestate-input" id="fname" name="fname" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="realestate-section7-form-group">
                                                <input type="text" class="form-control realestate-input" id="lname" name="lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="realestate-section7-form-group">
                                                <input type="number" class="form-control realestate-input" id="connumber" name="phone" placeholder="Phone" required oninput="concheckNumber()">
                                                <div class="err_msg" style="color:red;display:none;" id="connumberErrMsg">Please enter a valid 10-digit number</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="realestate-section7-form-group">
                                               <input type="email" class="form-control realestate-input" id="email" name="email" placeholder="Email" required oninput="convalidateEmail(this.value)">
                                                <div class="err_msg" style="color:red;" id="conemailIdErrMsg"></div>
                                        
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="realestate-section7-form-group">
                                                <textarea name="content" id="section7-content"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <input type="hidden" value="contact_form" id="formType" name="formType">
                                            <input type="submit" class="submitcladd" value="Contact Us" id="submit-section7">
                                        </div>
                                    </div>
                            
                                </div>
                            
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 col-lg-6 d-flex">
                        <div class="tour-content">
                            <div class="heading">
                                <h2>Find Your Dream Property Expert Real Estate Services Await You</h2>
                            </div>
                            <div class="text">
                                <p>Contact us today to explore the best real estate opportunities tailored to your needs. Whether you're looking to buy, sell, or invest, our dedicated team is here to guide you through every step. Reach out via phone, email, or visit our office for personalized assistance. Let's make your real estate journey smooth and successful!</p>
                            </div>
                            <div class="office">
                                <div class="address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p>Office no 210, 212, 2nd floor, Jaina tower-2, District centre, New Delhi-110058</p>
                                </div>

                                <div class="address">
                                    <i class="fa-solid fa-phone"></i>
                                    <p>01145531923</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="map mt-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d435519.2274167598!2d74.00472289272936!3d31.483103659918054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190483e58107d9%3A0xc23abe6ccc7e2462!2sLahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1716976514868!5m2!1sen!2s"></iframe>
    </div>
</div>
<!--location Section is end-->
<?php include('includes/footer.php') ?>
<script>
    function convalidateEmail(email) {
        const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        const errorMsg = document.getElementById('conemailIdErrMsg');
        const getStartedBtn = document.getElementsByClassName('submitcladd')[0]; 
    
        if (email.indexOf('@') === -1) {
            errorMsg.textContent = 'Email must contain @ symbol.';
            getStartedBtn.disabled = true;
        } else if (emailPattern.test(email)) {
            errorMsg.textContent = '';
            getStartedBtn.disabled = false;
        } else {
            errorMsg.textContent = 'Please enter a valid email address.';
            getStartedBtn.disabled = true;
        }
    }
    
function concheckNumber() {
    var input = document.getElementById('connumber');
    var errorMessage = document.getElementById('connumberErrMsg');
    var getStartedBtn = document.getElementsByClassName('submitcladd')[0];

    var value = input.value.replace(/\D/g, '');

    var isValid = true;

    if (value.length > 0) {
        var firstDigit = parseInt(value.charAt(0));
        if (firstDigit < 6 || firstDigit > 9) {
            value = ''; 
            isValid = false;
        }
    }

    if (value.length > 10) {
        value = value.slice(0, 10);
    }

    input.value = value;

    if (value.length === 10 && isValid) {
        errorMessage.style.display = 'none';
        getStartedBtn.disabled = false;
    } else {
        errorMessage.style.display = 'block';
        getStartedBtn.disabled = true;
    }
}


    
</script>
    