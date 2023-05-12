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
						Website : www.unipar.ac.id email : unipar.jbr@gmail.com
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
			<span lang=EN-GB style='font-size:14.0pt;font-family:"Times New Roman",sans-serif'>	
				<strong>
				<font face="Times New Roman">
					FORMULIR PENDAFTARAN MAHASISWA BARU
				</font>	
				</strong>
			</span>
		<p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

		<!-- <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=0
			style='width:100%;margin-left:-.25pt;border-collapse:collapse;border:none'> -->
			<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
			style='width:93%;margin-left:auto;margin-right:auto;border-collapse:collapse;border:none'>
			<tr>
				<td width="210">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							JALUR PENDAFTARAN
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
					<font face="Times New Roman">
					<?= ': '.$pendaftaran->jalur_pendaftaran ?>
					</font>
				</span></p>
				</td>
			</tr>
			<tr>
				<td width="210">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							SUMBER INFORMASI PENDAFTARAN
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
					<font face="Times New Roman">
					<?= ': '.$pendaftaran->informasi ?>
					</font>
				</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NOMOR PENDAFTARAN / NPM
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<!-- <?= ': '.$pendaftaran->no_pendaftaran ?> -->
							: <small>(Diisi Petugas)</small>................................................
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							PRODI YANG DIPILIH
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$prodi_pilihan->nama_prodi; ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180"> 
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NAMA LENGKAP
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180"> 
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							TEMPAT / TGL LAHIR
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
					<font face="Times New Roman">
						<?= ': '.$pendaftaran->tempat_lahir.' / '.$pendaftaran->tanggal_lahir ?>
					</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
							style='font-size:12.0pt'>
							<font face="Times New Roman">
								JENIS KELAMIN
							</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->jk ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">	
							ALAMAT
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">	
							<?= ': '.$pendaftaran->alamat ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">	
							NO. TELP / HP
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt;font-family:"Calibri",sans-serif'>
						<font face="Times New Roman">	
							<?= ': '.$pendaftaran->nohp ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							ASAL SEKOLAH
						</font>
						</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->asalsekolah ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NISN
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->nisn ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
						<font face="Times New Roman">
							NPSN
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ": ".$pendaftaran->npsn ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NIK
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->nik ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NO. KIP-K
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
						<?php if ($pendaftaran->kipk == 0) {
							echo ": -";
						}else {
								echo ": ". $pendaftaran->kipk;
							}
						?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NAMA IBU KANDUNG
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->nama_ortu ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="180">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							UKURAN JAS ALMAMATER
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->size_almet ?>
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
				</td>
				<td>
					<p class=MsoNormal style='margin-left: 200px;text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
						<font face="Times New Roman">
							Jember, <?= date("d-m-Y", strtotime($pendaftaran->tanggal_daftar)) ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td>
					<p class=MsoNormal style='margin-left: 30px;text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
						<font face="Times New Roman">
							Bagian Pendaftaran,
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='margin-left: 200px;text-align:justify'><span lang=EN-GB
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
				<p class=MsoNormal style='margin-left: 30px;text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
						<font face="Times New Roman">
							_______________
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='margin-left: 202px;text-align:justify'><span lang=EN-GB
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

		<p style="page-break-before: always">

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

		<p style="page-break-before: always">

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
						Website : <u>www.unipar.ac.</u> email : unipar.jbr@gmail.com
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
			<span lang=EN-GB style='font-size:14.0pt;font-family:"Times New Roman",sans-serif'>	
				<strong>
				<font face="Times New Roman">
					SURAT PERNYATAAN
				</font>	
				</strong>
			</span>
		<p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

		<!-- <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=0
			style='width:100%;margin-left:-.25pt;border-collapse:collapse;border:none'> -->
		<p class=MsoNormal style='text-align:justify'> 
			<span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif'>	
				<!-- <strong> -->
				<font face="Times New Roman">
					Saya yang bertandatangan dibawah ini :
				</font>	
				<!-- </strong> -->
			</span>
		<p>
			<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
			style='width:93%;margin-left:auto;margin-right:auto;border-collapse:collapse;border:none'>
			<tr>
				<td width="150">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Nama
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
					<font face="Times New Roman">
					<?= ': ' . $pendaftaran->nama_depan . " " . $pendaftaran->nama_belakang ?>
					</font>
				</span></p>
				</td>
			</tr>
			<tr>
				<td width="150">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							NPM / NIM
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:8.0pt'>
					<font face="Times New Roman">
					: (Diisi oleh bagian pendaftaran)....................................................
					</font>
				</span></p>
				</td>
			</tr>
			<tr>
				<td width="150">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Program Studi
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '. $prodi_pilihan->nama_prodi ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="150">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Tempat, Tanggal Lahir
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': ' . $pendaftaran->tempat_lahir . " , " . $pendaftaran->tanggal_lahir ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="150"> 
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Jenis Kelamin
						</font>
					</span></p>
				</td>
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->jk ?>
						</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="150"> 
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							Alamat Sesuai KTP
						</font>
					</span></p>
				</td>
				<td>
				<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
					style='font-size:12.0pt'>
					<font face="Times New Roman">
						<?= ': '.$pendaftaran->alamat ?>
					</font>
					</span></p>
				</td>
			</tr>
			<tr>
				<td width="150">
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
							style='font-size:12.0pt'>
							<font face="Times New Roman">
								No. Telp
							</font>
					</span></p>
				</td>tahun
				<td>
					<p class=MsoNormal style='text-align:justify'><span lang=EN-GB
						style='font-size:12.0pt'>
						<font face="Times New Roman">
							<?= ': '.$pendaftaran->nohp ?>
						</font>
					</span></p>
				</td>
			</tr>
		</table>
		<p class=MsoNormal style='text-align:justify'> 
			<span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
				<!-- <strong> -->
				<font face="Times New Roman" style="line-height: 1.5em">
					Dengan ini saya menyatakan bahwa :
				</font>	
				<!-- </strong> -->
			</span>
		<p>

        <ol type="1">
            <li>
                <p class=MsoNormal style='text-align:justify'> 
                    <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                        <!-- <strong> -->
                        <font face="Times New Roman" style="line-height: 1.5em">
                            Bersedia mendaftar sebagai Mahasiswa Baru Universitas PGRI Argopuro Jember pada Tahun Akademik <?= $pendaftaran->tahun; ?>
                        </font>	
                        <!-- </strong> -->
                    </span>
                <p>
            </li>
            <li>
                <p class=MsoNormal style='text-align:justify'> 
                    <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                        <!-- <strong> -->
                        <font face="Times New Roman" style="line-height: 1.5em">
                            Bersedia untuk membayar Biaya Pendidikan :
                        </font>	
                        <!-- </strong> -->
                    </span>
                <p>
            
                    <ol type="a">
                        <li>
                            <p class=MsoNormal style='text-align:justify'> 
                                <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                    <font face="Times New Roman" style="line-height: 1.5em">
                                        Biaya Pendaftaran
                                    </font>
                                </span>
                            <p>
                        </li>
                        <li>
                            <p class=MsoNormal style='text-align:justify'> 
                                <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                    <font face="Times New Roman" style="line-height: 1.5em">
                                        Biaya Her Registrasi
                                    </font>	
                                </span>
                            <p>
                        </li>
                        <li>
                            <p class=MsoNormal style='text-align:justify'> 
                                <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                    <!-- <strong> -->
                                    <font face="Times New Roman" style="line-height: 1.5em">
                                        Dana Pengembangan (Dapat diansur mulai semester 1 s.d 4)
                                    </font>	
                                    <!-- </strong> -->
                                </span>
                            <p>
                        </li>
                        <li>
                            <p class=MsoNormal style='text-align:justify'> 
                                <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                    <!-- <strong> -->
                                    <font face="Times New Roman" style="line-height: 1.5em">
                                        Biaya SPP
                                    </font>	
                                    <!-- </strong> -->
                                </span>
                            <p>
                        </li>
                        <li>
                            <p class=MsoNormal style='text-align:justify'> 
                                <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                    <!-- <strong> -->
                                    <font face="Times New Roman" style="line-height: 1.5em">
                                        dan Biaya Lain - lain yang akan diatur kemudian
                                    </font>	
                                    <!-- </strong> -->
                                </span>
                            <p>
                        </li>
                    </ol>
            </li>  
            <li>
                <p class=MsoNormal style='text-align:justify'> 
                    <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                        <font face="Times New Roman" style="line-height: 1.5em">
                            Mematuhi segala peraturan yang berlaku di Universitas PGRI Argopuro Jember, diantaranya : 
                        </font>	
                    </span>
                <p>
                    <ol type="a">
                        <li>
                            <p class=MsoNormal style='text-align:justify'> 
                                <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                    <!-- <strong> -->
                                    <font face="Times New Roman" style="line-height: 1.5em">
                                        Mahasiswa yang diusulkan Beasiswa adalah mahasiswa yang memenuhi persyaratan usulan beasiswa. Penetapan sebagai penerima beasiswa bukan menjadi kewenangan dari Universitas PGRI Argopuro Jember;
                                    </font>	
                                    <!-- </strong> -->
                                </span>
                            <p>
                        </li>
                        <li>
                            <p class=MsoNormal style='text-align:justify'> 
                                <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                    <!-- <strong> -->
                                    <font face="Times New Roman" style="line-height: 1.5em">
                                        Mahasiswa Penerima Beasiswa :
                                    </font>	
                                    <!-- </strong> -->
                                </span>
                            <p>
                                <ol type="i">
                                    <li>
                                        <p class=MsoNormal style='text-align:justify'> 
                                            <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                                <!-- <strong> -->
                                                <font face="Times New Roman" style="line-height: 1.5em">
                                                    Tidak megundurkan diri sebagai Mahasiswa dengan alasan apapun kecuali : Sakit yang mewajibkan untuk perawatan <i>Intensif</i> (Surat Dokter dan Rumah Sakit yang berwenang), Meninggal Dunia, Bencana Alam <i>(Force Majeur);</i>
                                                </font>	
                                                <!-- </strong> -->
                                            </span>
                                        <p>
                                    </li>
                                    <li>
                                        <p class=MsoNormal style='text-align:justify'> 
                                            <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                                <!-- <strong> -->
                                                <font face="Times New Roman" style="line-height: 1.5em">
                                                    Wajib mempertahankan Index Prestasi Semester minimal 3,00 s.d lulus;</i>
                                                </font>	
                                                <!-- </strong> -->
                                            </span>
                                        <p>
                                    </li>
									<li>
                                        <p class=MsoNormal style='text-align:justify'> 
                                            <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                                <!-- <strong> -->
                                                <font face="Times New Roman" style="line-height: 1.5em">
                                                    Tidak pindah Program Studi selama menjadi mahasiswa;</i>
                                                </font>	
                                                <!-- </strong> -->
                                            </span>
                                        <p>
                                    </li>
									<li>
                                        <p class=MsoNormal style='text-align:justify'> 
                                            <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                                <!-- <strong> -->
                                                <font face="Times New Roman" style="line-height: 1.5em">
                                                    Tidak melanggar etika akademik;</i>
                                                </font>	
                                                <!-- </strong> -->
                                            </span>
                                        <p>
                                    </li>
									<li>
                                        <p class=MsoNormal style='text-align:justify'> 
                                            <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                                                <!-- <strong> -->
                                                <font face="Times New Roman" style="line-height: 1.5em">
                                                    Apabila tidak mematuhi peraturan/ketentuan sebagaimana tersebut diatas, siap dikenakan sanksi akademik/perdata/ dan pidana, sesuai ketentuan hukung yang berlaku.</i>
                                                </font>	
                                                <!-- </strong> -->
                                            </span>
                                        <p>
                                    </li>
                                </ol>
                        </li>
                    </ol>
                </li>
				<li>
                    <p class=MsoNormal style='text-align:justify'> 
                        <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                        <!-- <strong> -->
                        <font face="Times New Roman" style="line-height: 1.5em">
                            Bersedia menyerahkan Berkas dan Persyaratan Pendaftaran Mahasiswa Baru maupun Persyaratan Program Beasiswa;</i>
                        </font>	
                        <!-- </strong> -->
                        </span>
                    <p>
                </li>
				<li>
                    <p class=MsoNormal style='text-align:justify'> 
                        <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                        <!-- <strong> -->
                        <font face="Times New Roman" style="line-height: 1.5em">
                            Apabila tidak ditetapkan sebagai Penerima Beasiswa, saya akan :</i>
                        </font>	
                        <!-- </strong> -->
                        </span>
                    <p>
					<table class=MsoNormalTable border=2 cellspacing=0 cellpadding=0 width=0
					style='width:100%;margin-left:auto;margin-right:auto;border-collapse:collapse;border:none'>
					<tr>
						<td width="90">
							<p class=MsoNormal style='text-align:center'><span lang=EN-GB
								style='font-size:12.0pt'>
								<font face="Times New Roman">
									<b> Mengundurkan diri sebagai mahasiswa</b>
								</font>
							</span></p>
						</td>
						<td width="90">
						<p class=MsoNormal style='text-align:center'><span lang=EN-GB
							style='font-size:12.0pt'>
							<font face="Times New Roman">
									<b> Melanjutkan Kuliah </b>
							</font>
						</span></p>
						</td>
					</tr>
					</table>
					<p class=MsoNormal style='text-align:justify'> 
                        <span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                        <!-- <strong> -->
                        <font face="Times New Roman" style="line-height: 1.5em">
                            <i>*pilih/coret salah satu</i>
                        </font>	
                        <!-- </strong> -->
                        </span>
					</p>
                </li>
            </ol>

	<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
			<p class=MsoNormal style='text-align:justify'> 
	 	 		<span lang=EN-GB style='font-size:12.0pt;font-family:"Times New Roman",sans-serif, line-height: 1.5em'>	
                <!-- <strong> -->
                    <font face="Times New Roman" style="line-height: 1.5em">
                	    Surat pernyataan ini saya buat dengan sebenar - benarnya dan penuh kesadaran, tanpa paksaan dan tekanan dari pihak manapun.
                    </font>	
                <!-- </strong> -->
                </span>
			</p>
            
			<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
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
							Yang Menyatakan,
						</font>
					</span></p>
				</td>
			</tr>
		</table>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal style='margin-left: 470px;text-align:justify'>
			<span lang=EN-GB
			style='font-size: 9.0pt'>
				<font face="Times New Roman">
					<i>Materai 10.000</i>
				</font>
			</span>
		</p>
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
	</div>

</body>

</html>
