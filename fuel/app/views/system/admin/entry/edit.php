<?php echo $admin_header ?? ''; ?>
system_admin_entry_edit

<?php echo Form::open(Router::get('system_admin_entry_edit', array('entry_id' => $entry['entry_id']))); ?>
    <?php echo Form::csrf(); ?>
    <div>
        <div><?php echo Form::label('お名前', 'entry_name'); ?></div>
        <div><?php echo Form::input('entry_name', $entry['entry_name']); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_name'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('フリガナ', 'entry_ruby'); ?></div>
        <div><?php echo Form::input('entry_ruby', $entry['entry_ruby']); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_ruby'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（年）', 'entry_birthday_y'); ?></div>
        <div><?php echo Form::select('entry_birthday_y', $entry['entry_birthday_y'], $entry_birthday_y); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（月）', 'entry_birthday_m'); ?></div>
        <div><?php echo Form::select('entry_birthday_m', $entry['entry_birthday_m'], $entry_birthday_m); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（日）', 'entry_birthday_d'); ?></div>
        <div><?php echo Form::select('entry_birthday_d', $entry['entry_birthday_d'], $entry_birthday_d); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('都道府県', 'entry_prefecture'); ?></div>
        <div><?php echo Form::select('entry_prefecture', $entry['entry_prefecture'], PREFECTURE); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('ご住所', 'entry_address'); ?></div>
        <div><?php echo Form::input('entry_address', $entry['entry_address']); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_address'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（上桁）', 'entry_telephone_h'); ?></div>
        <div><?php echo Form::input('entry_telephone_h', $entry['entry_telephone_h']); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_telephone_h'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（中桁）', 'entry_telephone_m'); ?></div>
        <div><?php echo Form::input('entry_telephone_m', $entry['entry_telephone_m']); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_telephone_m'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（下桁）', 'entry_telephone_l'); ?></div>
        <div><?php echo Form::input('entry_telephone_l', $entry['entry_telephone_l']); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_telephone_l'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('メールアドレス', 'entry_email'); ?></div>
        <div><?php echo Form::input('entry_email', $entry['entry_email']); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_email'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジン', 'entry_magazine'); ?></div>
        <div><?php echo Form::select('entry_magazine', $entry['entry_magazine'], MAGAZINE); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジンのタイプ', 'entry_magazine_type'); ?></div>
        <div><?php echo Form::select('entry_magazine_type', $entry['entry_magazine_type'], MAGAZINE_TYPE); ?></div>
    </div>
    <div>
        <?php echo Form::button('send', '保存'); ?>
    </div>
<?php echo Form::close(); ?>
