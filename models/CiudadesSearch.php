<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ciudades;

/**
 * CiudadesSearch represents the model behind the search form about `app\models\Ciudades`.
 */
class CiudadesSearch extends Ciudades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ciudad_id', 'pais_id'], 'integer'],
            [['ciudad_nombre'], 'safe'],
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
        $query = Ciudades::find();

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
            'ciudad_id' => $this->ciudad_id,
            'pais_id' => $this->pais_id,
        ]);

        $query->andFilterWhere(['like', 'ciudad_nombre', $this->ciudad_nombre]);

        return $dataProvider;
    }
}
