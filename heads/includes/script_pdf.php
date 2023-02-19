<script type="text/javascript">
	function validatePdf(id) {
		var formData = new FormData();
		var file = document.getElementById(id).files[0];
		formData.append("Filedata", file);
		var t = file.type.split('/').pop().toLowerCase();
		if (t != "pdf" ) {
			alert('Please select a valid pdf file');
			document.getElementById(id).value = '';
			return false;
		}
		// if (file.size > 1050000) {
		// 	alert('Max Upload size is 1MB only');
		// 	document.getElementById(id).value = '';
		// 	return false;
		// }

		return true;
	}
</script>