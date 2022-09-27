<?php
	if(!isset($_SESSION["company_member"])){
		session_start();
	}
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<?php require '../module/require/require_head.php';?>

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
<!--
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
-->
                        <div class="navbar-nav">
                            <div class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-sign-out-alt" style="font-size:1rem;"></i>
                                    <p>
                                        <span class="d-md-block"><a href="../../hpsPicture/hps/pages/logout.php">Logout</a></span>
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
<?php if (isset($_SESSION['company_member'])) {?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                            <div class="card-body ">
                                <form method="post" class="form-horizontal">
                                    <div class="card-header ">
                                        <h4 class="card-title">Quản lý trạng thái</h4>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Trạng thái</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="" name="workStatus"
                                                    class="form-control authenCheck" placeholder="Tên gọi"
                                                    id="workStatus" required>
                                                <span class="form-text">Không được bỏ trống trường này</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-fill btn-primary"
                                                    id="btnAddUser">Thêm trạng thái</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php }?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Danh sách các trạng thái</h4>
                            </div>
                            <div class="card-body" id="load_data_user">

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
    <script src="../js/ajax/status/addstatus.ajax.js"></script>
    <script src="../js/ajax/status/deletestatus.ajax.js"></script>
    <script src="../js/ajax/status/editstatus.ajax.js"></script>
</body>
	<?php
		if (!isset($_SESSION['company_member'])) {
	?>

	<script language="javascript">
		$("button.btn").css({'display':'none'});
	</script>
   <?php
		}
	?>
</html>