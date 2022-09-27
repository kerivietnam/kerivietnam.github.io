<!DOCTYPE html>
<html lang="en">

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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">

                            <div class="card-body ">
                                <form method="get" action="index.php" class="form-horizontal">

                                    <div class="card-header ">
                                        <h4 class="card-title t-center">Form Edit Machinepart</h4>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tình trạng</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="Tình trạng" class="form-control"
                                                    placeholder="Tình trạng" required>
                                                <span class="form-text">Không được bỏ trống trường này</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Tên hàng hóa</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="Tên hàng hóa" class="form-control"
                                                    placeholder="Tình trạng" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Đơn vị tính</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <select name="dvt" id="dvt" class="form-control" value="---Chọn---">
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
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Số lượng</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value="Số lượng" class="form-control"
                                                    placeholder="Số lượng" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Bản vẽ</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="Bản vẽ" class="form-control"
                                                    placeholder="Bản vẽ" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Phôi</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="Phôi" class="form-control" placeholder="Phôi"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">GC</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="GC" class="form-control" placeholder="GC"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Đơn giá</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" value="1000 VNĐ" class="form-control"
                                                    placeholder="Đơn giá" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Thành tiền</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value="9000 VNĐ" class="form-control"
                                                    placeholder="Thành tiền" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">VAT</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value="5000 VNĐ" class="form-control"
                                                    placeholder="VAT" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Thành tiền VAT</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value="3000 VNĐ" class="form-control"
                                                    placeholder="Thành tiền VAT" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Thanh toán</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value="2000 VNĐ" class="form-control"
                                                    placeholder="Thanh toán" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Còn lại</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="number" value="1000 VNĐ" class="form-control"
                                                    placeholder="Còn lại" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-fill btn-primary">Update
                                                    Machinepart</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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