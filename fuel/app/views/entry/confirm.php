<?php echo $header ?? ''; ?>
entry_confirm

<?php echo Form::open(Router::get('entry_index')); ?>
    <?php echo Form::csrf(); ?>
    <div>
        <div><?php echo Form::label('お名前', 'entry_name'); ?></div>
        <div>
            <?php echo $_POST['entry_name'] ?? ''; ?>
            <?php echo Form::hidden('entry_name', $_POST['entry_name'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('フリガナ', 'entry_ruby'); ?></div>
        <div>
            <?php echo $_POST['entry_ruby'] ?? ''; ?>
            <?php echo Form::hidden('entry_ruby', $_POST['entry_ruby'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（年）', 'entry_birthday_y'); ?></div>
        <div>
            <?php echo $_POST['entry_birthday_y'] ?? ''; ?>
            <?php echo Form::hidden('entry_birthday_y', $_POST['entry_birthday_y'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（月）', 'entry_birthday_m'); ?></div>
        <div>
            <?php echo $_POST['entry_birthday_m'] ?? ''; ?>
            <?php echo Form::hidden('entry_birthday_m', $_POST['entry_birthday_m'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（日）', 'entry_birthday_d'); ?></div>
        <div>
            <?php echo $_POST['entry_birthday_d'] ?? ''; ?>
            <?php echo Form::hidden('entry_birthday_d', $_POST['entry_birthday_d'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('都道府県', 'entry_prefecture'); ?></div>
        <div>
            <?php echo PREFECTURE[$_POST['entry_prefecture']] ?? ''; ?>
            <?php echo Form::hidden('entry_prefecture', $_POST['entry_prefecture'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('ご住所', 'entry_address'); ?></div>
        <div>
            <?php echo $_POST['entry_address'] ?? ''; ?>
            <?php echo Form::hidden('entry_address', $_POST['entry_address'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（上桁）', 'entry_telephone_h'); ?></div>
        <div>
            <?php echo $_POST['entry_telephone_h'] ?? ''; ?>
            <?php echo Form::hidden('entry_telephone_h', $_POST['entry_telephone_h'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（中桁）', 'entry_telephone_m'); ?></div>
        <div>
            <?php echo $_POST['entry_telephone_m'] ?? ''; ?>
            <?php echo Form::hidden('entry_telephone_m', $_POST['entry_telephone_m'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('電話番号（下桁）', 'entry_telephone_l'); ?></div>
        <div>
            <?php echo $_POST['entry_telephone_l'] ?? ''; ?>
            <?php echo Form::hidden('entry_telephone_l', $_POST['entry_telephone_l'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('メールアドレス', 'entry_email'); ?></div>
        <div>
            <?php echo $_POST['entry_email'] ?? ''; ?>
            <?php echo Form::hidden('entry_email', $_POST['entry_email'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジン', 'entry_magazine'); ?></div>
        <div>
            <?php echo MAGAZINE[$_POST['entry_magazine']] ?? ''; ?>
            <?php echo Form::hidden('entry_magazine', $_POST['entry_magazine'] ?? null); ?>
        </div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジンのタイプ', 'entry_magazine_type'); ?></div>
        <div>
            <?php echo MAGAZINE_TYPE[$_POST['entry_magazine_type']] ?? ''; ?>
            <?php echo Form::hidden('entry_magazine_type', $_POST['entry_magazine_type'] ?? null); ?>
        </div>
    </div>
    <div>
        <?php echo Form::button('send', '投稿'); ?>
    </div>
<?php echo Form::close(); ?>
