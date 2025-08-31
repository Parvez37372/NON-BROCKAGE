<?php include('includes/header.php');

if (isset($_GET['uid']) && !empty($_GET['uid'])) {
    $uid = $_GET['uid'];

    $query = "SELECT p.*, pi.image AS property_image, s.name AS state_name, c.city 
              FROM property p 
              LEFT JOIN prop_img pi ON p.property_id = pi.property_id 
              LEFT JOIN states s ON p.state = s.id 
              LEFT JOIN cities c ON p.city = c.id 
              WHERE p.status = '1' AND p.trash = '0' AND pi.trash = '0' AND p.uid = '$uid' 
              GROUP BY p.property_id 
              ORDER BY p.id";

    $getProperties = mysqli_query($con, $query);

    $getUser = mysqli_query($con,"SELECT * FROM user WHERE auth_token = '$uid'");
    $usern=mysqli_fetch_assoc($getUser);

    if ($getProperties) {
        $count = mysqli_num_rows($getProperties);
    } 
} 


?>
<style>
    .realestate-content-container {
        background-color: white;
    }

    .bredcurm_section {
        height: auto;
    }

    .inner_drd__crm li a {
        color: #999999;
        font-weight: 300;
        font-size: 10px;
    }

    .inner_drd__crm i {
        font-size: 7px;
        color: #999999;
    }

    .reaestate-section-headings {
        border-bottom: 1px solid #ebebeb;
        padding-bottom: 10px;
    }
    .post-title ul {
    display: flex;
    gap: 8px;
    margin: 12px 0;
    flex-wrap: wrap;
    }
    .post-title ul img {
    width: 15px;
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
.realestate-agency-grid-details a{
    color:black !important;
}
.realestate-agency-grid-details a:hover{
    color:blue!important;
}
</style>
<div class="bredcurm_section"></div>

<div class="realestate-content-container">
    <div class="realestate-single-breadmenus">
        <div class="container">
            <ul>
                <li><a href="agents.php">Find Agent</a></li>
                <li><span><?= $usern['fullname'];?></span></li>
            </ul>
        </div>
    </div>
    <div class="realestate-single-page realestate-agent-single-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="realestate-agent-information-tab">
                        <div class="realestate-agent-thumb">
                            <img src="<?= $usern['profileimg'];?>" alt="image">
                           
                        </div>
                        <div class="realestate-agent-info">
                            <h1><?= $usern['fullname'];?></h1>
                            <div class="realestate-agency-grid-details">
                                
                                <h5><strong><i class="fa-solid fa-phone"></i> : </strong><a href="tel:<?= $usern['mobile'];?>">+91 <?= $usern['mobile'];?></a></h5>
                                <?php if ($usern['email']!=''){?>
                                <h5><strong>Email : </strong><a href="mailto:<?= $usern['email'];?>"><?= $usern['email'];?></a></h5>
                                <?php }?>
                            </div>
                            <p>Total Property : <?= $count;?> </p>
                        </div>
                        <!--<div class="realestate-agent-badge">-->
                        <!--    <img src="assets/images/agent-premium.png" alt="image">-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                        <div class="col-12 col-lg-12 position-relative realestate-archive-container">
                            <div class="realestate-search-result-output realestate-grid">
                                <div class="row">
                                    <?php
                                    
                                    
                                    
                                    while ($property = mysqli_fetch_assoc($getProperties)) : ?>
                                    <div class="col-lg-3 col-md-4 col-sm-12 mt-20 mb-20 realestate-archive-loop">
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
                                                    <div class="post-title">
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
        </div>
        
        
    </div>
</div>
<?php include('includes/footer.php') ?>