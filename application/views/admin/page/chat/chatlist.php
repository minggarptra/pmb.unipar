<?php
$count = count($data);

for ($i=0; $i < $count ; $i++) {
?>
<div class="user mb-20">
	<li class="item ">
		<a  data="<?php echo $data[$i]['pengirim'];?>" href="<?= base_url('detail-pesan') ?>/<?php echo $data[$i]['pengirim'];?>">
			<div class="product-img">
				<img src="<?= base_url('assets/upload/images/profile/') ?><?php echo $data[$i]['photo_profile'];?>"
					alt="Product Image">
			</div>
			<div class="product-info">
				<h5 id="namapengirim"><?php echo $data[$i]['name'];?></h5>

				<?php
	    $idid=$data[$i]['pengirim'];
		$query = $this->db->query("SELECT COUNT(*) AS total FROM inbox WHERE
        pengirim ='$idid'  AND STATUS = 0")->row();
		if ($query->total < 1) {
		
		}
		else{
	    ?>
				<span class="label label-success pull-right">
					<?php
	
	                echo $query->total.' Belum dibaca';
	        ?>
				</span>
				<?php } ?>


				<span class="product-description">
					<?php foreach ($last_msg as  $value) { 
                    if ($value['pengirim'] == $data[$i]['pengirim']) {
                        echo $value['waktu'];
                    }
                    elseif($value['penerima'] == $data[$i]['pengirim']){
                        echo 'Anda :'. $value['waktu'];

                    }
		    }?>
				</span>
			</div>
		</a>
	</li>
</div>
<?php } ?>
