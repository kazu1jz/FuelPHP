<?php

namespace Fuel\Migrations;

class Configure
{
    function up()
    {
        \DBUtil::create_table('configure', array(
            'configure_name' => array('type' => 'char', 'constraint' => 255),
            'configure_value' => array('type' => 'char', 'constraint' => 255),
        ), array('configure_name'));
    }

    function down()
    {
       \DBUtil::drop_table('configure');
    }
}
