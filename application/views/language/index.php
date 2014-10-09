        <script type="text/javascript">
        	$(function(){
            	$('#language').change(function(){
					window.location = '<?php echo base_url()?>language/index/'+$('#language').val();
            	});
            	$('#add-bahasa').click(function(){
					$('#input-bahasa').slideToggle();
					return false;
            	});
        	});
		</script>

        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $menu6; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> <?php echo $menu6; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php
					   		$flashdata = $this->session->flashdata('message');
							if( !empty( $flashdata ) ) echo $flashdata;
			            ?>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-lg-12">
                    	<span><?php echo $menu6; ?> : </span>
                    	<select id="language" class="form-control" style="max-width: 400px;display:inline;">
                    		<option value="">---</option>
                    		<?php foreach( $bahasa as $b ){ ?>
                    		<option value="<?php echo $b; ?>"<?php if( $b == $bahasa_s ) echo ' selected="selected"';?>><?php echo $b; ?></option>
                    		<?php } ?>
                    	</select>
                        <a href="#" id="add-bahasa" class="btn btn-primary"><?php echo $btn_add.' '.$menu6; ?></a>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row" id="input-bahasa" style="margin-bottom:10px;display:none;">
                    <div class="col-lg-12">
                    	<span><?php echo $btn_add.' '.$menu6; ?> : </span>
                    	<form method="post" action="<?php echo site_url('language/simpan_bahasa')?>">
	                    	<input type = "text" name="bahasa" class="form-control" style="max-width: 500px;display:inline;" autocomplete="off" />
    	                    <button type="submit" class="btn btn-primary"><?php echo $btn_submit; ?></button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                    	<th>
                                    		<ul>
	                                    	<?php foreach( $file as $f ){ ?>
	                                    		<li><a href="<?php echo site_url('language/edit_file/'.$bahasa_s.'/'.$f); ?>"><?php echo $f; ?></a></li>
	                                    	<?php } ?>
	                                    	</ul>
                                    	</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
