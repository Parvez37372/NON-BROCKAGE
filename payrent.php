<?php  
// session_start();
// if (!isset($_SESSION['userLoginStatus']) || $_SESSION['userLoginStatus'] !== true) {
//     header("Location: https://nonbrokerage.in/account.php");
//     exit(); 
// }

include('includes/header.php');

?>
<style>
    section.rent_main__section {
        background-color: #070026;
        padding: 2rem 0;
    }

    .bredcurm_section {
        height: auto;

    }

    .offer_cardd img {
        width: 30px;
        height: 30px;
    }

    .offer_cardd {
        background-color: #f8f8f8;
        padding: 10px;
        position: relative;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .offer_cardd:before {
        content: "";
        width: 5px;
        height: 100%;
        background-color: #0e49db;
        position: absolute;
        left: 0px;
        top: 0;
    }

    .offer_cardd p {
        color: black;
        font-family: 'Inter';
        font-size: 15px;
    }

    .offer_cardd a {
        color: black;
        font-size: 12px;
        margin-top: 0px;
    }

    p.ofrer_pers img {
        width: 15px;
        height: 15px;
    }

    p.ofrer_pers {
        background-color: green;
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        font-size: 10px;
        color: white;
        font-weight: 400;
        border-radius: 16px;
        margin-top: 10px;
    }


    .form-switch .form-check-input {
        width: 3em;
    }

    .form-check-input:checked {
        background-color: #070025;
        border-color: #070025;
    }

    .update_whts {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 2px 6px;
        border: 1px solid #c0c0c0;
        border-radius: 5px;
    }

    .update_whts p {
        font-size: 12px;
    }

    .contact_form_inn input {
        width: 100%;
        padding: 9px;
        border: 1px solid #c8c8c8;
        border-radius: 6px;
    }

    .main_rent_form {
        background-color: white;
        padding: 25px;
        border-radius: 10px;
    }

    .form-check.chek_hyn {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-check.chek_hyn input {
        width: 10px;

    }

    button.rent_btn {
        width: 100%;
        border: none;
        padding: 11px;
        background-color: #070025;
        color: white;
        border-radius: 10px;
    }

    .form-check.chek_hyn label {
        font-size: 12px;
    }

    .form-check.chek_hyn a {
        color: #070026;
        font-size: 12px;
        font-weight: 700;
    }

    .contact_form_inn label {
        font-size: 14px;
        margin-bottom: 4px;
    }

    .instant-trasfer p {
        font-size: 10px;
    }

    .instant-trasfer h5 {
        font-size: 13px;
    }

    .instant-trasfer {
        display: flex;
        align-items: center;
        gap: 15px;
        background-color: aliceblue;
        margin-top: 13px;
        border-radius: 13px;
        padding: 10px;
    }

    .contact_form_inn select {
        font-size: 13px;
        color: gray;
    }

    .rent_left__section p {
        background-color: #ffffff08;
        display: inline-block;
        padding: 10px;
        margin: 2rem 0;
        backdrop-filter: blur(1px);
        font-size: 11px;
        border-radius: 8px;
    }

    .rent_left__section h2 {
        color: white;
    }

    .left_botton__area h3 {
        color: white;
        font-size: 17px;
    }

    .left_botton__area img {
        background-color: white;
        padding: 7px;
        border-radius: 10px;
    }

    .left_botton__area {
        display: flex;
        align-items: center;
        gap: 22px;
    }

    .left_botton__area a {
        color: white;
        font-size: 10px;
        text-decoration: underline;
    }

    .left_botton__area p {
        font-size: 10px;
        max-width: 367px
    }

    section.earn_mony {
        background-color: white;
        padding: 9rem 0;
    }

    .ear_right_se p {
        font-size: 19px;
        color: black;
    }

    .ear_right_se {
        background-color: aliceblue;
        border: 1px solid #c0c0c0;
        padding: 18px;
        display: flex;
        align-items: center;
        gap: 16px;
        border-radius: 12px;
    }

    .bredcurm_section:after {
        background: white;
    }

    p.earn_copy {
        text-align: center;
        font-size: 10px;
        color: black;
        margin-top: 3rem;
    }

    .ear_left_se p {
        margin-top: 11px;
        color: black;
        font-size: 16px;
    }

    .process_card {
        text-align: center;
    }

    .process_card span {
        display: block;
        background-color: wheat;
        width: 30px;
        height: 30px;
        margin: auto;
        margin-top: 13px;
        border-radius: 17px;
        border: 2px solid white;
        color: black;
        font-size: 14px;
        line-height: 2;
    }

    .process_card img {
        width: 100px;
    }

    section.rents_pay_process {
        background-color: #070026;
        padding: 5rem;

    }

    .process_card h3 {
        color: white;
        font-size: 16px;
        margin-top: 16px;
    }

    h3.faq_title {
        text-align: center;
        margin-bottom: 2rem;
    }

    section.faqs_section {
        padding: 5rem;
    }

    .accordion-button:not(.collapsed) {
        color: black;
        background-color: transparent;
        box-shadow: none;
    }

    .accordion-button:focus {

        box-shadow: none;
    }

    .accordion-item {
        border: none;
    }

    .hny_faqs button {
        border: none;
        border-bottom: 1px solid #bcbcbc;
    }
     .next_step_section {
        background-color: white;
        padding: 25px;
        border-radius: 10px;
        margin-top: 10px;
    }

    .contact_form_inn.hny input {
        width: auto !important;
    }

    .gap-20 {
        gap: 20px;
    }

    .gap-10 {
        gap: 10px;
    }

    .contact_form_inn.hny label {
        margin: 0;
        padding-top: 4px;
    }

    input[type=file]::file-selector-button {
        border: 2px solid #070025;
        padding: .2em .4em;
        border-radius: .2em;
        background-color: #070025;
        transition: 1s;
        color: white;
    }

    input[type=file]::file-selector-button:hover {
        background-color: #81ecec;
        border: 2px solid #00cec9;
    }
    
    .success-message {
    color: #ffffff;
    opacity: 0.8;
    background: #0eacdf;
    padding: 10px 15px;
    border-radius: 50px;
    position: fixed;
    bottom: 10px;
    right: 10px;
    z-index: 1000; 
}

.error-message {
    color: #fff;
    opacity: 0.6;
    background: tomato; 
    padding: 10px 15px;
    border-radius: 50px;
    position: fixed;
    bottom: 10px;
    right: 10px;
    z-index: 1000; 
}
.pay_ment_opop {
    display:none; position:fixed; top:40%; left:50%; transform:translate(-50%, -50%); 
    border:1px solid #ddd; background-color:white; padding:0; z-index:9999; width:35%; border-radius:8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
#pop_overlay{
    display: none;
    width: 100%;
    height: 100%;
    background-color: #000000c9;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 999;
}
@media(max-width:768px) {
    section.earn_mony {
    padding: 2rem 0;
}
section.rents_pay_process {
    padding: 1rem;
}
section.faqs_section {
    padding: 1rem;
}
.pay_ment_opop {
     width:90%; 
}
}
    .live-chat-button {
    position: fixed;
    bottom: 20px; 
    left: 20px; 
    background-color: #00cf00; 
    color: white; 
    border-radius: 50%;
    padding: 10px 16px; 
    z-index: 1000; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5) !important; 
    font-size: 26px; 
    transition: background-color 0.3s;
}

.live-chat-button:hover {
    background-color: #fff; 
}
@media (max-width: 768px) {
    .live-chat-button {
        bottom: 15px; 
        left: 15px; 
        padding: 10px 16px; 
        font-size: 20px; 
    }
}
    
</style>

<div class="bredcurm_section"></div>
<section class="rent_main__section">
    <div class="container">
        <div class="row hny_cl__revers align-items-center">
            <div class="col-lg-6">
                <div class="rent_left__section">
                    <h2>Pay Rent and Fees with Credit Card</h2>
                    <p class="low_charges">Lowest Charges. Instant Transfers.</p>
                </div>

                <div class="left_botton__area">
                    <img src="assets/images/rent02.png" alt="" width="50px">
                    <div>
                        <h3>Secure Transactions</h3>
                        <p>We prioritize your financial safety by providing a secure payment gateway, protecting your sensitive information during every transaction.</p>
                    </div>
                </div>
                <div class="left_botton__area mt-5">
                    <img src="assets/images/rent03.png" alt="" width="50px">
                    <div>
                        <h3> Track Payment History</h3>
                        <p>Easily access and review your rent payment history, giving you full transparency and control over your rental finances.</p>
                    </div>
                </div>
                <div class="left_botton__area mt-5">
                    <img src="assets/images/rent04.png" alt="" width="50px">
                    <div>
                        <h3>No Hidden Fees</h3>
                        <p>We offer transparent pricing with no hidden fees, ensuring you know exactly what you’re paying for without any surprises.</p>
                    </div>
                </div>
                <div class="left_botton__area mt-5">
                    <img src="assets/images/app_icon.png" alt="" width="50px">
                    <div>
                        <h3>Normal Payment</h3>
                        <p>You've chosen to pay 1% normally. The additional rent payment</p>
                    </div>
                </div>
                <div class="left_botton__area mt-5">
                    <img src="assets/images/ssl-certificate.png" alt="" width="50px">
                    <div>
                        <h3>Standard Payment</h3>
                        <p>You've chosen to pay with Standard (2.5%). The additional rent payment</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main_rent_form">
                    <div class="top_slier mb-4">
                        <div class="offer_cardd">
                            <div class="d-flex align-items-center" style="gap: 17px">
                                <img src="assets/images/favicon.png" alt="">
                                <div>
                                    <p>Flat ₹100 off on Gift Vouchers on Rent Payment</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:;">View All Offers</a>
                                        <p class="ofrer_pers"><img src="assets/images/discount.png" alt="offer"> Offer 1/2</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="offer_cardd">
                            <div class="d-flex align-items-center" style="gap: 17px">
                                <img src="assets/images/favicon.png" alt="">
                                <div>
                                    <p>Guaranteed Cashback, upto 100% Processing Fees!</p>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:;">View All Offers</a>
                                        <p class="ofrer_pers"><img src="assets/images/discount.png" alt="offer"> Offer 2/2</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                   <form action="javascript:void(0);" method="post" id="getstart" enctype="multipart/form-data">
                        <input type="hidden" name="uid" value="<?= $_SESSION['auth_token'];?>">
                        <input type="hidden" name="useremail"  value="<?= $_SESSION['email'];?>" >
                        <input type="hidden" name="usernumber" value="<?= $_SESSION['mobile'];?>" >
                        <input type="hidden" name="username" value="<?= $_SESSION['fullname'];?>" >
                
                        <div class="contact_form_inn mb-3">
                            <label for="">Payment Type</label>
                            <select class="form-select" name="pay_type" aria-label="Default select example">
                                <option value="House Rent" selected>House Rent</option>
                                <option value="School/College Fees">School/College Fees</option>
                                <option value="Society Maintenance">Society Maintenance</option>
                                <option value="Office/Shop Rent">Office/Shop Rent</option>
                            </select>
                        </div>
                
                        <div class="contact_form_inn mb-3">
                            <label for="">Your Name</label>
                            <input type="text" name="" value="<?= $_SESSION['fullname'];?>" disabled>
                        </div>
                
                        <div class="contact_form_inn mb-3">
                            <label for="">Mobile</label>
                            <input type="number" name="" value="<?= $_SESSION['mobile'];?>" disabled>
                            <!--<div class="err_msg" style="color:red;display:none;" id="mobileErrMsg">Please enter a valid 10-digit number</div>-->
                        </div>
                
                        <div class="contact_form_inn mb-3">
                            <label for="">Email</label>
                            <input type="email" name="" value="<?= $_SESSION['email'];?>" disabled>
                            <!--<div class="err_msg" style="color:red;" id="emailIdErrMsg"></div>-->
                        </div>
                
                        <button class="rent_btn" type="submit" id="getstarted">Get Started</button>
                        <div class="err_msg" style="color:red;display:none;" id="formErrMsg"></div>
                    </form>
                    <div class="instant-trasfer">
                        <img src="assets/images/money.png" alt="">
                        <div>
                            <h5>24/7 Instant Transfers</h5>
                            <p>Your payment will be transferred instantly to your landlord’s account*
                            </p>
                        </div>
                    </div>
                    
                </div>
                 <div class="next_step_section">
                    <h2 class="mb-3">Payment Details</h2>
                    <form action="javascript:void(0);" method="post" id="finalForm" enctype="multipart/form-data">
                        <input type="hidden" name="pay_token" id="pay_token" value="">
                        <input type="hidden" name="uid2" value="<?= $_SESSION['auth_token'];?>">
                        <input type="hidden" name="tenent_phone" value="<?= $_SESSION['mobile'];?>" >
                        <input type="hidden" name="tenent_name" value="<?= $_SESSION['fullname'];?>" >
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact_form_inn mb-3">
                                    <label for="">Landlord Name</label>
                                    <input type="text" name="land_name" id="land_name" placeholder="Enter Landlord Name" required>
                                    <div class="err_msg" style="color:red;" id="land_nameErrMsg"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact_form_inn mb-3">
                                    <label for="">Landlord Mobile</label>
                                    <input type="tel" name="land_number" id="nnumber2" placeholder="Enter Landlord Mobile number" minlength="10" maxlength="10" pattern="\d{10}" oninput="checkNumber2()">
                                    <div class="err_msg" style="color:red;display:none;" id="land_numberErrMsg">Please enter a valid 10-digit number</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact_form_inn hny mb-3">
                                    <label for="">Choose payment mode</label>
                                    <div class="d-flex align-items-center gap-20">
                                        <div class="form-check d-flex align-items-center gap-10">
                                            <input class="form-check-input" type="radio" name="pay_mode" id="flexRadioDefault2" value="account" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                To Bank Account
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center gap-10">
                                            <input class="form-check-input" type="radio" name="pay_mode" value="upi" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                To UPI ID
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div id="bankAccountDiv">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="contact_form_inn mb-3">
                                                <label for="">Bank Account Number</label>
                                                <input type="text" name="land_acc_number" id="land_acc_number" minlength="9" maxlength="18" placeholder="Enter Bank Account number"  oninput="validateAccNumber(this)">
                                                <div class="err_msg" style="color:red;" id="land_acc_numberErrMsg"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="contact_form_inn mb-3">
                                                <label for="">Confirm Account Number</label>
                                                <input type="text" name="confirm_land_acc" id="confirm_land_acc" minlength="9" maxlength="18" placeholder="Re-enter bank's Account Number" oninput="validateConfirmAccNumber()">
                                                <div class="err_msg" style="color:red;" id="confirm_land_accErrMsg"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="contact_form_inn mb-3">
                                                <label for="">IFSC Code</label>
                                                <input type="text" name="ifsc_code" id="ifsc_code" placeholder="e.g KKBK000430">
                                                <div class="err_msg" style="color:red;" id="ifsc_codeErrMsg"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-12">
                                <div id="upiDiv" style="display: none;">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="contact_form_inn mb-3">
                                                <label for="">Enter UPI ID</label>
                                                <input type="text" name="upiId" id="upiId" placeholder="example@bhim">
                                                <div class="err_msg" style="color:red;" id="upiIdErrMsg"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="contact_form_inn mb-3">
                                    <label for="">BHK Type</label>
                                    <select class="form-select" name="bhk_type" aria-label="Default select example" required>
                                        <option value="1BHK" selected>1BHK</option>
                                        <option value="2BHK">2 BHK</option>
                                        <option value="3BHK">3 BHK</option>
                                        <option value="4BHK">4 BHK</option>
                                        <option value="5BHK">5 BHK</option>
                                        <option value="6BHK">6 BHK</option>
                                        <option value="7BHK">7 BHK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact_form_inn mb-3">
                                    <label for="">Property Address</label>
                                    <input type="text" name="propaddress" id="propaddress" placeholder="Enter Property Address" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact_form_inn mb-3">
                                    <label for="">Rent Amount</label>
                                    <input type="text" name="rent_amt" id="rent_amt" placeholder="Enter Rent Amount" required>
                                    <div class="err_msg" style="color:red;" id="rent_amtErrMsg"></div>
                                
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact_form_inn mb-3">
                                    <label for="">Beneficiary's PAN</label>
                                    <input type="text" name="beneficiary_pan" id="beneficiary_pan" placeholder="Enter your Beneficiary's PAN" required>
                                    <div class="err_msg" style="color:red;" id="beneficiary_panErrMsg"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact_form_inn mb-3">
                                    <label for="">Tenant's Pan ( Required if Amount > 50K)</label>
                                    <input type="text" name="tenant_pan" id="tenant_pan" placeholder="Enter your own PAN number" >
                                    <div class="err_msg" style="color:red;" id="tenant_panErrMsg"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact_form_inn mb-3">
                                    <label for="">Upload rental Agreement ( Required if Amount > 90K)</label>
                                    <input type="file" name="rent_agrmt" id="rent_agrmt">
                                    <div class="err_msg" style="color:red;" id="rent_agrmtErrMsg"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-check d-flex align-items-center gap-10">
                                            <input class="form-check-input" type="checkbox" name="payment_type" id="NormalPayment1" value="Normal">
                                            <label class="form-check-label" for="NormalPayment1">
                                                Normal Payment
                                            </label>
                                        </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-check d-flex align-items-center gap-10">
                                            <input class="form-check-input" type="checkbox" name="payment_type" id="StandardPayment2" value="Standard" >
                                            <label class="form-check-label" for="StandardPayment2">
                                               Standard Payment
                                            </label>
                               </div>
                            </div>
                            <div class="err_msg" style="color:red;margin-top:-7px;padding-bottom:10px;" id="payment_typeErrMsg"></div>
                           
                            
                        </div>

                        <button type="submit" class="rent_btn" id="savePay">Save Payment Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="pop_overlay"></div>

<div id="popupModal" class="pay_ment_opop">

    <!-- Modal Header -->
    <div style="background-color:#dcdcdc; color:#2e2a2a; padding:10px 15px; border-top-left-radius:8px; border-top-right-radius:8px;">
        <span id="popupHeading" style="font-size:16px; font-weight:bold;">Payment Information</span>
        <span id="closePopup" style="cursor:pointer; float:right; background: red; color: white; padding: 1px 7px; border-radius: 20px;">&times;</span>
    </div>

    <!-- Modal Body -->
    <div style="padding:20px;">
        <p id="popupText" style="color:#000; font-size:14px; padding-bottom:20px;"></p>
        <button id="okBtn" class="btn btn-primary" style="font-size:14px; padding:8px 16px;">Proceed</button>
    </div>
</div>


<section class="earn_mony">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ear_left_se">
                    <h3>Earn money with NonBrokerage Pay</h3>
                    <p>Start paying rent using your credit card and earn miles, cashback and reward points.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ear_right_se">
                    <img src="assets/images/download.png" alt="">
                    <p>You can earn up to ₹30,000* by just paying rent for a year by using your credit card</p>
                </div>
            </div>
            <div class="col-12">
                <p class="earn_copy">*This is calculated assuming an annual rent of 4.5 Lakhs on a Club Vistara SBI Card PRIME (Premium)</p>
            </div>
        </div>
    </div>
</section>

<section class="rents_pay_process">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="process_card">
                    <img src="assets/images/process1.svg" alt="">
                    <span>1</span>
                    <h3>Fill Transaction Detail</h3>
                    <p>Provide your beneficiary bank details, and we will setup your account.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="process_card">
                    <img src="assets/images/process1.svg" alt="">
                    <span>2</span>
                    <h3>Make Payment</h3>
                    <p>Make payment through your credit card or debit card.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="process_card">
                    <img src="assets/images/process1.svg" alt="">
                    <span>3</span>
                    <h3>Payment Credited!</h3>
                    <p>Your payment is credited to your beneficiary’s bank account within 2 working days.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faqs_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="faq_title">Frequently Asked Questions</h3>
            </div>
            <div class="col-lg-10 m-auto">

                <div class="accordion hny_faqs" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1. How do I pay my rent through Non Brokerage?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Simply log in to your Non Brokerage account, navigate to the rent pay section, select your preferred payment method, and complete the transaction. It's quick and easy!
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. What payment methods are accepted?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We accept multiple payment methods, including credit cards, debit cards, bank transfers, and UPI, offering you flexibility and convenience.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3. Is my payment information secure?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, we use industry-standard encryption and secure payment gateways to ensure that your payment information is protected at all times.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                4. Will I receive a receipt after payment?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, once your payment is processed, you will receive an electronic receipt via email, and you can also view your payment history in your account.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<a href="user/chat_admin.php" class="live-chat-button">
    <i class="fa fa-comments"></i>
</a>

<?php include('includes/footer.php') ?>
<script>
    $('.top_slier').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>
<script>
    $(document).ready(function() {
        $('input[name="pay_mode"]').on('change', function() {
            if ($('#flexRadioDefault2').is(':checked')) {
                $('#bankAccountDiv').show();
                $('#upiDiv').hide();
            } else if ($('#flexRadioDefault1').is(':checked')) {
                $('#bankAccountDiv').hide();
                $('#upiDiv').show();
            }
        });
    });
    document.getElementById('rent_amt').addEventListener('input', function() {
        // Remove any non-digit characters
        this.value = this.value.replace(/\D/g, '');
    
        // Limit the value to a maximum of 1000000
        if (this.value > 1000000) {
            this.value = 1000000;
        }
    });

</script>
<script>

function checkNumber2() {
    var input = document.getElementById('nnumber2');
    var errorMessage = document.getElementById('land_numberErrMsg');
    var value = input.value.replace(/\D/g, ''); 
    var rentBtn = document.getElementsByClassName('rent_btn');
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
        for (var i = 0; i < rentBtn.length; i++) {
            rentBtn[i].disabled = false; 
        }
    } else {
        errorMessage.style.display = 'block';
        for (var i = 0; i < rentBtn.length; i++) {
            rentBtn[i].disabled = true; 
        }
    }
}

