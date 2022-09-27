<?php
	if(!isset($_SESSION["company_member"])){
		session_start();
	}
 require_once '../module/product.module.php';
 $product = new Product();
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
                <div class="row">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddProduct" style="position: relative;z-index: 1;">
                        Thêm sản phẩm
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">DANH SÁCH SẢN PHẨM</h4>
                                </div>
                            <div class="card-body" id="">
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Đơn vị tính</th>
                                            <th>VAT</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Đơn vị tính</th>
                                            <th>VAT</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="bodyEmployer">
                                        <?php
                                            $allProduct = $product->getAllProducts();
                                            foreach ($allProduct as $key => $value) { ?>

                                        <tr class="load_data_employer_io">
                                            <td><?php echo $value["nameProduct"] ?></td>
                                            <td><?php echo $value["priceProduct"] ?></td>
                                            <td><?php echo $value["dvtProduct"] ?></td>
                                            <td><?php echo $value["vatProduct"] ?></td>
                                            <td>
                                                <button class="btn btn-danger delete_employer " id="btnDeleteProduct"
                                                    data-id_delete_employer="<?php echo $value["idProduct"] ?>">Xóa</button>
                                                <button class="btn btn-dark update_employer" id="btnUpdate" data-toggle="modal" data-target="#modalAddProduct"
                                                    data-id_update_employer="<?php echo $value["idProduct"] ?>">Sửa</button>
                                                
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require '../module/require/modalAddProduct.php';?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/product.ajax.js"></script>
    <?php require '../module/require/datatable.php';?>
    
</body>

</html>