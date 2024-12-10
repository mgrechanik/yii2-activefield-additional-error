<?php
declare(strict_types=1);

namespace mgrechanik\additionalerror;

use yii\web\AssetBundle;

class AdditionalErrorAsset extends AssetBundle
{
    public $sourcePath = '@mgrechanik/additionalerror/res';

    public $js = [
        'additional_error.js',
    ];

    public $depends = [
        'yii\web\YiiAsset'
    ];
}