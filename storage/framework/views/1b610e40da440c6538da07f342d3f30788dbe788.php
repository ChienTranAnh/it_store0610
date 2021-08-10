<?php $__env->startSection('title', 'Đơn hàng'); ?>

<?php $__env->startSection('thanhphan', 'Đơn hàng'); ?>

<?php $__env->startSection('donhang', 'is-expanded'); ?>

<?php $index = 1;?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="form-group">
                <h3>Danh sách đơn hàng</h3>
            </div>
            <div class="form-group">
                <form action="/donhang/danhsach">
                    <fieldset>
                      <legend style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-size: 20px">Tìm nhanh:</legend>
                      <div class="row">
                        <label class="col-md-1"></label>
                        <div class="col-md-3">
                          <input type="text" name="tuKhoa" class="form-control" value="<?php echo e($tuKhoa??''); ?>" placeholder="Tìm đơn hàng?">
                        </div>
                        <div class="col-md-2">
                            <select name="tkTinhTrang" class="form-control">
                                <option value="">- - - Theo tình trạng đơn hàng?</option>
                                <?php if(isset($tinhTrangDH)): ?>
                                    <?php $__currentLoopData = $tinhTrangDH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($maTT == $tt->Id): ?>
                                        <option selected="selected" value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                      <?php else: ?>
                                        <option value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="tkHinhThucThanhToan" class="form-control">
                                <option value="">- - - Hình thức thanh toán?</option>
                                 <?php if($hThuc): ?>
                                    <option selected="selected" value="<?php echo e($hThuc ?? ''); ?>"><?php echo e($hThuc ?? ''); ?></option>
                                 <?php else: ?>
                                 <option value="Chuyển khoản">Chuyển khoản</option>
                                 <option value="COD">COD</option>
                                 <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                                 <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary" name="btnTimKiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                        </div>
                        <?php if(session('thongBao')): ?>
                           <div class="col-md-2">
                              <div class="alert alert-success">
                                 <?php echo e(session('thongBao')); ?>

                              </div>
                           </div>
                        <?php endif; ?>
                      </div>
                    </fieldset>
                  </form>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered table-borderless table-striped" id="t1">
                    <thead class="thead-light text-center">
                     <tr>
                           <th>STT</th>
                           <th>ID</th>
                           <th>Khách hàng</th>
                           <th>Tổng tiền</th>
                           <th>Số lượng</th>
                           <th>Hình thức thanh toán</th>
                           <th>Ghi chú</th>
                           <th>Ngày đặt hàng</th>
                           <th>Tình trạng</th>
                           <th>Đã duyệt</th>
                           <th>Hoàn thành</th>
                           <th>Tác vụ</th>
                     </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $donHangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($dh->Id); ?></td>
                        <td>
                           <?php if($khachHangs): ?>
                              <?php $__currentLoopData = $khachHangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if($dh->KhachHangId == $kh->Id): ?>
                                    <p style="font-weight: bold"><?php echo e($kh->HoTen); ?></span>
                                 <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                        </td>
                        <td><?php echo e(number_format($dh->TongTien)); ?></td>
                        <td><?php echo e($dh->SoLuong); ?></td>
                        <td><?php echo e($dh->HinhThucThanhToan); ?></td>
                        <td><?php echo e($dh->GhiChu); ?></td>
                        <td><?php echo e($dh->NgayDatHang); ?></td>
                        <form class="form-horizontal" action="/donhang/chitiet/<?php echo e($dh->Id); ?>" method="POST">
                           <td>
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                              <select class="form-control" name="TrangThaiDHId">
                              <option value="">- - - - -</option>
                                 <?php if($tinhTrangDH): ?>
                                    <?php $__currentLoopData = $tinhTrangDH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($dh->TrangThaiDHId == $tt->Id): ?>
                                       <option selected="selected" value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                       <?php else: ?>
                                          <option value="<?php echo e($tt->Id); ?>"><?php echo e($tt->TrangThai); ?></option>
                                       <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                              </select>
                           </td>
                           <td>
                              <?php switch($dh->DaDuyet):
                                 case (1): ?>
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="1" name="DaDuyet" value="1" checked><span class="label-text"> Duyệt</span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkmagenta;" title="Đang xem"></i></span>
                                       </label>
                                    </div>
                                       <?php break; ?>
                                 <?php case (2): ?>
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" id="0" name="DaDuyet" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="2" name="DaDuyet" value="2" checked><span class="label-text"> Đang xem</span>
                                       </label>
                                    </div>
                                       <?php break; ?>
                                 <?php default: ?>
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" id="0" name="DaDuyet" value="0" checked><span class="label-text"> Chưa duyệt</span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="1" name="DaDuyet" value="1"><span class="label-text"> <i class="fas fa-check" style="color: seagreen" title="Đã duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" id="2" name="DaDuyet" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkmagenta;" title="Đang xem"></i></span>
                                       </label>
                                    </div>
                              <?php endswitch; ?>
                           </td>
                           <td>
                              <?php switch($dh->HoanThanh):
                                 case (1): ?>
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" name="HoanThanh" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="1" checked><span class="label-text"> Hoàn thành</span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkorange;" title="Đang chờ"></i></span>
                                       </label>
                                    </div>
                                       <?php break; ?>
                                 <?php case (2): ?>
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" name="HoanThanh" value="0"><span class="label-text"> <i class="icon fas fa-times" style="color: red" title="Chưa duyệt"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Hoàn thành"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="2" checked><span class="label-text"> Đang chờ</span>
                                       </label>
                                    </div>
                                       <?php break; ?>
                                 <?php default: ?>
                                    <div class="animated-radio-button">
                                       <label>
                                       <input type="radio" name="HoanThanh" value="0" checked><span class="label-text"> Chưa</span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="1"><span class="label-text"> <i class="fas fa-check-double" style="color: seagreen" title="Hoàn thành"></i></span>
                                       </label></br>
                                       <label>
                                       <input type="radio" name="HoanThanh" value="2"><span class="label-text"> <i class="icon fas fa-spinner" style="color: darkorange;" title="Đang chờ"></i></span>
                                       </label>
                                    </div>
                              <?php endswitch; ?>
                           </td>
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
                              
                              <button type="submit" class="btn btn-default"> <i class="fas fa-user-check" style="color: black" title="Thực hiện"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="/donhang/xoa/<?php echo e($dh->Id); ?>" title="Xóa"><i class="fas fa-trash-alt" style="color: red"></i></a>
                           </td>
                        </form>
                     </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($donHangs->links()); ?>

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
               <div class="table-responsive table--no-card m-b-30">
                  <table class="table table-borderless table-striped table-earning">
                     <thead class="thead-light">
                        <tr>
                           <th>Họ tên</th>
                           <th>Ngày sinh</th>
                           <th>Giới tính</th>
                           <th class="text-right">Điện thoại</th>
                           <th class="text-right">Tên đăng nhập</th>
                           <th class="text-right">Ngày sửa</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td id="HoTen"></td>
                           <td id="NgaySinh"></td>
                           <td id="GioiTinh"></td>
                           <td class="text-right" id="DienThoai"></td>
                           <td class="text-right" id="UserName"></td>
                           <td class="text-right" id="NgaySua"></td>
                        </tr>
                     </tbody>
                  </table>
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
            $('#HoTen').html(hoten);
            $('#NgaySinh').html(ngaysinh);
            $('#GioiTinh').html(gioitinh);
            $('#DienThoai').html(dienthoai);
            $('#Email').html(email);
            $('#UserName').html(username);
            $('#DiaChi').html(diachi);
            $('#NgaySua').html(ngaysua);
         });
      });

      // var arr = [];
      // $('#t1 tr').each(function () {
      //    var id = $(this).find("td").eq(2).html();
      //    var soluong = $(this).find("td").eq(4).html();
      //    var tien = $(this).find("td").eq(3).html();
      //    arr.push({"Khách hàng":id, "Số lượng": soluong, "Tổng tiền":tien});
      // });
      // console.log(arr);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/donhang/danhsach.blade.php ENDPATH**/ ?>