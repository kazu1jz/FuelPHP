<?php echo $header ?? ''; ?>
entry_index

<?php echo Form::open(Router::get('entry_index')); ?>
    <?php echo Form::csrf(); ?>
    <div>
        <div><?php echo Form::label('お名前', 'entry_name'); ?></div>
        <div><?php echo Form::input('entry_name', $_POST['entry_name'] ?? null); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_name'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('フリガナ', 'entry_ruby'); ?></div>
        <div><?php echo Form::input('entry_ruby', $_POST['entry_ruby'] ?? null); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_ruby'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（年）', 'entry_birthday_y'); ?></div>
        <div><?php echo Form::select('entry_birthday_y', $_POST['entry_birthday_y'] ?? date('Y'), $entry_birthday_y); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（月）', 'entry_birthday_m'); ?></div>
        <div><?php echo Form::select('entry_birthday_m', $_POST['entry_birthday_m'] ?? date('m'), $entry_birthday_m); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（日）', 'entry_birthday_d'); ?></div>
        <div><?php echo Form::select('entry_birthday_d', $_POST['entry_birthday_d'] ?? date('d'), $entry_birthday_d); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('都道府県', 'entry_prefecture'); ?></div>
        <div><?php echo Form::select('entry_prefecture', $_POST['entry_prefecture'] ?? null, PREFECTURE); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('ご住所', 'entry_address'); ?></div>
        <div><?php echo Form::input('entry_address', $_POST['entry_address'] ?? null); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_address'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（上桁）', 'entry_telephone_h'); ?></div>
        <div><?php echo Form::input('entry_telephone_h', $_POST['entry_telephone_h'] ?? null); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_telephone_h'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（中桁）', 'entry_telephone_m'); ?></div>
        <div><?php echo Form::input('entry_telephone_m', $_POST['entry_telephone_m'] ?? null); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_telephone_m'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（下桁）', 'entry_telephone_l'); ?></div>
        <div><?php echo Form::input('entry_telephone_l', $_POST['entry_telephone_l'] ?? null); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_telephone_l'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('メールアドレス', 'entry_email'); ?></div>
        <div><?php echo Form::input('entry_email', $_POST['entry_email'] ?? null); ?></div>
        <div><span style="color: red;"><?php echo $errors['entry_email'] ?? ''; ?></span></div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジン', 'entry_magazine'); ?></div>
        <div><?php echo Form::select('entry_magazine', $_POST['entry_magazine'] ?? null, MAGAZINE); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジンのタイプ', 'entry_magazine_type'); ?></div>
        <div><?php echo Form::select('entry_magazine_type', $_POST['entry_magazine_type'] ?? null, MAGAZINE_TYPE); ?></div>
    </div>
    <div>
        <?php echo Form::button('confirm', '確認'); ?>
    </div>
<?php echo Form::close(); ?>
