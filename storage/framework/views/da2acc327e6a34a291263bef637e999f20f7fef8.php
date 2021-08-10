<?php $__env->startSection('title', 'Khách hàng'); ?>

<?php $__env->startSection('thanhphan', 'Khách hàng'); ?>

<?php $__env->startSection('khachhang', 'is-expanded'); ?>

<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group" style="text-align: right">
               <h3 style="float: left">Khách hàng</h3>
                <div>
                   <a href="/register"><button class="btn btn-warning"><i class="fas fa-plus-circle"></i>Thêm mới</button></a>
                </div>
            </div>
            <div class="form-group">
                <form action="/khachhang/danhsach">
                    <fieldset>
                      <div class="row">
                        <label class="col-md-1"></label>
                        <label class="col-md-2" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 20px">Tìm nhanh:</label>
                        <div class="col-md-4">
                          <input type="text" name="tuKhoa" class="form-control" value="<?php echo e($tuKhoa??''); ?>" placeholder="Tìm tên hoặc email">
                        </div>
                        <div class="col-md-3">
                            <select name="tkLoaiKhachHang" class="form-control">
                                <option value="">- - - Loại khách hàng</option>
                                <?php if(isset($loaiKHs)): ?>
                                    <?php $__currentLoopData = $loaiKHs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lkh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($malkh == $lkh->Id): ?>
                                        <option selected="selected" value="<?php echo e($lkh->Id); ?>"><?php echo e($lkh->LoaiKhachHang); ?></option>
                                      <?php else: ?>
                                        <option value="<?php echo e($lkh->Id); ?>"><?php echo e($lkh->LoaiKhachHang); ?></option>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary" name="btnTimKiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered table-borderless table-striped" id="tableKhachHang">
                    <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Loại KH</th>
                        <th>Ngày tạo</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $khachHangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($kh->Id); ?></td>
                        <td><?php echo e($kh->HoTen); ?></td>
                        <td><?php echo e($kh->NgaySinh); ?></td>
                        <td>
                           <?php switch($kh->GioiTinh):
                              case ("Nam"): ?>
                                 <i class="fas fa-mars" style="color: #009688" title="Nam"></i>
                                 <?php break; ?>
                              <?php case ("Nữ"): ?>
                                 <i class="fas fa-venus" style="color: red" title="Nữ"></i>
                                 <?php break; ?>
                              <?php case ("Khác"): ?>
                              <i class="fas fa-ellipsis-h" style="color: blueviolet" title="Khác"></i>
                                 <?php break; ?>
                              <?php default: ?>
                                 <i class="fas fa-question" title="Không biết"></i>
                           <?php endswitch; ?>
                        </td>
                        <td><?php echo e($kh->Email); ?></td>
                        <td><?php echo e($kh->DiaChi); ?></td>
                        <td>
                           <select class="form-control col-md-10" name="LoaiKHId">
                              <option value="">- - -</option>
                              <?php $__currentLoopData = $loaiKHs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lkh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($kh->LoaiKHId == $lkh->Id): ?>
                                    <option selected="selected" value="<?php echo e($lkh->Id); ?>"><?php echo e($lkh->LoaiKhachHang); ?></option>
                                 <?php else: ?>
                                    <option value="<?php echo e($lkh->Id); ?>"><?php echo e($lkh->LoaiKhachHang); ?></option>
                                 <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </td>
                        <td><?php echo e($kh->NgayTao); ?></td>
                        <td class="text-center">
                           <a class="btn" href="#" title="Thông tin"
                              data-hoten="<?php echo e($kh->HoTen); ?>"
                              data-ngaysinh="<?php echo e($kh->NgaySinh); ?>"
                              data-gioitinh="<?php echo e($kh->GioiTinh); ?>"
                              data-dienthoai="<?php echo e($kh->DienThoai); ?>"
                              data-email="<?php echo e($kh->Email); ?>"
                              data-username="<?php echo e($kh->UserName); ?>"
                              data-diachi="<?php echo e($kh->DiaChi); ?>"
                              data-ngaysua="<?php echo e($kh->NgaySUa); ?>"
                              data-toggle="modal" data-target="#modalChiTiet">
                                 <i class="fas fa-info" style="color: navy"></i>
                           </a>
                           <a class="btn" href="/khachhang/sua/<?php echo e($kh->Id); ?>" title="Sửa"><i class="fas fa-pen" style="color: #146e6f"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="/khachhang/xoa/<?php echo e($kh->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                        </td>
                     </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($khachHangs->links()); ?>

        </div>
    </div>
</div>
         
         <div class="modal fade" id="modalChiTiet" tabindex="-1" role="dialog" aria-labelledby="modalChiTietLabel" aria-hidden="true">
            <form action="#" id="thongTinChiTiet">
               <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="modalChiTietLabel">Thông tin khách hàng</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"><i class="icon fas fa-times"></i></span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <div class="form-group">
                                 <label class="control-label col-md-6">Họ tên</label>
                                 <div class="col-md-12">
                                    <input class="form-control" name="HoTen" id="HoTen" type="text">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-1"></div>
                           <div class="col-md-1"></div>
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label class="control-label col-md-6">Ngày sinh</label>
                                 <div class="col-md-12">
                                    <input class="form-control" name="NgaySinh" id="NgaySinh" type="text">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-md-6">Điện thoại</label>
                                 <div class="col-md-12">
                                    <input class="form-control" name="DienThoai" id="DienThoai" type="text">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-md-6">Tên đăng nhập</label>
                                 <div class="col-md-12">
                                    <input class="form-control" name="UserName" id="UserName" type="text">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label class="control-label col-md-6">Giới tính</label>
                                 <div class="col-md-12">
                                    <input class="form-control" name="GioiTinh" id="GioiTinh" required="" type="text">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-md-6">Email</label>
                                 <div class="col-md-12">
                                    <input class="form-control" name="Email" id="Email" required="" type="text">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-md-6">Ngày sửa</label>
                                 <div class="col-md-12">
                                    <input class="form-control" name="NgaySua" id="NgaySua" required="" type="text">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-1"></div>
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <div class="form-group">
                                 <label class="control-label col-md-6">Địa chỉ</label>
                                 <div class="col-md-12">
                                    <textarea class="form-control" name="DiaChi" id="DiaChi" cols="3"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times-circle"></i>Đóng</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

   <script>
         $(document).ready(function () {
            $('#modalChiTiet').on('show.bs.modal', function (e) {
               var hoten = $(e.relatedTarget).attr('data-hoten');
               var ngaysinh = $(e.relatedTarget).attr('data-ngaysinh');
               var gioitinh = $(e.relatedTarget).attr('data-gioitinh');
               var dienthoai = $(e.relatedTarget).attr('data-dienthoai');
               var email = $(e.relatedTarget).attr('data-email');
               var username = $(e.relatedTarget).attr('data-username');
               var diachi = $(e.relatedTarget).attr('data-diachi');
               var ngaysua = $(e.relatedTarget).attr('data-ngaysua');
               $('#HoTen').val(hoten);
               $('#NgaySinh').val(ngaysinh);
               $('#GioiTinh').val(gioitinh);
               $('#DienThoai').val(dienthoai);
               $('#Email').val(email);
               $('#UserName').val(username);
               $('#DiaChi').val(diachi);
               $('#NgaySua').val(ngaysua);
            });
         });
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/khachhang/danhsach.blade.php ENDPATH**/ ?>