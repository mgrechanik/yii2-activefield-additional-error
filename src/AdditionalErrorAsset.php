<?php
declare(strict_types=1);

namespace mgrechanik\additionalerror;

use yii\web\AssetBundle;

/**
 * Class AdditionalErrorAsset
 * @package mgrechanik/yii2-activefield-additional-error
 */
class AdditionalErrorAsset extends AssetBundle
{
    public $sourcePath = '@vendor/mgrechanik/yii2-activefield-additional-error/src/res';

    public $js = [
        'additional_error.js',
    ];

    public $depends = [
        'yii\web\YiiAsset'
    ];
}