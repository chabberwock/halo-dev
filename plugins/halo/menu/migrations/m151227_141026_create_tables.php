<?php

use yii\db\Schema;
use yii\db\Migration;

class m151227_141026_create_tables extends Migration
{
    const menu_table = 'halo_menu';
    const menuitem_table = 'halo_menu_item';
    
    public function up()
    {
        $this->createTable(self::menu_table, [
            'id' => $this->primaryKey(),
            'title' => $this->string(250)->notNull(),
        ]);
        
        $this->insert(self::menu_table, ['id'=>'main', 'title'=>'Main Menu']);
        
        $this->createTable(self::menuitem_table, [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->notNull(),
            'menu_id' => $this->string(32)->notNull(),
            'order_id' => $this->integer(11)->notNull(),
            'title' => $this->string(250)->notNull(),
            'route' => $this->string(250)->notNull(),
        ]);
        $this->createIndex('menu_id', self::menuitem_table, 'menu_id');
        $this->createIndex('parent_id', self::menuitem_table, 'parent_id');
        $this->createIndex('order_id', self::menuitem_table, 'order_id');
        
        $this->insert(self::menuitem_table, [
            'parent_id' => 0,
            'menu_id' => 'main',
            'order_id' => 0,
            'title' => 'Home',
            'route' => '/'
        ]);
        
    }

    public function down()
    {
        echo "m151227_141026_create_tables cannot be reverted.\n";

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
