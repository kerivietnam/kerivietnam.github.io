  
   <div class="modal fade" id="modalconfirmAuthen" tabindex="-1" role="dialog" aria-labelledby="modalconfirmAuthen"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLongTitle">Cấp quyền cho nhân viên</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   
                           <form action="" class="form-horizontal">

                               <div class="row">
                                   <label class="col-sm-4 col-form-label fw-bold">Tên Màn Hình</label>
                                   <div class="col-sm-8">
                                       <div class="form-group">
                                           <select class="form-control" id="nameScreen">
                                               <option>--Tên màn hình--</option>
                                               <option value="adminScreen">Amin</option>
                                               <option value="themPhoiScreen">Thêm Phôi</option>
                                               <option value="technologyScreen">Kỹ Thuật</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">    
                                   <label class="col-sm-4 col-form-label fw-bold"> Nhập Url </label>
                                   <div class="col-sm-8">
                                       <div class="form-group">
                                           <input type="text" class="form-control" name="url" id="url"
                                               placeholder="https://hungphat/admin">
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <label class="col-sm-4 col-form-label fw-bold"> Tên người dùng </label>
                                   <div class="col-sm-8">
                                       <div class="form-group">
                                           <select class="form-control" id="userId">
                                               <option>--Tên người dùng--</option>
                                               <?php 
                                       
                                                $employerss = $employyer->getAllEmployers();
                                                foreach ($employerss as $key => $employers)
                                                { ?>
                                                    <option value="<?php echo $employers["idEmployer"]  ?>"><?php echo $employers["nameEmployer"] ?></option>
                                                <?php }  ?>
                                           </select>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <label class="col-sm-4 col-form-label fw-bold"> Cấp quyền </label>
                                   <div class="col-sm-8">
                                       <div class="form-group row">
                                           <?php 
                                               $typess = $authen->getAllType();
                                               foreach ($typess as $key => $type) {
                                           ?>
                                           <div class="col-sm-6">
                                               <div class="form-check">
                                                   <label class="form-check-label">
                                                       <input class="form-check-input authenCheckvalue"
                                                           type="checkbox" value="<?php echo $type["idAuthentication"] ?>">
                                                       <span class="form-check-sign"></span>
                                                       <?php echo $type["nameAuthentication"] ?>
                                                   </label>
                                               </div>
                                           </div>
                                           <?php } ?>

                                       </div>
                                   </div>
                               </div>
                           </form>
                 
               </div>
               <div class="modal-footer modalAddAuthen">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal" >Đóng cửa sổ</button>
                   <button type="submit" class="btn btn-primary" id="confirmAuthen">Cấp quyền</button>
               </div>
           </div>
       </div>
   </div>

