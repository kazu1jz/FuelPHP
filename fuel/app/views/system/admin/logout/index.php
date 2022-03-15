<?php echo $admin_header ?? ''; ?>
system_admin_logout_index

<?php echo Form::open(Router::get('system_admin_logout_index')); ?>
    <?php echo Form::csrf(); ?>
    <div>ログアウトしてもよろしいですか？</div>
    <div>
        <?php echo Form::button('logout', 'ログアウト'); ?>
    </div>
<?php echo Form::close(); ?>
