<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<style>
	page{
background-image: url("<?php echo base_url()?>uploads/default/b1.jpg");
background-size:cover;}
.page { display: none; }
.active { display: inherit; }
</style>
  </head>
  <body class="login-page">
  <?php if(isset($msg)):?>
				<center>
					<div class="alert alert-warning alert-dismissable" style="direction: rtl;margin-top: 20px;margin-bottom: -20px;width: 25%;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> تنبيه !</h4>
					البريد الالكتروني موجود مسبقا
                  </div>
				</center>
<?php endif;?>			
	
    <div class="login-box">
      <div class="login-logo">
      </div><!-- /.login-logo -->
      <div class="login-box-body" style="direction: rtl;">	
	  <hr>
        <form action="<?php echo base_url()?>rest_admin/add_worker" method="POST">
			<div class="page active">
				<p class="text-muted">1. البيانات الشخصية</p>
				  <div class="form-group has-feedback">
					<input type="text" class="form-control" name="first_name" placeholder="الاسم الأول"/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="text" class="form-control" name="last_name"  placeholder="الاسم الأخير"/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="text" class="form-control" name="mobile_num"  placeholder="رقم الهاتف النقال"/>
					<span class="glyphicon glyphicon-phone form-control-feedback"></span>
				  </div>
				  <div class="row">
					<div class="form-group" >
						<div class="col-lg-10">	
						  <select class="form-control" name="gender">
							<option value='0'>ذكر</option>
							<option value='1'>أنثى</option>
						  </select>
						</div>	
						<div class="col-lg-2">
							<label >الجنس</label>
						</div>
					</div>
					<br><br>
 				 </div>
			  </div>
			  <div class="page">
			  <p class="text-light-blue">2. بيانات الحساب</p>
				  <div class="form-group has-feedback">
					<input type="text" class="form-control" name="email" placeholder="البريد الالكتروني"/>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="password" class="form-control" name="password"  placeholder="كلمة المرور"/>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="password" class="form-control" name="rpassword"  placeholder="أعد كتابة كلمة المرور"/>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
			  </div>
			  <div class="page">
			  <p class="text-light-blue">3. موقع العمل</p>
				  <div class="row" style="width: 95%;margin-right: 10px;">
					<div class="form-group" >
						<div class="row">
							<label >الفرع الذي سيعمل به</label>
						</div>
						<div class="row">	
						  <select class="form-control" name="branch_id">
							<?php if(isset($record1)&&is_array($record1)):?>
								<?php foreach ($record1 as $rows):?>
									<option value='<?php echo $rows->id ?>'><?php echo $rows->address ?></option>
								<?php endforeach;?>
							<?php endif;?>
						  </select>
						</div>	
					</div>
					<br><br>
 				 </div>
				<div class="row" style="width: 95%;margin-right: 10px;">
					<div class="form-group" >
					<div class="row">
							<label >الشاغر الذي سيشغله</label>
						</div>
						<div class="row">	
						  <select class="form-control" name="group">
							<?php if(isset($record2)&&is_array($record2)):?>
								<?php foreach ($record2 as $rows):?>
									<option value='<?php echo $rows->id ?>'><?php echo $rows->name ?></option>
								<?php endforeach;?>
							<?php endif;?>
						  </select>
						</div>	
					</div>
					<br><br>
 				 </div>
				   <div class="row">
						<div class="col-xs-4">
							<input type="submit" class="btn btn-primary btn-block btn-flat" value="إضافة موظف" id="last_sub">
						</div>
					</div>	
			</form>
			</div>
				<div class="row" >
					<div class="col-lg-4">
					<button class="btn btn-block btn-info btn-sm" id="next">التالي</button>
					</div>
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
					<button class="btn btn-block btn-warning btn-sm" id="prev">السابق</button>
					</div>
				</div>
		<br><hr>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	<script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script>
	if($(".page.active").index() == 0)
		{
			var link = document.getElementById('prev');
			link.style.display = 'none';
			var link = document.getElementById('last_sub');
			link.style.display = 'none';
		}
$("#prev").on("click", function(){
    if($(".page.active").index() > 0)
        $(".page.active").removeClass("active").prev().addClass("active");
	if($(".page.active").index() == 0)
		{
			var link = document.getElementById('prev');
			link.style.display = 'none';
		}
	if($(".page.active").index() != $(".page").length-1)
		{
			var link = document.getElementById('next');
			link.style.display = '';
			var link = document.getElementById('last_sub');
			link.style.display = 'none';
		}	
});
$("#next").on("click", function(){
    if($(".page.active").index() < $(".page").length-1)
        $(".page.active").removeClass("active").next().addClass("active");
	if($(".page.active").index() == $(".page").length-1)
		{
			var link = document.getElementById('next');
			link.style.display = 'none';
			var link = document.getElementById('last_sub');
			link.style.display = '';
		}
			var link = document.getElementById('prev');
			link.style.display = '';
			
});
</script>
  </body>
</html>