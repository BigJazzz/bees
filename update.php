<?php

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
				<input type="text" name="species" value="<?php echo $beearr['name']; ?>">
			</td>
		</tr>
	</table>
	</form>
</div>
