<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<?php require '../module/require/require_head.php';?>
<script src="../js/ajax/crud.js"></script>
<body class=" sidebar-mini ">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper ">


        <?php require '../module/require/require_sidebar.php';?>
        <a href="../module/require/require_sidebar.php"></a>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#">HƯNG PHÁT SOLUTIONS</a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="navbar-nav">
                            <div class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-sign-out-alt" style="font-size:1rem;"></i>
                                    <p>
                                        <span class="d-md-block">Logout</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
<!--
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                            <div class="card-body ">
                                <form method="post" class="form-horizontal">
                                    <div class="card-header ">
                                        <h4 class="card-title">THÊM KHÁCH HÀNG</h4>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">TÊN KHÁCH HÀNG</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="" name="nameEmployer"
                                                    class="form-control authenCheck" placeholder="TÊN KHÁCH HÀNG"
                                                    id="nameEmployer" required>
                                                <span class="form-text">Không được bỏ trống trường này</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">ĐỊA CHỈ</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="" name="addressEmployer"
                                                    class="form-control authenCheck" placeholder="ĐỊA CHỈ"
                                                    id="addressEmployer" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value="" name="phoneEmployer"
                                                    class="form-control authenCheck" placeholder="SỐ ĐIỆN THOẠI"
                                                    id="phoneEmployer" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-fill btn-primary"
                                                    id="btnAddEmployer">Thêm khách hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
-->
<?php
$selectedTabAll = "";
$selectedTabInProgress = "";
$selectedTabDone = "";
$workStatus = isset($_GET["workStatus"])?$_GET["workStatus"]:"";
if ($workStatus == "") {
	$selectedTabAll = ' style="background-color:cyan;" ';
} else if ($workStatus == 0) {
	$selectedTabInProgress = ' style="background-color:cyan;" ';
} else if ($workStatus == 1) {
	$selectedTabDone = ' style="background-color:cyan;" ';
} 
?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">
								Thông tin bảo trì khách hàng <b> <?=$_GET["customername"]?></b>
								&nbsp;	<a <?php echo $selectedTabAll;?> href="/hps/hpsPicture/views/formMainternance.php?employer=<?=$_GET["employer"]?>&customername=<?=$_GET["customername"]?>&workStatus=" >Tất cả</a>
								&nbsp;	<a <?php echo $selectedTabInProgress;?> href="/hps/hpsPicture/views/formMainternance.php?employer=<?=$_GET["employer"]?>&customername=<?=$_GET["customername"]?>&workStatus=0" >SP Đang Làm</a>
								&nbsp;	<a <?php echo $selectedTabDone;?> href="/hps/hpsPicture/views/formMainternance.php?employer=<?=$_GET["employer"]?>&customername=<?=$_GET["customername"]?>&workStatus=1" >SP Hoàn Thành</a>
								</h4>
                            </div>
                            <div class="card-body" id="load_data_mainternance">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
    
    <script src="../js/ajax/readmainternance.ajax.js"></script>
    
</body>

</html>