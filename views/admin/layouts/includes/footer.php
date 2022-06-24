 </div>
    </div>
    <br>
    <br>
    <br>
    <footer class="footer">
 		 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <hr>
      <center>
        <span class="text-muted"><p>Copyright &copy; <script language="JavaScript" type="text/javascript"> now = new Date
           theYear=now.getYear()
           if (theYear < 1900)
           theYear=theYear+1900
          document.write(theYear)
          </script> | <strong style="color:#004d00;">The CovidERP System</strong> | All Rights Reserved.
       </center> 
      </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    	<script type="text/javascript">
		tinymce.init({
			selector: '#myTextarea',
			height: 350,
			theme: 'modern',
			plugins: [
				'advlist autolink lists link charmap preview hr anchor pagebreak',
				'searchreplace tabfocus wordcount visualblocks fullscreen textcolor colorpicker table emoticons'
			],
			toolbar1: 'insertfile undo redo | sizeselect | fontselect |  fontsizeselect | styleselect | bold italic underline | charmap | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor template',
			fontsize_formats: "8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 19pt 18pt 24pt 36pt",
			tabfocus_elements: ":prev,:next",
			external_plugins: {"nanospell": "<?php echo base_url();?>/assets/nanospell/plugin.js"},
			nanospell_server: "php"
		});
		</script>
	<script>
    function makeAjaxCall(){
     $.ajax({
      type: "post",
      url: "<?php echo base_url(); ?>admin/notification/read_notifications",
      cache: false
     });

      $('#count').empty();

    }
    </script>
 <script>
$(document).ready(function(){
    $("#sidebar").click(function(){
        $("#sd").toggle();
    });
});
</script>
 <script>
$(document).ready(function(){
    $("#t").click(function(){
        $("#ts").toggle();
    });
});
</script>
 <script>
$(document).ready(function(){
    $("#ty").click(function(){
        $("#tyy").toggle();
    });
});
</script>

<script>
$(document).ready(function(){

$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show');
});
});

</script>
</body>
</html>