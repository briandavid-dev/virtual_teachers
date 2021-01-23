<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paises;

/**
 * PaisesSearch represents the model behind the search form about `app\models\Paises`.
 */
class PaisesSearch extends Paises
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pais_id'], 'integer'],
            [['pais_nombre', 'pais_abreviacion'], 'safe'],
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
        $query = Paises::find();

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
            'pais_id' => $this->pais_id,
        ]);

        $query->andFilterWhere(['like', 'pais_nombre', $this->pais_nombre])
            ->andFilterWhere(['like', 'pais_abreviacion', $this->pais_abreviacion]);

        return $dataProvider;
    }
}
