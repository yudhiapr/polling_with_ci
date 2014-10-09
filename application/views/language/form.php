        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $menu6.' '.$bahasa; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> <?php echo $menu2; ?> / <?php echo $menu6.' '.$bahasa; ?> / <?php echo $file; ?>
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
                                    <textarea rows="12" class="form-control" id="isi_file" name="isi_file"><?php echo $isi_file; ?></textarea>
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