<?php 
    require_once '../module/employer.module.php';
    $employer = new Employer();
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
            <?php require '../module/require/require_navbar.php';?>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                  <button type="button" class="btn btn-primary btn-updateCategory" data-toggle="modal" data-target="#modalAddEmployer" style="position: relative;z-index: 1;">
                    Thêm khách hàng
                 </button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                            <div class="card-header ">
                                <h4 class="card-title">DANH SÁCH KHÁCH HÀNG</h4>
                            </div>

                            <div class="card-body" id="">
                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Xem thông tin bảo trì</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Xem thông tin bảo trì</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="bodyEmployer">
                                        <?php
                                            $allEmployer = $employer->getAllEmployers();
                                            foreach ($allEmployer as $key => $value) { ?>

                                        <tr class="load_data_employer_io">
                                            <td><?php echo $value["nameEmployer"] ?></td>
                                            <td><a  href="formMainternance.php?employer=<?php  echo $value["idEmployer"]  ?>&customername=<?php  echo $value["nameEmployer"]  ?>"  target=blank>TT Bảo Trì</td>
                                            <td>
                                             <button class="btn btn-danger delete_employer " id="btnDeleteEmployer"
                                                    data-id_delete_employer="<?php echo $value["idEmployer"] ?>">Xóa</button>
                                                <button class="btn btn-dark update_employer" id="btnUpdate" data-toggle="modal" data-target="#modalAddEmployer"
                                                    data-id_update_employer="<?php echo $value["idEmployer"] ?>">Sửa</button>
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
            <?php require '../module/require/modalAddEmployer.php'; ?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/employer.ajax.js"></script>
    <?php require '../module/require/datatable.php';?>

</body>

</html>