<?php 
session_start();
if (!isset($_SESSION['userLoginStatus']) || $_SESSION['userLoginStatus'] !== true) {
    header("Location: https://nonbrokerage.in/account.php");
    exit(); 
}

include('includes/header.php');

if (isset($_GET['property_id'])) {
     $tkn_id = $_GET['property_id'];

    $propertyQuery = "SELECT p.*, s.name as state_name, c.city as city_name FROM `property` p 
                      JOIN `states` s ON p.state = s.id 
                      JOIN `cities` c ON p.city = c.id 
                      WHERE p.property_id = '$tkn_id'";
    
    $propertyResult = mysqli_query($con, $propertyQuery);
    $propertyData = mysqli_fetch_array($propertyResult);

    if ($propertyData) {
        $imagesQuery = "SELECT * FROM `prop_img` WHERE property_id = '$tkn_id' AND trash=0";
        $imagesResult = mysqli_query($con, $imagesQuery);
        $images = [];
        while ($imageRow = mysqli_fetch_assoc($imagesResult)) {
            $images[] = $imageRow;
        }
        $propertyData['images'] = $images;

        $facilitiesQuery = "SELECT * FROM `env_facility` WHERE property_id = '$tkn_id' AND trash=0";
        $facilitiesResult = mysqli_query($con, $facilitiesQuery);
        $facilities = [];
        while ($facilityRow = mysqli_fetch_assoc($facilitiesResult)) {
            $facilities[] = $facilityRow['env_facility']; 
        }
        $propertyData['facilities'] = $facilities;

        $uid = $propertyData['uid'];
        $userQuery = "SELECT * FROM `user` WHERE auth_token = '$uid'";
        $userResult = mysqli_query($con, $userQuery);
        $userData = mysqli_fetch_array($userResult);

        $propertyData['user'] = $userData;
    }
}

?>

<style>
    .bredcurm_section {
        height: auto;
    }

    .realestate-content-container {
        background-color: white;
    }

    .list_details_slider .slick-prev {
        position: absolute;
        bottom: 3rem;
        right: 2rem;
        z-index: 2;
        border: none;
        background-color: white;
        padding: 6px 11px;
        border-radius: 21px;
        border: 3px solid #373373;
        font-size: 16px;
    }

    .list_details_slider .slick-next {
        position: absolute;
        bottom: 3rem;
        right: 5rem;
        z-index: 2;
        border: none;
        background-color: white;
        padding: 6px 11px;
        border-radius: 21px;
        border: 3px solid #373373;
        font-size: 16px;
    }

    .list_details_slider {
        width: 100%;
        height: 430px;
        overflow: hidden;
        position: relative;
        border-radius: 16px;
    }

    .hny_relative {
        position: relative;
    }

    i.fa.fa-whatsapp {
        font-family: 'Font Awesome 6 Brands';
    }

    .gap-30 {
        gap: 30px;
    }

    .both_btn a {
        background-color: #373373;
        color: white;
        margin: 14px 0;
        border-radius: 13px;
    }
    .agent-form-submission {
    padding: 20px;
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 0 17px 0 rgba(0, 0, 0, .08);
    border: solid 1px #ededed;
    background: #fff;
    position: relative;
}
.realestate-main-profile {
    padding: 17px;
}
.realestate-highlighted-section-border.hny {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 0 17px 0 rgba(0, 0, 0, .08);
    border: solid 1px #ededed;
    background: #fff;
    position: relative;
    margin-bottom: 16px;
}
.realestate-item .real-listings-post-content .post-details ul li img{
    width: 18px;
}
.realestate-item .real-listings-post-content .post-details ul li {
    border-radius: 23px !important;
}
.realestate-main-profile .realestate-profile-icons a {
    width: calc(136% / 3)!important;
}

.realestate-single-widget.realestate-section-details .realestate-property-details li {
    font-size: 11px;
    font-style: normal;
    /*font-weight: 300;*/
    line-height: 26.4px;
    color: #676767;
    margin-right: 4px;
    font-family: var(--primary-font);
    display: flex;
    /*flex-direction: column;*/
    margin-top: 20px;
    text-transform: uppercase;
    flex-wrap: wrap;
    background-color: #f5f5f5;
    border-radius: 30px;
    gap: 6px;
    padding-left: 10px;
    padding-right: 2px;
}
.realestate-single-widget.realestate-section-details .realestate-property-details {
    display: grid;
    gap: 1px;
    grid-template-columns: repeat(4, 1fr);
    align-items: center;
    margin-bottom: 12px;
}

