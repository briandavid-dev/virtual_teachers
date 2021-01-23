<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Institutos;

/**
 * InstitutosSearch represents the model behind the search form about `app\models\Institutos`.
 */
class InstitutosSearch extends Institutos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instituto_id', 'ciudad_id', 'pais_id'], 'integer'],
            [['instituto_nombre', 'instituto_direccion', 'instituto_tipo'], 'safe'],
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
        $query = Institutos::find();

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
            'instituto_id' => $this->instituto_id,
            'ciudad_id' => $this->ciudad_id,
            'pais_id' => $this->pais_id,
        ]);

        $query->andFilterWhere(['like', 'instituto_nombre', $this->instituto_nombre])
            ->andFilterWhere(['like', 'instituto_direccion', $this->instituto_direccion])
            ->andFilterWhere(['like', 'instituto_tipo', $this->instituto_tipo]);

        return $dataProvider;
    }
}
