<!DOCTYPE html>
<html>
<head>
    <title>Automatic Modal Popup with Bootstrap 4</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Welcome to the Website!</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>This is an automatic modal popup.</p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript - Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<script>
    // Show the modal on page load
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>

</body>
</html>