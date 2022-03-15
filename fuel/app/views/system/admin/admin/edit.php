<?php echo $admin_header ?? ''; ?>
system_admin_admin_edit

<?php echo Form::open(Router::get('system_admin_admin_edit', array('admin_id' => $admin['admin_id']))); ?>
    <?php echo Form::csrf(); ?>
    <div>
        <div><?php echo Form::label('権限（管理者の管理）', 'role_administrator_management'); ?></div>
        <div><?php echo Form::select('role_administrator_management', $admin['role_administrator_management'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('権限（設定値の管理）', 'role_setting_management'); ?></div>
        <div><?php echo Form::select('role_setting_management', $admin['role_setting_management'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('権限（マスタの管理）', 'role_master_management'); ?></div>
        <div><?php echo Form::select('role_master_management', $admin['role_master_management'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('権限（ログの閲覧）', 'role_log_view'); ?></div>
        <div><?php echo Form::select('role_log_view', $admin['role_log_view'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('権限（特別機能の使用）', 'role_special_feature_use'); ?></div>
        <div><?php echo Form::select('role_special_feature_use', $admin['role_special_feature_use'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('権限（エントリーの閲覧）', 'role_entry_view'); ?></div>
        <div><?php echo Form::select('role_entry_view', $admin['role_entry_view'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('権限（エントリーの編集）', 'role_entry_edit'); ?></div>
        <div><?php echo Form::select('role_entry_edit', $admin['role_entry_edit'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('権限（エントリーの削除）', 'role_entry_delete'); ?></div>
        <div><?php echo Form::select('role_entry_delete', $admin['role_entry_delete'], $choice_list); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('ログイン名', 'login_nickname'); ?></div>
        <div><?php echo Form::input('login_nickname', $admin['login_nickname']); ?></div>
        <div><span style="color: red;"><?php echo $errors['login_nickname'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('ログインID', 'login_id'); ?></div>
        <div><?php echo Form::input('login_id', $admin['login_id']); ?></div>
        <div><span style="color: red;"><?php echo $errors['login_id'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('パスワード', 'login_password'); ?></div>
        <div><?php echo Form::password('login_password'); ?></div>
        <div><span style="color: red;"><?php echo $errors['login_password'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('ステータス', 'login_status'); ?></div>
        <div><?php echo Form::select('login_status', $admin['login_status'], ADMIN_LOGIN_STATUS); ?></div>
    </div>
    <div>
        <?php echo Form::button('send', '保存'); ?>
    </div>
<?php echo Form::close(); ?>
