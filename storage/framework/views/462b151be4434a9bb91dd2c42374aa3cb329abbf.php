<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">创建新角色</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action=" <?php echo e(route('permission.store')); ?>">
                <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">名称</label>
                        <input type="text" class="form-control" name="guard_name" id="guard_name" placeholder="成员 (例如: 管理员)">
                        <input type="text" class="form-control" name="name" id="name" placeholder="角色 (例如: 管理)">

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
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-store"></i> 保存
                
                </button>
                </form>
            </div><!--modal-footer end-->
        </div>
    </div>
</div><?php /**PATH /home/vagrant/code/ourbox/resources/views/components/modals.blade.php ENDPATH**/ ?>