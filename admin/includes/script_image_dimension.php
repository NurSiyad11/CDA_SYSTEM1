	
<script>
	function validateImage(id) {
    var formData = new FormData();
    var file = document.getElementById(id).files[0];
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png") {
        alert('Please select a valid image file');
        document.getElementById(id).value = '';
        return false;
    }
    if (file.size > 1050000) {
        alert('Max Upload size is 1MB only');
        document.getElementById(id).value = '';
        return false;
    }
    var img = new Image();
    img.onload = function() {
        var width = this.width;
        var height = this.height;

        if (width < 500 || height < 500) {
            alert('Image dimensions are too small. Please select an image with dimensions greater than 500x500."');
            document.getElementById(id).value = '';
            return false;
        } else if (width > 600 || height > 600) {
            alert('Image dimensions are too large. Please select an image with dimensions less than 600x600');
            document.getElementById(id).value = '';
            return false;
        }
    };
    img.src = window.URL.createObjectURL(file);
    return true;
}
</script>





  