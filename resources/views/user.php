<?php include("title.php")?>
	<form action="m_member.php?page=list" method="post">
	查詢
		<input type="text" name="val"> 
		<input type="text" name="val2"> 
		<input type="text" name="val3"> 
		<input type="submit" class="button" value="查詢">
	</form>
	<br>
	<table width="80%" cellpadding="5" cellspacing="2">
		<tr>
			<td class="gray" colspan="15" align="center" style="font-size: 20px" >
			會員管理
			<span style="float:right">
				<a href='viewnewUser'><button class='button'>新增</button></a></span>
			</td>
		</tr>
		<tr>
			<td class="gray" align="center">編號</td>
			<td class="gray" align="center">密碼</td>
			<td class="gray" align="center">會員名稱</td>
			<td class="gray" align="center">email</td>
			<td class="gray" align="center">修改</td>
			<td class="gray" align="center">刪除</td>
		</tr>
		<?php
		foreach ($response as $list): 
			echo "<tr>";
			echo "<td align='center'>$list->id</td>";
			echo "<td align='center'>$list->password</td>";
			echo "<td align='center'>$list->name</td>";
			echo "<td align='center'>$list->email</td>";
			echo "<td align='center'><a href='viewupdateUser/$list->id'><button class='button'>修改</button></a></td>";
				echo "<td align='center'><a href='removeUser/$list->id'><button class='button'>刪除</button></a></td>";
			echo "</tr>";
		endforeach; 
		?>
	</table>
</body>
</html>