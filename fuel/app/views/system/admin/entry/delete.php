<?php echo $admin_header ?? ''; ?>
system_admin_entry_delete

<?php echo Form::open(Router::get('system_admin_entry_delete', array('entry_id' => $entry['entry_id']))); ?>
    <?php echo Form::csrf(); ?>
    <div><span style="color: red;"><?php echo isset($_POST['delete']) ? 'エラー：削除に失敗しました。' : ''; ?></span></div>
    <div>
        ID：<?php echo $entry['entry_id']; ?>
    </div>
    <div>
        お名前：<?php echo $entry['entry_name']; ?>
    </div>
    <div>
        フリガナ：<?php echo $entry['entry_ruby']; ?>
    </div>
    <div>
        -----<br>
        上記データを削除してもよろしいですか？
    </div>
    <div>
        <?php echo Form::button('delete', '削除'); ?>
    </div>
<?php echo Form::close(); ?>
