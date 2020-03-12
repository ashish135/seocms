<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>CRM for SEO</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="<?php echo e(asset("assets/stylesheets/styles.css")); ?>" />

	
</head>
<body>
	<?php echo $__env->yieldContent('body'); ?>
	<script src="<?php echo e(asset("assets/scripts/frontend.js")); ?>" type="text/javascript"></script>
	     

        <script type="text/javascript">
          $('.edit-category').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var url = "<?php echo e(url('category')); ?>/" + id;

            $('#editCategoryModal form').attr('action', url);
            $('#editCategoryModal form input[name="name"]').val(name);
          });
        </script>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/multi-input.js')); ?>" defer></script>

    <script type="text/javascript">
  $("select[name='Main_Category']").change(function(){
      var id_country = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('select-ajax') ?>",
          method: 'POST',
          data: {id_country:id_country, _token:token},
          success: function(data) {
            $("select[name='Sub_Category'").html('');
            $("select[name='Sub_Category'").html(data.options);
          }
      });
  });
</script>
<script type="text/javascript">
    $(".btn-submit").click(function(e){

        e.preventDefault();
        var taskname = $("input[name=task]").val();

        var taskdiscription = $("input[name=tskdescription]").val();

        var leads_id = $("input[name=leads_id]").val();

        var target_date = $("input[name=tdate]").val();

        var status = $("select[name=status]").val();

        var users_id = $("select[name=users_id]").val();



        $.ajax({

           type:'POST',

           url:'/ajaxRequest',

           data:{taskname:taskname, taskdiscription:taskdiscription, leads_id:leads_id , target_date:target_date , status:status , users_id:users_id , "_token": "<?php echo e(csrf_token()); ?>"   },

           success:function(data){

              $("input[name=task]").val('');

              $("input[name=tskdescription]").val('');

              $("input[name=leads_id]").val('');

              $("input[name=tdate]").val('');

              $("select[name=status]").val('');

              $("select[name=users_id]").val('');
             
              $(".success-msg").css("display", "block");
           }

        });



  });

</script>

<script type="text/javascript">
    $(".btn-submit-note").click(function(e){

        e.preventDefault();
        var note = $("textarea[name=note]").val();
        var leads_id = $("input[name=leads_id]").val();
        var users_id = $("select[name=users_id]").val();



        $.ajax({

           type:'POST',

           url:'/ajaxRequestnote',

           data:{note:note, leads_id:leads_id , users_id:users_id , "_token": "<?php echo e(csrf_token()); ?>"   },

           success:function(data){

              $("input[name=task]").val('');
              $("input[name=leads_id]").val('');
              $("select[name=users_id]").val('');
             
              $(".success-msg").css("display", "block");
           }

        });



  });

</script>
<?php echo $__env->yieldContent('footerscript'); ?>
</body>
</html><?php /**PATH /home/atom/Ashish/seocms/resources/views/superadmin/layouts/plane.blade.php ENDPATH**/ ?>