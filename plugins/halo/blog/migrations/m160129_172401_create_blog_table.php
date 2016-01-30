<?php

use yii\db\Schema;
use yii\db\Migration;

class m160129_172401_create_blog_table extends Migration
{

    const table_page = 'halo_blog_post';

    public function up()
    {
        $this->createTable(self::table_page, [
            'id' => $this->primaryKey(),
            'title' => $this->string(250)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'content' => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        echo "m160129_172401_create_blog_table cannot be reverted.\n";

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
