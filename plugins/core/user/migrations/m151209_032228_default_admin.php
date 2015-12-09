<?php

use yii\db\Schema;
use yii\db\Migration;
use dektrium\user\models\User;

class m151209_032228_default_admin extends Migration
{
    public function up()
    {
        $user = Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
            'email'    => 'admin@example.com',
            'username' => 'admin',
            'password' => '123456',
        ]);
        if ($user->create()) {
            echo Yii::t('user', 'User has been created') . "\n";
            echo 'Login: admin' . "\n";
            echo 'Password: 123456' . "\n";
            
        } else {
            echo Yii::t('user', 'Please fix following errors:') . "\n";
            foreach ($user->errors as $errors) {
                foreach ($errors as $error) {
                    echo ' - ' . $error . "\n";
                }
            }
        }
        if (!empty($user->errors)) {
            return false;
        }
    }

    public function down()
    {
        echo "m151209_032228_default_admin cannot be reverted.\n";

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
