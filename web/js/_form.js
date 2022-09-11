$(document).ready(function ()  {
    const luckyNumberPjax = $("#lucky_numbers");
    const maxNumberInput = $(`#${maxNumberInputId}`);
    const minNumberInput = $(`#${minNumberInputId}`);
    const luckyNumberLoading = $("#lucky_numbers__loading");

    minNumberInput.change(function () {
        if (minNumberInput.val() > maxNumberInput.val()) {
            maxNumberInput.val($(this).val());
        }
    });

    maxNumberInput.change(function () {
        if (maxNumberInput.val() < minNumberInput.val()) {
            maxNumberInput.val(minNumberInput.val());
        }
    });

    luckyNumberPjax.on("pjax:send", function() {
        luckyNumberLoading.show();
    });

    luckyNumberPjax.on('pjax:complete', function() {
        luckyNumberLoading.hide();
    });
});