$(document).ready(function() {
    // Function to enable or disable input fields based on the radio value
    function toggleInputs() {
    var radioValue = $('input[name="choice1"]:checked').val();
    if (radioValue === "oui") {
        $('#cap_prod_gen').prop('disabled', false);
        $('#c2').prop('disabled', false);
        $('#c1').prop('disabled', false);
    } else {
        $('#cap_prod_gen').prop('disabled', true);
        $('#c2').prop('disabled', true);
        $('#c1').prop('disabled', true);
    }
    }

    // Call the function on page load
    toggleInputs();

    // Call the function whenever the radio input is changed
    $('input[name="choice1"]').change(function() {
    toggleInputs();
    });
});
       