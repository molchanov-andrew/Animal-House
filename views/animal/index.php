<?php

  use app\models\AnimalType;
  use yii\helpers\Html;
  use yii\grid\GridView;

  /* @var $this yii\web\View */
  /* @var $searchModel app\models\search\AnimalSearch */
  /* @var $dataProvider yii\data\ActiveDataProvider */

  $this->title = 'Животные';
  $this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Добавить в приют', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
          'id',
          'animal_name',
          'animal_age',
          [
              'label' => 'Категория',
              'attribute' => 'animal_type_id',
              'filter' => AnimalType::find()->select(['name', 'id'])->indexBy('id')->column(),
              'value' => 'animalType.name'
          ],
          'created_at:date',
          [
              'label' => "Передать животное",
              'format' => 'raw',
              'value' => function($model) use ($searchModel) {
                if ($model->created_at == $searchModel->maxTerm) {
                  return Html::a('Передать животное', ['delete', 'id' => $model->id], [
                      'class' => 'btn btn-primary',
                      'data' => [
                          'confirm' => 'Передать животное?',
                          'method' => 'post',
                      ],
                  ]);
                }
                return '';
              }
          ]
      ],
  ]) ?>

</div>
