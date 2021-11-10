<?php

  namespace app\models\search;

  use yii\base\Model;
  use yii\data\ActiveDataProvider;
  use app\models\Animal;

  /**
   * AnimalSearch represents the model behind the search form of `app\models\Animal`.
   */
  class AnimalSearch extends Animal
  {

    public $maxTerm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
      return [
          [['id', 'animal_age', 'animal_type_id', 'created_at'], 'integer'],
          [['animal_name'], 'safe'],
      ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
      // bypass scenarios() implementation in the parent class
      return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
      $query = Animal::find();

      // add conditions that should always apply here

      $dataProvider = new ActiveDataProvider([
          'query' => $query,
      ]);

      $this->load($params);

      if (!$this->validate()) {
        // uncomment the following line if you do not want to return any records when validation fails
        // $query->where('0=1');
        return $dataProvider;
      }

      // grid filtering conditions
      $query->andFilterWhere([
          'id' => $this->id,
          'animal_age' => $this->animal_age,
          'animal_type_id' => $this->animal_type_id,
          'created_at' => $this->created_at,
      ]);

      $query->andFilterWhere(['like', 'animal_name', $this->animal_name]);

      // search animal with maximum stay in priyut
      $q = clone $dataProvider->query;
      $q->select('min(created_at) as min');
      $q->asArray(true);
      $this->maxTerm = $q->one()['min'];

      return $dataProvider;
    }
  }
