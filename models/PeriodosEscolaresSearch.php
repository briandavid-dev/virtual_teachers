<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PeriodosEscolares;

/**
 * PeriodosEscolaresSearch represents the model behind the search form about `app\models\PeriodosEscolares`.
 */
class PeriodosEscolaresSearch extends PeriodosEscolares
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periodo_escolar_id', 'periodo_escolar_monto_matricula', 'periodo_escolar_monto_mensualidad', 'instituto_id'], 'integer'],
            [['periodo_escolar_fecha_desde', 'periodo_escolar_fecha_hasta'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = PeriodosEscolares::find();

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
            'periodo_escolar_id' => $this->periodo_escolar_id,
            'periodo_escolar_fecha_desde' => $this->periodo_escolar_fecha_desde,
            'periodo_escolar_fecha_hasta' => $this->periodo_escolar_fecha_hasta,
            'periodo_escolar_monto_matricula' => $this->periodo_escolar_monto_matricula,
            'periodo_escolar_monto_mensualidad' => $this->periodo_escolar_monto_mensualidad,
            'instituto_id' => $this->instituto_id,
        ]);

        return $dataProvider;
    }
}
