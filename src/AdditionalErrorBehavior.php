<?php
declare(strict_types=1);

namespace mgrechanik\additionalerror;

use yii\base\Behavior;
use yii\base\Widget;
use yii\base\Model;
use yii\helpers\Html;
use yii\web\View;

/**
 * This behavior is supposed to be attached to ActiveForm
 *
 * Class AdditionalErrorBehavior
 * @package mgrechanik\additionalerror
 */
class AdditionalErrorBehavior extends Behavior
{
    public function events()
    {
        return [
            Widget::EVENT_INIT => 'initEvent',
        ];
    }

    public function initEvent($event)
    {
        AdditionalErrorAsset::register($this->owner->view);
    }

    /**
     * This method returns a html for span we are inserting.
     *
     * And it registers a js to synchronize with input element
     *
     * @param Model $model
     * @param string $attribute
     * @return string
     */
    public function getAdditionalErrorSpan(Model $model, string $attribute)
    {
        $this->owner->view->registerJs(
            'mgrechanik_setAttributeListener("' . Html::encode($this->owner->id)
            . '", "' .  Html::encode($attribute) . '" );', View::POS_READY);

        return
            '<span id="' .  Html::encode($this->owner->id)
            . '-' .  Html::encode($attribute) . '" class="d-none '
            .  ($model->hasErrors($attribute) ? 'is-invalid' : '') . '"></span>';
    }
}
