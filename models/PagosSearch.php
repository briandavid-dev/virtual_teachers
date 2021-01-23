<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagos;

/**
 * PagosSearch represents the model behind the search form about `app\models\Pagos`.
 */
class PagosSearch extends Pagos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pago_educacion_id', 'pago_monto', 'periodo_escolar_id', 'forma_pago_id', 'estudiante_id', 'tipo_pago_id'], 'integer'],
            [['pago_fecha_creacion', 'pago_representante_nombre', 'pago_representante_apellido', 'pago_representante_cedula', 'pago_representante_parentesco', 'pago_detalle'], 'safe'],
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
        $query = Pagos::find();

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
            'pago_educacion_id' => $this->pago_educacion_id,
            'pago_fecha_creacion' => $this->pago_fecha_creacion,
            'pago_monto' => $this->pago_monto,
            'periodo_escolar_id' => $this->periodo_escolar_id,
            'forma_pago_id' => $this->forma_pago_id,
            'estudiante_id' => $this->estudiante_id,
            'tipo_pago_id' => $this->tipo_pago_id,
        ]);

        $query->andFilterWhere(['like', 'pago_representante_nombre', $this->pago_representante_nombre])
            ->andFilterWhere(['like', 'pago_representante_apellido', $this->pago_representante_apellido])
            ->andFilterWhere(['like', 'pago_representante_cedula', $this->pago_representante_cedula])
            ->andFilterWhere(['like', 'pago_representante_parentesco', $this->pago_representante_parentesco])
            ->andFilterWhere(['like', 'pago_detalle', $this->pago_detalle]);

        return $dataProvider;
    }
}
