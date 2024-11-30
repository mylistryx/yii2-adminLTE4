<?php

namespace app\models\Identity;

use app\enums\IdentityStatus;
use app\enums\IdentityType;
use yii\db\ActiveQuery;

class IdentityQuery extends ActiveQuery
{
    public function active(): static
    {
        return $this->andWhere(['status' => IdentityStatus::Active->value]);
    }

    public function managers(): static
    {
        return $this->andWhere(['type' => IdentityType::Manager->value]);
    }

    public function byUsername(string $username): static
    {
        return $this->andWhere(['username' => $username]);
    }
}