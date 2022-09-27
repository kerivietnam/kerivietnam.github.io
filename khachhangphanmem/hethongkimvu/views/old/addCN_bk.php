<?php
    require_once '../module/maintenance.module.php';
    require_once '../module/employer.module.php';
    $maintenance = new Maintenance();
    $employer = new Employer();
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
                <button class="btn btn-success btnOpenModalAddContact" onclick="modalCN()" style="position: relative;z-index: 1;">
                    <span>Thêm CN</span>
                    <i class="fas fa-plus-circle"></i>
                </button>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title" style="display : inline-block;">Danh sách CN</h4>
                                <div class="boxButton">
                    <div class="msvbBox">
                        <div class="radios-lable">
                            Tìm kiếm theo số CN
                        </div>
                        <input type="text" class="form-control formSearch" placeholder="nhập số CN" id="searchBySocn">
                    </div>
                </div>
                            </div>
                            <div class="card-body" id="load_data1">

                                <table class="table table-hover t-center">
                                    <thead>
                                        <tr class="t-center">
                                            <th scope="col">Số TT</th>
                                            <th scope="col">Tên Khách hàng</th>
                                            <th scope="col">Số CN</th>
                                            <th scope="col">Số đo DVH</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyAddCN">
                                    <?php 
                                        $contacts = $maintenance->getAllContact();
                                        foreach ($contacts as $key => $aContactId) { 
                                        ?>
                                        <tr class="t-center">
                                            <td><?php echo $key +1 ?></td>
                                            <td id="<?php echo $aContactId["idEmployer"] ?>"><?php echo $aContactId["nameEmployer"] ?></td>
                                            <td><?php echo $aContactId["machinenumber"] ?></td>
                                            <td><?php echo $aContactId["machineid"] ?></td>
                                            <td>
                                                <button class="btn btn-danger btnDeleteContact" id="<?php echo $aContactId["id"]?>">Xóa</button>
                                                <button class="btn btn-dark btnUpdateContact" id="<?php echo $aContactId["id"] ?>">sửa</button>
                                            </td>
                                        </tr>
                                        <?php  }?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require '../module/require/modalCN.php';?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/maintenance.ajax.js"></script>
</body>

</html>