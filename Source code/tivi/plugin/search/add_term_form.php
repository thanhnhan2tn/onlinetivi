
<div id="term">&nbsp;</div>

<form name="addterm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="info">
	<div>
		<label for="term" class="label_input">Term: &nbsp;</label> 
		<input type="text" name="term" maxlength="255" id="term" class="nameinfo">  *<p></p>
	</div>
	<div>
		<label for="pro" class="label_input">Pro: &nbsp;</label> 
		<input type="text" name="pro" maxlength="200" id="pro" class="nameinfo"> <p></p>
	</div>

	
	<div>
		<label for="meaning" class="label_input">Meaning: &nbsp;</label> 
		<textarea name="meaning" id="meaning"  cols="30" rows="30" class="big"></textarea><p></p>
	</div>

	<div align="center">
		<input type="submit" name="addterm" value="Add term">
	</div>
</form>

