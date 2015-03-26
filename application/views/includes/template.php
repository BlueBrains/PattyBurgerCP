<?php $this->load->view('includes/header.php');  ?>

	<?php $this->load->view('includes/sidebar.php');  ?>
	 <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">
<?php $this->load->view($main_content);  ?>
	
                    </div>
                </div>

            




            </div>




        </div>
       <!--END PAGE CONTENT -->

<?php $this->load->view('includes/footer.php');  ?>