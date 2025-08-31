<?php include('includes/header.php') ?>
<style>
    section.app_download {
        height: 80vh;
        display: flex;
        align-items: center;
       
    }
    form.download_app_frm input {
    padding: 13px;
    font-size: 16px;
}

    section.app_download:after {
        content: '';
        position: absolute;
        background: linear-gradient(-45deg, #fcbfad, #c5face, #b6e8fa, #adf3e3, #f7b5ba, #cbabf5, #e9f5a5);
        background-size: 400% 400%;
        width: 100%;
        height: 100%;
        left: 0;
        right: 0;
        top: 0;
        z-index: -1;
        bottom: 0;
        animation: gradient 15s ease infinite;
    }

    button.down_btn {
        background-color: #373373;
        color: white;
        padding: 0px 30px;
        border: none;
        border-radius: 10px;
    }

    form.download_app_frm input {
        height: 50px;
        width: 300px;
        border-radius: 10px;
        border: 1px solid gray;
    }

    form.download_app_frm {
        display: flex;
        gap: 10px;
    }

    .app_inner_st p {
        margin-bottom: 21px;
        color: #393939;
    }

    .app_inner_st h2 {
        font-size: 32px;
        margin-bottom: 12px;
        font-weight: 700;
    }

    header.realestate-header.home2 {
        border-bottom: 1px solid #00000012;
    }
    @media(max-width: 768px){
        form.download_app_frm {
    margin-bottom: 60px;
}
.app_inner_st p {
    margin-bottom: 11px;
    font-size: 14px;
}
.app_inner_st h2 {
    font-size: 23px;
}
form.download_app_frm input {
    width: 218px;
}
button.down_btn {
    padding: 0px 9px;
}
    }
</style>
<section class="app_download">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="app_inner_st">
                    <h2>Non Brokerage on the Go!</h2>
                    <p>Download our top-rated app, made just for you! <br>
                        It’s free, easy and smart.</p>
                    <form action="" class="download_app_frm">
                        <input type="number" name="" id="" placeholder="Enter Your Number">
                        <button type="button" class="down_btn">Send App Link</button>
                    </form>
                    <div class="">

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="app__bg">
                     <img src="assets/images/new_app_bg.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('includes/footer.php') ?>