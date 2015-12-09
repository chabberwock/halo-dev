<?php

use yii\db\Schema;
use yii\db\Migration;

class m151206_223218_install extends Migration
{
    const table_page = 'halo_page';
    
    public function up()
    {
        $this->createTable(self::table_page, [
            'id' => $this->primaryKey(),
            'uri' => $this->string(250)->notNull()->unique(),
            'title' => $this->string(250)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'html' => $this->text()->notNull(),
            'meta_keywords' => $this->string(1024)->notNull(),
            'meta_description' => $this->string(1024)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::table_page);

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