function validateAccNumber(input) {
    var value = input.value;

    if (value.length > 18) {
        input.value = value.slice(0, 18);  
    }

    if (value.length > 0 && value.length < 9) {
        document.getElementById('land_acc_numberErrMsg').innerHTML = "Account No must be at least 9 digits.";
    } else {
        document.getElementById('land_acc_numberErrMsg').innerHTML = ""; 
    }

    validateConfirmAccNumber();  
}

function validateConfirmAccNumber() {
    var accNumberField = document.getElementById('land_acc_number');
    var confirmAccNumberField = document.getElementById('confirm_land_acc');
    
    accNumberField.value = accNumberField.value.replace(/\D/g, '').slice(0, 18);
    confirmAccNumberField.value = confirmAccNumberField.value.replace(/\D/g, '').slice(0, 18);

    var accNumber = accNumberField.value;
    var confirmAccNumber = confirmAccNumberField.value;  
    var rentBtn = document.getElementsByClassName('rent_btn');

    if (confirmAccNumber && accNumber !== confirmAccNumber) {
        document.getElementById('confirm_land_accErrMsg').innerHTML = "Account numbers do not match.";
        for (var i = 0; i < rentBtn.length; i++) {
            rentBtn[i].disabled = true;  
        }
    } else {
        document.getElementById('confirm_land_accErrMsg').innerHTML = ""; 
        for (var i = 0; i < rentBtn.length; i++) {
            rentBtn[i].disabled = false;  
        }
    }
}

