        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $menu1; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> <?php echo $menu1; ?>
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
                        <a href="<?php echo site_url('pool/tambah_pool')?>" class="btn btn-primary"><?php echo $btn_add; ?></a>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                    	<th>No</th>
                                        <th><?php echo $field1; ?></th>
                                        <th><?php echo $field_is_active; ?></th>
                                        <th><?php echo $field_action; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach( $result as $r ){ ?>
                                    <tr>
                                    	<td><?php echo $no; ?></td>
                                        <td><a href="<?php echo site_url('question/index/'.$r['id'])?>"><?php echo $r['pool_name']; ?></a></td>
                                        <td>
                                        	<?php 
                                        		if( $r['is_active'] == 1 ) echo $is_active_yes;
                                        		else echo $is_active_no; 
                                        	?>
                                        </td>
                                        <td>
                                        	<a href="<?php echo site_url('question/index/'.$r['id'])?>" class="btn btn-success"><?php echo $menu2; ?></a>
                                            <a href="<?php echo site_url('pool/edit_pool/'.$r['id'])?>" class="btn btn-warning"><?php echo $btn_edit; ?></a>
                                            <a href="<?php echo site_url('pool/hapus_pool/'.$r['id'])?>" onClick="return confirm('<?php echo $delete_msg; ?>')" class="btn btn-danger"><?php echo $btn_delete; ?></a>
                                        </td>
                                    </tr>
                                    <?php 
			            			$no++;
			            		} ?>
                                </tbody>
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
