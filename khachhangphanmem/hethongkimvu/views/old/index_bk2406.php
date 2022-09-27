<?php
    require_once '../module/maintenance.module.php';
    $maintenance = new Maintenance();
    require_once '../module/employer.module.php';
    $employer = new Employer();
    require_once '../module/product.module.php';
    $product = new Product();
    require_once '../module/picture.module.php';
    $picture = new Picture();
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<?php include '../module/require/require_head.php' ?>

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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                            <div class="card-body ">
                                <form method="post" class="form-horizontal">
                                    <div class="card-header ">
                                        <h4 class="card-title">Form Add Machinepart</h4>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tình trạng</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="" name="status" class="form-control authenCheck"
                                                    placeholder="Tình trạng" id="status" required>
                                                <span class="form-text">Không được bỏ trống trường này</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tên hàng hóa</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value=""name="product_name" class="form-control authenCheck"
                                                    placeholder="Tình trạng" id="product_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Đơn vị tính</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select name="unit" id="unit" class="form-control authenCheck" value="---Chọn---">
                                                    <option>---Chọn---</option>
                                                    <option value="1">PCS</option>
                                                    <option value="2">PC</option>
                                                    <option value="3">BỘ</option>
                                                    <option value="4">CÁI</option>
                                                    <option value="5">SET</option>
                                                    <option value="6">METER</option>
                                                    <option value="7">SỢI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Số lượng</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="number" value=""name="amount" class="form-control authenCheck"
                                                    placeholder="Số lượng" id="amount" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Bản vẽ</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" value=""name="drawing" class="form-control authenCheck" placeholder="Bản vẽ"
                                                    id="drawing" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Phôi</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" value="" name="embryo" class="form-control authenCheck" placeholder="Phôi"
                                                    id="embryo" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">GC</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" value="" name="gc" class="form-control authenCheck" placeholder="GC"
                                                    id="gc" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Đơn giá</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" value=""  name="unit_price" class="form-control authenCheck" placeholder="Đơn giá"
                                                    id="unit_price" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Thành tiền</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="number" value="" name="into_money" class="form-control authenCheck"
                                                    placeholder="Thành tiền" id="into_money" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">VAT</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="number" value="" name="vat" class="form-control authenCheck" placeholder="VAT"
                                                    id="vat" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Thành tiền VAT</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="number" value=""  name="into_money_vat" class="form-control authenCheck"
                                                    placeholder="Thành tiền VAT" id="into_money_vat" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Thanh toán</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="number" value="" name="pay" class="form-control authenCheck"
                                                    placeholder="Thanh toán" id="pay" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Còn lại</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value=""name="rest" class="form-control authenCheck" placeholder="Còn lại"
                                                    id="rest" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-fill btn-primary" id="btnAdd">Add
                                                    Machinepart</button>
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
            </div>


            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
</body>

</html>