document.getElementById('upiId').addEventListener('input', function () {
    var upiId = this.value;
    var errorMsg = document.getElementById('upiIdErrMsg');
    var rentBtn = document.querySelector('.rent_btn');

    var regex = /^[a-z0-9][a-z0-9._-]{1,255}@[a-zA-Z]{2,64}$/;

    if (regex.test(upiId)) {
        errorMsg.textContent = ''; 
        rentBtn.disabled = false;  
        rentBtn.classList.remove('disabled');
    } else {
        errorMsg.textContent = 'Invalid UPI ID format';
        rentBtn.disabled = true;   
        rentBtn.classList.add('disabled');
    }
});

document.getElementById('ifsc_code').addEventListener('input', function () {
    var ifscCodeField = this;
    var errorMsg = document.getElementById('ifsc_codeErrMsg');
    var rentBtn = document.querySelector('.rent_btn');

    ifscCodeField.value = ifscCodeField.value.toUpperCase().slice(0, 11);

    var ifscCode = ifscCodeField.value;
    var regex = /^[A-Z]{4}0[A-Z0-9]{6}$/;

    if (regex.test(ifscCode)) {
        errorMsg.textContent = ''; 
        rentBtn.disabled = false;  
        rentBtn.classList.remove('disabled');
    } else {
        errorMsg.textContent = 'Invalid IFSC code format';
        rentBtn.disabled = true;  
        rentBtn.classList.add('disabled');
    }
});

