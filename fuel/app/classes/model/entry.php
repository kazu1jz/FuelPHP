<?php

class Model_Entry extends Orm\Model
{
    protected static $_table_name = 'entry';
    protected static $_primary_key = array('entry_id');

    protected static $_properties = array(
        'entry_id',
        'entry_name',
        'entry_ruby',
        'entry_birthday',
        'entry_prefecture',
        'entry_address',
        'entry_telephone_h',
        'entry_telephone_m',
        'entry_telephone_l',
        'entry_email',
        'entry_magazine',
        'entry_magazine_type',
        'entry_transfer',
    );

    protected static $_mass_blacklist = array(
        'entry_id',
    );
}
