<?php echo $admin_header ?? ''; ?>
system_admin_admin_index

<?php foreach($admins as $admin): ?>
    <div>-----</div>
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
        該当管理者データ：<a href="<?php echo Router::get('system_admin_admin_edit', array('admin_id' => $admin->admin_id)); ?>">編集リンク</a>
    </div>
    <div>
        該当管理者データ：<a href="<?php echo Router::get('system_admin_admin_delete', array('admin_id' => $admin->admin_id)); ?>">削除リンク</a>
    </div>
<?php endforeach; ?>
