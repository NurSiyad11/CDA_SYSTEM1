<!-- Sceripts Online User Update  -->
<script>
	function updateUserStatus(){
		jQuery.ajax({
			url:'update_user_status.php',
			success:function(){
				
			}
		});
	}
	
	function getUserStatus(){
		jQuery.ajax({
			url:'get_user_status.php',
			success:function(result){
				jQuery('#user_grid').html(result);
			}
		});
	}
	
	setInterval(function(){
		updateUserStatus();
	},1000);
	
	setInterval(function(){
		getUserStatus();
	},3000);
</script>