document.getElementById('beneficiary_pan').addEventListener('input', function() {
    var panField = this;
    var errorMsg = document.getElementById('beneficiary_panErrMsg');
    var rentBtn = document.querySelector('.rent_btn'); // Accessing by class

    panField.value = panField.value.toUpperCase().slice(0, 10);

    var panValue = panField.value;
    var panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;

    if (!panRegex.test(panValue)) {
        errorMsg.textContent = 'Invalid PAN card number';
        rentBtn.disabled = true; 
    } else {
        errorMsg.textContent = '';
        rentBtn.disabled = false; 
    }
});

document.getElementById('tenant_pan').addEventListener('input', function() {
    var panField = this;
    var errorMsg = document.getElementById('tenant_panErrMsg');
    var rentBtn = document.querySelector('.rent_btn'); // Accessing by class

    panField.value = panField.value.toUpperCase().slice(0, 10);

    var panValue = panField.value;
    var panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;

    if (!panRegex.test(panValue)) {
        errorMsg.textContent = 'Invalid PAN card number';
        rentBtn.disabled = true; 
    } else {
        errorMsg.textContent = '';
        rentBtn.disabled = false; 
    }
});

document.getElementById('rent_agrmt').addEventListener('change', function() {
    var fileInput = this;
    var errorMsg = document.getElementById('rent_agrmtErrMsg');
    var rentBtn = document.querySelector('.rent_btn');  // Selecting the first button with the class

    var file = fileInput.files[0];
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;

    if (!file || !allowedExtensions.exec(file.name)) {
        errorMsg.textContent = 'Only jpg, jpeg, png, or pdf files are allowed';
        fileInput.value = '';  // Clear the input
        rentBtn.setAttribute('disabled', 'disabled');  // Disable the button
    } else {
        errorMsg.textContent = '';  // Clear the error message
        rentBtn.removeAttribute('disabled');  // Enable the button
    }
});


