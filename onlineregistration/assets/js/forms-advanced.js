$(function () {
    var basicNoUISlider = $('#basicNoUISlider');
    if (basicNoUISlider.length > 0) {
        noUiSlider.create(basicNoUISlider[0], { // we need to pass only the element, not jQuery object
            start: [20, 80],
            range: {
                'min': [0],
                'max': [100]
            }
        });

    }

    var stepNoUISlider = $('#stepNoUISlider');
    if (stepNoUISlider.length > 0) {
        noUiSlider.create(stepNoUISlider[0], { // we need to pass only the element, not jQuery object
            start: [200, 1000],
            range: {
                'min': [0],
                'max': [1800]
            },
            step: 100,
            tooltips: true,
            connect: true
        });
    }    

    $('.input-datepicker').datepicker({
        format: 'mm/dd/yyyy'
    });

    $('.input-datepicker-autoclose').datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy'
    });

    $('.input-datepicker-multiple').datepicker({
        multidate: true,
        format: 'mm/dd/yyyy'
    });

    $('.input-datepicker-range').datepicker({
        format: 'mm/dd/yyyy'
    });

    
    $('.selectpicker-primary').selectpicker({
        style: 'btn-primary',
        size: 4
    });

    $('.selectpicker-secondary').selectpicker({
        style: 'btn-secondary',
        size: 4
    });

    $('.selectpicker-light').selectpicker({
        style: 'btn-outline-light',
        size: 4
    });

    $('#multiselect1').multiSelect();

});