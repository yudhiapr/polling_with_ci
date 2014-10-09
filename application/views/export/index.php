        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $menu4; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-table"></i> <?php echo $menu4; ?>
                            </li>
                        </ol>
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
                                        	<a href="<?php echo site_url('export/csv/'.$r['id'])?>" class="btn btn-success" target="_blank"><?php echo $menu4; ?></a>
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
