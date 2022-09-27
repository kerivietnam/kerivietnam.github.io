<div class="modal fade" id="confirmCopy" tabindex="-1" role="dialog" aria-labelledby="confirmCopy" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn muốn copy số do : <span id="doConfirmNumber">Do1</span> ?</h5>
        <button type="button" class="close closeComfirm" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <div class="row">
                    <label class="col-sm-4 col-form-label fw-bold">Chọn khách hàng</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control" id="customerNameCopy">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeComfirm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="handleCopy" >Copy</button>
      </div>
    </div>
  </div>
</div>