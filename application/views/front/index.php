	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3><?php echo $page; ?></h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<div class="container mtb">
	 	<div class="row">
	 	
	 			<div class="row">
                    <div class="col-lg-12">
                        <?php
					   		$flashdata = $this->session->flashdata('message');
							if( !empty( $flashdata ) ) echo $flashdata;
			            ?>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <?php if( $result != "" ){ ?>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                   	<th><?php echo $menu2; ?></th>
                                    <th><?php echo $menu7; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach( $result as $r ){ ?>
                            	<tr>
                                   	<th><?php echo $r['question']; ?></th>
                                    <th><?php echo $r['answer']; ?></th>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.row -->
	 	
	 		<! -- SIDEBAR -->
	 		<div class="col-lg-12">
		 		<h4><?php echo $category; ?></h4>
		 		<div class="hline"></div>
		 			<?php foreach($pool as $p){ ?>
			 		<p><a href="<?php echo site_url('pooling/pool/'.$p['id']); ?>"><i class="fa fa-angle-right"></i> <?php echo $p['pool_name']?></a> <span class="badge badge-theme pull-right"><?php echo $jml[$p['id']]?></span></p>
			 		<?php } ?>

		 		<div class="spacing"></div>
		 		
	 		</div>
	 	</div><! --/row -->
	 </div><! --/container -->