<?php include("title.php")?>
	<form action="/blog/public/updateUser" method='post'>
	<?php foreach ($response as $list):  ?>
	<table width="300px" cellpadding="5" cellspacing="2">
		<tr>
			<td class="gray" align="center" style="font-size: 20px" colspan="15" >修改</td>
		</tr>
		<tr>
			<td align="center">會員名稱<br><input type="text" name="id" value='<?=$list->id?>'></td>
		</tr>
		<tr>
			<td align="center">密碼<br><input type="text" name="password" value='<?=$list->password?>'></td>
		<tr>
		<tr>
			<td align="center">會員名稱<br><input type="text" name="name" value='<?=$list->name?>'></td>
		<tr>
		<tr>
			<td align="center">email<br><input type="text" name="email" value='<?=$list->email?>'></td>
		<tr>
			<td align="center" colspan="15" ><input type="submit"  class="big_button" value="修改"></td>
		</tr>
	</table>
	
	<?php endforeach; ?>
	</form>

</body>
</html>