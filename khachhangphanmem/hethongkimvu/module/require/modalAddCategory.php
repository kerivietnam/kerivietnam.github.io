<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="modalAddCategory" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm category</h5>
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
                                var_dump($AllEmployer);
                                    foreach ($AllEmployer as $key => $aemployer) { ?>
                                   <option value="<?php  echo $aemployer["idEmployer"] ?>"><?php  echo $aemployer["nameEmployer"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4 col-form-label fw-bold">Chọn Số CN</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <select class="form-control" id="cnNumber">
                            <option value="0">--Số CN--</option>
                            <?php $cnNumber = $maintenance->getAllContact();
                                    foreach ($cnNumber as $key => $cn) { ?>
                                   <option value="<?php  echo $cn["id"] ?>"><?php  echo $cn["machinenumber"] ?></option>
                            <?php } ?>          
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4 col-form-label fw-bold">Số DVH</label>
                <div class="col-sm-8">
                    <div class="form-group">
                        <select class="form-control" id="dvhNumber">
                            <option value="0">--Số DVH--</option>
                        </select>
                    </div>
                </div>
            </div>       
            
            <div class="row">
                <label class="col-sm-4 col-form-label fw-bold">Category</label>
                <div class="col-sm-8">
                    <div class="form-group">
                      <input type="text" value="" name="category" class="form-control " placeholder="Nhập category" id="category" >
                    </div>
                </div>
            </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddCategory">Close</button>
        <button type="button" class="btn btn-primary" id="btnAddCategory">Thêm category</button>
        <button type="button" class="btn btn-primary" id="btnUpdateCategory">Update category</button>
      </div>
    </div>
  </div>
</div>