.realestate-single-widget.realestate-section-details .realestate-property-details img{
    width: 18px;
}
@media (max-width: 1200px) {
    .realestate-single-widget.realestate-section-details .realestate-property-details {
        grid-template-columns: repeat(3, 1fr); 
    }
}

@media (max-width: 767px) {
    .realestate-single-widget.realestate-section-details .realestate-property-details li {
        grid-template-columns: repeat(2, 1fr); 
        width:100px;
        padding:0px;
    }
}



</style>
<div class="bredcurm_section"></div>
<div class="realestate-content-container">
    <div class="realestate-single-page realestate-property-single-page single-style2 pl-10 pr-10  pb-30">
        <div class="realestate-single-gallery2">
            <div class="container">
                <div class="row pt-4">
                    <div class="col-lg-7 hny_relative">
                        <div class="list_details_slider list_details_slider">
                            <?php foreach ($propertyData['images'] as $image): ?>
                                <div>
                                    <div class="realestate-gallery-slider-slide">
                                        <a data-fancybox="" class="fancybox" href="<?php echo $image['image']; ?>">
                                            <img src="<?php echo $image['image']; ?>" alt="Property Image">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <div class="col-lg-5">
                        <div class="hny_pricce_section">
                            <div class="realestate-single-section realestate-bottom-border  realestate-section-details realestate-single-section-bordered pb-20 mb-30  overview" id="overview">
                                <div class="row side-bar-widget-map">
                                    <div class="col-md-12">
                                        <div class="map-side-bar">
                                            <div class="realestate-item">
                                                <div class="realestate-section-fields">
                                                    <div class="realestate-single-widget  realestate-section-details">
                                                        <div class="realestate-item-details realestate-active-details">
                                                            <h6><?php echo $propertyData['category']; ?></h6>
                                                            <h1 class="realestate-price"><?php echo $propertyData['pr_name']; ?></h1>
                                                            <h2 class="mt-2">₹ <?php echo number_format($propertyData['price']); ?></h2>
                                                            <p class="realestate-adress"><span><?php echo $propertyData['city_name']; ?>, <?php echo $propertyData['state_name']; ?></span></p>
                                                            <div class="realestate-single-widget ">
                                                                <div class="realestate-property-item-type-status d-flex align-items-center">
                                                                    <i class="fa-solid fa-circle"></i>
                                                                    <h3>For Rent</h3>
                                                                </div>
                                                            </div>
                                                            <ul class="realestate-property-details">
                                                                <?php if (!empty($propertyData['bedroom'])): ?>
                                                                <li><span><img src="assets/images/single-bed.png" alt="bedroom"></span> <b><?= $propertyData['bedroom']; ?></b> bed</li>
                                                                <?php endif; ?>
                                                        
                                                                <?php if (!empty($propertyData['bathroom'])): ?>
                                                                <li><span><img src="assets/images/icons/bath.svg" alt="bathroom"></span> <b><?= $propertyData['bathroom']; ?></b> bath</li>
                                                                <?php endif; ?>
                                                        
                                                                <?php if (!empty($propertyData['hall'])): ?>
                                                                <li><span><img src="assets/images/city-hall.png" alt="hall"></span> <b><?= $propertyData['hall']; ?></b> hall</li>
                                                                <?php endif; ?>
                                                                
                                                                <?php if (!empty($propertyData['kitchen'])): ?>
                                                                <li><span><img src="assets/images/kitchen.png" alt="kitchen"></span> <b><?= $propertyData['kitchen']; ?></b> Kitchen</li>
                                                                <?php endif; ?>
                                                        
                                                                <?php if (!empty($propertyData['balcony'])): ?>
                                                                <li><span><img src="assets/images/balcony.png" alt="balcony"></span> <b><?= $propertyData['balcony']; ?></b> balcony</li>
                                                                <?php endif; ?>
                                                            </ul>
                                                            <div class="both_btn d-flex gap-30">


                                                                <a href="#enquiry_form" class="realestate-filled-btn realestate-submission-btn">
                                                                    <i class="fa fa-question-circle"></i>Enquire Now
                                                                </a>


                                                                <!--<a href="tel:<?php echo $propertyData['user']['mobile']; ?>" class="realestate-filled-btn realestate-submission-btn">-->
                                                                <!--    <i class="fa fa-phone"></i> Request for call-->
                                                                <!--</a>-->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="realestate-single-main-cotent pb-40 pt-20 overflow-hidden ">
        <div class="container">
            <div class="row realestate-main-content-contaner">
                <div class="col-lg-8 col-md-12">
                    <div class="realestate-single-cotent position-relative">

                        <div class="realestate-single-section hny realestate-section-details realestate-single-section-bordered pb-20 property-details" id="property-details">
                            <h4 class="mb-10 mt-20">Property Information</h4>
                            <div class="realestate-single-description-content">
                                <div class="realestate-single-description">
                                    <?php echo $propertyData['prop_desc']; ?>
                                </div>


                            </div>
                        </div>

                        <div class="realestate-single-section hny realestate-section-details realestate-single-section-bordered property-details1 pb-20 mb-20">
                            <h4 class="mb-10 title">Key Highlights</h4>

                            <div class="property-detail-border-bg-light">
                                <div class="property-detail-border row d-flex">
                                    <?php if (!empty($propertyData['bedroom'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features">
                                            <h3>Bedroom</h3>
                                            <p><?= $propertyData['bedroom']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['bathroom'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features two">
                                            <h3>Bathroom</h3>
                                            <p><?= $propertyData['bathroom']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['hall'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features two">
                                            <h3>Hall</h3>
                                            <p><?= $propertyData['hall']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['kitchen'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features">
                                            <h3>Kitchen</h3>
                                            <p><?= $propertyData['kitchen']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['balcony'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features two">
                                            <h3>Balcony</h3>
                                            <p><?= $propertyData['balcony']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['facing'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features two">
                                            <h3>Facing</h3>
                                            <p><?= $propertyData['facing']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['address'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features">
                                            <h3>Address</h3>
                                            <p><?= $propertyData['address']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['address2'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features two">
                                            <h3>Address 2</h3>
                                            <p><?= $propertyData['address2']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['city_name'])): ?>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="realestate-single-section-features two">
                                            <h3>City</h3>
                                            <p><?= $propertyData['city_name']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['state_name'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features two">
                                            <h3>State</h3>
                                            <p><?= $propertyData['state_name']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($propertyData['pincode'])): ?>
                                    <div class="col-lg-4 col-6">
                                        <div class="realestate-single-section-features two">
                                            <h3>Pincode</h3>
                                            <p><?= $propertyData['pincode']; ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>


                            </div>

                        </div>

                        <!--<div class="realestate-single-section  realestate-section-details  pb-20 mb-20" id="map">-->
                        <!--    <div class="realestate-map-section">-->
                             
                        <!--        <div id="realestate-map" class="realestate-map">-->
                        <!--            <iframe id="map"-->
                        <!--                style="width: 100%; height: 300px; border: 1px solid #fff; border-radius: 1rem; margin-bottom: 30px;"-->
                        <!--                src="https://maps.google.com/maps?q=<?php echo urlencode($propertyData['lats'] . ',' . $propertyData['longs']); ?>&output=embed">-->
                        <!--            </iframe>-->

                                     
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                       
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 position-relative">
                    <div class="realestate-single-sidebar single-realestate-sidebar-top">
                        
                        <!--<div class="realestate-highlighted-section-border hny">-->
                        <!--    <div class="realestate-main-profile">-->
                        <!--        <div class="realestate-profile-content">-->
                        <!--            <img src="<?php echo $propertyData['user']['profileimg']; ?>" alt="user">-->
                        <!--            <div class="content-name">-->
                        <!--                <h4><?php echo $propertyData['user']['fullname']; ?></h4>-->
                                      
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="realestate-profile-icons">-->
                        <!--            <a class="call" href="tel:<?php echo $propertyData['user']['mobile']; ?>"><i class="fa-solid fa-phone"></i>Call</a>-->
                        <!--             <a class="call" href="https://nonbrokerage.in/agents-details.php?uid=<?= $propertyData['user']['auth_token'];?>"></i>View All Property</a>-->

                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <div class="realestate-highlighted-section-border mb-20" >
                            <div class="realestate-booking-form">
                                <div class="realestate-toure-content">
                                    <h2 class="realestate-title">Let’s Enquire This Property</h2>
                                       <form action="javascript:;" id="enquiry_form" class="agent-form-submission" method="post" >
                                            <div class="realestate-single-contact-form">
                                                <div class="realestate-form-inputs">
                                                    <label for="en_name">Full name</label>
                                                    <input type="text" name="en_name" id="en_name" placeholder="Enter Your Name" required>
                                                </div>
                                                <div class="realestate-form-inputs">
                                                    <label for="en_phone">Contact number</label>
                                                    <input type="number" name="en_phone" id="en_phone" placeholder="+91" required oninput="enqcheckNumber()">
                                                    <div class="err_msg" style="color:red;display:none;" id="enqnumberErrMsg">Please enter a valid 10-digit number</div>
                                                </div>
                                                <div class="realestate-form-inputs">
                                                    <label for="en_email">Email</label>
                                                    <input type="email" name="en_email" id="en_email" placeholder="Enter Email" required oninput="enqvalidateEmail(this.value)">
                                                    <div class="err_msg" style="color:red;" id="enqemailIdErrMsg"></div>
                                                </div>
                                                <div class="realestate-form-inputs">
                                                    <label for="en_comment">Message (optional)</label>
                                                    <textarea name="en_comment" id="en_comment"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="property_id" value="<?= $tkn_id; ?>">
                                            <input type="hidden" name="uid" value="<?= $uid; ?>">
                                            <input type="hidden" name="typeEnq" value="propertyenq">
                                            <button type="submit" class="btn btn-primary enqurychh" name="enquiryBtn" id="enquiryBtn" >Send a request</button>
        
                                        </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="realestate-single-section  realestate-section-details realestate-single-section-bordered property-details pb-20 mb-20" id="similar">
                <div class="realestate-similar-homes">
                    <h2>Nearby similar homes</h2>
                    <div class="similar-homes-thumb">
                        <div class="row realestate-post-slider">
                           <?php
                                // Fetch the category of the property
                                $categoryResult = mysqli_query($con, "SELECT category FROM `property` WHERE property_id = '$tkn_id'");
                                $category = mysqli_fetch_assoc($categoryResult)['category'];
                                
                                // Query to fetch related properties based on the category
                                $query = "SELECT p.*, pi.image AS property_image, s.name AS state_name, c.city 
                                          FROM property p 
                                          LEFT JOIN prop_img pi ON p.property_id = pi.property_id AND pi.trash = '0'
                                          LEFT JOIN states s ON p.state = s.id 
                                          LEFT JOIN cities c ON p.city = c.id 
                                          WHERE p.status = '1' 
                                            AND p.trash = '0' 
                                            AND p.category = '$category'
                                            AND p.property_id != '$tkn_id'
                                          GROUP BY p.property_id
                                          ORDER BY p.property_id";
                                
                                $getProperties = mysqli_query($con, $query);
                                
                                while ($property = mysqli_fetch_assoc($getProperties)) : ?>
                                    <div class="col-md-4">
                                        <div class="realestate-item loop-style1">
                                            <div class="real-listings-post-item">
                                                <div class="real-listings-post-thumbnail">
                                                    <div class="post-img loop-style1-grid-slider">
                                                        <img src="<?= $property['property_image']; ?>" alt="<?= $property['property_name']; ?>">
                                                    </div>
                                                    <div class="post-for rent">
                                                        <span>For Rent</span>
                                                    </div>
                                                    <a href="list-details.php?property_id=<?= $property['property_id']; ?>" class="realestate-strech-link position-absolute"></a>
                                                </div>
                                                <div class="real-listings-post-content">
                                                    
                                                    <div class="post-title">
                                                        <a href="list-details.php?property_id=<?= $property['property_id']; ?>">
                                                            <h2><?= $property['pr_name']; ?></h2>
                                                        </a>
                                                    </div>
                                                    <div class="post-price">
                                                        <span> ₹ <?= number_format($property['price'], 0) ?></span>
                                                    </div>
                                                   
                                                    <div class="post-details">
                                                        <ul>
                                                            <?php if (!empty($property['bedroom'])): ?>
                                                            <li><span><img src="assets/images/single-bed.png" alt="bedroom"></span> <?= $property['bedroom']; ?> bed</li>
                                                            <?php endif; ?>
                                                            
                                                            <?php if (!empty($property['bathroom'])): ?>
                                                            <li><span><img src="assets/images/icons/bath.svg" alt="bathroom"></span> <?= $property['bathroom']; ?> bath</li>
                                                            <?php endif; ?>
                                                            
                                                            <?php if (!empty($property['hall'])): ?>
                                                            <li><span><img src="assets/images/city-hall.png" alt="hall"></span> <?= $property['hall']; ?> hall</li>
                                                            <?php endif; ?>
                                                            
                                                            <?php if (!empty($property['kitchen'])): ?>
                                                            <li><span><img src="assets/images/kitchen.png" alt="kitchen"></span> <?= $property['kitchen']; ?> Kitchen</li>
                                                            <?php endif; ?>
                                                            
                                                            <?php if (!empty($property['balcony'])): ?>
                                                            <li><span><img src="assets/images/balcony.png" alt="balcony"></span> <?= $property['balcony']; ?> balcony</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                     <div class="post-location">
                                                        <span class="p-md"><img src="assets/images/icons/map.svg" alt="pin"><?= $property['city']; ?>, <?= $property['state_name']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                        </div>
                    </div>
                </div>

            </div>
            <div class="realestate-single-section  realestate-section-details realestate-single-section-bordered property-details pb-20 mb-20" id="accordians">
                <div class="realestate-faqs-accordians">
                    <h2 class="mb-40">Frequently asked questions</h2>
                    <ul class="realestate-faqs-list realestate-faqs-accordians-list">
                        <li class="accordians1">
                            <h5>How competitive is the market for this home? <i class="fa-solid fa-chevron-down"></i></h5>
                            <p class="realestate-hide">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium dicta odio necessitatibus
                                doloremque quam consequatur illum velit. Voluptatibus ea,
                                doloremque quisquam iusto saepe laboriosam quas maxime id earum
                                rem eligendi.</p>
                        </li>
                        <li class="accordians2">
                            <h5>What comparable homes are near this home? <i class="fa-solid fa-chevron-down"></i></h5>
                            <p class="realestate-hide">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium dicta odio necessitatibus
                                doloremque quam consequatur illum velit. Voluptatibus ea,
                                doloremque quisquam iusto saepe laboriosam quas maxime id earum
                                rem eligendi.</p>
                        </li>
                        <li class="accordians3">
                            <h5>How many photos are available for this home? <i class="fa-solid fa-chevron-down"></i></h5>
                            <p class="realestate-hide">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium dicta odio necessitatibus
                                doloremque quam consequatur illum velit. Voluptatibus ea,
                                doloremque quisquam iusto saepe laboriosam quas maxime id earum
                                rem eligendi.</p>
                        </li>
                        <li class="accordians4">
                            <h5>What’s the full address of this home? <i class="fa-solid fa-chevron-down"></i></h5>
                            <p class="realestate-hide">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium dicta odio necessitatibus
                                doloremque quam consequatur illum velit. Voluptatibus ea,
                                doloremque quisquam iusto saepe laboriosam quas maxime id earum
                                rem eligendi.</p>
                        </li>
                        <li class="accordians5">
                            <h5>How much is this home worth? <i class="fa-solid fa-chevron-down"></i></h5>
                            <p class="realestate-hide">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium dicta odio necessitatibus
                                doloremque quam consequatur illum velit. Voluptatibus ea,
                                doloremque quisquam iusto saepe laboriosam quas maxime id earum
                                rem eligendi.</p>
                        </li>
                        <li class="accordians6">
                            <h5>What's the housing market like in Watters Crossing? <i class="fa-solid fa-chevron-down"></i></h5>
                            <p class="realestate-hide">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium dicta odio necessitatibus
                                doloremque quam consequatur illum velit. Voluptatibus ea,
                                doloremque quisquam iusto saepe laboriosam quas maxime id earum
                                rem eligendi.</p>
                        </li>
                        <li class="accordians7">
                            <h5>How long has this home been listed on Redfin? <i class="fa-solid fa-chevron-down"></i></h5>
                            <p class="realestate-hide">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium dicta odio necessitatibus
                                doloremque quam consequatur illum velit. Voluptatibus ea,
                                doloremque quisquam iusto saepe laboriosam quas maxime id earum
                                rem eligendi.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('includes/footer.php') ?>
<script>
    $('.list_details_slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-left' aria-hidden='true'></i></button>"
    });
</script>
<script>
    function enqvalidateEmail(email) {
        const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        const errorMsg = document.getElementById('enqemailIdErrMsg');
        const getStartedBtn = document.getElementsByClassName('enqurychh')[0]; 
    
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
    
function enqcheckNumber() {
    var input = document.getElementById('en_phone');
    var errorMessage = document.getElementById('enqnumberErrMsg');
    var getStartedBtn = document.getElementsByClassName('enqurychh')[0];

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