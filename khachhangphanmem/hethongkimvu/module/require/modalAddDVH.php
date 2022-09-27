<div class="modal fade" id="modalAddDVH" tabindex="-1" role="dialog" aria-labelledby="modalAddDVH" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">THÊM SỐ DO</h5>
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
                                    <option value="<?php  echo $aemployer["idEmployer"] ?>">
                                        <?php  echo $aemployer["nameEmployer"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Nhập số DO</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" value="" name="dvhnumber" class="form-control " placeholder="Nhập số DO"
                                id="dvhnumber">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddDVH">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddDVH">Thêm số DO</button>
                <button type="button" class="btn btn-primary" id="btnUpdateDVH">Update số DO</button>
            </div>
        </div>
    </div>
</div>