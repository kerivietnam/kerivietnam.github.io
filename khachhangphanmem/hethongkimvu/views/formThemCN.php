<!--

=========================================================
* Now UI Dashboard PRO - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard-pro
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/now-ui-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2020 16:42:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<?php include '../module/require/require_head.php' ?>

<body class=" sidebar-mini ">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper ">
        <?php require '../require/module/require_sidebar.php';?>
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
                                <a class="nav-link" href="#pablo">
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
            <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                            <div class="card-body ">
                                <form method="post" class="form-horizontal">
                                    <div class="card-header ">
                                        <h4 class="card-title">Form Add User</h4>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tên nhân viên</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="" name="user" class="form-control authenCheck"
                                                    placeholder="Tên nhân viên" id="user" required>
                                                <span class="form-text">Không được bỏ trống trường này</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Ngày sinh</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="date" value=""name="date" class="form-control authenCheck"
                                                    placeholder="Ngày sinh" id="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <input type="number" value=""name="phone_number" class="form-control authenCheck"
                                                    placeholder="Ngày sinh" id="phone_number" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Địa chỉ</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" value="" name="address" class="form-control authenCheck"
                                                    placeholder="Địa chỉ" id="address" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer ">
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-fill btn-primary" id="btnAdd">Add User</button>
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
                                <h4 class="card-title">Danh sách chi tiết thiết bị</h4>
                            </div>
                            <div class="card-body" id="load_data1">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- bảng ở trong đây -->
            </div>
            <?php require '../module/require/require_footer.php';?>


        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
</body>
</html>