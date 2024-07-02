<?php include('header.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <div id="page">
           <!-- <?php include ('nav_sidebar.php');?> -->
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
							

                    </div>
                    <div id="body">








                        <h3>Frequently Asked Question</h3>
                        <div class="hero-unit-table">
										<div id="accordion">
	<h3>What is the mode of payment uses in this site ?</h3>
	<div><li style = "color:red;"> You can pay on whatsapp or you can do cash on delivery.</li> </div>
	<h3>Do you offer eco-friendly packaging ?</h3>
	<div>Yes, we are committed to sustainability and use eco-friendly packaging for our products to reduce environmental impact. </div>
	<h3> Is my personal information secure? </li> </h3>
	<div><li style = "color:red;">Yes, we prioritize your privacy and security. Our website uses advanced encryption technologies to protect your personal and payment information.</li></div>
	<h3>Do you offer discount?</h3>
	<div><li style = "color:red;">Yes absolutely but only seasonal.
	</li></div>
</div>
                            
                        </div>
                    </div>
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('footer_bottom.php');
    ?>
	
	
	
	<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.js"></script>
<script>

$( "#accordion" ).accordion();



var availableTags = [
	"ActionScript",
	"AppleScript",
	"Asp",
	"BASIC",
	"C",
	"C++",
	"Clojure",
	"COBOL",
	"ColdFusion",
	"Erlang",
	"Fortran",
	"Groovy",
	"Haskell",
	"Java",
	"JavaScript",
	"Lisp",
	"Perl",
	"PHP",
	"Python",
	"Ruby",
	"Scala",
	"Scheme"
];
$( "#autocomplete" ).autocomplete({
	source: availableTags
});



$( "#button" ).button();
$( "#radioset" ).buttonset();



$( "#tabs" ).tabs();



$( "#dialog" ).dialog({
	autoOpen: false,
	width: 400,
	buttons: [
		{
			text: "Ok",
			click: function() {
				$( this ).dialog( "close" );
			}
		},
		{
			text: "Cancel",
			click: function() {
				$( this ).dialog( "close" );
			}
		}
	]
});

// Link to open the dialog
$( "#dialog-link" ).click(function( event ) {
	$( "#dialog" ).dialog( "open" );
	event.preventDefault();
});



$( "#datepicker" ).datepicker({
	inline: true
});



$( "#slider" ).slider({
	range: true,
	values: [ 17, 67 ]
});



$( "#progressbar" ).progressbar({
	value: 20
});



$( "#spinner" ).spinner();



$( "#menu" ).menu();



$( "#tooltip" ).tooltip();



$( "#selectmenu" ).selectmenu();


// Hover states on the static widgets
$( "#dialog-link, #icons li" ).hover(
	function() {
		$( this ).addClass( "ui-state-hover" );
	},
	function() {
		$( this ).removeClass( "ui-state-hover" );
	}
);
</script>
</body>
</html>