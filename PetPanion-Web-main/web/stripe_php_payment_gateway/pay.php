<?php
require('config.php');
?>
<form action="submit.php" method="post">
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
		data-amount="1000"
		data-name="PetPanion"
		data-description="Join Today!"
		data-image="../images/petpanion-logo.png"
		data-currency="USD"
		data-email=" "
	>
	</script>

</form>