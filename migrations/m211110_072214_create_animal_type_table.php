<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%animal_type}}`.
 */
class m211110_072214_create_animal_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%animal_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%animal_type}}');
    }
}
