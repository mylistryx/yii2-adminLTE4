<?php

namespace app\models\Identity;

use yii\data\ActiveDataProvider;

class IdentitySearch extends Identity
{
    public function rules(): array
    {
        return [
            [['name', 'surname', 'patronymic', 'email', 'phone', 'status', 'type'], 'string'],
        ];
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Identity::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
        }

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'surname', $this->surname]);
        $query->andFilterWhere(['like', 'patronymic', $this->patronymic]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'phone', $this->phone]);
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['type' => $this->type]);

        return $dataProvider;
    }
}