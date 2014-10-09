        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $aksi.' '.$menu2; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> <?php echo $menu2; ?> / <?php echo $aksi; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="post" action="<?php echo $aksi_post; ?>">

                            <fieldset>

                                <div class="form-group">
                                    <label for="pool_id"><?php echo $field1; ?></label>
                                    <select id="pool_id" name="id_pool" class="form-control">
                	                    <?php foreach( $pool as $p ){ ?>
		            	        		<option value="<?php echo $p['id']?>"<?php if( $p['id'] == $id_pool ) echo ' selected="selected"';?>><?php echo $p['pool_name']?></option>
        		        	    		<?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="question"><?php echo $field2; ?></label>
                                    <textarea class="form-control" id="question" name="question"><?php echo $question; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="pool_type"><?php echo $field3; ?></label>
                                    <select id="pool_type" name="pool_type" class="form-control">
                                        <option value="1"<?php if( $pool_type == 1 ) echo ' selected="selected"'; ?>>Radio</option>
                                        <option value="2"<?php if( $pool_type == 2 ) echo ' selected="selected"'; ?>>Checkbox</option>
                                        <option value="3"<?php if( $pool_type == 3 ) echo ' selected="selected"'; ?>>Textarea</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="is_active"><?php echo $field_is_active; ?></label>
                                    <select id="is_active" name="is_active" class="form-control">
                                        <option value="1"<?php if( $is_active == 1 ) echo ' selected="selected"'; ?>><?php echo $is_active_yes; ?></option>
                                        <option value="0"<?php if( $is_active == 0 ) echo ' selected="selected"'; ?>><?php echo $is_active_no; ?></option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary"><?php echo $btn_submit; ?></button>
                                <button type="reset" class="btn btn-default"><?php echo $btn_cancel; ?></button>

                            </fieldset>

                        </form>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
