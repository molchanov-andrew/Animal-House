<?php

  use yii\helpers\ArrayHelper;
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;

  /** @var $this yii\web\View
   * @var $model app\models\Animal
   * @var $form yii\widgets\ActiveForm
   * @var $animalTypeList app\models\AnimalType []
   */
?>

<div class="animal-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'animal_name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'animal_age')->textInput() ?>

  <?= $form->field($model, 'animal_type_id')->dropDownList(ArrayHelper::map($animalTypeList, 'id', 'name'), ['prompt' => 'Выберите категорию']) ?>


    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
