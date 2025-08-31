<style>
    .realestate-footer-socials.hny ul {
    flex-direction: row;
}
.footer-bottom-contentr {
    border-top: 1px solid #181818;
}
.mob_payrrent li {
    background-color: #042065;
    width: 47%;
    border-radius: 10px;
    margin: 10px;
}

.mob_payrrent li a {
    text-align: center;
    color: white;
}
.mob_payrrent {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.copyright span {
    font-size: 11px;
}
.tech a{
    /*color: #F8BB18; !important;*/
    color:white;
    font-size: 15px;
    /*font-weight:500;*/
    /*text-decoration:underline;*/
     line-height:50px;
     text-align:center;
}
.big{
     color:white;
     background-color: #f22b68;
    padding: 1px 10px;
    /*border-radius: 10px;*/
    border-start-end-radius: 20px;
    border-end-start-radius: 20px;
 }
</style>
<footer class="footer-style1">
    <div id="realestate-footer" class="footer-main-contentr  pt-80 pb-50">
        <div class="container">
            <div class="row real-estate-blogs">
                <div class="col-sm-12  col-md-6 col-lg-4">
                    <div class="realestate-footer-sidebar">
                        <div class="realestate-footer-details">
                            <a class="realestate-footer-logo" href="index.php">
                                <img src="assets/images/main_logo.png" alt="footer-logo">
                            </a>
                            <ul class="realetate-footer-details">
                                <li><i class="fa-solid fa-location-dot"></i>
                                    <span>Office no 210, 212, 2nd floor, Jaina tower-2, District centre, New Delhi-110058</span>
                                </li>
                                <li><i class="fa-solid fa-phone"></i><a href="tel:123-456-7890"><span>01145531923</a></span>
                                </li>
                                <li><i class="fa-solid fa-envelope"></i>
                                <a href="mailto:support@RealEstatePro.com"><span>info@nonbrokerage.in</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6  col-lg-2">
                    <div class="realestate-footer-sidebar">
                        <h2>Quick Links</h2>
                        <ul>
                            <li><a href="about.php"><span>About </a></span> </li>
                            <li><a href="listing.php"><span>List Property </span></a> </li>
                            <!--<li><a href="agents.php">Our Agents </a> </li>-->
                            <li><a href="contact.php"><span>Contact Us </span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12  col-md-6 col-lg-2">
                    <div class="realestate-footer-sidebar">
                        <h2>Discover Location</h2>
                        <ul>
                            <?php
                                $getGroupsDataQ = mysqli_query($con,"SELECT s.* FROM states s JOIN property p ON s.id = p.state WHERE p.status = 1 AND p.trash = 0 GROUP BY s.id");
                        
                                while ($getGroupsData = mysqli_fetch_array($getGroupsDataQ)) {
                                    $encodedLocation = urlencode($getGroupsData['name']);
                            ?>
                            <li><a href="listing.php?location=<?= $encodedLocation; ?>"><span><?= $getGroupsData['name']; ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="realestate-footer-sidebar">
                        <h2>Get the latest information about <br> properties from Non Brokerage</h2>
                        <div class="realestate-footer-sidebar-form">
                            
                            <form id="realestate-suscribe-news" class="newslteer" action="javascript:void(0);" method="post">
                                <div class="realestate-subscriber-content">
                                    <input type="text" class="form-control realestate-input"
                                        id="realestate-suscribeer-email" name="nl_email" placeholder="Enter your email here" oninput="validateEmail()">
                                    
                                        <input type="hidden" name="nl_type" value="nl_subscription">
                                    <button type="submit" class="realestate-subscrip-btn newsltr" id="subscribe">Subscribe</button>
                                </div>
                                <small id="email-error" style="color: tomato; display: none;">Please enter a valid email address.</small>
                            </form>
                            
                            <script>
                                function validateEmail() {
                                    const emailInput = document.getElementById('realestate-suscribeer-email');
                                    const emailError = document.getElementById('email-error');
                                    const subscribeButton = document.getElementById('subscribe');
                                    const email = emailInput.value;
                            
                                    // Regular expression for email validation
                                    const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
                            
                                    if (!emailRegex.test(email)) {
                                        emailError.style.display = 'block'; 
                                        emailInput.style.borderColor = 'tomato';
                                        subscribeButton.disabled = true; // Disable the button if invalid
                                    } else {
                                        emailError.style.display = 'none'; 
                                        emailInput.style.borderColor = ''; 
                                        subscribeButton.disabled = false; // Enable the button if valid
                                    }
                                }
                            </script>
                            
                        </div>
                        <div class="realestate-footer-socials hny">
                        <p>Follow Us</p>
                        <ul>
                            <li><a href="javascript:;"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li>
                                <a href="javascript:;"><i class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="realestate-bottom" class="footer-bottom-contentr">
        <div class="container">
            <div class="row pt-30 pb-40">
                <div class="col-lg-6 col-md-1">
                    <div class="copyright">
                        <p><span class="fs-6">© 2024 All Rights Reserved By Non Brokerage &ensp;| &ensp; Powered By </span><span class="tech  p-1 pt-2"> <a href="https://www.tsofttech.co/" target="_blank">T SOFT TECH</a></span></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-1">
                    <div class="realestate-sub-footer-nav-menus">
                        <ul>
                            <li><a href="privacy-policy.php"><span>Privacy Policy</span></a></li>
                            <li> <a href="term-conditions.php"><span>Term & Conditions </span></a> </li>
                            <li> <a href="cookie-policy.php"><span>Cookie Policy</span></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- login model  -->



<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="realestate-offcanvas-navigation">
    <div class="offcanvas-header">
        <div class="realestate-header-logo">
            <a href="index.php">
                <img loading="lazy" src="assets/images/main_logo.png" alt="realestate-logo">
            </a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="realestate-sidebar-body">
        <ul class="realestate-navigation-nav-menus">
            <li><a href="index.php">Home </a> </li>
            <li><a href="about.php">About </a> </li>
            <li><a href="listing.php">All Property </a> </li>
            <li><a href="app-download.php">Download App <span class="app_free__download">Free</span></a></li>
            <li><a href="contact.php">Contact Us</a></li>
          
            <div class="mob_payrrent">
             <?php 
                            if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] === true) {
                            ?>
                             <li><a href="payrent.php">Pay Rent</a></li>
                            <?php
                            } else {
                            ?>
                           
                             <li><a href="account.php">Pay Rent</a></li>
                            <?php
                            }
                            ?>
                            
                           
                            <?php 
                            if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] === true) {
                            ?>
                               
                                            <li><a href="user/add_property.php">List Your Property</a></li>

                                
                            <?php
                            } else {
                            ?>
                               
                                            <li><a href="account.php">List Your Property</a></li>

                            <?php
                            }
                            ?>
                            </div>

        </ul>
    </div>
</div>

<!-- all JS files includes  -->
<script src="assets/js/jquery-min.js"></script>
<script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/lib/select2/select2.min.js"></script>
<script src="assets/lib/slick/slick.js"></script>
<script src="assets/lib/pretty-photo/js/jquery.prettyPhoto.js"></script>
<script src="assets/lib/sticky-kit/jquery.sticky-kit.min.js"></script>
<script src="assets/lib/counters/jquery.countup.js"></script>
<script src="assets/lib/counters/jquery.waypoints.min.js"></script>
<script src="assets/js/realestate-scripts.js?v=12345678"></script>
<!-- loop style 1 -->
<script src="assets/js/loop/property/style1.js"></script>
<script src="assets/js/single.js"></script>
<script src="assets/js/main.js"></script>

<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        function userLogout2() {
            $.ajax({
                url: "user/ajax/logout.php",
                type: "POST",
                success: function (data) {
                    window.location.href = "https://nonbrokerage.in/account.php";
                },
                error: function (xhr, status, error) {
                    console.error("Logout request failed:", status, error);
                }
            });
        }
</script>

</body>

</html>