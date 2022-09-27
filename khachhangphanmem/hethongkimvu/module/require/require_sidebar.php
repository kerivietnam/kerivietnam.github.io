<div class="sidebar" data-color="mycolor">

    <!-- <a href="index.html" class="simple-text logo-mini">
            <img src="../img/logo.jpg" alt="" width="34" height="34" style="border-radius: 50%;">
        </a>
        <a href="index.html" class="simple-text logo-normal">
            HƯNG PHÁT SOLUTIONS
        </a> -->
		
	<?php
		if (isset($_SESSION['company_member']) && ($_SESSION['company_member']["name_user"] == "admin" || $_SESSION['company_member']["name_user"] == "nhphuong")) {
	?>
	
    <div class="sidebar-wrapper sidebar-wrappertop" id="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <a href="index.html" class="simple-text logo-mini" style="padding: 0 !important;">
                    <img src="../img/logo.jpg" alt="" width="34" height="34" style="border-radius: 50%;">
                </a>
            </div>
            <div class="info">
                <a data-toggle="collapse" href="index.html" class="collapsed">
                    <span>
                        QUẢN LÝ THỜI GIÁO DỤC
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav">
		<!--
            <li>
                <a href="authenScreen.php">
                    <i class="fas fa-drum-steelpan"></i>
                    <p>PHÂN QUYỀN</p>
                </a>
            </li>
            <li>
                <a href="editAuthen.php">
                    <i class="fas fa-clipboard-list"></i>
                    <p>DANH SÁCH PHÂN QUYỀN</p>
                </a>
            </li>
			-->
            <li>
                <a href="formThemNV.php">
                    <i class="fas fa-users"></i>
                    <p>QUẢN LÝ SINH VIÊN</p>
                </a>
            </li>
        </ul>
    </div>
   <?php
		}
	?>	
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="../img/default-avatar.png" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        QUẢN LÝ THỜI GIÁO DỤC
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>

        <ul class="nav" style="padding-bottom: 100px;">
	        <li>
                <!--<a href="formMainternanceAll.php">-->
                <a href="#">
                    <i class="fas fa-images"></i>
                    <p>QL MÀN HÌNH SINH VIÊN</p>
                </a>
            </li>
            <li>
                <!--<a href="formThemKH.php">-->
				<a href="#">
                    <i class="fas far fa-building"></i>
                    <p>QUẢN LÝ LỚP</p>
                </a>
            </li>

<!--            <li>
                <a href="addCN.php">
                    <i class="fas fa-ring"></i>
                    <p>THÊM SỐ CN</p>
                </a>
            </li>-->
            <li>
                <!--<a href="addDVH.php">-->
				<a href="#">
                    <i class="fas fa-ring"></i>
                    <p>QUẢN LÝ MÔN HỌC</p>
                </a>
            </li>
			<!-- 
            <li>
                <a href="addCategory.php">
                    <i class="fas fa-ethernet"></i>
                    <p>THÊM CATEGORY</p>
                </a>
            </li>-->
            <li>
                <!-- <a href="addPictureFreeProduct.php">-->
				<a href="#">
                    <i class="fas fa-cart-plus"></i>
                    <p>QUẢN LÝ SINH VIÊN</p>
                </a>
            </li>
            <li>
                <!--<a href="formWorkStatus.php">-->
				<a href="#">
                    <i class="fas fa-tools"></i>
                    <p>QUẢN LÝ CHUNG</p>
                </a>
            </li>
<!--			
            <li>
                <a href="formThemSP.php">
                    <i class="fas fa-cart-plus"></i>
                    <p>SẢN PHẨM</p>
                </a>
            </li>
            <li>
                <a href="addPictureFree.php">
                    <i class="fas fa-images"></i>
                    <p>BẢN VẼ</p>
                </a>
            </li>
            <li>
                <a href="addPicture.php">
                    <i class="fas fa-images"></i>
                    <p>THÊM SP/BẢN VẼ vào DO</p>
                </a>
            </li>
-->
			<!-- 
            <li>
                <a href="index.php">
                    <i class="far fa-building"></i>
                    <p>THÊM THÔNG TIN CHI TIẾT</p>
                </a>
            </li>

            <li>
                <a href="maintenance.php">
                    <i class="fas fa-tools"></i>
                    <p>BẢO TRÌ</p>
                </a>
            </li>-->
        </ul>
    </div>
</div>