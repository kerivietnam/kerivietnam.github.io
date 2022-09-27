<div class="modal fade" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="modalAddProduct"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">THÊM SẢN PHẨM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddEmployer">Close</button>
          <button type="button" class="btn btn-primary" id="btnAddProduct">Thêm sản phẩm</button>
          <button type="button" class="btn btn-primary" id="btnUpdateProduct">Update sản phẩm</button>
        </div>
      </div>
    </div>
  </div>