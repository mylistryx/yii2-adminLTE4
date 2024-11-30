<?php

namespace app\components\db;

use yii\db\ActiveRecord as BaseActiveRecord;

/**
 * @property int|string $id
 */
abstract class ActiveRecord extends BaseActiveRecord {}