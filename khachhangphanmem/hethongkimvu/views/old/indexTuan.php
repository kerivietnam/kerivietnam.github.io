<?php
    require_once '../module/maintenance.module.php';
    $maintenance = new Maintenance();
    require_once '../module/employer.module.php';
    $employer = new Employer();
    require_once '../module/product.module.php';
    $product = new Product();
    require_once '../module/picture.module.php';
    $picture = new Picture();
    require_once '../module/category.module.php';
    $category = new Category();
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php include '../module/require/require_head.php' ?>

<body class=" sidebar-mini ">   

    <div class="wrapper ">


        <?php require '../module/require/require_sidebar.php';?>
        <a href="../module/require/require_sidebar.php"></a>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <?php include '../module/require/require_navbar.php' ?>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                
                <button class="btn btn-success btnOpenModalAddMain" onclick="modalDS()" style="position: relative;z-index: 1;">
                    <span>Thêm dữ liệu kỹ thuật</span>
                    <i class="fas fa-plus-circle"></i>
                </button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Danh sách kỹ thuật</h4>
                            </div>
                            <div class="card-body" id="load_data1">
                                <div class="table-responsive">
                                    <table class="table t-center">
                                        <thead>
                                            <tr class="t-center">
                                                <th scope="col">Số TT</th>
                                                <th scope="col">Khách hàng</th>
                                                <th scope="col">Số CN</th>
                                                <th scope="col">Số đo DVH</th>
                                                <th scope="col">Tình trạng</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Tên hàng hóa</th>
                                                <th scope="col">Đơn vị tính</th>
                                                <th scope="col">Bảng vẽ</th>
                                                <th scope="col">GC</th>
                                                <th scope="col">Phôi</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Đơn giá</th>
                                                <th scope="col">Thành tiền</th>
                                                <th scope="col">VAT</th>
                                                <th scope="col">Thành tiền VAT</th>
                                                <th scope="col">Thanh toán</th>
                                                <th scope="col">Còn lại</th>
                                                <th scope="col">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyAddMaintenance">
                                          <?php
                                          $MaintenanceTechs = $maintenance->getAllMaintenanceTech();
                                          foreach ($MaintenanceTechs as $key => $MaintenanceTech) { 
                                                ?>
                                                            <tr class="t-center">
                                                            <td ><?php echo $key +1 ?></td>
                                                            <td data-value="<?php echo $MaintenanceTech["idEmployer"] ?>"><?php echo $MaintenanceTech["nameEmployer"] ?></td>
                                                            <td data-value="<?php echo $MaintenanceTech["idcnNumber"] ?>"><?php echo $MaintenanceTech["machinenumber"] ?></td>
                                                            <td data-value="<?php echo $MaintenanceTech["iddvhNumber"] ?>"><?php echo $MaintenanceTech["serinumber"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["status"] ?></td>
                                                            <td data-value="<?php echo $MaintenanceTech["idCategory"] ?>" ><?php echo $MaintenanceTech["categoryName"] ?></td>
                                                            <td data-value="<?php echo $MaintenanceTech["idProduct"] ?>" ><?php echo $MaintenanceTech["nameProduct"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["unit"] ?></td>
                                                            <td data-value="<?php echo $MaintenanceTech["idPicture"] ?>"><?php echo $MaintenanceTech["pictureName"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["gc"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["embryo"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["amount"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["unit_price"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["into_money"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["vat"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["into_money_vat"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["pay"] ?></td>
                                                            <td ><?php echo $MaintenanceTech["rest"] ?></td>
                                                            <td >
                                                                <button class="btn btn-danger btnDeleteMaintenance" id="<?php echo $MaintenanceTech["idMaintenance"] ?>">Xóa</button>
                                                                <button class="btn btn-dark btnUpdateMaintenance" id="<?php echo $MaintenanceTech["idMaintenance"] ?>">sửa</button>
                                                            </td>
                                                    </tr>
                                             <?php 
                                            } ?>
                                            </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require '../module/require/modalTTN2.php';?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/maintenance.ajax.js"></script>

</body>

</html>