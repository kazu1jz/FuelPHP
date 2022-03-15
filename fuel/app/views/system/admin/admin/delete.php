<?php echo $admin_header ?? ''; ?>
system_admin_admin_delete

<?php echo Form::open(Router::get('system_admin_admin_delete', array('admin_id' => $admin['admin_id']))); ?>
    <?php echo Form::csrf(); ?>
    <div><span style="color: red;"><?php echo isset($_POST['delete']) ? 'エラー：削除に失敗しました。' : ''; ?></span></div>
    <div>
        ID：<?php echo $admin['admin_id']; ?>
    </div>
    <div>
        ユーザー名：<?php echo $admin['login_nickname']; ?>
    </div>
    <div>
        アカウントの有効/無効：<?php echo ADMIN_LOGIN_STATUS[$admin['login_status']]; ?>
    </div>
    <div>
        -----<br>
        上記データを削除してもよろしいですか？
    </div>
    <div>
        <?php echo Form::button('delete', '削除'); ?>
    </div>
<?php echo Form::close(); ?>
