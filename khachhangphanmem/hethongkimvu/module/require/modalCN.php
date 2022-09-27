<div id="modalCN">
    <div id="exit_modalCN" onclick="exit_modalCN()">

    </div>
    <div id="modal_contentCN">
        <form method="post" class="form-horizontal">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title t-center">THÊM SỐ CN</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">KHÁCH HÀNG</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select class="form-control" id="customer_name">
                                    <option value="0" >--Khách hàng--</option>
                                    <?php $AllEmployer = $employer->getAllEmployers();
                                        foreach ($AllEmployer as $key => $aemployer) { ?>
                                    <option value="<?php  echo $aemployer["idEmployer"] ?>"><?php  echo $aemployer["nameEmployer"] ?></option>
                                     <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-sm-2 col-form-label">SỐ CN</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" value="" name="status" class="form-control authenCheck" placeholder="SỐ CN"
                                    id="cnNumberAddCN" required>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <label class="col-sm-2 col-form-label">SỐ ĐO DVH</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" value="" name="dvhnumber" class="form-control authenCheck"
                                    placeholder="SỐ ĐO DVH" id="dvhnumber" required>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="card-footer " style="text-align: right;">
                    <div class="btn-group">
                        <button class="btn btn-fill btn-dark" id="btnCloseModal"  onclick="exit_modalCN()">ĐÓNG CỬA SỔ</button>
                        <button class="btn btn-fill btn-primary" id="btnAddCN">THÊM SỐ CN</button>
                        <button class="btn btn-fill btn-primary" id="btnUpdateCN">SỬA SỐ CN</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>