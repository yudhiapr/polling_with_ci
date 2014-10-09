        <script>
				$(function(){
					var cek = '<?php echo $cek_username; ?>';
					
					$('#simpan').submit(function(){
						var nama		= $('#nama').val();
						var username	= $('#username').val();
						var password	= $('#password').val();
						var last_pass	= $('#last_password').val();

						if( nama == "" ){
							alert('<?php echo $field1.$msg_error1; ?>');
							return false;
						}else if( username == "" ){
							alert('<?php echo $field2.$msg_error1; ?>');
							return false;
						}else if( password == "" && last_pass == "" ){
							alert('<?php echo $field3.$msg_error1; ?>');
							return false;
						}else{
							if( cek == 'true' ){
								return true;
							}else{
								alert('<?php echo $field2.$msg_error2; ?>');
								return false;
							}
						}
					});
					
					$('#username').keyup(function(){
						$.ajax({
							type: 'POST',
							url: "<?php echo site_url('user/cek_username'); ?>/"+$(this).val(),
							success: function(msg){
								cek = msg;
							}			
						});
					});
				});
			</script>
			
        <div id="page-wrapper" style="min-height: 750px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $aksi.' '.$menu3; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <?php echo $menu3; ?> / <?php echo $aksi; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" id="simpan" method="post" action="<?php echo $aksi_post; ?>">

                            <fieldset>

                                <div class="form-group">
                                    <label for="nama"><?php echo $field1; ?></label>
                                    <input class="form-control" id="nama" autocomplete="off" type="text" name="nama" placeholder="<?php $field1; ?>" value="<?php echo $nama; ?>" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="username"><?php echo $field2; ?></label>
                                    <input class="form-control" id="username"<?php echo $readonly; ?> autocomplete="off" type="text" name="username" placeholder="<?php $field2; ?>" value="<?php echo $username; ?>" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="password"><?php echo $field3; ?></label>
                                    <input class="form-control" id="password" autocomplete="off" type="password" name="password" placeholder="<?php $field3; ?>" />
                                    <div style="font-size: 12px;margin-bottom:10px;"><?php echo $alert; ?></span>
                                    <input type="hidden" name="last_password" id="last_password" value="<?php echo $password; ?>" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="level"><?php echo $field4; ?></label>
                                    <select id="level" name="level" class="form-control">
                                        <option value="admin"<?php if( $level == "admin" ) echo ' selected="selected"'; ?>>admin</option>
                                        <option value="manager"<?php if( $level == "manager" ) echo ' selected="selected"'; ?>>manager</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bahasa"><?php echo $menu6; ?></label>
                                    <select id="bahasa" name="bahasa" class="form-control">
                                    	<?php foreach($language as $b ){ ?>
                                        <option value="<?php echo $b; ?>"<?php if( $bahasa == $b ) echo ' selected="selected"'; ?>><?php echo $b;?></option>
                                        <?php } ?>
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
