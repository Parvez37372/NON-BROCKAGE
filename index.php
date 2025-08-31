<?php include('includes/header.php'); ?>

<style>
.search-results {
    list-style-type: none;
    top: 64px;
    margin: 0px;
    right: 78px;
    padding: 0px;
    border: 1px solid #ccc;
    border-radius: 0px;
    max-height: 190px;
    overflow-y: auto;
    background-color: #fff;
    position: absolute;
    width: 59%;
    z-index: 1000;
}

.search-results li {
  padding: 8px;
  border-bottom: 1px solid #eee;
  cursor: pointer;
}

.search-results li a {
  text-decoration: none;
  color: #333;
  display: block;
}

.search-results li:hover {
  background-color: #f0f0f0;
}

.search-results .no-results {
  color: #999;
  text-align: center;
  padding: 10px;
}

.search-results li a:hover {
  color: #007bff;
}
.post-title ul li {
    width: 110px;
    list-style: none;
    font-size: 14px;
    font-weight: 400;
    display: flex;
    align-items: center;
    gap: 0 8px;
    color: #717171;
    background: #F5F5F5;
    padding: 4px 11px;
    border-radius: 50px;
    line-height: 13px;
    height: 32px;
}

.post-title ul {
    display: flex;
    gap: 10px;
    margin: 12px 0;
    flex-wrap: wrap;
}
.post-title ul img {
    width: 15px;
}
.post-title span {
    padding-top: 3px;
}
.star-rating span {
      font-size: 20px;
      color: gold;
      margin-right: 2px;
   }
   .realestate-classic-section-testimonials{
       border-radius: 18px !important;
       transition: all 2s;
}
    .realestate-classic-section-testimonials:hover{
        transform: scale(1.1);
    }
    
    .re-agent-name a{
        color:black !important;
        font-size: 18px;
    }
      .re-agent-name a:hover{
        color:blue !important;
    }
     .re-agent-name .fa-solid, .fas{
         height: 25px;
         width:25px;
         background: #000030;
         border-radius: 30px;
         color: white;
         text-align: center;
         padding-top: 7px;
     }
     .real-estate-agents .re-agents-post-item .re-agents-post-details .re-agent-name p {
    color: #72809D;
    font-size: 11px;
    padding-left: 40px;
    text-align: start;
}
</style>


