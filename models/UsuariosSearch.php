<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form about `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id', 'usuario_codigo', 'instituto_id'], 'integer'],
            [['usuario_nombre', 'usuario_apellido', 'usuario_correo', 'usuario_clave', 'usuario_fecha_creacion', 'usuario_fecha_modificacion', 'usuario_fecha_ultimo_acceso', 'usuario_telefono_1', 'usuario_telefono_2', 'usuario_genero','usuario_cedula', 'usuario_fecha_nacimiento', 'usuario_fecha_codigo', 'usuario_direccion', 'usuario_perfil'], 'safe'],
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
        $query = Usuarios::find();

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
            'usuario_id' => $this->usuario_id,
            'usuario_fecha_creacion' => $this->usuario_fecha_creacion,
            'usuario_fecha_modificacion' => $this->usuario_fecha_modificacion,
            'usuario_fecha_ultimo_acceso' => $this->usuario_fecha_ultimo_acceso,
            'usuario_fecha_nacimiento' => $this->usuario_fecha_nacimiento,
            'usuario_fecha_codigo' => $this->usuario_fecha_codigo,
            'instituto_id' => $this->instituto_id,
        ]);

        $query->andFilterWhere(['like', 'usuario_nombre', $this->usuario_nombre])
            ->andFilterWhere(['like', 'usuario_correo', $this->usuario_correo])
            ->andFilterWhere(['like', 'usuario_cedula', $this->usuario_cedula]);

        return $dataProvider;
    }
}
