<div class="modal fade" id="modalAddPicture" tabindex="-1" role="dialog" aria-labelledby="modalAddPicture" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><h5>Thêm sản phẩm và bản vẽ vào DO</h5>
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
                            <input class="form-control" list="projectNames" name="browser" id="projectName">
                                <datalist id="projectNames">
                                        <?php 
                                        $AllProducts = $product->getAllProducts();
                                        foreach ($AllProducts as $key => $product) { ?>
                                        <option data-id = "<?php  echo $product["idProduct"] ?>" value="<?php  echo $product["nameProduct"] ?>">
                                        <?php } ?>
                                </datalist>
                                <!-- <select class="form-control" id="projectName">
                                <option value="0">--Sản phẩm--</option>
                                <?php 
                                   // $AllProducts = $product->getAllProducts();
                                    //foreach ($AllProducts as $key => $product) { ?>
                                         <option value="<?php//  echo $product["idProduct"] ?>"><?php//  echo $product["nameProduct"] ?></option>
                                    <?php// } ?>
                            </select> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Số lượng</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="quantityPicture" class="form-control " placeholder="Nhập số lượng SP" id="quantityPicture" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Đơn giá</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="pricePicture" class="form-control " placeholder="Nhập đơn giá SP" id="pricePicture" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">VAT</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="vatPicture" class="form-control " placeholder="Nhập VAT SP" id="vatPicture" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Chọn bản vẽ</label>
                    <div class="col-sm-8">
                        <div class="form-group">
						<input class="form-control" list="pictureFrees" name="browser1" id="pictureFree">
                                <datalist id="pictureFrees">
                                        <?php 
                                        $AllPictureFrees = $pictureFree->getAllPictureFree();
                                        foreach ($AllPictureFrees as $key => $value) { ?>
                                        <option data-id = "<?php  echo $value["idPictureFree"] ?>" value="<?php  echo $value["namePicrureFree"] ?>">
                                        <?php } ?>
                                </datalist>
                            <!--<select class="form-control" id="pictureFree">
                                <option value="0">--Bản vẽ--</option>
                                <?php 
                                    $AllPictureFrees = $pictureFree->getAllPictureFree();
                                    foreach ($AllPictureFrees as $key => $value) { ?>
                                         <option value="<?php  echo $value["idPictureFree"] ?>"><?php  echo $value["namePicrureFree"] ?></option>
                                    <?php } ?>
                            </select>-->
                        </div>
                    </div>
                </div>
                <div class="row" id="formDetailPictureFree">
                   
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddPicture">Close</button>
        <button type="button" class="btn btn-primary" id="btnAddpicture">Thêm SP/BV</button>
        <button type="button" class="btn btn-primary" id="btnUpdatepicture">Update SP/BV</button>
      </div>
    </div>
  </div>
</div>

