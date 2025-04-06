<?php include('includes/header.php');

$location = $_GET['location'] ?? '';
$category = $_GET['category'] ?? '';

$query = "SELECT p.*, pi.image AS property_image, s.name AS state_name, c.city 
          FROM property p 
          LEFT JOIN prop_img pi ON p.property_id = pi.property_id 
          LEFT JOIN states s ON p.state = s.id 
          LEFT JOIN cities c ON p.city = c.id 
          WHERE p.status = '1' 
            AND p.trash = '0' 
            AND pi.trash = '0'";

if (!empty($location)) {
    $query .= " AND s.name = '$location'";
}
if (!empty($category)) {
    $query .= " AND p.category = '$category'";
}

$query .= " GROUP BY p.property_id";

$getProperties = mysqli_query($con, $query);

$count = mysqli_num_rows($getProperties);
?>

<style>
    .realestate-content-container {
        background-color: white;
    }

    .bredcurm_section {
        height: auto;
    }

    .inner_drd__crm {
        border-bottom: 1px solid #dfdfdf;
        padding-bottom: 10px;
        padding-top: 21px;
    }
    .post-title ul img {
    width: 15px;
    }
  .realestate-item .real-listings-post-content .post-details ul li{
      border-radius: 20px !important;
  }
  .realestate-item .real-listings-post-content .post-details ul li {
    list-style: none;
    font-size: 14px;
    font-weight: 400;
    display: flex;
    align-items: center;
    gap: 0 7px;
    color: #717171;
    background: #F5F5F5;
    padding: 4px 20px;
    border-radius: 50px;
    line-height: 13px;
    height: 32px;
}

.loop-style1.realestate-item .real-listings-post-content .post-details ul {
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 11px;
    flex-wrap: wrap;
    padding-top: 10px;
    border: unset;
}
 .realestate-header.home2 .realestate-header-container {
    padding: 10px 0px;
}
</style>

<div class="bredcurm_section"></div>
<div class="realestate-content-container">
    <div class="container">
        <div class="inner_drd__crm">
            <h1>Listings</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><i class="fa fa-chevron-right"></i></li>
                <li><a href="javascript:;">Property <?= !empty($location) ? $location : $category; ?> for Sale</a></li>
            </ul>
        </div>
    </div>

    <section class="realestate-element-section solo-agent pb-90">
        <div class="realestate-property-element-tabs tab-style2 container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-All" role="tabpanel" aria-labelledby="pills-All-tab">
                    <div class="realestate-archive-filters-title d-flex align-items-center justify-content-between pt-30">
                        <div class="realestate-archive-title">
                            <h2>Showing <?= $count; ?> Properties for Rent <?= !empty($location) ? $location : $category; ?></h2>
                        </div>
                        <div class="realestate-archive-sort">
                            <select id="realestate-sorting-filter" class="realestate-orderby select2" name="realestate_orderby">
                                <option value="" selected="" disabled="">Sort by</option>
                                <option class="option" value="DESC">Newest</option>
                                <option class="option" value="ASC">Oldest</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12 position-relative realestate-archive-container">
                            <div class="realestate-search-result-output realestate-grid">
                                <div class="row">
                                    <?php while ($property = mysqli_fetch_assoc($getProperties)) : ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 mt-20 realestate-archive-loop">
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
                                                    <div class="post-details post-title ">
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
    </section>
</div>
<?php include('includes/footer.php'); ?>
