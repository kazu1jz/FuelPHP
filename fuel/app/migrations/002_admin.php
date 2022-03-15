<?php

namespace Fuel\Migrations;

class Admin
{
    function up()
    {
        \DBUtil::create_table('admin', array(
            'admin_id' => array('type' => 'int', 'auto_increment' => true),
            'admin_email' => array('type' => 'char', 'constraint' => 255),
            'admin_permission' => array('type' => 'bigint', 'default' => 0),
            'login_nickname' => array('type' => 'char', 'constraint' => 40),
            'login_id' => array('type' => 'char', 'constraint' => 255),
            'login_password' => array('type' => 'char', 'constraint' => 40),
            'login_passport' => array('type' => 'char', 'constraint' => 40),
            'login_time' => array('type' => 'double', 'default' => 0),
            'login_status' => array('type' => 'smallint', 'default' => 0),
        ), array('admin_id'));
    }

    function down()
    {
       \DBUtil::drop_table('admin');
    }
}
