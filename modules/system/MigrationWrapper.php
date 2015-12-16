<?php
/**
* @author Alexandr Makarov
* Email: notengine@gmail.com
*/

namespace system;

class MigrationWrapper extends \yii\console\controllers\MigrateController
{
    public $responses = [];
    
    public function stdout($message)
    {
        echo $message;
    }
    
    public function actionUp($limit = 0)
    {
        $migrations = $this->getNewMigrations();
        if (empty($migrations)) {
            $this->stdout("No new migration found. Your system is up-to-date.\n");
            return self::EXIT_CODE_NORMAL;
        }

        $total = count($migrations);
        $limit = (int) $limit;
        if ($limit > 0) {
            $migrations = array_slice($migrations, 0, $limit);
        }

        $n = count($migrations);
        if ($n === $total) {
            $this->stdout("Total $n new " . ($n === 1 ? 'migration' : 'migrations') . " to be applied:\n");
        } else {
            $this->stdout("Total $n out of $total new " . ($total === 1 ? 'migration' : 'migrations') . " to be applied:\n");
        }

        foreach ($migrations as $migration) {
            $this->stdout("\t$migration\n");
        }
        $this->stdout("\n");

            foreach ($migrations as $migration) {
                if (!$this->migrateUp($migration)) {
                    $this->stdout("\nMigration failed. The rest of the migrations are canceled.\n");

                    return self::EXIT_CODE_ERROR;
                }
            }
            $this->stdout("\nMigrated up successfully.\n");
    }
    
}
  
?>
