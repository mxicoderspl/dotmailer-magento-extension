var $j = jQuery.noConflict();

$j(document).ready(function () {

    /**
     * Show confirmation widget
     * @param {Object} element
     */
    function showConfirmation(element) {
        var msg = 'You are about to enable this feature for customers that haven\'t explicitly opted into your ' +
            'emails. Do you wish to continue?';

        if (confirm(msg)) {
            element.val(1);
        } else {
            element.val(0);
        }
    }

    var elements = [
        $j('#connector_sync_settings_address_book_allow_non_subscribers'),
        $j('#connector_configuration_abandoned_carts_allow_non_subscribers'),
        $j('#connector_automation_studio_review_settings_allow_non_subscribers')
    ];

    $j.each(elements, function (index, element) {
        $j(element).on('change', function () {
            if (element.val() === '1') {
                showConfirmation(element);
            }
        });
    });
});