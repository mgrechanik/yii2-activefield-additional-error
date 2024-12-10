/**
 * Part of https://github.com/mgrechanik/yii2-activefield-additional-error
 * 
 * @param string formId
 * @param string attributeName
 */
function mgrechanik_setAttributeListener(formId, attributeName) {
    jQuery('#' + formId).on('afterValidateAttribute', function (event, attribute, messages) {
        if (attribute.name == attributeName) {
            $span = jQuery('#' + formId + '-' + attributeName);
            $span.removeClass('is-invalid');
            if (messages.length) {
                $span.addClass('is-invalid');
            }
        }
        return true;
    });
}