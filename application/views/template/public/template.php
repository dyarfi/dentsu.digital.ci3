<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!--link href="<?php echo base_url();?>assets/public/js/rs-plugin/css/settings.css" media="screen" rel="stylesheet"-->
	
	<link href="<?php echo base_url();?>assets/public/css/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">
	
    <!-- Fonts -->
    <link href="<?php echo base_url();?>assets/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/public/css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="<?php echo base_url();?>assets/public/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/public/color/default.css" rel="stylesheet">
	
    
	<link type="text/css" href="<?=base_url();?>assets/public/js/jquery.jqplot.1.0.8/jquery.jqplot.min.css" rel="stylesheet" media="all" />

	
    
	<script type="text/javascript">
		var base_URL = '<?php echo base_url();?>';
	</script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	
	<div id="wrapper">
		
			<?php $this->load->view('template/public/header'); ?>
	
			<div id="navigation">
				<?php $this->load->view('template/public/navigation'); ?>
			</div>
		
			<div id="main">
				<div class="messageFlash">
					<?php $this->load->view('flashdata'); ?>
				</div>
				<div class="content">
					<?php $this->load->view($main); ?>
				</div>
			</div>
	
	<?php $this->load->view('template/public/footer'); ?>
		
	</div>    
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	
	<!-- Core JavaScript Files -->
    <script src="<?php echo base_url();?>assets/public/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/public/js/gmap3.min.js"></script>
	<!--<script src="<?php echo base_url();?>assets/public/js/jquery-ui/jquery-ui.min.js"></script>-->
	
    <script src="<?php echo base_url();?>assets/public/js/jquery.fancybox.pack.js"></script>
    
	<script src="<?php echo base_url();?>assets/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/public/js/jquery.easing.min.js"></script>	
	<script src="<?php echo base_url();?>assets/public/js/jquery.scrollTo.js"></script>
	<script src="<?php echo base_url();?>assets/public/js/wow.min.js"></script>
	
	<!--<script src="<?php echo base_url();?>assets/public/js/jquery.vide.min.js"></script>-->
	<script src="<?php echo base_url();?>assets/public/js/parallax.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/imagesloaded.pkgd.min.js"></script>
	
	<!--script src="<?php echo base_url();?>assets/public/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
	<script src="<?php echo base_url();?>assets/public/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script-->
	
    <script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.jqplot.1.0.8/jquery.jqplot.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.jqplot.1.0.8/plugins/jqplot.pieRenderer.min.js"></script>
	
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.jqplot.1.0.8/plugins/jqplot.json2.min.js"></script>
	
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/circle-progress.js"></script>
    
    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/public/js/custom.js"></script>
    <script>
    $(document).ready(function() {
      <?php 
        // Write the javascript inline in the controller
        echo ($js_inline) ? "\t".$js_inline."\n" : "";
      ?>
      
        $('.col-md-6 .alert.alert-danger').fadeIn('slow');

        /*
         * Example 2:
         *   - default gradient
         *   - listening to `circle-animation-progress` event and display the animation progress: from 0 to 100%
         */
        $('.second.circle').circleProgress({
          value: '<?php echo $progress == $questionnaire_count ? "1" : "0.".round($progress * 100 / $questionnaire_count)?>'
        }).on('circle-animation-progress', function(event, progress) {
          $(this).find('strong').html(parseInt(<?php echo $progress ? $progress : 0;?> * 100 / <?php echo $questionnaire_count ? $questionnaire_count : 0;?>) + '<i>%</i>');
        });


        jQuery.jqplot.config.enablePlugins = true;
        
        $('#index_quest').change(function() {      

              var inti = new Array();
              inti.push([0, 0, 0]);
              var plot2 = $.jqplot('chart2', inti, null);
              plot2.destroy();

              var quest_id   = $(this).val();
              var quest_text = $('option:selected').attr('data-rel');
              
              if (quest_id) {
              // Our ajax data renderer which here retrieves a text file.
              // it could contact any source and pull data, however.
              // The options argument isn't used in this renderer.
                var ajaxDataRenderer = function(url, plot, options) {
                var ret = null;
                $.ajax({
                  // have to use synchronous here, else the function 
                  // will return before the data is fetched
                  async: false,
                  url: url,
                  dataType:"json",
                  sortData:true,
                  success: function(data) {
                    ret = data;
                  }
                });
                return ret;
              };

              // The url for our json data
              var jsonurl = '<?php echo base_url("quest");?>/gallery/' + quest_id;

              // passing in the url string as the jqPlot data argument is a handy
              // shortcut for our renderer.  You could also have used the
              // "dataRendererOptions" option to pass in the url.
              /*
              var plot2 = $.jqplot('chart2', jsonurl,{
                title: "AJAX JSON Data Renderer",
                dataRenderer: ajaxDataRenderer,
                dataRendererOptions: {
                  unusedOptionalUrl: jsonurl
                }
              });
              */
              //jQuery.jqplot('chart2').replot();
              //var plot0 = jQuery.jqplot('chart2',jsonurl);
              //plot0.destroy();

              var plot1 = jQuery.jqplot('chart2',jsonurl,
                {
                /*
                  seriesColors: [ "#4bb2c5", "#c5b47f", "#EAA228", "#579575", "#839557", "#958c12",
                "#953579", "#4b5de4", "#d8b83f", "#ff5800", "#0085cc"],  // colors that will
                 // be assigned to the series.  If there are more series than colors, colors
                 // will wrap around and start at the beginning again.
                 */
                    title: quest_text,
                    dataRenderer: ajaxDataRenderer,            
                    grid: {
                      drawBorder: false,
                      drawGridlines: false,
                      background: '#ffffff',
                      shadow:false
                    },
                    seriesDefaults: {
                      shadow: false,
                      renderer: jQuery.jqplot.PieRenderer,
                      rendererOptions: { padding: 2, sliceMargin: 2, startAngle: -90, showDataLabels: true},
                    },
                    legend: { show:true, location: 'w', rowSpacing:2, placement:"outsideGrid", border:"0px",fontSize:'1.0em'}
                }
              );
            }
          });



    });
    </script>
</body>
</html>
<?php //echo $this->benchmark->memory_usage();?>