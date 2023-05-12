<?php

  $setting = $this->db->get('settings')->row_array();

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Document</title>
</head>
<style>
	body {
		margin: 0;
		padding: 0;

	}

	table,
	tr,
	td {
		/* border: 0.5px solid black !important; */
		/* border: 0px solid black !important; */
		border-collapse: collapse !important;

		padding: 3px 10px !important;


	}

	/* span {
		font-size: 12px !important;
	} */

	p {
		margin: 0cm;
		margin-bottom: .0001pt;
		font-size: 16px;
		/* font-family: "Times New Roman", serif; */
		text-align: justify
	}

</style>

<body>

	<div class=WordSection1>
	<table>
		<tr >
			<td>
				<img width=100% height=101 id="Picture 2" src="<?= base_url('assets/upload/images/logo/42bf05afe17ff26c6aad559529c67a0e.jpg')  ?>">
			</td>
			<td>
				<p class=MsoNormal style='text-align:center'>
					<span lang=EN-GB style='font-size:16.0pt;font-family:"Calibri",sans-serif'> 
						<b>UNIVERSITAS PGRI ARGOPURO (UNIPAR) JEMBER</b>
					</span>
				<p>
				<p class=MsoNormal style='text-align:center'> 
					<span lang=EN-GB style='font-size:12.0pt;font-family:"Calibri",sans-serif'>	
						<b>STATUS : TERAKREDITASI "B"</b>
					</span>
				<p>
				<p class=MsoNormal style='text-align:center'> 
					<span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>
						Sekretariat : Kampus I Jl. Jawa No. 10 Telp./Fax. (0331) 335823
					</span>
				<p>
				<p class=MsoNormal style='text-align:center'> 
					<span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>
						Kampus II Jl. Kaliurang No. 3-A Jember Kode Pos 68121
					</span>
				<p>
				<p class=MsoNormal style='text-align:center'> 
					<span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>	
						Website : <u>www.unipar.ac.id</u> email : unipar.jbr@gmail.com
					</span>
				<p>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<hr size="3">
			</td>
		</tr>
	</table>

		<!-- <p class=MsoNormal style='text-align:justify'><i><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></i></p>
		

		<p class=MsoNormal align=right style='text-align:right'><b><span lang=SV
					style='font-size:10.0pt;font-family:"Calibri",sans-serif'>FORMULIR REGISTRASI MAHASISWA
					BARU </span></b></p>

		<p class=MsoNormal align=center style='text-align:center'><b><span lang=SV
					style='font-size:10.0pt;font-family:"Calibri",sans-serif'>INSTITUT TEKNOLOGI DAN
					BISNIS DINIYYAH LAMPUNG</span></b></p>

		<p class=MsoNormal align=center style='text-align:center'><b><span lang=SV
					style='font-size:10.0pt;font-family:"Calibri",sans-serif'>TAHUN AKADEMIK <?= $pendaftaran->tahun ?>/<?= $pendaftaran->tahun+1 ?></span></b></p>




		<p class=MsoNormal style='text-align:justify'><i><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></i></p>
	<p class=MsoNormal style='text-align:justify'><i><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></i></p>

		<p class=MsoNormal style='text-align:justify'><b><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>Identitas Pribadi </span></b></p> -->

		<!-- <p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p> -->
		<p class=MsoNormal style='text-align:center'> 
			<span lang=EN-GB style='font-size:18.0pt;font-family:"Times New Roman",sans-serif'>	
				<strong>
				<font face="Times New Roman">
					FORM DOMISILI
				</font>	
				</strong>
			</span>
		<p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
        <p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

		<!-- <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=0
			style='width:100%;margin-left:-.25pt;border-collapse:collapse;border:none'> -->
			<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
			style='width:93%;margin-left:auto;margin-right:auto;border-collapse:collapse;border:none'>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Prodi
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
					<font face="Times New Roman">
					<?= ': '.$prodi_pilihan->nama_prodi ?>
					</font>
				</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NIM
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:8.0pt'>
					<font face="Times New Roman">
					: (Diisi Petugas).........................................................................................</small>
					</font>
				</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NAMA 
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ": " . $pendaftaran->nama_depan . " " . $pendaftaran->nama_belakang ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Tempat/tgl Lahir
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '. $pendaftaran->tempat_lahir . " / " . $pendaftaran->tanggal_lahir ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180"> 
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							No. Hp
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->nohp?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180"> 
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Alamat Tinggal di Jember
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
					<font face="Times New Roman">
						<?= ': '.$pendaftaran->alamat_jember ?>
					</font>
					</span></p>
				</td>
			</tr>
		</table>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
    <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
			style='width:93%;margin-left:auto;margin-right:auto;border-collapse:collapse;border:none'>
			<tr>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							*) Alamat di Jember (kos/tempat saudara)
						</font>
					</span></p>
				</td>
				<td>
				</td>
			</tr>
        </table>
        <p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
			style='width:93%;margin-left:auto;margin-right:auto;border-collapse:collapse;border:none'>
			<tr>
				<td>
				</td>
				<td>
					<p class=MsoNormal style='margin-left: 400px;text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
						<font face="Times New Roman">
							Jember, <?= date("d-m-Y", strtotime($pendaftaran->tanggal_daftar)) ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<p class=MsoNormal style='margin-left: 400px;text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
						<font face="Times New Roman">
							Mahasiswa,
						</font>
					</span></p>
				</td>
			</tr>
		</table>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
			style='width:93%;margin-left:auto;margin-right:auto;border-collapse:collapse;border:none'>
			<tr>
				<td>
				<!-- <p class=MsoNormal style='margin-left: 30px;text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
						<font face="Times New Roman">
							_______________
						</font>
					</span></p> -->
				</td>
				<td>
					<p class=MsoNormal style='margin-left: 402px;text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'> 
						<u><font face="Times New Roman">	
							<?= $pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang ?>
						</font></u>
					</span></p>
				</td>
			</tr>
		</table>
			
					<!-- <span style='font-size:11.0pt; 
    font-family:"Calibri",sans-serif'><?= ucfirst(strtolower($kabupatensekolah->name));  ?>, </span><span lang=EN-GB
				style='font-size:11.0pt;font-family:"Calibri",sans-serif'><?= date("d-m-Y", strtotime($pendaftaran->tanggal_daftar)) ?></span></p>
		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

		<p class=MsoNormal style='margin-left:288.0pt'><span lang=EN-GB
				style='font-size:11.0pt;font-family:"Calibri",sans-serif'>Mahasiswa,</span></p>

		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

		<p class=MsoNormal style='margin-left:252.0pt;text-indent:36.0pt'><span lang=EN-GB
				style='font-size:11.0pt;font-family:"Calibri",sans-serif'> <u>(<?= $pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang ?>)</u></span><u><span lang=IN
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'> -->
	</div>

</body>

</html>
