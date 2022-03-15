<?php

class Model_Admin extends Orm\Model
{
    protected static $_table_name = 'admin';
    protected static $_primary_key = array('admin_id');

    protected static $_properties = array(
        'admin_id',
        'admin_email',
        'admin_permission',
        'login_nickname',
        'login_id',
        'login_password',
        'login_passport',
        'login_time',
        'login_status',
    );

    protected static $_mass_blacklist = array(
        'admin_id',
    );
}
