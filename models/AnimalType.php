<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "animal_type".
 *
 * @property int $id
 * @property string $name
 */
class AnimalType extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Вид животного',
        ];
    }
}
