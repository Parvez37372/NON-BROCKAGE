<?php include('includes/header.php') ?>
<style>
    .realestate-element-section {
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
<div class="bredcurm_section"></div>
<div class="realestate-element-section  realestate-agent-tabs-agents overflow-hidden pt-20  pb-40">

    <div class="container">
        <div class="inner_drd__crm">

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><i class="fa fa-chevron-right"></i></li>
                <li><a href="javascript:;">Delhi Real Estate</a></li>
                <li><i class="fa fa-chevron-right"></i></li>
                <li><a href="javascript:;"> Real Estate Agents in Delhi</a></li>
            </ul>


        </div>
        <div class="reaestate-section-headings text-left mb-20">
            <h2>Non Brokerage Agents in Delhi</h2>
        </div>
        <section class="realestate-element-section realestate-home2-agents pt-4 pb-0">
        <div class="containerfluid hny-px-5 position-relative">

            <div class="real-estate-agents">
               

                <div class="tab-content" id="realestate-agentsContent">
                    <div class="tab-pane fade show active" id="agent" role="tabpanel"
                        aria-labelledby="agent-tab">
                        <div class="row">
                        
                            <div class="col-md-12">
                                <div class="row real-estate-agents-item-slider">
                                   <?php
                                    $getGroupsUser = mysqli_query($con, "
                                        SELECT u.*, COUNT(p.uid) AS property_count
                                        FROM user u
                                        JOIN property p ON p.uid = u.auth_token
                                        WHERE u.status = 'Active' AND p.status = 1 AND p.trash = 0
                                        GROUP BY u.auth_token
                                        ORDER BY property_count DESC ");
                                    
                                    while ($getGroupsData = mysqli_fetch_array($getGroupsUser)) {
                                    ?>
                                        <div class="col-md-3">
                                            <div class="re-agents-post-item">
                                                <div class="re-agents-post-head">
                                                    <p class="heading"><span><i class="fa-brands fa-pagelines"></i></span> Non-Brokerage Agent</p>
                                                </div>
                                                <div class="re-agents-post-details">
                                                    <div class="re-agents-img">
                                                        <span class="agents-profile">
                                                            <img src="<?= $getGroupsData['profileimg']; ?>" alt="<?= $getGroupsData['fullname']; ?>">
                                                        </span>
                                                    </div>
                                                    <div class="re-agent-name">
                                                        <h4><?= $getGroupsData['fullname']; ?></h4>
                                                        <p><i class="fa-solid fa-phone"></i> <a href="tel:<?= $getGroupsData['mobile']; ?>"><?= $getGroupsData['mobile']; ?></a></p>
                                                    </div>
                                                    <div class="re-agent-call-back">
                                                        <a href="agents-details.php?uid=<?= $getGroupsData['auth_token']; ?>">See more details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    </div>
</div>
<?php include('includes/footer.php') ?>