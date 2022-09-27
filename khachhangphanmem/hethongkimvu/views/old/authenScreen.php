<?php
    require_once '../module/authentication.module.php';
    $authen = new Authentication();
    // $machine = new Mechinepart();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/now-ui-dashboard-pro/examples/forms/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Feb 2020 16:42:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        Hưng Phát Solution
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.min.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Files -->

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/now-ui-dashboard.minaa26.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');</script>
    <!-- End Google Tag Manager -->


</head>

<body class=" sidebar-mini ">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper ">
    <?php require '../module/require/require_sidebar.php';?>
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
                <div class="authenBox">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title t-center">PHÂN QUYỀN</h4>
                            </div>
                            <div class="card-body ">
                                <form action="" class="form-horizontal">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label fw-bold">Tên Màn Hình</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select class="form-control" id="nameScreen">
                                                    <option>--Tên màn hình--</option>
                                                    <option value="adminScreen">Amin</option>
                                                    <option value="themPhoiScreen">Thêm Phôi</option>
                                                    <option value="technologyScreen">Kỹ Thuật</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label fw-bold"> Nhập Url </label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="url" id="url" placeholder="https://hungphat/admin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label fw-bold"> Tên người dùng </label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select class="form-control" id="userId">
                                                    <option>--Tên người dùng--</option>
                                                    <option value="1">Mrs Lan</option>
                                                    <option value="2">Mrs Ngọc</option>
                                                    <option value="3">Mr Lâm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label fw-bold"> Cấp quyền </label>
                                        <div class="col-sm-10">
                                            <div class="form-group row">
                                                    <?php 
                                                        $types = $authen->getAllType();
                                                        foreach ($types as $key => $type) {
                                                    ?>
                                                        <div class="col-sm-6">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input authenCheck" type="checkbox" value="<?php echo $type["idAuthentication"] ?>">
                                                                    <span class="form-check-sign"></span>
                                                                    <?php echo $type["nameAuthentication"] ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-center" id="confirmAuthen">Cấp quyền truy cập</button>
                                </form>
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