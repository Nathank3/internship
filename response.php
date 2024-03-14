	<?php
   if(!empty($_GET['response_code'])){
					 if($_GET['response_code'] == 1) { 


					  ?>
						 <!-- alert success message  -->

				  <script>
				    swal("Makueni Assembly", "<?php echo($_GET['payload']) ?>", "success", {
				      button: "ok",
				 
				    });
				  </script>


					<?php
				        }elseif($_GET['response_code'] == 2) {

	       ?>

	       <!-- error script -->
				  <script>
				    swal("Makueni Assembly Says", "<?php echo($_GET['payload']) ?>", "error", {
				      button: "OK",
				 
				    });
				  </script>

    

    <?php 

        }
      }

  ?>