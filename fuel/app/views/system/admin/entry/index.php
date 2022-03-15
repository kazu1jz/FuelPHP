<?php echo $admin_header ?? ''; ?>
system_admin_entry_index

<?php echo Form::open(array('action' => Router::get('system_admin_entry'), 'method' => 'get')); ?>
    <div>-----</div>
    <div>[絞込検索]</div>
    <div>
        <div><?php echo Form::label('キーワード', 'keyword'); ?></div>
        <div><?php echo Form::input('keyword', $_GET['keyword'] ?? null); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（下限）', 'min_entry_birthday_y'); ?></div>
        <div>
            <?php echo Form::select('min_entry_birthday_y', $_GET['min_entry_birthday_y'] ?? '', $entry_birthday_y); ?>年
            <?php echo Form::select('min_entry_birthday_m', $_GET['min_entry_birthday_m'] ?? '', $entry_birthday_m); ?>月
            <?php echo Form::select('min_entry_birthday_d', $_GET['min_entry_birthday_d'] ?? '', $entry_birthday_d); ?>日
        </div>
    </div>
    <div>
        <div><?php echo Form::label('生年月日（上限）', 'max_entry_birthday_y'); ?></div>
        <div>
            <?php echo Form::select('max_entry_birthday_y', $_GET['max_entry_birthday_y'] ?? '', $entry_birthday_y); ?>年
            <?php echo Form::select('max_entry_birthday_m', $_GET['max_entry_birthday_m'] ?? '', $entry_birthday_m); ?>月
            <?php echo Form::select('max_entry_birthday_d', $_GET['max_entry_birthday_d'] ?? '', $entry_birthday_d); ?>日
        </div>
    </div>
    <div>
        <div><?php echo Form::label('都道府県', 'entry_prefecture[]'); ?></div>
        <div><?php echo Form::select('entry_prefecture[]', $_GET['entry_prefecture'] ?? null, array_slice(PREFECTURE, 1, null, true), array('multiple')); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジン', 'entry_magazine[]'); ?></div>
        <div><?php echo Form::select('entry_magazine[]', $_GET['entry_magazine'] ?? null, MAGAZINE, array('multiple', 'size' => count(MAGAZINE))); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('メールマガジンのタイプ', 'entry_magazine_type[]'); ?></div>
        <div><?php echo Form::select('entry_magazine_type[]', $_GET['entry_magazine_type'] ?? null, MAGAZINE_TYPE, array('multiple', 'size' => count(MAGAZINE_TYPE))); ?></div>
    </div>
    <div>
        <div><?php echo Form::label('転送済み', 'entry_transfer[]'); ?></div>
        <div><?php echo Form::select('entry_transfer[]', $_GET['entry_transfer'] ?? null, TRANSFER, array('multiple', 'size' => count(TRANSFER))); ?></div>
    </div>
    <div>
        <?php echo Form::button(null, '検索'); ?>
    </div>
<?php echo Form::close(); ?>
<?php foreach($entries as $entry): ?>
    <div>-----</div>
    <div>
        ID：<?php echo $entry->entry_id; ?>
    </div>
    <div>
        お名前：<?php echo $entry->entry_name; ?>
    </div>
    <div>
        フリガナ：<?php echo $entry->entry_ruby; ?>
    </div>
    <div>
        該当エントリーデータ：<a href="<?php echo Router::get('system_admin_entry_edit', array('entry_id' => $entry->entry_id)); ?>">編集リンク</a>
    </div>
    <div>
        該当エントリーデータ：<a href="<?php echo Router::get('system_admin_entry_delete', array('entry_id' => $entry->entry_id)); ?>">削除リンク</a>
    </div>
<?php endforeach; ?>

<div>-----</div>
<div>
    <?php echo Pagination::instance('entries') ? Pagination::instance('entries')->render() : ''; ?>
</div>
