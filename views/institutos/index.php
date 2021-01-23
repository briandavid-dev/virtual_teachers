<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institutos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Institutos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'instituto_id',
            'ciudad_id',
            'instituto_nombre:ntext',
            'instituto_direccion:ntext',
            'instituto_tipo',
            // 'pais_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
