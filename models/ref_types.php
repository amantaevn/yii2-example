<?php

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

class ref_types extends ActiveRecord
{
    const MAIN_NEWS = 1;
    const SECONDARY_NEWS = 0;
}