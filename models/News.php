<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * Class News
 * @package app\models
 * @property integer $id
 * @property string $header
 * @property string $main
 * @property integer $comment_id
 * @property integer $image_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $type
 */
class News extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $imageName;

    public static function tableName()
    {
        return 'news';
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::getAlias('@webroot') . '/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageName = $this->imageFile->baseName;
            return true;
        } else {
            return false;
        }
    }
}