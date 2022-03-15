<?php

namespace Fuel\Migrations;

class Entry
{
    function up()
    {
        \DBUtil::create_table('entry', array(
            'entry_id' => array('type' => 'int', 'auto_increment' => true),
            'entry_name' => array('type' => 'char', 'constraint' => 40),
            'entry_ruby' => array('type' => 'char', 'constraint' => 40),
            'entry_birthday' => array('type' => 'double', 'default' => 0),
            'entry_prefecture' => array('type' => 'smallint', 'default' => 0),
            'entry_address' => array('type' => 'char', 'constraint' => 255),
            'entry_telephone_h' => array('type' => 'char', 'constraint' => 5),
            'entry_telephone_m' => array('type' => 'char', 'constraint' => 4),
            'entry_telephone_l' => array('type' => 'char', 'constraint' => 4),
            'entry_email' => array('type' => 'char', 'constraint' => 255),
            'entry_magazine' => array('type' => 'smallint', 'default' => 0),
            'entry_magazine_type' => array('type' => 'smallint', 'default' => 0),
            'entry_transfer' => array('type' => 'smallint', 'default' => 0),
        ), array('entry_id'));
    }

    function down()
    {
       \DBUtil::drop_table('entry');
    }
}
