<div id="modalDS">
    <div id="exit_modalDS" onclick="exit_modalDS()">
    </div>
    <div id="modal_contentDS">
      
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title t-center">THÊM DỮ LIỆU</h4>
                </div>
                <div class="card-body">
                <div class="row">
                        <label class="col-sm-2 col-form-label fw-bold">Khách hàng</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select class="form-control" id="nameEmployer">
                                        <option value="0">--Khách hàng--</option>
                                        <?php 
                                            $employerList = $employer->getAllEmployers();
                                            foreach ($employerList as $key => $aEmployer) { ?>
                                            <option value="<?php echo $aEmployer["idEmployer"]?>"><?php echo $aEmployer["nameEmployer"]?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label fw-bold">Số CN</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select class="form-control" id="soCN">
                                    <option value="0">--Số CN--</option>
                                    <?php 
                                        $contacts = $maintenance->getAllContact();
                                        foreach ($contacts as $key => $contact) { ?>
                                        <option value="<?php echo $contact["id"]?>"><?php echo $contact["machinenumber"]?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label fw-bold">Số đo DVH</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select class="form-control" id="soDVH">
                                    <option value="0">--Số đo DVH--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tình trạng</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" value="" name="status" class="form-control "
                                    placeholder="Tình trạng" id="status" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label fw-bold">Category</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                            <select class="form-control" id="idCategory">
                                    <option value="0">--Category--</option>
                                    <?php 
                                        $categorys = $category->getAllCategory();
                                        foreach ($categorys as $key => $cate) { ?>
                                        <option value="<?php echo $cate["idCategory"]?>"><?php echo $cate["categoryName"]?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Tên hàng hóa</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select class="form-control" id="product_name">
                                    <option value="0">--Chọn hàng hóa--</option>
                                    <?php 
                                        $products = $product->getAllProducts();
                                        foreach ($products as $key => $produc) { ?>
                                        <option value="<?php echo $produc["idProduct"]?>"><?php echo $produc["nameProduct"]?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Đơn vị tính</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                             <input type="text" value="" name="unit" class="form-control authenCheck"
                                            placeholder="Đơn vị tính" id="unit" disabled >
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="" name="amount" class="form-control authenCheck"
                                    placeholder="Số lượng" id="amount">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="display:none;">
                            <div class="row">
                                <label class="col-sm-4 col-form-label fw-bold">Bản vẽ</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" id="typeBV">
                                            <option value="0">--Bản vẽ--</option>
                                            <?php 
                                                $pictures = $picture->getAllPictures();
                                                foreach ($pictures as $key => $pictures) { ?>
                                                <option value="<?php echo $pictures["idPicture"]?>"><?php echo $pictures["pictureName"]?></option>
                                            <?php }  ?>
                                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Phôi</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" value="" name="embryo" class="form-control authenCheck"
                                            placeholder="Phôi" id="embryo" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">GC</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="" name="gc" class="form-control authenCheck" placeholder="GC"
                                    id="gc" >
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">Đơn giá</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="" name="unit_price" class="form-control authenCheck"
                                    placeholder="Đơn giá" id="unit_price">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Thành tiền</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="" name="into_money" class="form-control authenCheck"
                                    placeholder="Thành tiền" id="into_money" >
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">VAT</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="" name="vat" class="form-control authenCheck"
                                    placeholder="VAT" id="vat" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Thành tiền VAT</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="" name="into_money_vat" class="form-control authenCheck"
                                    placeholder="Thành tiền VAT" id="into_money_vat" >
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">Thanh toán</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="" name="pay" class="form-control authenCheck"
                                    placeholder="Thanh toán" id="pay" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Còn lại</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" value="" name="rest" class="form-control authenCheck"
                                    placeholder="Còn lại" id="rest" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer " style="text-align:right">
                    <div class="btn-group">
                        <button class="btn btn-fill btn-dark" id="btnCloseModalTTN"
                            onclick="exit_modalDS()">ĐÓNG CỬA SỔ</button>
                        <button  class="btn btn-fill btn-primary" id="btnAddTinhtrang">THÊM</button>
                        <button  class="btn btn-fill btn-primary" id="btnUpdateTinhtrang">Update</button>
                    </div>
                </div>
            </div>

    </div>
</div>