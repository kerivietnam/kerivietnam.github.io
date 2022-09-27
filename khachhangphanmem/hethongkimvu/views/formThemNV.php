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
                                        <span class="d-md-block"><a href="../../hpsPicture/hps/pages/logout.php">Logout</a></a></span>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                            <div class="card-body ">
                                <form method="post" class="form-horizontal">
                                    <div class="card-header ">
                                        <h4 class="card-title">Form Add User</h4>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tên đăng nhập</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="" name="name_user"
                                                    class="form-control authenCheck" placeholder="Tên nhân viên"
                                                    id="name_user" required>
                                                <span class="form-text">Không được bỏ trống trường này</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="password" value="" name="date_user"
                                                    class="form-control authenCheck" placeholder="Password"
                                                    id="date_user" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" value="" name="address_user"
                                                    class="form-control authenCheck" placeholder="Địa chỉ"
                                                    id="address_user" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="number" value="" name="phone_user"
                                                    class="form-control authenCheck" placeholder="Số điện thoại"
                                                    id="phone_user" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-fill btn-primary"
                                                    id="btnAddUser">Add User</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Danh sách nhân viên</h4>
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
    <script src="../js/ajax/adduser.ajax.js"></script>
    <script src="../js/ajax/deleteuser.ajax.js"></script>
    <script src="../js/ajax/edituser.ajax.js"></script>
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