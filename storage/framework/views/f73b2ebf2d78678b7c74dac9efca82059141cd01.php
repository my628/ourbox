<div class="modal fade" id="role_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--method="POST" action=" <?php echo e(route('permission.store')); ?> " <?php echo csrf_field(); ?>-->
            <form role="form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">创建新角色</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!--modal-header end-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">名称</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="guard_name" id="guard_name" placeholder="成员 (例如: 管理员)">
                        </div>
                        <div class="input-group ">
                            <input type="text" class="form-control" name="name" id="name" placeholder="角色 (例如: 管理)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">颜色</label>
                        <input type="text" class="form-control" id="color-code" placeholder="#aaaaaa">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">图标</label>
                        <input type="text" class="form-control" id="icon-code" placeholder="fas fa-bolt">
                        <small id="emailHelp" class="form-text text-muted">输入任意一个 Font Awesome 图标名称。包括前缀，例如 fas fa-</small>
                    </div>
                </div><!--modal-body end-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="role_store">
                        <i class="fas fa-store"></i> 保存
                    </button>
                    <button type="button" class="btn btn-warning" id="role_delete">
                        <i class="fas fa-trash-alt"></i>删除
                    </button>
                </div><!--modal-footer end-->
            </form><!--form end-->
        </div><!--modal-content end-->
    </div><!--modal-dialog end-->
</div><!--modal end--><?php /**PATH /home/vagrant/code/ourbox/resources/views/home/permission/role.blade.php ENDPATH**/ ?>