        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $menu5; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-wrench"></i> <?php echo $menu5; ?>
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
                	<form role="form" method="post" action="<?php echo site_url('setting/simpan_setting'); ?>">
                    <div class="col-lg-12">
                    	<label for="language"><?php echo $menu6; ?> : </label>
                    	<select id="language" class="form-control" name="bahasa" style="margin-bottom: 10px;">
                    		<option value="">---</option>
                    		<?php foreach( $bahasa as $b ){ ?>
                    		<option value="<?php echo $b; ?>"<?php if( $b == $isi_bahasa ) echo ' selected="selected"';?>><?php echo $b; ?></option>
                    		<?php } ?>
                    	</select>
                        <button type="submit" class="btn btn-primary"><?php echo $btn_submit; ?></button>
                    </div>
                    </form>
                </div>
                <!-- /.row -->
                                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
