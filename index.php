<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/south-street/jquery-ui.css"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <!-- tambahan  -->
    
    </script>
</head>
<body>
    <h1>This is a git test</h1>
    <table>
        <tr>
            <td>visa length:</td>
            <td><input type="text" name="" id="visa_length"></td>
        </tr>
        <tr>
            <td>arrival date:</td>
            <td><input type="text" name="" id="arrival_date"></td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td>visa validity:</td>
            <td><input type="text" name="" id="valid_until" class="cls_input"></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>first ext expired on:</td>
            <td><input type="text" name="" id="first_ext" class="ext_label"></td>
        </tr>
        <tr>
            <td>second ext expired on:</td>
            <td><input type="text" name="" id="second_ext" class="ext_label"></td>
        </tr>
        <tr>
            <td>third ext expired on:</td>
            <td><input type="text" name="" id="third_ext" class="ext_label"></td>
        </tr>
        <tr>
            <td>fourth ext expired on:</td>
            <td><input type="text" name="" id="fourth_ext" class="ext_label"></td>
        </tr>
    </table>
    
    
    
    
</body>
<script>
    $(document).ready(function () {
        
        //check if visa length is empty
        var visa_length;
        var arrival_date, valid_until, first_ext_validity, second_ext_validity, third_ext_validity, fourth_ext_validity;
        
        
        function isempty(){
            if (! $('#visa_length').val()) {
                alert('visa length is empty');
                $('#valid_until').val('invalid date');
                $('#visa_length').focus();
                
            } else {
                visa_length = +$('#visa_length').val()-1;
            }
            
        }
        //  ARRIVAL DATE INPUT
        $('#arrival_date').change( function (e) {
            e.preventDefault();
            isempty();
            arrival_date = String ($(this).val());
            arrival_date = moment(arrival_date, "DD/MM/YYYY");
            $('#valid_until').val(moment(arrival_date).add(visa_length, 'days').format('DD/MM/YYYY'));
            $('#first_ext').val(moment(arrival_date).add(visa_length+30, 'days').format('DD/MM/YYYY'));
            $('#second_ext').val(moment(arrival_date).add(visa_length+60, 'days').format('DD/MM/YYYY'));
            $('#third_ext').val(moment(arrival_date).add(visa_length+90, 'days').format('DD/MM/YYYY'));
            $('#fourth_ext').val(moment(arrival_date).add(visa_length+120, 'days').format('DD/MM/YYYY'));
        });

        // VISA LENGTH INPUT
        $('#visa_length').change(function (e) { 
            e.preventDefault();
            isempty();
            visa_validity = $(this).val()-1;
            arrival_date = String ($('#arrival_date').val());
            arrival_date = moment(arrival_date, "DD/MM/YYYY");
            // arrival_date = String($('#arrival_date').val());
            $('#valid_until').val(arrival_date.add(visa_length, 'days').format('DD/MM/YYYY'));
            $('#first_ext').val(arrival_date.add(visa_length+30, 'days').format('DD/MM/YYYY'));
            $('#second_ext').val(arrival_date.add(visa_length+60, 'days').format('DD/MM/YYYY'));
            $('#third_ext').val(arrival_date.add(visa_length+90, 'days').format('DD/MM/YYYY'));
            $('#fourth_ext').val(arrival_date.add(visa_length+120, 'days').format('DD/MM/YYYY'));
        });

        
        //VISA VALIDITY INPUT
        $('#valid_until').change(function (e) { 
            e.preventDefault();
            isempty();
            arrival_date = moment(String($(this).val()), "DD/MM/YYYY");
            $('#arrival_date').val(moment(arrival_date).subtract(visa_length, 'day').format('DD/MM/YYYY'));
            // $('#arrival_date').val( moment(arrival_date, "DD/MM/YYYY")).subtract(visa_validity, 'day').format('DD/MM/YYYY'));
            $('#first_ext').val(moment(arrival_date).add(30, 'day').format('DD/MM/YYYY'));
            $('#second_ext').val(moment(arrival_date).add(60, 'days').format('DD/MM/YYYY'));
            $('#third_ext').val(moment(arrival_date).add(90, 'days').format('DD/MM/YYYY'));
            $('#fourth_ext').val(moment(arrival_date).add(120, 'days').format('DD/MM/YYYY'));
            
        });

        // FIRST EXT INPUT
        $('#first_ext').change(function (e) { 
            e.preventDefault();
            isempty();
            first_ext_validity = String($(this).val());
            valid_until = moment(first_ext_validity, 'DD/MM/YYYY').subtract(30, 'days');
            $('#valid_until').val(moment(valid_until).format('DD/MM/YYYY'));
            $('#arrival_date').val(moment(first_ext_validity, 'DD/MM/YYYY').subtract(visa_length+30, 'days').format('DD/MM/YYYY'));
            $('#second_ext').val(moment(first_ext_validity, 'DD/MM/YYYY').add(30, 'days').format('DD/MM/YYYY'));
            $('#third_ext').val(moment(first_ext_validity, 'DD/MM/YYYY').add(60, 'days').format('DD/MM/YYYY'));
            $('#fourth_ext').val(moment(first_ext_validity, 'DD/MM/YYYY').add(90, 'days').format('DD/MM/YYYY'));
        });
        
        // SECOND EXT INPUT
        $('#second_ext').change(function (e) { 
            e.preventDefault();
            second_ext_validity = String($(this).val());
            first_ext_validity = moment(second_ext_validity, 'DD/MM/YYYY').subtract(30, 'days');
            $('#arrival_date').val(moment(first_ext_validity).subtract(visa_length+30, 'days').format('DD/MM/YYYY'));
            $('#valid_until').val(moment(first_ext_validity).subtract(30, 'days').format('DD/MM/YYYY'));
            $('#first_ext').val(moment(first_ext_validity, 'DD/MM/YYYY' ).format('DD/MM/YYYY'));
            $('#third_ext').val(moment(first_ext_validity).add(60, 'days').format('DD/MM/YYYY'));
            $('#fourth_ext').val(moment(first_ext_validity).add(90, 'days').format('DD/MM/YYYY'));

        });

        // THIRD EXT INPUT

        $('#third_ext').change(function (e) { 
            e.preventDefault();
            third_ext_validity = String($(this).val());
            second_ext_validity = moment(third_ext_validity, 'DD/MM/YYYY').subtract(30, 'days');
            $('#arrival_date').val(moment(second_ext_validity, 'DD/MM/YYYY').subtract(visa_length+60, 'days').format('DD/MM/YYYY'));
            $('#valid_until').val(moment(second_ext_validity, 'DD/MM/YYYY').subtract(60, 'days').format('DD/MM/YYYY'));
            $('#first_ext').val(moment(second_ext_validity, 'DD/MM/YYYY').subtract(30, 'days').format('DD/MM/YYYY'));
            $('#second_ext').val(moment(second_ext_validity, 'DD/MM/YYYY').format('DD/MM/YYYY'));
            $('#fourth_ext').val(moment(second_ext_validity, 'DD/MM/YYYY').add(60, 'days').format('DD/MM/YYYY'));
        });

        // FOURTH EXT INPUT
        $('#fourth_ext').change(function (e) { 
            e.preventDefault();
            fourth_ext_validity = String($(this).val());
            $('#third_ext').val(moment(fourth_ext_validity, 'DD/MM/YYYY').subtract(30, 'days').format('DD/MM/YYYY'));
            $('#second_ext').val(moment(fourth_ext_validity, 'DD/MM/YYYY').subtract(60, 'days').format('DD/MM/YYYY'));
            $('#first_ext').val(moment(fourth_ext_validity, 'DD/MM/YYYY').subtract(90, 'days').format('DD/MM/YYYY'));
            $('#valid_until').val(moment(fourth_ext_validity, 'DD/MM/YYYY').subtract(120, 'days').format('DD/MM/YYYY'));
            $('#arrival_date').val(moment(fourth_ext_validity, 'DD/MM/YYYY').subtract(visa_length + 120, 'days').format('DD/MM/YYYY'));
        });

    });
</script>
</html>