document.getElementById('rent_amt').addEventListener('input', function() {
    var rentAmount = document.getElementById('rent_amt').value;

    if (rentAmount && !isNaN(rentAmount)) {
        document.getElementById('NormalPayment1').disabled = false;
        document.getElementById('StandardPayment2').disabled = false;
    } else {
        document.getElementById('NormalPayment1').disabled = true;
        document.getElementById('StandardPayment2').disabled = true;
    }
});

document.getElementById('NormalPayment1').addEventListener('click', function() {
    if (this.checked) {
        var rentAmount = parseFloat(document.getElementById('rent_amt').value);
        var adjustedAmt = rentAmount * 0.01;  
        var adjustedAmount = rentAmount + adjustedAmt;  
        var popupText = 'You have select Normal Payment (1%). The extra charge on your rent is: ₹' + adjustedAmt.toFixed(2) +
                        '<br><br><strong>Total Rent Amount (including 1%): ₹' + adjustedAmount.toFixed(2) + '</strong>';

        document.getElementById('popupText').innerHTML = popupText;
        document.getElementById('popupModal').style.display = 'block';
        document.getElementById("pop_overlay").style.display = 'block';

        document.getElementById('StandardPayment2').checked = false;
    }
});

document.getElementById('StandardPayment2').addEventListener('click', function() {
    if (this.checked) {
        var rentAmount = parseFloat(document.getElementById('rent_amt').value);
        var adjustedAmt = rentAmount * 0.025;  // 2.5% extra charge
        var adjustedAmount = rentAmount + adjustedAmt;  // Total amount with extra charge

        var popupText = 'You have select Standard Payment (2.5%). The extra charge on your rent is: ₹' + adjustedAmt.toFixed(2) +
                        '<br><br><strong>Total Rent Amount (including 2.5%): ₹' + adjustedAmount.toFixed(2) + '</strong>';

        document.getElementById('popupText').innerHTML = popupText; 
        document.getElementById('popupModal').style.display = 'block';
        document.getElementById('pop_overlay').style.display = 'block';


        document.getElementById('NormalPayment1').checked = false;
    }
});


