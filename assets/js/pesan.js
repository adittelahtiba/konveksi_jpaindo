

$(document).ready(function () {
		
		var hrgM = document.getElementById('hrgM');
		var hrgS = document.getElementById('hrgS');
		var hrgL = document.getElementById('hrgL');
		var hrgXL = document.getElementById('hrgXL');
		var hrgXXL = document.getElementById('hrgXXL');
		


		$('#jmlhS').on('keyup', function () {
	        $('#subS').val(parseInt(hrgS.value * jmlhS.value));
	        $('#total').val(subS.value);
    	});

    	$('#jmlhM').on('keyup', function () {
	        $('#subM').val(parseInt(hrgM.value * jmlhM.value));
	        $('#total').val(parseInt(subS.value) + parseInt(subM.value));
    	});

    	$('#jmlhL').on('keyup', function () {
	        $('#subL').val(parseInt(hrgS.value * jmlhS.value) + parseInt(hrgM.value * jmlhM.value)
	        	 + parseInt(hrgL.value * jmlhL.value));
	        $('#total').val(parseInt(subS.value) + parseInt(subM.value) + parseInt(subL.value));
    	});

    	$('#jmlhXL').on('keyup', function () {
	        $('#subXL').val(parseInt(hrgS.value * jmlhS.value) + parseInt(hrgM.value * jmlhM.value)
	        	 + parseInt(hrgL.value * jmlhL.value) + parseInt(hrgXL.value * jmlhXL.value));
	        $('#total').val(parseInt(subS.value) + parseInt(subM.value) + parseInt(subL.value)
	        	 + parseInt(subXL.value));
    	});

    	$('#subXXL').on('keyup', function () {
	        $('#total').val(parseInt(hrgS.value * jmlhS.value) + parseInt(hrgM.value * jmlhM.value)
	        	 + parseInt(hrgL.value * jmlhL.value) + parseInt(hrgXL.value * jmlhXL.value)
	        	  + parseInt(hrgXXL.value * jmlhXXL.value));
	        $('#total').val(parseInt(subS.value) + parseInt(subM.value) + parseInt(subL.value)
	        	 + parseInt(subXL.value) + parseInt(subXXL.value));
    	});
		
	});
