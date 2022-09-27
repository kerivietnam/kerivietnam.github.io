<div class="modal fade" id="modalAddPicture" tabindex="-1" role="dialog" aria-labelledby="modalAddPicture" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm bản vẽ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <label class="col-sm-4 col-form-label fw-bold">Chọn khách hàng</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <select class="form-control" id="customerName">
                            <option value="0">--Khách hàng--</option>
                                <?php $AllEmployer = $employer->getAllEmployers();
                                    foreach ($AllEmployer as $key => $aemployer) { ?>
                                   <option value="<?php  echo $aemployer["idEmployer"] ?>"><?php  echo $aemployer["nameEmployer"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4 col-form-label fw-bold">Số DO</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <select class="form-control" id="dvhNumber">
                            <option value="0">--Số DO--</option>
                            <?php $dvhNumberAll = $dvhNumber->getAllDVH();
                                    foreach ($dvhNumberAll as $key => $value) { ?>
                                   <option value="<?php  echo $value["seri_id"] ?>"><?php  echo $value["serinumber"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Chọn sản phẩm</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control" id="projectName">
                                <option value="0">--Sản phẩm--</option>
                                <?php 
                                    $AllProducts = $product->getAllProducts();
                                    foreach ($AllProducts as $key => $product) { ?>
                                         <option value="<?php  echo $product["idProduct"] ?>"><?php  echo $product["nameProduct"] ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Số lượng</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="quantityPicture" class="form-control " placeholder="Nhập số lượng bản vẽ" id="quantityPicture" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Đơn giá</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="pricePicture" class="form-control " placeholder="Nhập đơn giá bản vẽ" id="pricePicture" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">VAT</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="vatPicture" class="form-control " placeholder="Nhập đơn giá bản vẽ" id="vatPicture" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Loại bản vẽ</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control" id="typePictureName">
                                <option value="0">--Loại bản vẽ--</option>
                                <option value="2D">Bản vẽ 2D</option>
                                <option value="3D">Bản vẽ 3D</option>
                                <option value="CNC">Bản vẽ CNC</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">MSBV</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="msPicture" class="form-control " placeholder="Nhập mã số bản vẽ" id="msPicture" >
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddPicture">Close</button>
        <button type="button" class="btn btn-primary" id="btnAddpicture">Thêm bản vẽ</button>
        <button type="button" class="btn btn-primary" id="btnUpdatepicture">Update bản vẽ</button>
      </div>
    </div>
  </div>
</div>

