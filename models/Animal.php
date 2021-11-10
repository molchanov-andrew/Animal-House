<?php

  namespace app\models;

  use yii\behaviors\TimestampBehavior;
  use yii\db\ActiveQuery;
  use yii\db\ActiveRecord;
  use yii\db\BaseActiveRecord;

  /**
   * This is the model class for table "animal".
   *
   * @property int $id
   * @property string $animal_name
   * @property int $animal_age
   * @property int $animal_type_id OneToOne with animal_type table
   * @property int $created_at
   */
  class Animal extends ActiveRecord
  {
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
      return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
      return [
          [['animal_name', 'animal_age', 'animal_type_id'], 'required'],
          [['animal_age', 'animal_type_id', 'created_at'], 'integer'],
          [['animal_name'], 'string', 'max' => 255],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
      return [
          [
              'class' => TimestampBehavior::class,
              'attributes' => [
                  BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
              ],
          ],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
      return [
          'id' => 'ID',
          'animal_name' => 'Кличка',
          'animal_age' => 'Возраст',
          'animal_type_id' => 'Тип животного',
          'created_at' => 'Поступил в приют',
      ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAnimalType()
    {
      return $this->hasOne(AnimalType::class, ['id' => 'animal_type_id']);
    }
  }
