<?php echo $header ?? ''; ?>
system_login_index

<?php echo Form::open(Router::get('system_login_index')); ?>
    <?php echo Form::csrf(); ?>
    <div><span style="color: red;"><?php echo $login_error ?? ''; ?></span></div>
    <div>
        <div><?php echo Form::label('ログインID', 'login_id'); ?></div>
        <div><?php echo Form::input('login_id', $_POST['login_id'] ?? null); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('パスワード', 'login_password'); ?></div>
        <div><?php echo Form::password('login_password'); ?></div>
    </div>
    <div>
        <?php echo Form::button('login', 'ログイン'); ?>
    </div>
<?php echo Form::close(); ?>
