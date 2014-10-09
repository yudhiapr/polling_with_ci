        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $aksi.' '.$menu1; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> <?php echo $menu1; ?> / <?php echo $aksi; ?>
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
                                    <label for="pool_name"><?php echo $field1; ?></label>
                                    <input class="form-control" id="pool_name" autocomplete="off" type="text" name="pool_name" placeholder="<?php $field1; ?>" value="<?php echo $pool_name; ?>" />
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
