<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%animals}}`.
 */
class m211110_070935_create_animal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%animal}}', [
            'id' => $this->primaryKey(),
            'animal_name' => $this->string()->notNull(),
            'animal_age' => $this->integer()->notNull(),
            'animal_type_id' => $this->integer()->notNull()->comment("OneToOne with animal_type table"),
            'created_at' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%animal}}');
    }
}
