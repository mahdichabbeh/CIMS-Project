$(document).ready(function() {
    // Function to enable or disable input fields based on the radio value
    function toggleInputs() {
    var radioValue = $('input[name="choice"]:checked').val();
    if (radioValue === 'oui') {
        $('#cap_cit_princ').prop('disabled', false);
        $('#cap_cit_sec_un').prop('disabled', false);
        $('#cap_cit_sec_deux').prop('disabled', false);
        $('#niv_remp_cit_princ').prop('disabled', false);
        $('#cons_ox_jour').prop('disabled', false);
    } else {
        $('#cap_cit_princ').prop('disabled', true);
        $('#cap_cit_sec_un').prop('disabled', true);
        $('#cap_cit_sec_deux').prop('disabled', true);
        $('#niv_remp_cit_princ').prop('disabled', true);
        $('#cons_ox_jour').prop('disabled', true);
    }
    }

    // Call the function on page load
    toggleInputs();

    // Call the function whenever the radio input is changed
    $('input[name="choice"]').change(function() {
    toggleInputs();
    });
});
        