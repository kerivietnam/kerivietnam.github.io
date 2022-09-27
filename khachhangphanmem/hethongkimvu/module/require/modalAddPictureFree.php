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
                    <label class="col-sm-4 col-form-label fw-bold">Tên gọi</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                          <input type="text" value="" name="nicknamePictureFree" class="form-control " placeholder="Nhập tên gọi của bản vẽ" id="nicknamePictureFree" >
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
        <button type="button" class="btn btn-primary" id="btnAddpictureFree">Thêm bản vẽ</button>
        <button type="button" class="btn btn-primary" id="btnUpdatepictureFree">Update bản vẽ</button>
      </div>
    </div>
  </div>
</div>

