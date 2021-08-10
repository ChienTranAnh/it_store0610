<?php $__env->startSection('title', 'Sửa thông tin slide'); ?>
<?php $__env->startSection('thanhphan', 'Sửa thông tin slide'); ?>

<?php $__env->startSection('slide', 'is-expanded'); ?>

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo e(asset('ace_master/css/fonts.googleapis.com.css')); ?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo e(asset('ace_master/css/ace.min.css')); ?>" class="ace-main-stylesheet" id="main-ace-style" />
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" action="<?php echo e($slides->Id); ?>" enctype="multipart/form-data">
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="panel-title">Slide</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">ID:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="Id" value="<?php echo e($slides->Id ?? ''); ?>" disabled>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Tiêu đề:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="TieuDe" value="<?php echo e($slides->TieuDe ?? ''); ?>" placeholder=" Tiêu đề ảnh (nên nhập)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Ảnh <span class="red">*</span> :</label>
                            <div class="col-md-8">
                                <img src="/slide/<?php echo e($slides->Anh); ?>" alt="<?php echo e($slides->Anh); ?>" width="800">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-1"></label>
                            <label class="control-label col-md-2">Chọn ảnh slide khác:</label>
                            <div class="col-md-8">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Chọn một ảnh</h4>
                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>
                                            <a href="#" data-action="close">
                                                <i class="ace-icon fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input multiple type="file" id="id-input-file-3" name="images"/>
                                                </div>
                                            </div>
                                            <label>
                                                <input type="checkbox" name="file-format" id="id-file-format" class="ace" />
                                                <span class="lbl"> Chỉ chấp nhận ảnh</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <label class="control-label col-md-8"></label>
                            <div class="col-md-3 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i>Cập nhật</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="/slide/danhsach"><i class="fas fa-times-circle"></i>Hủy</a>
                            </div>
                        </div>
                        <div class="row"><label class="col-md-3"></label></div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?php if(Session('message')): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?php echo e(Session('message')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row"><label class="col-md-3"></label></div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($err); ?></br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="clearix"></div>
<?php $__env->stopSection(); ?>
    <script src="<?php echo e(asset('/ace_master/js/jquery-2.1.4.min.js')); ?>"></script>
<!-- ace scripts -->
    <script src="<?php echo e(asset('/ace_master/js/ace-elements.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/ace_master/js/ace.min.js')); ?>"></script>
<!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {

            $('#id-input-file-3').ace_file_input({
                style: 'well',
                btn_choose: 'Drop files here or click to choose',
                btn_change: null,
                no_icon: 'ace-icon fa fa-cloud-upload',
                droppable: true,
                thumbnail: 'small'//large | fit
                //,icon_remove:null//set null, to hide remove/reset button
                /**,before_change:function(files, dropped) {
                    //Check an example below
                    //or examples/file-upload.html
                    return true;
                }*/
                /**,before_remove : function() {
                    return true;
                }*/
                ,
                preview_error : function(filename, error_code) {
                    //name of the file that failed
                    //error_code values
                    //1 = 'FILE_LOAD_FAILED',
                    //2 = 'IMAGE_LOAD_FAILED',
                    //3 = 'THUMBNAIL_FAILED'
                    //alert(error_code);
                }

            }).on('change', function(){
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });


            //dynamically change allowed formats by changing allowExt && allowMime function
            $('#id-file-format').removeAttr('checked').on('change', function() {
                var whitelist_ext, whitelist_mime;
                var btn_choose
                var no_icon
                if(this.checked) {
                    btn_choose = "Drop images here or click to choose";
                    no_icon = "ace-icon fa fa-picture-o";
        
                    whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
                    whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
                }
                else {
                    btn_choose = "Drop files here or click to choose";
                    no_icon = "ace-icon fa fa-cloud-upload";
                    
                    whitelist_ext = null;//all extensions are acceptable
                    whitelist_mime = null;//all mimes are acceptable
                }
                var file_input = $('#id-input-file-3');
                file_input
                .ace_file_input('update_settings',
                {
                    'btn_choose': btn_choose,
                    'no_icon': no_icon,
                    'allowExt': whitelist_ext,
                    'allowMime': whitelist_mime
                })
                file_input.ace_file_input('reset_input');
                
                file_input
                .off('file.error.ace')
                .on('file.error.ace', function(e, info) {
                    //console.log(info.file_count);//number of selected files
                    //console.log(info.invalid_count);//number of invalid files
                    //console.log(info.error_list);//a list of errors in the following format
                    
                    //info.error_count['ext']
                    //info.error_count['mime']
                    //info.error_count['size']
                    
                    //info.error_list['ext']  = [list of file names with invalid extension]
                    //info.error_list['mime'] = [list of file names with invalid mimetype]
                    //info.error_list['size'] = [list of file names with invalid size]
                    
                    
                    /**
                    if( !info.dropped ) {
                        //perhapse reset file field if files have been selected, and there are invalid files among them
                        //when files are dropped, only valid files will be added to our file array
                        e.preventDefault();//it will rest input
                    }
                    */
                    
                    
                    //if files have been selected (not dropped), you can choose to reset input
                    //because browser keeps all selected files anyway and this cannot be changed
                    //we can only reset file field to become empty again
                    //on any case you still should check files with your server side script
                    //because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
                });
                
                
                /**
                file_input
                .off('file.preview.ace')
                .on('file.preview.ace', function(e, info) {
                    console.log(info.file.width);
                    console.log(info.file.height);
                    e.preventDefault();//to prevent preview
                });
                */
            
            });
                    
        });
    </script>
<?php echo $__env->make('layoutsAd.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\IT_store0610\resources\views/slide/slideedit.blade.php ENDPATH**/ ?>