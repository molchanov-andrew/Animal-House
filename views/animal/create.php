<?php

use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model app\models\Animal
 * @var $animalTypeList app\models\AnimalType []
 *
 */

$this->title = 'Добавить животное';
$this->params['breadcrumbs'][] = ['label' => 'Животное', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animal-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'animalTypeList' => $animalTypeList,
    ]) ?>

</div>
