<div class="modal fade" id="modalAddPictureFree" tabindex="-1" role="dialog" aria-labelledby="modalAddPictureFree" aria-hidden="true">
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
				  <label class="col-sm-4 col-form-label">TÊN SẢN PHẨM</label>
				  <div class="col-sm-8">
					<div class="form-group">
					  <input type="text" value="" name="nameProduct" class="form-control authenCheck" placeholder="TÊN SẢN PHẨM"
						id="nameProduct" required>
					</div>
				  </div>
				</div>
				<div class="row">
				  <label class="col-sm-4 col-form-label">GIÁ SẢN PHẨM</label>
				  <div class="col-sm-8">
					<div class="form-group">
					  <input type="text" value="" name="priceProduct" class="form-control authenCheck"
						placeholder="GIÁ SẢN PHẨM" id="priceProduct" required>
					</div>
				  </div>
				</div>
                <div class="row">
                    <label class="col-sm-4 col-form-label">SL</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="nicknamePictureFree" class="form-control " placeholder="Số Lượng" id="nicknamePictureFree" >
                        </div>
                    </div>
                </div>
				<div class="row">
				  <label class="col-sm-4 col-form-label">Đơn vị tính</label>
				  <div class="col-sm-8">
					<div class="form-group">
					  <select name="dvtProduct" id="dvtProduct" class="form-control " value="---Chọn---">
						<option value="0">---Chọn---</option>
						<option value="PCS">PCS</option>
						<option value="PC">PC</option>
						<option value="BỘ">BỘ</option>
						<option value="CÁI">CÁI</option>
						<option value="SET">SET</option>
						<option value="METER">METER</option>
						<option value="SỢI">SỢI</option>
					  </select>
					</div>
				  </div>
				</div>
				<div class="row">
				  <label class="col-sm-4 col-form-label">VAT</label>
				  <div class="col-sm-8">
					<div class="form-group">
					  <input list="vatsProduct" name="vatProduct" id="vatProduct" class="form-control" placeholder="VAT" value="10%">
					  <datalist id="vatsProduct">
						<option value="0%">
						<option value="5%">
						<option value="10%">
					  </datalist>
					</div>
				  </div>
				</div>

                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Loại bản vẽ</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control" id="typePictureFree">
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
                          <input type="text" value="" name="msPicture" class="form-control " placeholder="Nhập mã số bản vẽ" id="msPicrureFree" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Phôi</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="msPicture" class="form-control " placeholder="Nhập phôi" id="corePictureFree" >
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="namePictureFree">
                            <label class="custom-file-label" id="namePictureFreeLabel" for="namePictureFree">Choose file</label>
                        </div>
                      </div>
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddPictureFree">Close</button>
        <button type="button" class="btn btn-primary" id="btnAddpictureFree">Thêm SP</button>
        <button type="button" class="btn btn-primary" id="btnUpdatepictureFree">Sửa SP</button>
      </div>
    </div>
  </div>
</div>

