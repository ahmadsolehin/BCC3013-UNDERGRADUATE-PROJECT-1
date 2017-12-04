  <?php  
  
  
  include('dbase.php');
  include ('_session.php');
  include ('_header.php');
  
  $jab_id = NULL;
  $status_id = NULL;
  
  $caw_id = $_GET['id'];
  $_SESSION['test'] = $caw_id;
  
  
  if(isset($_GET['jab_id'])) { $caw_id = $_GET['caw_id']; }
  if(isset($_GET['status_id'])) { $status_id = $_GET['status_id']; }
  
  ?>
  
  <head>
	  <script>
		  function jab(jab_id) {
  
			  window.location="frmSemakan_Admin.php?jab_id="+jab_id;
		  }
  
		  function status(status_id) {
  
			  window.location="frmSemakan_Admin.php?jab_id=<?=$jab_id?>&unit_id=<?=$unit_id?>&status_id="+status_id;
		  }
	  </script>
  </head>
  
  <body>
	  <center>
		  
		  <table width="1312" bgcolor="#F5FFFA" bordercolor="#006699">
			  <tr height="30" bordercolor="#FFFFFF">
				  <td width="17%" bgcolor="#006699" rowspan="2" valign="top"><?php include('_menu.php'); ?></td>
				  <td width="84%" class="font12" bgcolor="#5F9EA0"><b><font color="FFFFCC">&nbsp; SEMAKAN PERAKUAN >> </font></b></td>
  
			  </tr>
  
  
			  <tr valign="top" bgcolor="#F5FFFA">
				  <td class="font12" align="center"><table width="1029" border="0">
					  <tr>
						  <td><div align="right" onClick="goBack()" data-toggle="tooltip" title="KEMBALI"><img src="image/back.png" width="59" height="43" /></div></td>
					  </tr>
				  </table>
  
				  <p>
					  <!-- START TABLE FOR LEVEL 4-->
  
					  <?php if ($seslevel == 4) { ?>
				  </p>
				  <table width="1027" border="0">
					  <tr>
						  <td><form id="form1" name="form1" method="post" action="">
							  <input type="checkbox" name="checkbox" id="checkAll" />
							  <label for="checkbox"></label>
							  Peraku Semua
						  </form></td>
					  </tr>
				  </table>
				  <table width="95%" align="center" cellpadding="4" cellspacing="1" bgcolor="#70883b">
					  <tr bgcolor="#5F9EA0" class="font12bold" align="center" height="30">
						  <td width="6%">BIL</td>
						  <td width="27%">NAMA PEMOHON</td>
						  <td width="11%">KAD PENGENALAN</td>
						  <td width="18%">TARIKH MOHON</td>
						  <td width="15%">TARIKH PERAKU</td>
						  <td width="14%">STATUS PERMOHONAN </td>
						  <td width="9%">TINDAKAN</td>
					  </tr>
					  <tr bgcolor="#CCFFFF" class="font12" align="center">
						  <td></td>
						  <td><div align="center">
							  <input type="text" id="nama_pemohon" name="txtCNama" size="15" maxlength="100" value="<?php if(isset($_GET['txtCNama'])) { echo $_GET['txtCNama']; }?>"/>
						  </div></td>
						  <td><div align="center">
							  <input type="text" id="kad_pengenalan" name="txtCKp" size="8" maxlength="12" value="<?php if(isset($_GET['txtCKp'])) { echo $_GET['txtCKp']; }?>" />
						  </div></td>
						  <td><div align="center">
							  <input id="tarikh_mohon" type="date" />
						  </div></td>
						  <td><div align="center"><input id="tarikh_peraku" type="date"></div></td>
						  <td><select id="status_permohonan" name="status_id" onChange="status(this.value)">
							  <option value="">-Sila Pilih Status-</option>
							  <?php
							  $statuss  = mysql_query("SELECT * FROM kod_status") or die(mysql_error());
							  while($rows = mysql_fetch_array($statuss)) {
								  ?>
								  <option 
								  <?php if($status_id == $rows['status_id']) { echo 'selected'; } ?> 
								  value="<?=$rows['status_id'];?>">
								  <?=$rows['status_ket'];?>
							  </option>
							  <?php } ?>
						  </select></td>
						  <td><input type="submit" id="btncari" name="txtCari" value="Cari.." /></td>
					  </tr>
					  <tr ></tr>
					  </table>		
  
  
	<table id="yuyu" width="95%" align="center" cellpadding="4" cellspacing="1" bgcolor="#70883b">
  
					  <?php
  
					  $id = $_GET['id']; 
  
					  $rowsCount= 0;
					  $permohonan  = mysql_query("SELECT * FROM tpemohonan WHERE caw_id = '$id' AND status_id IN(2, 3) ");
					  while($rows = mysql_fetch_array($permohonan)) {
  
					$rowsCount++;
  
					?>
  
						  <tr bgcolor="#FFFFFF" height="30">
							  <td width="6%" height="38"><table width="47" border="0">
								  <tr>
									  <td width="17"><?=$rowsCount;?></td>
									  <td width="29"><input name="approval[]" type="checkbox" value="<?= $rows['mohon_id'] ?>" /></td>
								  </tr>
							  </table></td>
							  <td width="27%"><?=$rows['mohon_nama']?>
								  <div align="center"></div></td>
								  <td width="11%"><?=$rows['mohon_kp']?></td>
								  <td width="18%"><div align="center">
									  <?=$rows['mohon_tkhmhn']?>
								  </div></td>
								  <td width="15%"><div align="center">
									  <?=$rows['mohon_tkhaku']?>
								  </div></td>
								  <td width="14%"><div align="center">
									  <?=$status-> getStatus_ket($rows['status_id']);?>
								  </div></td>
								  <td width="9%">
									  <div align="center">
										  <table width="60" border="0">
											  <tr>
  
													  <?php
  
														  $ayam = $rows['status_id']; 
  
														  if($ayam == '2'){
															  ?>
  
												  <td style="text-align:center"  width="20" height="24" onClick="window.location='frmSemakan_edit2.php?mohon_id=<?=$rows['mohon_id']?>&caw_id=<?php echo $caw_id; ?>  '" data-toggle="tooltip" title="KEMASKINI" ><img src="image/edit.png" width="20" height="22" align="top" /></td>
  
													  <?php
														  }
														  ?>
  
												  <td width="20" height="24"><a href="frmCetakan.php?mohon_id=<?=$rows['mohon_id']?>&caw_id=<?php echo $caw_id; ?>&jab_id=<?php echo $jab_id; ?>" data-toggle="tooltip" title="CETAK" target="_blank"><img src="image/cetak.png" width="20" height="17" /></a></td>
											  </tr>
										  </table>
									  </div></td>
								  </tr>
								  <?php } ?>
							  </table>
							  <p>&nbsp;</p>
  
							  <input id="btnHantarAdmin" type="button" name="" value="HANTAR" />
  
							  <p>
  
  
								  <?php } ?>
  
  
  
								  <!-- START TABLE FOR LEVEL 1-->
  
								  <?php if ($seslevel == 1) { ?>
							  </p>
							  <p>&nbsp; </p>
							  <table width="1027" border="0">
								  <tr>
									  <td><form id="form3" name="form1" method="post" action="">
										  <input type="checkbox" name="checkbox3" id="checkAll" />
										  <label for="checkbox3"></label>
										  Peraku Semua
									  </form></td>
								  </tr>
							  </table>
							  <table width="95%" align="center" cellpadding="4" cellspacing="1" bgcolor="#70883b">
								  <tr bgcolor="#5F9EA0" class="font12bold" align="center" height="30">
									  <td width="3%">BIL</td>
									  <td width="30%">NAMA PEMOHON</td>
									  <td width="11%">KAD PENGENALAN</td>
									  <td width="18%">TARIKH MOHON</td>
									  <td width="15%">TARIKH PERAKU</td>
									  <td width="14%">STATUS PERMOHONAN </td>
									  <td width="9%">TINDAKAN</td>
								  </tr>
								  <tr bgcolor="#CCFFFF" class="font12" align="center">
									  <td></td>
									  <td><div align="center">
										  <input type="text" name="txtCNama2" size="15" maxlength="100" value="<?php if(isset($_GET['txtCNama'])) { echo $_GET['txtCNama']; }?>"/>
									  </div></td>
									  <td><div align="center">
										  <input type="text" name="txtCKp2" size="8" maxlength="12" value="<?php if(isset($_GET['txtCKp'])) { echo $_GET['txtCKp']; }?>" />
									  </div></td>
									  <td><div align="center">
										  <input type="date" />
									  </div></td>
									  <td><div align="center">
										  <input type="date" />
									  </div></td>
									  <td><select name="status_id2" onChange="status(this.value)">
										  <option value="">-Sila Pilih Status-</option>
										  <?php
										  $statuss  = mysql_query("SELECT * FROM kod_status") or die(mysql_error());
										  while($rows = mysql_fetch_array($statuss)) {
											  ?>
											  <option 
											  <?php if($status_id == $rows['status_id']) { echo 'selected'; } ?> 
											  value="<?=$rows['status_id'];?>">
											  <?=$rows['status_ket'];?>
										  </option>
										  <?php } ?>
									  </select></td>
									  <td><input type="submit" name="txtCari2" value="Cari.." /></td>
								  </tr>
								  <tr ></tr>
								  <?php
  
								  $id = $_GET['id'];
  
  
								  $rowsCount= 0;
								  $permohonan  = mysql_query("SELECT * FROM tpemohonan WHERE caw_id = '$id' ");
								  while($rows = mysql_fetch_array($permohonan)) {
  
									  $rowsCount++;
  
									  ?>
  
									  <tr bgcolor="#FFFFFF" height="30">
										  <td height="36"><table width="47" border="0">
											  <tr>
												  <td width="17"><?=$rowsCount;?></td>
												  <td width="29"><input name="approval[]" type="checkbox" value="<?= $rows['mohon_id'] ?>" /></td>
											  </tr>
										  </table></td>
										  <td><?=$rows['mohon_nama']?>
											  <div align="center"></div></td>
											  <td><?=$rows['mohon_kp']?></td>
											  <td><div align="center">
												  <?=$rows['mohon_tkhmhn']?>
											  </div></td>
											  <td><div align="center">
												  <?=$rows['mohon_tkhaku']?>
											  </div></td>
											  <td><div align="center">
												  <?=$status-> getStatus_ket($rows['status_id']);?>
											  </div></td>
											  <td><div align="center">
												  <table width="60" border="0">
													  <tr>
  
														  <?php
  
														  $ayam = $rows['status_id']; 
  
														  if($ayam == '1'){
															  ?>
  
															  <td style="text-align:center"  width="20" height="24" onClick="window.location='frmSemakan_edit.php?mohon_id=<?=$rows['mohon_id']?>&caw_id=<?=$rows['caw_id']?>'" data-toggle="tooltip" title="KEMASKINI"><img src="image/edit.png" width="20" height="22" align="top" /></td>
  
															  <?php
														  }
														  ?>
  
  
														  <td width="20" height="24"><a href="frmCetakan.php?mohon_id=<?=$rows['mohon_id']?>&caw_id=<?php echo $caw_id; ?>&jab_id=<?php echo $jab_id; ?>" data-toggle="tooltip" title="CETAK" target="_blank"><img src="image/cetak.png" width="20" height="17" /></a></td>
  
													  </tr>
												  </table>
											  </div></td>
										  </tr>
										  <?php } ?>
									  </table>
  
									  <p>&nbsp;</p>
  
									  <input id="btnHantarHq" type="button" name="" value="HANTAR" />
  
									  <?php } ?>
									  <p>&nbsp;</p>
									  <p>&nbsp;</p></td>
								  </tr>
							  </table>
  
							  <table width="1312" border="1" bgcolor="black" bordercolor="#006699">
								  <tr>
									  <td><div align="center"><font color="#FFFFFF">Hak Terpelihara Setiausaha Kerajaan Pahang</font></div></td>
								  </tr>
							  </table>
  
  
							  <script>
								  $(document).ready(function(){
									  $('[data-toggle="tooltip"]').tooltip();   
								  });
							  </script>
  
							  <script>
								  function goBack() {
									  window.history.back();
								  }
								  $("#checkAll").click(function () {
									  $('input:checkbox').not(this).prop('checked', this.checked);
								  });
							  </script>
  
  
  
  
  
  
							  <script type="text/javascript">
  
  
								  function checkValidation(a) {
  
									  $.ajax({
										  type: 'POST',
										  url: "ajax_solehin/check_status_pemohon_id.php",
										  data:{
											  id: a
										  },
										  dataType    :   'json',
										  success: function(data) {
  
											  var ayam = data[0].status_id;
											  var mohon_id = data[0].mohon_id;
											  var nama_pemohon = data[0].mohon_nama;
  
											  if (ayam == '4') {
												  alert("Anda telah menolak permohonan "+nama_pemohon+", sebrang ubahsuai tidak dibenarkan");
											  }else if(ayam == '3'){
												  alert("anda telah meluluskan semakan "+nama_pemohon+", sebarang ubahsuai tidak dibenarkan");
											  }else if (ayam == '2') {
												  alert("anda telah peraku permohonan "+nama_pemohon+", sebarang ubahsuai tidak dibenarkan");
											  }else if (ayam == '1'){
												  checkselect(a);
												  updatePerakuauto(a);
												  alert("Maklumat "+nama_pemohon+" Telah Berjaya Diperaku oleh Ibu Pejabat");
  
											  }
  
  
										  }
	  }); // tutup ajax
  
  
								  }
  
  
  
								  function checkselect(a){
						  
									  var ayam = a;
									  $.ajax({
										  type: 'POST',
										  url: "ajax_solehin/update_admin.php",
										  data:{
											  id: ayam
										  },
										  dataType    :   'json',
										  complete: function(data) {
										  }
	  }); // tutup ajax
  
								  }
							  </script>
  
  
  
  
  
							  <script>
								  $(document).ready(function(){
  
									  $("#btnHantarHq").click(function(){
  
  
										  $("input:checkbox:not(:checked)").each(function() {
  
											  var c = this.value;
  
											  $.ajax({
												  type: 'POST',
												  url: "ajax_solehin/update_yg_status4.php",
												  data:{
													  id: c
												  },
												  dataType    :   'json',
												  complete: function(data) {
  
  
												  }
	  }); // tutup ajax
										  });
  
  
  
										  $('input[name="approval[]"]:checked').each(function() {
											  var a = this.value;
											  checkValidation(a);
										  });
  
  
  
									  });
  
								  });
							  </script>
  
  
  
  
  
  
  
  
  
  
  <script>
  $(document).ready(function(){
  
	  $("#btnHantarAdmin").click(function(){
  
	   $('input[name="approval[]"]:checked').each(function() {
  
		var a = this.value;
		updatePerakuautoUtkAdmin(a);
  
		$.ajax({
		  type: 'POST',
		  url: "ajax_solehin/update_admin2.php",
		  data:{
			  id: a
		  },
		  dataType    :   'json',
		  complete: function(data) {
  
  
		  }
	  }); // tutup ajax
  
  
		  //  return false;
  
	  });
  
  
  
   });
  
  });
  </script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <script type="text/javascript">
  
  
	  
	  function updatePerakuauto(a)
	  {
			  var ayam = a;
  
								  $.ajax({
										  type: 'POST',
										  url: "ajax_solehin/loop.php",
										  data:{
											  id: ayam
										  },
										  dataType    :   'json',
										  complete: function(data) {
										  }
	  }); // tutup ajax
	  }
  
  
  
  
  
  
  
  
  
	  function updatePerakuautoUtkAdmin(a)
	  {
			  var ayam = a;
  
								  $.ajax({
										  type: 'POST',
										  url: "ajax_solehin/loop_admin.php",
										  data:{
											  id: ayam
										  },
										  dataType    :   'json',
										  complete: function(data) {
										  }
	  }); // tutup ajax
	  }
  </script>
  
						  </body>
						  </html></center>
					  </body>
					  </html>
  
  
  
  
  
  
  
