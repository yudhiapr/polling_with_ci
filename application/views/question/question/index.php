        <script type="text/javascript">
        	$(function(){
            	$('#pool').change(function(){
					window.location = '<?php echo base_url()?>question/index/'+$('#pool').val();
            	});
        	});
		</script>
        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $menu2; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> <?php echo $menu2; ?>
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
                    	<span>Pool : </span>
                    	<select id="pool" class="form-control" style="max-width: 400px;display:inline;">
                    		<option value="">All</option>
                    		<?php foreach( $pool as $p ){ ?>
                    		<option value="<?php echo $p['id']?>"<?php if( $p['id'] == $id_pool ) echo ' selected="selected"';?>><?php echo $p['pool_name']?></option>
                    		<?php } ?>
                    	</select>
                        <a href="<?php echo site_url('question/tambah_question/'.$id_pool)?>" class="btn btn-primary"><?php echo $btn_add; ?></a>
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
                                        <th><?php echo $field2; ?></th>
                                        <th><?php echo $field3; ?></th>
                                        <th><?php echo $field_is_active; ?></th>
                                        <th><?php echo $field_action; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach( $result as $r ){ ?>
                                    <tr>
                                    	<td><?php echo $no; ?></td>
                                    	<td><?php echo $r['pool_name']; ?></td>
                                        <td><a href="<?php echo site_url('question/answer/'.$r['id'])?>"><?php echo $r['question']; ?></a></td>
                                        <td>
                                        <?php 
                                        	if( $r['pool_type'] == 1 ) echo 'Radio';
                                        	else if( $r['pool_type'] == 2 ) echo 'Checkbox';
                                        	else echo 'Textarea';
                                        ?>
                                        </td>
                                        <td>
                                        	<?php 
                                        		if( $r['is_active'] == 1 ) echo $is_active_yes;
                                        		else echo $is_active_no; 
                                        	?>
                                        </td>
                                        <td>
                                        	<a href="<?php echo site_url('question/answer/'.$r['id'])?>" class="btn btn-success"><?php echo $menu7; ?></a>
                                        	<a href="<?php echo site_url('question/edit_question/'.$r['id'])?>" class="btn btn-warning"><?php echo $btn_edit; ?></a>
                                        	<a href="<?php echo site_url('question/hapus_question/'.$r['id'])?>" onClick="return confirm('<?php echo $delete_msg; ?>')" class="btn btn-danger"><?php echo $btn_delete; ?></a>
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