<div class="realestate-content-container">
    <!-- Start Banner code  -->
    <div class="realestate-banner-home">
        <div class="container position-relative">
            <div class="realestate-home-banner-headings position-relative mt-20">
                <h1><span>#1</span> The Biggest Non Brokerage <br><span>Property Website Worldwide</span></h1>
            </div>
            <div class="realestate-home-banner-search style1 position-relative">
                <form id="realestate-search-results" action="javascript:;" method="post">

                    <div class="realestate-form-content">

                        <div class="realestate-form">
                            <div class="realestate-form-inputs">
                                <select class="form-control realestate-input select2"
                                    id="realestate-property-type" name="realestate-property-type">
                                    <option value="" disabled selected>Location</option>
                                       
                                          <?php
                                            $getGroupsDataQ = mysqli_query($con,"SELECT s.* FROM states s JOIN property p ON s.id = p.state WHERE p.status = 1 AND p.trash = 0 GROUP BY s.id");
                                      
                                            while ($getGroupsData = mysqli_fetch_array($getGroupsDataQ)) {
                                                $encodedLocation = urlencode($getGroupsData['name']);
                                            ?>
                                            <option value="listing.php?location=<?= $encodedLocation; ?>"><?= $getGroupsData['name']; ?></option>
                                        <?php } ?>


                                </select>
                            </div>
                        </div>
                        <div class="realestate-form">
                            <div class="realestate-form-inputs">
                                <img src="assets/images/icons/home-new-location.svg" alt="location">
                                <input type="text" class="search-txt" id="address-search" placeholder="Search properties...">
                                <ul class="search-results" style="display: none;"></ul>
                            </div>
                        </div>
                        <div class="realestate-form search">
                            <button type="submit" style="cursor:auto;" class="form-control realestate-input-search"
                                id="realestate-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="realestate-category-style1">
                <ul class="realestate-category-style1-list-iterms">
               <?php
                    $i = 1; // Initialize $i to start from 1
                    $getGroupscat = mysqli_query($con, "SELECT category FROM property WHERE status = 1 AND trash = 0 GROUP BY category");
                    
                    while ($getGroupsData = mysqli_fetch_assoc($getGroupscat)) {
                        $encodedLocation = urlencode($getGroupsData['category']);
                    ?>
                        <li>
                            <a href="listing.php?category=<?= $encodedLocation; ?>">
                                <span>
                                    <img src="assets/images/icons/ho<?= $i++; ?>.svg" alt="<?= $getGroupsData['category']; ?>">
                                </span> 
                                <?= $getGroupsData['category']; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>

                    
                </ul>
            </div>
        </div>
    </div>

    <!-- End Banner code  -->

    <section class="classic-diff-categories-main container-fluid pt-20">
        <div class="container-fluid hny-px-5">
            <div class="class-realtive-contnet">
                <div class="element-section-slider-flex">
                    <div class="reaestate-section-headings text-left">
                        <h2>Recently Added</h2>
                        <p>Based on preferences of users like you</p>
                    </div>
                </div>
<?php
$getAllProperties = mysqli_query($con, "SELECT p.*, pi.image AS property_image, s.name, c.city FROM property p LEFT JOIN prop_img pi ON p.property_id = pi.property_id LEFT JOIN states s ON p.state = s.id LEFT JOIN cities c ON p.city = c.id WHERE p.status = '1' AND p.trash = '0' AND pi.trash='0' GROUP BY p.property_id");

$getCategories = mysqli_query($con, "SELECT category FROM property WHERE status = '1' AND trash = '0' GROUP BY category");

$categories = [];
while ($cat = mysqli_fetch_assoc($getCategories)) {
    $categoryName = $cat['category'];
    
    $getProperties = mysqli_query($con, "SELECT p.*, pi.image AS property_image, s.name, c.city FROM property p LEFT JOIN prop_img pi ON p.property_id = pi.property_id LEFT JOIN states s ON p.state = s.id LEFT JOIN cities c ON p.city = c.id WHERE p.status = '1' AND p.trash = '0' AND p.category = '$categoryName' AND pi.trash='0' GROUP BY p.property_id
    ");
    
    $categories[$categoryName] = [];
    while ($property = mysqli_fetch_assoc($getProperties)) {
        $categories[$categoryName][] = $property;
    }
}
?>



                <div class="realestate-property-element-tabs tab-style1 mt-40 ">
                    
                    <ul class="realestate-property-nav nav nav-pills mb-40" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="realestate-property-nav-list nav-link active" id="pills-All-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-All" type="button" role="tab" aria-selected="true">All</button>
                        </li>
                        <?php
                        $firstCategory = true;
                        foreach ($categories as $categoryName => $properties) {
                            $activeClass = $firstCategory ? '' : '';
                            ?>
                            <li class="nav-item" role="presentation">
                                <button class="realestate-property-nav-list nav-link <?= $activeClass ?>" id="pills-<?= $categoryName ?>-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-<?= $categoryName ?>" type="button" role="tab"
                                    aria-selected="false"><?= $categoryName ?></button>
                            </li>
                            <?php
                            $firstCategory = false;
                        }
                        ?>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <!-- "All" Tab Content -->
                        <div class="tab-pane fade show active" id="pills-All" role="tabpanel" aria-labelledby="pills-All-tab">
                            <div class="row explore-slider upper">
                                <?php
                                while ($property = mysqli_fetch_assoc($getAllProperties)) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="realestate-item loop-style1 loop-classic">
                                            <div class="real-listings-post-item">
                                                <div class="real-listings-post-thumbnail">
                                                    <div class="post-img loop-style1-grid-slider">
                                                        <img src="<?= $property['property_image'] ?>" alt="<?= $property['pr_name'] ?>">
                                                    </div>
                                                    <div class="post-for <?= strtolower($property['status']) ?>">
                                                        <span>For <?= $property['status'] == '1' ? 'Rent' : 'Sale' ?></span>
                                                    </div>
                                                </div>
                                                <div class="real-listings-post-content">
                                                    <a href="list-details.php?property_id=<?= $property['property_id'] ?>"
                                                       class="realestate-strech-link position-absolute"></a>
                                                    <div class="for-sale">
                                                        <h4><?= $property['pr_name'] ?></h4>
                                                    </div>
                                                    <div class="rel-post-price">
                                                        <p>₹<?= number_format($property['price'], 0) ?></p>
                                                    </div>
                                                    <div class="post-title">
                                                        <a href="list-details.php?property_id=<?= $property['property_id'] ?>">
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
                                                        </a>
                                                    </div>
                                                    <div class="post-location">
                                                        <span class="p-md"><img src="assets/images/icons/map.svg" alt="pin"><?= $property['city'].",". $property['name'] ?></span>
                                                    </div>
                                                  
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    
                        <!-- Category-Specific Tabs Content -->
                        <?php
                        $firstCategory = true; 
                        foreach ($categories as $categoryName => $properties) {
                            $activeClass = $firstCategory ? '' : ''; 
                            ?>
                            <div class="tab-pane fade" id="pills-<?= $categoryName ?>" role="tabpanel" aria-labelledby="pills-<?= $categoryName ?>-tab">
                                <div class="row explore-slider upper">
                                    <?php
                                    foreach ($properties as $property) {
                                        ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="realestate-item loop-style1 loop-classic">
                                                <div class="real-listings-post-item">
                                                    <div class="real-listings-post-thumbnail">
                                                        <div class="post-img loop-style1-grid-slider">
                                                            <img src="<?= $property['property_image'] ?>" alt="<?= $property['pr_name'] ?>">
                                                        </div>
                                                        <div class="post-for <?= strtolower($property['status']) ?>">
                                                            <span>For <?= $property['status'] == '1' ? 'Rent' : 'Sale' ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="real-listings-post-content">
                                                         <div class="for-sale">
                                                            <h4><?= $property['pr_name'] ?></h4>
                                                        </div>
                                                        <a href="list-details.php?property_id=<?= $property['property_id'] ?>"
                                                           class="realestate-strech-link position-absolute"></a>
                                                        <div class="rel-post-price">
                                                            <p>₹<?= number_format($property['price'], 0) ?></p>
                                                        </div>
                                                        <div class="post-title">
                                                            <a href="list-details.php?property_id=<?= $property['property_id'] ?>">
                                                                <ul>
                                                                 <li><img src="assets/images/single-bed.png" alt=""> <span><?= $property['bedroom'] ?>Bed</span></li>
                                                                <li><img src="assets/images/city-hall.png" alt=""> <span> <?= $property['hall'] ?>Hall</span></li>
                                                                <li><img src="assets/images/kitchen.png" alt=""> <span><?= $property['kitchen']; ?>Kitchen</span></li>
                                                                <li><img src="assets/images/balcony.png" alt=""> <span><?= $property['kitchen']; ?>Balcony</span></li>
                                                            </ul>
                                                            </a>
                                                        </div>
                                                        <div class="post-location">
                                                            <span class="p-md"><img src="assets/images/icons/map.svg" alt="pin"><?= $property['city'].",". $property['name'] ?></span>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            $firstCategory = false;
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Realestate Classic agents  -->

    <!-- Browse Different Real Estate Categories -->
    <section class="home-classic-diff-categories pt-5 pb-5">
        <div class="classic-diff-categories-main container-fluid hny-px-5  mb-40">
            <div class="reaestate-classic-headings">
                <h2>Examine Various States for Real Estate</h2>
                <p>Chosen site specifically for you</p>
            </div>
           
        </div>
        <div class="container-fluid hny-px-5">
            <div class="classic-diff-categories-content">
                <div class="diff-cate-slider">
                     <?php
                        $getstate = mysqli_query($con,"SELECT s.* FROM states s JOIN property p ON s.id = p.state WHERE p.status = 1 AND p.trash = 0 GROUP BY s.id");
                  
                        while ($getstatedata = mysqli_fetch_array($getstate)) {
                            $encodedLocation = urlencode($getstatedata['name']);
                        ?>
                    
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="listing.php?location=<?= $encodedLocation;?>">
                            <div class="classic-diff-categories-box">
                                <div class="classic-diff-categories-image">
                                    <img src="<?= $getstatedata['img_url'];?>" alt="<?= $getstatedata['name'];?>">
                                    <div class="classic-diff-image-text">
                                        <h3><?= $getstatedata['name'];?></h3>
                                    </div>
                                </div>
                               
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                   ?>
                   
                </div>
            </div>
        </div>
    </section>

    <!-- Start Realestate TRusted Users Counts  -->


    <!-- Start Realestate Classic Home Features  -->
    <section class="realestate-element-section pt-3 pb-5">
        <div class="reaestate-section-headings text-center">
            <h2>How we help with your journey</h2>
            <p>People have people to share their journey with for a time.</p>
        </div>
        <div class="container-fluid hny-px-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mt-20">
                    <div class="reaestate-classic-home-features "
                        style="background-image: url('assets/images/features1.png');">
                        <h3>Dream Home™</h3>
                        <h4>Get instant evaluation <br>
                            of your property</h4>
                        <svg class="feature-animate-deatils" width="64" height="60" viewBox="0 0 64 60" fill="none">
                            <path d="M49.1399 58.5512C43.9847 51.264 41.0641 43.7616 40.9678 38.5837" stroke="#0B0816" stroke-linecap="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M46.7678 32.8953L42.9901 18.6795C42.8473 17.969 42.5509 17.2983 42.1216 16.7144C41.6923 16.1306 41.1405 15.6476 40.5049 15.2995L17.6402 2.07775C17.0662 1.73691 16.4305 1.51279 15.7696 1.41827C15.1087 1.32374 14.4357 1.36067 13.7891 1.52693C13.1425 1.69319 12.5351 1.98551 12.0018 2.38711C11.4685 2.78871 11.0198 3.29169 10.6814 3.86716L0.740223 20.8665C0.385746 21.4368 0.150513 22.0731 0.0486984 22.7368C-0.0531197 23.4005 -0.0194168 24.078 0.147812 24.7283C0.315041 25.3787 0.612305 25.9884 1.02167 26.5207C1.43103 27.053 1.944 27.4968 2.52962 27.8253L25.3943 40.9477C26.0715 41.369 26.8386 41.6246 27.6332 41.6937C28.4278 41.7627 29.2274 41.6434 29.9672 41.3453L43.8848 37.6671C44.6515 37.4782 45.3445 37.0653 45.8757 36.481C46.4068 35.8968 46.752 35.1676 46.8672 34.3865V32.8953H46.7678ZM43.7854 30.5095C43.9951 31.3044 43.9654 32.1435 43.7002 32.9216C43.4349 33.6998 42.9458 34.3823 42.2942 34.8836C41.795 35.2551 41.2207 35.5132 40.6114 35.6398C40.0021 35.7663 39.3725 35.7583 38.7666 35.6163C38.1607 35.4743 37.5931 35.2017 37.1035 34.8176C36.6139 34.4335 36.2141 33.9471 35.9319 33.3924C35.5712 32.6558 35.4354 31.8294 35.5415 31.0161C35.6476 30.2029 35.9908 29.4389 36.5284 28.8195C37.0405 28.26 37.6923 27.8469 38.4167 27.6225C39.1412 27.398 39.9124 27.3704 40.6511 27.5425C41.3898 27.7145 42.0694 28.0799 42.6202 28.6014C43.171 29.1228 43.5732 29.7813 43.7854 30.5095Z" fill="#B29F32" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M47.4652 31.503L43.6876 17.2872C43.5448 16.5766 43.2483 15.906 42.819 15.3221C42.3897 14.7382 41.8379 14.2553 41.2024 13.9072L18.3376 0.685418C17.7577 0.348689 17.1167 0.13037 16.4517 0.0431056C15.7868 -0.0441592 15.1111 0.00136207 14.4639 0.177036C13.8167 0.352711 13.2108 0.655049 12.6812 1.06654C12.1516 1.47802 11.709 1.99048 11.3788 2.57424L1.43768 19.4742C1.08321 20.0445 0.847942 20.6807 0.746128 21.3445C0.64431 22.0082 0.678043 22.6857 0.845272 23.336C1.0125 23.9863 1.30976 24.5961 1.71913 25.1283C2.12849 25.6606 2.64146 26.1044 3.22708 26.433L26.0917 39.6548C26.7646 40.0441 27.518 40.2735 28.2937 40.3252C29.0694 40.3769 29.8466 40.2496 30.5653 39.953L44.6817 36.2748C45.4347 36.0926 46.118 35.6946 46.6478 35.1294C47.1776 34.5643 47.5308 33.8567 47.6641 33.0936C47.6641 32.4971 47.6641 32.0995 47.4652 31.503ZM44.4829 29.1171C44.6926 29.912 44.6629 30.7512 44.3976 31.5293C44.1324 32.3074 43.6433 32.9899 42.9917 33.4912C42.4925 33.8628 41.9182 34.1209 41.3089 34.2474C40.6996 34.374 40.07 34.366 39.4641 34.224C38.8582 34.082 38.2906 33.8094 37.801 33.4253C37.3113 33.0411 36.9115 32.5547 36.6294 32.0001C36.2687 31.2635 36.1329 30.437 36.239 29.6238C36.3451 28.8105 36.6883 28.0465 37.2258 27.4271C37.738 26.8677 38.3897 26.4545 39.1142 26.2301C39.8387 26.0057 40.6098 25.9781 41.3485 26.1501C42.0872 26.3221 42.7668 26.6876 43.3177 27.209C43.8685 27.7304 44.2706 28.389 44.4829 29.1171Z" fill="#FFE447" />
                            <path d="M15.3434 20.7952C15.9341 21.0326 16.5135 21.048 16.9575 21.0256C17.3904 20.7813 17.8232 20.5369 18.1095 20.0328L18.2114 19.4045L18.2268 18.8251L17.9335 18.3056L17.5049 17.7485L15.3434 20.7952ZM19.63 12.2108L18.9039 11.9357L18.1513 12.0181C17.8172 12.1022 17.5262 12.3072 17.3345 12.5934L17.0106 13.2329L17.1306 13.8501L17.7659 14.9755L19.63 12.2108ZM18.7098 16.0408L19.6049 17.0197L20.2402 18.145C20.4845 18.5779 20.5069 19.0219 20.5292 19.4659L20.1523 20.8204L19.0115 22.0351C18.5929 22.3618 18.1118 22.599 17.5978 22.7321C17.0838 22.8652 16.5479 22.8912 16.0234 22.8087C15.444 22.7933 14.8533 22.556 14.2627 22.3186L13.4682 23.3379C13.4305 23.4733 13.344 23.5222 13.122 23.5334C12.9488 23.6311 12.8622 23.68 12.6779 23.5557L11.9896 23.1452L13.1568 21.573C12.6159 21.1496 12.1407 20.6485 11.7466 20.0859L10.8557 18.3057L11.9811 17.6704L12.3386 17.6969L12.6095 17.7723L12.9404 18.1563C13.1678 18.5223 13.3798 18.8978 13.5757 19.2817C13.7223 19.5414 13.8689 19.8011 14.2376 20.0496L16.561 16.6831L15.6659 15.7044L15.0306 14.579C14.8577 14.1153 14.799 13.6167 14.8596 13.1255C14.9201 12.6343 15.098 12.1649 15.3783 11.757C15.6198 11.3611 15.938 11.0174 16.3142 10.7462C16.6904 10.475 17.1171 10.2818 17.5691 10.1778C18.0508 10.0201 18.5813 9.94883 19.1231 10.0996C19.7088 10.1783 20.2757 10.3609 20.7973 10.6386L21.4186 9.71704L21.938 9.42382L22.3444 9.5369L23.0327 9.94742L22.0386 11.4219C22.5028 11.7749 22.9012 12.2069 23.2157 12.6981C23.46 13.131 23.7044 13.5638 23.7756 14.0944L22.9099 14.5831L22.6013 14.6431L22.195 14.5301L22.0484 14.2703C21.8512 14.0019 21.6594 13.7295 21.4731 13.4535L20.9579 12.9453L18.7964 15.992L18.7098 16.0408ZM24.5143 26.1206C24.9695 26.3203 25.5112 26.4711 25.993 26.3133C26.4258 26.069 26.8587 25.8246 27.0583 25.3694L27.2957 24.7788L27.2245 24.2482L26.5403 23.0362L24.3789 26.0829L24.5143 26.1206ZM28.8009 17.5362L27.9016 17.3589L27.1867 17.3058C27.0031 17.3592 26.8325 17.4499 26.6854 17.5722C26.5384 17.6945 26.4182 17.8457 26.3322 18.0165L26.0949 18.6072L26.1661 19.1378L26.8503 20.3498L28.7143 17.5851L28.8009 17.5362ZM27.7453 21.3285L28.6026 22.4428L29.2379 23.5682L29.5647 24.7536C29.587 25.1976 29.3873 25.6528 29.1877 26.108C28.8149 26.661 28.5663 27.0296 28.0469 27.3228C27.6411 27.6582 27.1712 27.9075 26.6659 28.0554C26.1605 28.2033 25.6304 28.2467 25.1077 28.183C24.5283 28.1676 23.8511 27.9791 23.2981 27.6063L22.5525 28.7122L22.2062 28.9076C22.0331 29.0054 21.9465 29.0543 21.7622 28.93L21.025 28.4329L22.1923 26.8607C21.6514 26.4373 21.1761 25.9362 20.782 25.3736C20.3533 24.8165 20.1467 24.2482 19.8912 23.5934L20.9789 23.0935L21.2875 23.0335L21.6938 23.1466L21.8893 23.4928C22.1353 23.8864 22.3636 24.2908 22.5734 24.7048L23.3219 25.4239L25.5587 22.1063L24.7014 20.9921L24.066 19.8666C23.9101 19.4248 23.8569 18.9531 23.9106 18.4876C23.9643 18.0221 24.1235 17.5749 24.376 17.1802C24.6077 16.7551 24.9256 16.383 25.3093 16.0877C25.693 15.7925 26.1342 15.5806 26.6045 15.4655L28.1585 15.3873C28.7667 15.4872 29.351 15.6993 29.8816 16.0128L30.5029 15.0913L30.8492 14.8958C31.0223 14.7981 31.1089 14.7492 31.2932 14.8735L32.0305 15.3705L30.9874 16.7585C31.477 17.1328 31.8928 17.5949 32.2134 18.1212C32.4577 18.5541 32.7021 18.9869 32.7244 19.431L31.5125 20.1152L31.1927 19.9532L31.0461 19.6935C30.803 19.4139 30.566 19.129 30.3354 18.8389L29.9067 18.2818L27.7453 21.3285Z" fill="#3298BF" />
                            <path d="M41.9922 33.7734C44.9391 31.6887 51.4685 35.8516 56.5761 43.0715C59.2668 46.8751 61.0261 50.7683 61.6578 53.9058" stroke="#0B0816" stroke-linecap="round" />
                        </svg>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-20">
                    <div class="reaestate-classic-home-features"
                        style="background-image: url('assets/images/features2.png');">
                        <h3>Safety First™</h3>
                        <h4>Find homes in Safest <br>Locations</h4>
                        <img src="assets/images/car.png" alt="car" class="feature-car">
                        <svg class="locarion-car2 " width="23" height="33" viewBox="0 0 23 33" fill="none">
                            <path d="M11.4775 3.20843e-05C8.43504 3.11411e-05 5.51706 1.20803 3.36487 3.35853C1.21268 5.50902 0.00239564 8.42605 0 11.4685C0 20.0269 11.4775 32.6613 11.4775 32.6613C11.4775 32.6613 22.955 20.0269 22.955 11.4685C22.9562 9.96059 22.6598 8.46726 22.0827 7.07412C21.5057 5.68099 20.6594 4.41544 19.5923 3.35002C18.5252 2.2846 17.2583 1.44025 15.8642 0.865396C14.4702 0.290537 12.9764 -0.00353602 11.4685 3.20843e-05H11.4775Z" fill="#4081FF" />
                            <path d="M6.13733 12.6004C6.10731 11.8606 6.22709 11.1225 6.48947 10.4302C6.75185 9.7379 7.15144 9.10578 7.66422 8.57177C8.17699 8.03777 8.79239 7.61289 9.47346 7.32266C10.1545 7.03242 10.8872 6.88281 11.6276 6.88281C12.3679 6.88281 13.1006 7.03242 13.7817 7.32266C14.4628 7.61289 15.0782 8.03777 15.5909 8.57177C16.1037 9.10578 16.5033 9.7379 16.7657 10.4302C17.0281 11.1225 17.1478 11.8606 17.1178 12.6004C17.0603 14.0179 16.4567 15.3583 15.4334 16.3409C14.41 17.3236 13.0463 17.8723 11.6276 17.8723C10.2088 17.8723 8.84511 17.3236 7.82178 16.3409C6.79845 15.3583 6.19486 14.0179 6.13733 12.6004Z" fill="white" />
                        </svg>
                        <svg class="locarion-car1 " width="15" height="22" viewBox="0 0 15 22" fill="none">
                            <path d="M7.46491 8.79893e-05C5.49124 0.00481938 3.59935 0.789102 2.20122 2.18216C0.803077 3.57522 0.0119127 5.46424 0 7.43788C0 12.9959 7.46491 21.2019 7.46491 21.2019C7.46491 21.2019 14.9298 12.9959 14.9298 7.43788C14.931 6.45852 14.7386 5.48857 14.3635 4.58386C13.9884 3.67916 13.4382 2.85754 12.7444 2.16628C12.0507 1.47503 11.227 0.927779 10.321 0.556018C9.4149 0.184257 8.44427 -0.00467853 7.46491 8.79893e-05Z" fill="#070026" />
                            <path d="M3.92188 7.45221C3.92188 6.51384 4.29463 5.61389 4.95817 4.95036C5.6217 4.28683 6.52163 3.91406 7.46 3.91406C8.39838 3.91406 9.29834 4.28683 9.96187 4.95036C10.6254 5.61389 10.9982 6.51384 10.9982 7.45221C10.9982 8.39059 10.6254 9.29053 9.96187 9.95406C9.29834 10.6176 8.39838 10.9904 7.46 10.9904C6.52163 10.9904 5.6217 10.6176 4.95817 9.95406C4.29463 9.29053 3.92188 8.39059 3.92188 7.45221Z" fill="#E9F7F0" />
                        </svg>


                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-20">
                    <div class="reaestate-classic-home-features"
                        style="background-image: url('assets/images/features3.png');">
                        <h3>Ease Approved™</h3>
                        <h4>pre-approval online and <br>
                            know your budget.</h4>
                        <svg class="location-last " width="33" height="54" viewBox="0 0 33 54" fill="none">
                            <path d="M16.4085 0.000161847C18.551 -0.00940836 20.6742 0.405535 22.6554 1.22102C24.6367 2.0365 26.4368 3.23638 27.9518 4.75137C29.4668 6.26636 30.6666 8.06644 31.4821 10.0477C32.2976 12.029 32.7125 14.1521 32.703 16.2946C32.703 28.4951 16.4718 46.5338 16.4718 46.5338C16.4718 46.5338 0.177315 28.5042 0.177315 16.2946C0.177313 14.1616 0.597742 12.0495 1.41457 10.079C2.23139 8.1086 3.42858 6.31848 4.93771 4.81104C6.44683 3.3036 8.23828 2.10839 10.2096 1.29376C12.181 0.47913 14.2936 0.0610551 16.4266 0.0634304V0.000161847H16.4085Z" fill="#FFE447" />
                            <path d="M23.5703 15.9321C23.5703 13.9859 22.7972 12.1193 21.4209 10.7431C20.0447 9.3669 18.1782 8.59375 16.2319 8.59375C14.2857 8.59375 12.4191 9.3669 11.0429 10.7431C9.6667 12.1193 8.89355 13.9859 8.89355 15.9321C8.89355 17.8772 9.66622 19.7426 11.0416 21.118C12.417 22.4933 14.2824 23.266 16.2274 23.266C18.1725 23.266 20.0379 22.4933 21.4132 21.118C22.7886 19.7426 23.5613 17.8772 23.5613 15.9321H23.5703Z" fill="#B29F32" />
                            <path opacity="0.1" d="M24.7109 51.1687C24.7109 50.0209 21.096 49.1172 16.5321 49.1172C11.9591 49.1172 8.35322 50.0209 8.35322 51.1687C8.35322 52.2983 11.9682 53.2021 16.5321 53.2021C21.096 53.2021 24.7109 52.2984 24.7109 51.1596V51.1687Z" fill="#222222" />
                        </svg>
                        <svg class="location-last1 " width="18" height="32" viewBox="0 0 18 32" fill="none">
                            <path d="M8.77155 0.6875C11.0989 0.6875 13.3309 1.61204 14.9766 3.25774C16.6223 4.90343 17.5469 7.13547 17.5469 9.46284C17.5469 16.015 8.78057 25.694 8.78057 25.694C8.78057 25.694 -0.00379753 16.024 -0.00379753 9.46284C-0.00379753 7.13547 0.920744 4.90343 2.56644 3.25774C4.21213 1.61204 6.44419 0.6875 8.77155 0.6875Z" fill="#F4FDFF" />
                            <path d="M12.8594 9.35083C12.8594 8.23628 12.4166 7.16739 11.6285 6.37929C10.8404 5.59119 9.77153 5.14844 8.65698 5.14844C7.54244 5.14844 6.47353 5.59119 5.68543 6.37929C4.89733 7.16739 4.45459 8.23628 4.45459 9.35083C4.45459 10.4654 4.89733 11.5343 5.68543 12.3224C6.47353 13.1105 7.54244 13.5532 8.65698 13.5532C9.77153 13.5532 10.8404 13.1105 11.6285 12.3224C12.4166 11.5343 12.8594 10.4654 12.8594 9.35083Z" fill="#4081FF" />
                            <path opacity="0.1" d="M14.8516 29.6658C14.8516 28.762 12.1403 28.0391 8.71515 28.0391C5.28997 28.0391 2.64201 28.762 2.64201 29.6658C2.64201 30.5153 5.35323 31.2293 8.71515 31.2293C12.0861 31.2293 14.8516 30.5063 14.8516 29.6658Z" fill="#222222" />
                        </svg>


                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Popular Search for -->
    <!-- Why Millions of Users Trust us since 2017 -->
    <section class="realstate-millions-of-user mt-20 pt-4">
        <div class="container-fluid hny-px-5">
            <div class="realstate-millions-user-content">
                <h2>Why Millions of Users <br> Trust us since 2017</h2>
                <p>Flex is the only business platform that lets you run your <br> business on one platform,
                    seamlessly across all digital channels.</p>
                <div class="rating-millions-user">
                    <ul>
                        <li>
                            <h3>2M+</h3>
                            <p>Listings</p>
                        </li>
                        <li>
                            <h3>50K+</h3>
                            <p>Users</p>
                        </li>
                        <li>
                            <h3>25K+</h3>
                            <p>Transactions</p>
                        </li>
                    </ul>
                </div>
                <a href="javascript:;">Join Today!</a>
            </div>
        </div>
    </section>

    <section class="realestate-element-section pt-3 pb-5">
        <div class="reaestate-section-headings text-center">
            <h2>What our customer say</h2>
            <p>Consumers are defined as individuals or businesses that consume or use goods.</p>
        </div>
        <div
            class="container-fluid hny-px-5 realestate-classic-section-testimonials-container overflow-hidden real-estate-location">
            <div class="row real-estate-location-post-slider">
                <?php
                    $testimonials = mysqli_query($con, "SELECT * FROM testimonial WHERE status = 1 AND trash = 0 order by id desc");
                    $i=1;
                    while ($testiQuery = mysqli_fetch_assoc($testimonials)) {
                ?>
                <div class="col-md-4 mt-10">
                    <div class="realestate-classic-section-testimonials">
                        <div class="realestate-classic-section-testimonials-top">
                            <div class="realestate-classic-section-testimonials-img">
                                <img src="media/user_profile/user<?= $i; ?>.png" alt="tabs3s">
                            </div>
                            <div class="realestate-classic-section-testimonials-title">
                                <h5><?= $testiQuery['name'];?></h5>
                                <p><?= $testiQuery['title'];?></p>
                                <img src="assets/images/icons/testimonial-icon.svg.svg" alt="testimonial-icon">
                            </div>
                        </div>
                        <div class="realestate-classic-section-testimonials-content">
                           <?= $testiQuery['comment'];?>
                           <div class="star-rating">
                           <span>&#9733;</span>
                           <span>&#9733;</span>
                           <span>&#9733;</span>
                           <span>&#9733;</span>
                           <span>&#9733;</span>
                        </div>
                        </div>
                    </div>
                </div>
                <?php 
                $i++;
                }
                ?>
            </div>
        </div>
    </section>

</div>
<?php include('includes/footer.php') ?>

<script>
$(document).ready(function() {
    $('#realestate-property-type').change(function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            window.location.href = selectedValue;
        }
    });
});
</script>

<script>
  $(document).ready(function() {
    $('.search-txt').on('input', function() {
      var query = $(this).val().trim();
      if (query !== '') {
        search(query);
      } else {
        $('.search-results').empty();
        $('.search-results').hide();
      }
    });

    function search(query) {
      $.ajax({
        url: 'ajax/search.php',
        type: 'GET',
        data: { qsr: query },
        success: function(response) {
          var results = JSON.parse(response);
          if (results.status) {
            displayResults(results.result);
          } else {
            displayNoResultsMessage(results.result);
          }
        },
        error: function(xhr, status, error) {
          console.error('Request failed. Error: ' + status);
        }
      });
    }

    function displayResults(resultHtml) {
      var searchResults = $('.search-results');
      searchResults.html(resultHtml);
      searchResults.show(); // Show search results
    }

    function displayNoResultsMessage(resultHtml) {
      var searchResults = $('.search-results');
      searchResults.html(resultHtml);
      searchResults.show();
    }

    // Hide search results when clicking outside the search box or results
    $(document).on('click', function(event) {
      if (!$(event.target).closest('.search-txt, .search-results').length) {
        $('.search-results').hide();
      }
    });
  });
</script>