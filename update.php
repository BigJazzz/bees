<?php
if(!$search) {
?>
<div id="update">
	<form action="process.php" method="post">
	<table>
		<tr>
			<td>
				Bee
			</td>
			<td>
				<input type="text" name="search" ?>">
			</td>
			<td>
				<imput type="submit" name="Search">
		</tr>
	</table>
	</form>
</div>
<?php
}
else {
?>
<div id="update">
	<form action="process.php" method="post">
	<table>
		<tr>
			<td>
				Species
			</td>
			<td>
				Effect
			</td>
			<td>
				Source 1
			</td>
			<td>
				Source 2
			</td>
			<td>
				Bred
			</td>
			<td>
				Sampled
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="species" value="<?php echo $name; ?>">
			</td>
			<td>
				<input type="text" name="effect" value="<?php echo $effect; ?>">
			</td>
		</tr>
	</table>
	</form>
</div>
<?php
}
?>