document.getElementById('closePopup').addEventListener('click', function() {
    document.getElementById('popupModal').style.display = 'none';
    document.getElementById('pop_overlay').style.display = 'none';

});

document.getElementById('okBtn').addEventListener('click', function() {
    document.getElementById('popupModal').style.display = 'none';
    document.getElementById('pop_overlay').style.display = 'none';

});


</script>

<script>
    $('.next_step_section').hide(); 

    $(document).ready(function () {
        
        $('#getstart').on('submit', function (e) {
            e.preventDefault(); 
            
            var formData = new FormData(this); 

            $.ajax({
                url: 'ajax/payrent.php',
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

                        if (data.status === "failed") {
                            for (var key in data.errMessage) {
                                $("#" + key + "ErrMsg").html(data.errMessage[key]).show();
                            }
                        } else if (data.status === "firstsaved") {
                            var msg = data.msg;
                            var messageElement = $('<div class="success-message"></div>')
                                .text(msg);
                            $('body').append(messageElement);
                            window.setTimeout(function () {
                                $('.main_rent_form').hide();
                                $(".next_step_section").show();
                                $('#pay_token').val(data.pay_token);
                            }, 1000);
                            window.setTimeout(function () {
                                $('.success-message').remove();
                            }, 2000);
                        } else {
                            var msg = data.msg;
                            var messageElement = $('<div class="error-message"></div>')
                                .text(msg);
                            $('body').append(messageElement); 
                              window.setTimeout(function () {
                                $('.error-message').remove();
                            }, 2000);
                        }

                    } catch (error) {
                        console.error("Error parsing JSON response: ", error);
                    }
                },
                complete: function () {
                    Swal.close();
                },
            });
        });


    $('#finalForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'ajax/payrent.php',
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
                var data = JSON.parse(response);
                console.log(data);

                if (data.status === "failed") {
                    for (var key in data.errMessage) {
                        $("#" + key + "ErrMsg").html(data.errMessage[key]).show();
                    }
                } 
                else if (data.status === "razorpay") {
                    var amount = Math.ceil(data.razorpayData.TXN_AMOUNT);

                    var options = {
                        key: "rzp_live_oTt9IZStLVWvRD",  // Replace this with your actual Razorpay key
                        amount: amount * 100,  // Razorpay requires the amount in paisa, so multiply by 100
                        currency: "INR",
                        name: "NON-BROKERAGE",
                        description: "Pay Rent Transaction",
                        image: "https://nonbrokerage.in/assets/images/main_logo.png",  // Company logo
                        handler: function (response) {
                            jQuery.ajax({
                                type: "POST",
                                url: "ajax/update_payrent.php",
                                data: {
                                    pay_token: data.razorpayData.pay_token,
                                    txn_id: response.razorpay_payment_id,
                                    action: "updateTxn"
                                },
                                beforeSend: function () {
                                    $("#loader").fadeIn(300);
                                },
                                complete: function () {
                                    $("#loader").fadeOut(300);
                                },
                                success: function (data2) {
                                    data2 = JSON.parse(data2);
                                    console.log(data2);

                                    if (data2.status) {
                                        var msg = data2.msg;
                                        var messageElement = $('<div class="success-message"></div>').text(msg);
                                        $('body').append(messageElement);

                                        window.setTimeout(function () {
                                            location.reload();
                                        }, 1000);

                                        window.setTimeout(function () {
                                            $('.success-message').remove();
                                        }, 2000);
                                    } else {
                                        var msg = data2.msg;
                                        var messageElement = $('<div class="error-message"></div>').text(msg);
                                        $('body').append(messageElement);

                                        window.setTimeout(function () {
                                            $('.error-message').remove();
                                        }, 2000);
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.log("AJAX error: ", error);
                                }
                            });
                        },
                        prefill: {
                            name: data.razorpayData.vendorName,
                            email: data.razorpayData.vendorEmailId,
                            contact: data.razorpayData.vendorMob
                        },
                        theme: {
                            color: "#3399cc"
                        }
                    };

                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
                else if (data.status === "success") {
                    window.setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
            },
            complete: function () {
                Swal.close();
            }
        });
    });

});

</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



