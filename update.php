<?php
//$post = $_POST['submit'];
$post = $_POST;
$search = $_POST['Search'];
//print_r($post);
if(!$search) {
?>
<div id="update">
	<form action="index.php?p=update" method="post">
	<table>
		<tr>
			<td>
				Bee
			</td>
			<td>
				<input list="bee" name="beeList">
				<datalist id="bee">
					<?php
						//    foreach($beearr as $row){
						// 	   if (isset($row['id'])){
						// 		   echo "\t\t\t".'<option value="'.$row['name'].'" title="'.$row['id'].'"></option>'."\n";
						// 	   }
						//    }
					   ?>
				</datalist>
			</td>
			<td>
				<input type="submit" value="Search" name="Search">
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
			<td style="padding-right: 20px;">
				Species
			</td>
			<td>
				<input type="text" name="species" value="<?php echo $name; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Effect
			</td>
			<td>
				<input type="text" name="effect" value="<?php echo $effect; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Source 1
			</td>
			<td>
				<input type="text" name="source1" value="<?php echo $source1; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Source 2
			</td>
			<td>
				<input type="text" name="source2" value="<?php echo $source2; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Bred
			</td>
			<td>
				<input type="checkbox" name="bred" <?php echo $bred; ?>>
			</td>
		</tr>
		<tr>
			<td>
				Sampled
			</td>
			<td>
				<input type="checkbox" name="sampled" <?php echo $source1; ?>>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update">
			</td>
		</tr>
	</table>
	</form>
</div>
<?php
}
?>
