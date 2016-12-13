<?php
$s = $_GET['s'];
if($s = 'y') {
	$s = '<span style="color: red;">Submitted</span>';
}
?>
<form action="process.php" method="post">
	<table>
		<tr>
			<td>
				Species:
			</td>
			<td>
				<input type="text" name="species">
			</td>
		</tr>
		<tr>
			<td>
				Effect:
			</td>
			<td>
					<input list="effect" name="effect" id="effectDropdown">
					   <datalist id="effect">
					   <?php
						   foreach($effectarr as $row){
							   if (isset($row['id'])){
								   echo "\t\t\t".'<option value="'.$row['effect'].'" title="'.$row['id'].'" data-name="'.$row['description'].'"></option>'."\n";
							   }
						   }
					   ?>
				   </datalist>
			</td>
		</tr>
		<tr>
			<td>
				Source:
			</td>
			<td>
					<input list="source" name="source1" class="source">
						<datalist id="source">
							<?php
		 					   foreach($beearr as $row){
		 						   if (isset($row['id'])){
		 							   echo "\t\t\t".'<option value="'.$row['name'].'" title="'.$row['id'].'"></option>'."\n";
		 						   }
		 					   }
		 				   ?>
					   </datalist>
			</td>
		</tr>
		<tr>
			<td>
				Source:
			</td>
			<td>
				<input list="source" name="source2" class="source">
			</td>
		</tr>
		<tr>
			<td>
				Bred:
			</td>
			<td>
				<input type="checkbox" name="bred" value="bred">
			</td>
		</tr>
		<tr>
			<td>
				Sampled
			</td>
			<td>
				<input type="checkbox" name="sampled" value="sampled">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;">
				<input type="submit" name="submitBee" value="Submit">
			</td>
		</tr>
	</table>
	<div id="theDiv" style="width: 100%; text-align: center;"></div>
	<script>
	var values = {
		<?php
			$i = 0;
			$len = count($effectarr);
			foreach($effectarr as $row){
				if (isset($row['id'])){
					if ($i == $len - 1){
						echo $row['id'].': "'.$row['description']."\"\n\t";
					}else{
						echo $row['id'].': "'.$row['description']."\",\n\t";
					}
				}
				$i++;
			}
		?>
	}
	$("#effectDropdown").on("change",function() {
		var value = $(this).val();
		$("#theDiv").html("<h3>" + ($("#effect [value=" + value + "]").data("name")) + "</h3>");
    })
	</script>
</form>
