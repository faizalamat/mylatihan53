<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
          <br />
          <table width="575" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="3" align="center" bgcolor="#DE5302">SENARAI KUMPULAN PERKHIDMATAN</td>
            </tr>
            <tr class="text1">
              <td width="41" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="411" align="left" bgcolor="#CCCCCC">Kumpulan Perkhidmatan</td>
              <td width="101" align="center" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			$s = "SELECT * FROM kumpulan WHERE pdelete = 1 ORDER BY pid ASC";
			$d = mysql_query($s);
			while ($t = mysql_fetch_array($d)) {
				$n = $n + 1;
				?>
                <tr>
                  <td align="center"><?php echo $n; ?></td>
                  <td align="left"><?php echo output1($t['kumpulan']); ?></td>
                  <td align="center" bgcolor="#33CCFF"><a href="index.php?modul=kumpulan&menu=kemaskini&id=<?php echo $t['pids']; ?>">Kemaskini</a></td>
                </tr>
            <?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="3" align="center">Tiada maklumat kumpulan perkhidmatan</td>
                </tr>
            <?php
			}
			?>
          </table>
            <br />
            <table width="500" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kumpulan" name="kumpulan" method="post" action="index.php?modul=kumpulan&amp;menu=tambah">
              <tr>
                <td colspan="3" align="center" bgcolor="#De5302" class="text2">TAMBAH KUMPULAN PERKHIDMATAN</td>
              </tr>
              <tr>
                <td width="78" align="center" bgcolor="#CCCCCC">Kumpulan <span class="text8">*</span> :</td>
                <td width="320" align="center"><input name="kumpulan" type="text" id="kumpulan" size="55" maxlength="255" class="input1" /></td>
                <td width="76" align="center">
				<input type="submit" name="Submit" id="Submit" value="Tambah" class="button" /></td>
              </tr>
          	</form>
            </table>
		<br /></td>
    </tr>
</table>