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
		border-collapse: collapse !important;
		padding: 3px 10px !important;
	}

	span {
		font-size: 12px !important;
	}

	p {
		margin: 0cm;
		margin-bottom: .0001pt;
		font-size: 16px;
		font-family: "Times New Roman", serif;
		text-align: justify
	}

</style>

<body>

	<div class=WordSection1>



	<table>
		<tr >
			<td border="0px">
				<img width=100% height=101 id="Picture 2" src="<?= base_url('assets/upload/images/logo/42bf05afe17ff26c6aad559529c67a0e.jpg')  ?>">
			</td>
			<td width="410">
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


		<p class=MsoNormal align=center style='text-align:center'><b><span lang=SV
					style='font-size:10.0pt;font-family:"Calibri",sans-serif'>LAPORAN KEUANGAN PMB  </span></b></p>

		<p class=MsoNormal align=center style='text-align:center'><b><span lang=SV
					style='font-size:10.0pt;font-family:"Calibri",sans-serif'>UNIVERSITAS PGRI ARGOPURO (UNIPAR) JEMBER</span></b></p>

		<p class=MsoNormal align=center style='text-align:center'><b><span lang=SV
					style='font-size:10.0pt;font-family:"Calibri",sans-serif'>TAHUN AKADEMIK
					<?php if ($tahun == 'all') { ?>
                    <?= $tahun ?></span></b></p>
                   <?php  } else { ?>
                    <?= $tahun ?>/<?= $tahun+1 ?></span></b></p>
                    <?php }
                     ?>
                 




		<p class=MsoNormal style='text-align:justify'><i><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></i></p>
		<p class=MsoNormal style='text-align:justify'><i><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></i></p>

		<p class=MsoNormal style='text-align:justify'><b><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>Program Studi :  <?php 
					if($jurusan !== 'all'){
					$a = $this->db->get_where('jurusan',['kode' => $jurusan])->row();
					echo $a->jurusan;
					}
					else{
						echo $jurusan;
					}
					
					?> </span></b></p>

	

<p class=MsoNormal style='text-align:justify'><b><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>Filter Tanggal Awal :<?= $min ?>  
					
					 </span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span lang=SV
					style='font-size:11.0pt;font-family:"Calibri",sans-serif'>Filter Tanggal Akhir : <?= $max ?>  
					
				 </span></b></p>

		<p class=MsoNormal style='text-align:justify'><span lang=SV style='font-size:
    11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>



		<table  border="1" cellpadding="0" cellspacing="0" style="width:100%">
			<thead>
				<tr>
					<td style='font-size:10.0pt;font-family:"Calibri",sans-serif;font-weight: bold; text-align: center;' >No</td>
					<td style='font-size:10.0pt;font-family:"Calibri",sans-serif;font-weight: bold; text-align: center;' >No. Pendaftaran</td>
					<td style='font-size:10.0pt;font-family:"Calibri",sans-serif;font-weight: bold; text-align: center;' >Nama</td>
					<td style='font-size:10.0pt;font-family:"Calibri",sans-serif;font-weight: bold; text-align: center;' >Program Studi</td>
                    <td style='font-size:10.0pt;font-family:"Calibri",sans-serif;font-weight: bold; text-align: center;' >Status Pembayaran</td>
                    <td style='font-size:10.0pt;font-family:"Calibri",sans-serif;font-weight: bold; text-align: center;' >Jumlah Bayar</td>
					
				</tr>
			</thead>
			<tbody>
                <?php 
                $no= 0;
                foreach ($pendaftaran as  $value) {
                $no++;
                    ?>
				<tr>
					<td style='font-size:9.0pt;font-family:"Calibri",sans-serif'><?= $no ?></td>
					<td style='font-size:9.0pt;font-family:"Calibri",sans-serif'><?= $value->no_pendaftaran ?></td>
					<td style='font-size:9.0pt;font-family:"Calibri",sans-serif'><?=  $value->namalengkap?></td>
					<td style='font-size:9.0pt;font-family:"Calibri",sans-serif'><?= $value->nama_prodi ?></td>
					<td style='font-size:9.0pt;font-family:"Calibri",sans-serif'><?= $value->statusbayar ?></td>
					<td style='font-size:9.0pt;font-family:"Calibri",sans-serif'>Rp.<?= $value->total_all ?></td>
				</tr>
                <?php } ?>
                <tr>
					<td class="tg-0lax" colspan="5">Total </td>
					<td class="tg-0lax">Rp.<?= $uang->total_uang ?></td>
				</tr>

			</tbody>
		</table>

		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>


		
		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>
		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

		<p class=MsoNormal style='margin-left:388.0pt'><span lang=EN-GB
				style='font-size:11.0pt;font-family:"Calibri",sans-serif'>Pesawaran, <?= date('d M Y') ?></span></p>

		<p class=MsoNormal><span lang=EN-GB style='font-size:11.0pt;font-family:"Calibri",sans-serif'>&nbsp;</span></p>

	




	</div>

</body>

</html>
