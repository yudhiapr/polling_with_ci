	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3><?php echo $page[0]['pool_name']; ?></h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<div class="container mtb">
	 	<div class="row">
	 	
	 		<form action="<?php echo site_url('pooling/simpan_pooling'); ?>" method="post">
	 		<input type="hidden" name="id_pool" value="<?php echo $id_pool; ?>" />
	 		<?php 
	 		$i = 1;
	 		foreach( $pertanyaan as $p ){ ?>
	 		<! -- SIDEBAR -->
	 		<div class="col-lg-12">
		 		<h4><?php echo $p['question']; ?></h4>
		 		<div class="hline"></div>
		 			<input type="hidden" name="pertanyaan[]" value="<?php echo $p['id']; ?>" />
		 			<?php if( $p['pool_type'] == 1 ) { ?>
				 		<?php foreach($jawaban[$p['id']] as $q){ ?>
			 			<p><input type="radio" name="isi[<?php echo $i; ?>]" value="<?php echo $q['answer'];?>" /> <label style="margin-left:5px"><?php echo $q['answer']?></label></p>
				 		<?php } ?>
			 		<?php } elseif( $p['pool_type'] == 2 ) { ?>
				 		<?php foreach($jawaban[$p['id']] as $q){ ?>
			 			<p><input type="checkbox" name="isi[<?php echo $i; ?>][]" value="<?php echo $q['answer'];?>" /> <label style="margin-left:5px"><?php echo $q['answer']?></label></p>
				 		<?php } ?>
			 		<?php }else{ ?>
			 			<p><textarea class="form-control" name="isi[<?php echo $i; ?>]" rows="5"></textarea></p>
			 		<?php } ?>

		 		<div class="spacing"></div>
		 		
	 		</div>
	 		<?php 
				$i++;
			} ?>
			<div class="col-lg-12">
		 		<div class="hline"></div>
		 			<button type="submit" class="btn btn-primary" style="margin-top:10px;"><?php echo $btn_submit; ?></button>

		 		<div class="spacing"></div>
		 		
	 		</div>
			</form>
	 	</div><! --/row -->
	 </div><! --/container -->