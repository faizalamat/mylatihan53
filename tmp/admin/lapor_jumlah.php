<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_POST['tambah'])) { $tambah = $_POST['tambah']; }
			else { $tambah = 1; }
			if (!empty($_POST['jumlah'])) { $jumlah = $_POST['jumlah']; }
			else { $jumlah = "0"; }
			if (!empty($_POST['bahagian'])) { $bahagian = $_POST['bahagian']; }
			else { $bahagian = "ALL"; }
			if (!empty($_POST['status'])) { $status = $_POST['status']; }
			else { $status = "ALL"; }
			if (!empty($_POST['bulan'])) { $bulan = $_POST['bulan']; }
			else { $bulan = "ALL"; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="990" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=laporan&amp;menu=jumlah">
              <tr bgcolor="#E2E2E2">
                <td width="238" align="right"> Jumlah Hari :</td>
                <td width="125" align="right">
				<select name="tambah" id="tambah" size="1">
                  <option value="1" <?php if ($tambah == 1) { echo 'selected="selected"'; } ?>>SAMA DENGAN</option>
                  <option value="2" <?php if ($tambah == 2) { echo 'selected="selected"'; } ?>>KURANG DARI</option>
                  <option value="3" <?php if ($tambah == 3) { echo 'selected="selected"'; } ?>>LEBIH DARI</option>
                </select></td>
                <td width="110" align="right">
				<p align="center">
				<input name="jumlah" value="<?php echo $jumlah; ?>" type="text" id="jumlah" size="6" class="input1" /> 
				Hari</td>
                <td width="124" align="right"><select name="bahagian" id="bahagian">
                  <option value="">- SEMUA -</option>
                  <?php
				  $sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
				  $da = mysql_query($sa);
				  while ($ta = mysql_fetch_array($da)) {
					  if ($ta['bids'] == $_POST['bahagian']) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					  ?>
                  <option value="<?php echo $ta['bids']; ?>" <?php echo $select; ?>><?php echo $ta['bahagian']; ?></option>
                  <?php
				  }
				  ?>
                </select></td>
                <td width="41" align="right"><select name="status" id="status">
                  <option value="">- SEMUA -</option>
                  <option value="1" <?php if ($status == 1) { echo 'selected="selected"'; } ?>>DALAM TINDAKAN</option>
                  <option value="2" <?php if ($status == 2) { echo 'selected="selected"'; } ?>>DISAHKAN</option>
                  <option value="3" <?php if ($status == 3) { echo 'selected="selected"'; } ?>>TIDAK DISAHKAN</option>
                  <option value="4" <?php if ($status == 4) { echo 'selected="selected"'; } ?>>KIV</option>
                  <option value="5" <?php if ($status == 5) { echo 'selected="selected"'; } ?>>DIBATALKAN</option>
                </select></td>
                <td width="97" align="right"><select name="bulan" id="bulan">
                  <option value="">- SEMUA -</option>
                  <?php
				  for ($i = 1; $i <= 12; $i++) {
					  if (kosong($i,2) == $bulan) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					?>
                  	<option value="<?php echo $i; ?>" <?php echo $select; ?>><?php echo bulan(kosong($i,2)); ?></option>
                  <?php
				  }
				  ?>
                </select></td>
                <td width="41" align="center"><select name="tahun" id="tahun">
                	<?php
					for ($i = date("Y")+1; $i >= 2010; $i--) {
						if ($tahun == $i) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                        <option value="<?php echo $i; ?>" <?php echo $select; ?>><?php echo $i; ?></option>
                    <?php
					}
					?>
                </select></td>
                <td width="59" align="center"><input type="submit" name="Submit" id="Submit" value=" Papar " class="button" /></td>
              </tr>
          	</form>
            </table>
          <br />
          <div align="right" class="text1">
          	 <?php
			 if (isset($_POST['Submit'])) {
				 ?>
	             [ <a href="export.php?menu=jumlah&tambah=<?php echo $tambah; ?>&jumlah=<?php echo $jumlah; ?><?php if ($bahagian != "ALL") { echo "&bahagian=".$bahagian; } ?><?php if ($status != "ALL") { echo "&status=".$status; } ?><?php if ($bulan != "ALL") { echo "&bulan=".$bulan; } ?>&tahun=<?php echo $tahun; ?>">Export</a> ] 
             <?php
			 }
			 else {
				 ?>
	             [ <a href="export.php?menu=jumlah">Export</a> ] 
             <?php
			 }
			 ?>
          </div>
          <br />
          <table width="990" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="8" align="center" bgcolor="#DE5302">LAPORAN MENGIKUT JUMLAH HARI BERKURSUS</td>
            </tr>
            <tr class="text1">
              <td width="40" align="center" valign="middle" bgcolor="#CCCCCC">Bil</td>
              <td width="161" align="left" valign="middle" bgcolor="#CCCCCC">Nama 
				&amp; No. KP</td>
              <td width="123" align="center" valign="middle" bgcolor="#CCCCCC">Bahagian</td>
              <td width="120" align="center" valign="middle" bgcolor="#CCCCCC">Kumpulan Perkhidmatan</td>
              <td width="120" align="center" valign="middle" bgcolor="#CCCCCC">Kursus/Latihan</td>
              <td width="120" align="center" valign="middle" bgcolor="#CCCCCC">Sesi Pembelajaran</td>
              <td width="120" align="center" valign="middle" bgcolor="#CCCCCC">Pembelajaran Kendiri</td>
              <td width="120" align="center" valign="middle" bgcolor="#CCCCCC">Jumlah Hari</td>
            </tr>
            <?php
			if (isset($_POST['Submit'])) {
				if ($bahagian == "ALL") {
					$s = "SELECT u.*, p.*, b.* 
						FROM user AS u, kumpulan AS p, bahagian AS b
						WHERE u.pids = p.pids
						AND u.bids = b.bids
						AND u.usah = 1
						AND u.unokp != 'SUPERADMIN' 
						AND u.udelete = 1 
						AND u.ulevel < 4
						ORDER BY u.unama ASC
					";
				}
				else {
					$s = "SELECT u.*, p.*, b.* 
						FROM user AS u, kumpulan AS p, bahagian AS b
						WHERE u.pids = p.pids
						AND u.bids = b.bids
						AND u.usah = 1
						AND u.unokp != 'SUPERADMIN' 
						AND u.udelete = 1 
						AND u.ulevel < 4
						AND u.bids = '" . input2($bahagian) . "'
						ORDER BY u.unama ASC
					";
				}
			}
			else {
				$s = "SELECT * FROM user WHERE unama = 'JomTraining.Com.Zaki.123'";
			}
			$d = mysql_query($s);
			
			$tkursus = 0;
			$tsesi = 0;
			$tkendiri = 0;
			$total = 0;
			while ($t = mysql_fetch_array($d)) {
				$kursus = 0;
				if ($bulan == "ALL") {
					$sb = "SELECT l.*, k.* 
						FROM latihan AS l, kursus AS k
						WHERE l.kids = k.kids
						AND l.unokp = '" . $t['unokp'] . "' 
						AND k.kttamat RLIKE '" . $tahun . "' 
					";
					if ($status != "ALL") {
						$sb .= "AND l.lstatus = '" . input1($status) . "' ";
					}
					$sb .= "ORDER BY l.unokp ASC";
				}
				else {
					$sb = "SELECT l.*, k.* 
						FROM latihan AS l, kursus AS k
						WHERE l.kids = k.kids
						AND l.unokp = '" . $t['unokp'] . "' 
						AND k.kttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
					";
					if ($status != "ALL") {
						$sb .= "AND l.lstatus = '" . input1($status) . "' ";
					}
					$sb .= "ORDER BY l.unokp ASC";
				}
				$db = mysql_query($sb);
				while ($tb = mysql_fetch_array($db)) {
					$kursus = $kursus + $tb['kjumlah'] * 6;
					$tkursus = $tkursus + $tb['kjumlah'] * 6;
				}
				
				$sesi = 0;
				if ($bulan == "ALL") {
					$sb = "SELECT * FROM sesi
						WHERE unokp = '" . $t['unokp'] . "'
						AND starikh RLIKE '" . $tahun . "' 
					";
					if ($status != "ALL") {
						$sb .= "AND sstatus = '" . input1($status) . "' ";
					}
					$sb .= "ORDER BY unokp ASC";
				}
				else {
					$sb = "SELECT * FROM sesi
						WHERE unokp = '" . $t['unokp'] . "'
						AND starikh RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
					";
					if ($status != "ALL") {
						$sb .= "AND sstatus = '" . input1($status) . "' ";
					}
					$sb .= "ORDER BY unokp ASC";
				}
				$db = mysql_query($sb);
				while ($tb = mysql_fetch_array($db)) {
					$sesi = $sesi + $tb['sjumlah'];
					$tsesi = $tsesi + $tb['sjumlah'];
				}
		
				$kendiri = 0;
				if ($bulan == "ALL") {
					$sb = "SELECT * FROM kendiri
						WHERE unokp = '" . $t['unokp'] . "'
						AND dttamat RLIKE '" . $tahun . "' 
					";
					if ($status != "ALL") {
						$sb .= "AND dstatus = '" . input1($status) . "' ";
					}
					$sb .= "ORDER BY unokp ASC";
				}
				else {
					$sb = "SELECT * FROM kendiri
						WHERE unokp = '" . $t['unokp'] . "'
						AND dttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
					";
					if ($status != "ALL") {
						$sb .= "AND dstatus = '" . input1($status) . "' ";
					}
					$sb .= "ORDER BY unokp ASC";
				}
				$db = mysql_query($sb);
				while ($tb = mysql_fetch_array($db)) {
					if ($tb['djenis'] == 1) { 
						$kendiri = $kendiri + $tb['djumlah'];
						$tkendiri = $tkendiri + $tb['djumlah'];
					}
					elseif ($tb['djenis'] == 2) { 
						$kendiri = $kendiri + 6;
						$tkendiri = $tkendiri + 6;
					}
					elseif ($tb['djenis'] == 3) { 
						$kendiri = $kendiri + $tb['djumlah'];
						$tkendiri = $tkendiri + $tb['djumlah'];
					}
				}
				$total = $kursus + $sesi + $kendiri;
				if ($tambah == 1) {
					if ($total == ($jumlah * 6)) { $zaki = true; }
					else { $zaki = false; }
				}
				elseif ($tambah == 2) {
					if ($total < ($jumlah * 6)) { $zaki = true; }
					else { $zaki = false; }
				}
				elseif ($tambah == 3) {
					if ($total > ($jumlah * 6)) { $zaki = true; }
					else { $zaki = false; }
				}
				if ($zaki) {
					$n = $n + 1;
					?>
					<tr>
					  <td align="center" valign="middle"><?php echo $n; ?></td>
					  <td align="left" valign="middle"><?php echo output1($t['unama']) . "<br><a href=\"index.php?modul=laporan&menu=kakitangan&status=".$status."&bulan=".$bulan."&tahun=".$tahun."&id=".$t['uids']."\">" . output1($t['unokp']) . "</a>"; ?></td>
					  <td align="center" valign="middle"><?php echo output1($t['bahagian']); ?></td>
					  <td align="center" valign="middle"><?php echo output1($t['kumpulan']); ?></td>
					  <td align="center" valign="middle">
						<?php 
						if ($kursus >= 1) { echo ($kursus / 6) . " HARI"; }
						else { echo "0"; }
						?>
					  </td>
					  <td align="center" valign="middle">
						<?php 
						$hari = floor($sesi / 6);
						$jam = $sesi - ($hari * 6);
						if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
						elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
						elseif ($sesi == "0.5") { $sesid = "30 MINIT"; }
						else { $sesid = "0"; }
						echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
						?>
					  </td>
					  <td align="center" valign="middle">
						<?php 
						$hari = floor($kendiri / 6);
						$jam = $kendiri - ($hari * 6);
						if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
						elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
						elseif ($kendiri == "0.5") { $sesid = "30 MINIT"; }
						else { $sesid = "0"; }
						echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
						?>
					  </td>
					  <td align="center" bgcolor="#CCCCFF">
						<strong>
						<?php 
						$ttotal = $ttotal + $total;
						$hari = floor($total / 6);
						$jam = $total - ($hari * 6);
						if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
						elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
						elseif ($total == "0.5") { $sesid = "30 MINIT"; }
						else { $sesid = "0"; }
						echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
						?>
				      </strong></td>
					</tr>
				<?php
				}
			}
			if ($n) {
				?>
				<tr>
				  <td colspan="4" align="center" class="text1" bgcolor="#00FFFF">Jumlah Keseluruhan Hari</td>
				  <td colspan="4" align="center" class="text1" bgcolor="#00FFFF"><?php 
					$hari = floor($ttotal / 6);
					$jam = $ttotal - ($hari * 6);
					if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
					elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
					elseif ($ttotal == "0.5") { $sesid = "30 MINIT"; }
					else { $sesid = "0"; }
					echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
					?></td>
		    </tr>
			<?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="8" align="center" valign="middle">Tiada maklumat pegawai</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>