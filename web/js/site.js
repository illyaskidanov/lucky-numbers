$(document).ready(function ()  {
    const maxNumberInput = $("#"+maxNumberInputId);
    const minNumberInput = $("#"+minNumberInputId);

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
});