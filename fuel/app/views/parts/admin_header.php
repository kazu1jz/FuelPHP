<div>
    【ログイン中：<?php echo Auth::get_screen_name(); ?>】
     | <a href="<?php echo Router::get('system_admin_index'); ?>">トップ</a>
     | <a href="<?php echo Router::get('system_admin_entry_index'); ?>">エントリー 一覧</a>
     | <a href="<?php echo Router::get('system_admin_admin_index'); ?>">管理者 一覧</a>
     | <a href="<?php echo Router::get('system_admin_config_index'); ?>">システム設定</a>
     | <a href="<?php echo Router::get('system_admin_password_index'); ?>">パスワード生成</a>
     | <a href="<?php echo Router::get('system_admin_logout_index'); ?>">ログアウト</a>
    <br>
    -----
</div>
