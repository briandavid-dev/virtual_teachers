<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormasPagos;

/**
 * FormasPagosSearch represents the model behind the search form about `app\models\FormasPagos`.
 */
class FormasPagosSearch extends FormasPagos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['forma_pago_id'], 'integer'],
            [['forma_pago_nombre'], 'safe'],
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
        $query = FormasPagos::find();

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
            'forma_pago_id' => $this->forma_pago_id,
        ]);

        $query->andFilterWhere(['like', 'forma_pago_nombre', $this->forma_pago_nombre]);

        return $dataProvider;
    }
}
