<?php

use yii\db\Schema;
use yii\db\Migration;

class m151207_054550_create_halo_block extends Migration
{
    const table_block = 'halo_block';

    public function up()
    {
        $this->createTable(self::table_block, [
            'id' => $this->string(32),
            'title' => $this->string(250),
            'html' => $this->text(),
        ]);
        $this->addPrimaryKey('PRIMARY_KEY',self::table_block,'id');
    }

    public function down()
    {
        echo "m151207_054550_create_halo_block cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
