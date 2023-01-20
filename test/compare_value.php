<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<title></title>
</head>
<body>
	<h1>Compare Two value Jquery</h1>
	<label>Minimum Amount</label>
	<input type="text" name="benefit_min_amount" value="" id="minAmount">
	<label>Maximum Amount:</label>
	<input type="text" name="benefit_max_amount" value="" id="maxAmount">
	<span id="error"></span>
</body>
<script type="text/javascript">
	$('body').on('input', '#maxAmount', function(event) {
        event.preventDefault();
        var min = $('#minAmount').val();
        var max = $('#maxAmount').val();
        if(min > max){
        	$('#error').text('minmum greter then max');
        }else{
        	$('#error').text('done');
        }
    });
</script>
</html>
