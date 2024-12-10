# Adding a special span to activefield with bootstrap error class .is-invalid to desired place of field template

## What is it about? <span id="demo"></span>

Bootstrap 4 and 5 are expecting html like this to decorate validation error:

```html
<input type="text" id="eventform-datetime" class="form-control is-invalid" name="EventForm[datetime]" aria-required="true">
<div class="invalid-feedback">Error message</div>
```

Element with ```div.invalid-feedback``` is supposed to be on the same level with your ```input.is-invalid```.

But sometimes when we are using any widgets or custom template we get html like this:

```html
<div class="some-plugin-wrapper">
  <input type="text" id="eventform-datetime" class="form-control is-invalid" name="EventForm[datetime]" aria-required="true">
</div>  
<div class="invalid-feedback">Error message</div>
```
, so our error message is not shown.

Of cource you can make ```div.invalid-feedback``` visible by css for this page.

But if that does not suit you, this library propose another solution.

We are adding special ```<span>``` to a field template right before ```{error}``` part. And we synchronize this span with the input field so it gets ```.is-invalid``` class when input does 


## Installing <span id="installing"></span>

#### Installing through composer::

The preferred way to install this library is through composer.

Either run
```
composer require --prefer-dist mgrechanik/yii2-activefield-additional-error 
```

or add
```
"mgrechanik/yii2-activefield-additional-error " : "~1.0.0"
```
to the require section of your `composer.json`.

## How to use  <span id="use"></span> 

in your ```view``` file, say it ```_form.php```

```php
use mgrechanik\additionalerror\AdditionalErrorBehavior;

<div class="event-form-form">

    <?php $form = ActiveForm::begin([
            'id' => 'event-create-form',
            // Adding behavior
            'as adderror' => [
                'class' => AdditionalErrorBehavior::class,
            ]
    ]); ?>
...
    <?= $form->field($model, 'datetime', [
            // Adding this hidden span before error block 
            'template' => "{label}\n{input}\n{hint}\n" . $form->getAdditionalErrorSpan($model, 'datetime') . "\n{error}"
    ])->hint('Some hint')
      ->widget(/* ...*/)
```

It will work for both server side and client side


