<?php
	if(!isset($_SESSION["company_member"])){
		session_start();
	}
    require_once '../module/dvh.module.php';
    require_once '../module/employer.module.php';
    require_once '../module/maintenance.module.php';
    $dvhNumber = new DvhNumber();
    $maintech = new Maintenance();
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
                <button class="btn btn-success btnOpenModalAddDVH" data-toggle="modal" data-target="#modalAddDVH" id="addDVH" style="position: relative;z-index: 1;">
                    <span>Thêm số DO</span>
                    <i class="fas fa-plus-circle"></i>
                </button>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title" style="display : inline-block;">Danh sách DO</h4>
                            </div>
                            <div class="card-body" id="load_data1">

                                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr class="t-center">
                                            <th scope="col">Khách Hàng</th>
                                            <th scope="col">Số DO</th>
                                            <th scope="col" style="text-align:right;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyAddDvh">
                                    <?php 
                                        $dvhNumbers = $dvhNumber->getAllDVH();
                                        foreach ($dvhNumbers as $key => $dvh) { 
                                        ?>
                                        <tr class="t-center">
                                            <td id="<?php echo $dvh["idEmployer"] ?>"><?php echo $dvh["nameEmployer"]?></td>
                                            <td><?php echo $dvh["serinumber"] ?></td>
                                            <td  style="text-align:right;">
											    <button class="btn btn-dark btnUpdateDVH" data-toggle="modal" data-target="#modalAddDVH" id="<?php echo $dvh["seri_id"] ?>">sửa</button>
                                                <button class="btn btn-warning btnCopyDVH" data-toggle="modal" data-target="#confirmCopy" data-employer="<?php  echo $dvh["idEmployer"] ?>" data-dvhnumber="<?php  echo $dvh["serinumber"] ?>" id="<?php echo $dvh["seri_id"] ?>">copy</button>
												<button class="btn btn-danger btnDeleteDVH" id="<?php echo $dvh["seri_id"]?>">Xóa</button>

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

            <?php require '../module/require/modalAddDVH.php';?>
            <?php require '../module/require/modalCopyDo.php';?>
            <?php require '../module/require/require_footer.php';?>
        </div>

    </div>

    <!--   Core JS Files   -->
    <?php require '../module/require/require_link_footer.php';?>
    <script src="../js/ajax/innit.js"></script>
    <script src="../js/ajax/addDVH.ajax.js"></script>
    <?php require '../module/require/datatable.php';?>
</body>

</html>