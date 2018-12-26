<?php
					  
            ?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>STATE CHECKER</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">
	<div id="page-wrapper">

		<!-- Header -->
		<header id="header">
			<h1 id="logo"><a href="index.php"></a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>
						<a href="#">Menu</a>
						<ul>
							<li><a href="uploadfile.php">FIE UPLOAD</a></li>
							<li><a href="check.php">CHECK ELEMENTS</a></li>
						</ul>
					</li>
					<li><a href="elements.html">Elements</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main" class="wrapper style1">
			<div class="container">
				<header class="major">
					<h2>Upload Your File</h2>
					<p>File chosen to be upload must be in .SIMP or .XML</p>
				</header>

				<div class="row gtr-150">
					<div class="col-8 col-12-medium">

						<!-- Content -->
						<section id="content">
							<div class="col-6 col-6-medium">
								<form class="box" method="post" action="upload.php" enctype="multipart/form-data">
									<div class="box__input">
                                    <input type="file" name="fileToUpload"  id="fileToUpload">
										<input type="submit" value="Upload File" name="submit">
									</div>
									<div class="box__uploading">Uploading&hellip;</div>
									<div class="box__success">Done!</div>
									<div class="box__error">Error! <span></span>.</div>
								</form>
								<style>
									.box__dragndrop,
									.box__uploading,
									.box__success,
									.box__error {
										display: none;
                 								 }
								</style>
							</div>
						</section>
					</div>


					
				</div>

<div class="col-4 col-12-medium">
						<!-- Sidebar -->
						<section id="sidebar">
							<section>
								<h3>TUTORIAL</h3>
								<p>A quick overview and tutorial before you upload the file and how does it works</p>
							</section>
							<hr />

							<section>
							<ol style="list-style-type:square">
								<li><b>File Type</b></li>
								<p>Your file type must be in .SIMP or .XML so that the elements inside 
									them can be parsed and targeted to display as an output.
								</P>

							<hr/>

								<li><b>Where to obtain .SIMP or .XML file</b></li>
								<p>.SIMP file can only be obtained from Software Idea Modeler
									Tools which to be installed. Note that this tool can only 
									be obtained free which is in trial version and paid for the full
									version. Whereas .XML file can be obtained from any tools available
									that generates diagram via the XML parsing into an image file or folder.
								</P>

							<hr/>
							
								<li><b>State machine diagram only</b></li>
								<p>State Checker only detects accurately for State Machine Diagram only.
									While it does detects the elements in the diagram, the output would
									be incorrect.
								</P>
							
							<hr/>

								<li><b>What is displayed</b></li>
								<p>State Checker displays error which is what elements is absent, name for
									the elements and whether or not the transition is completed. Note that 
									it does not come with the recommendation on how to correct your diagram,
									rather it shows the output of what elements exist in the diagram and is
									regarded as a full analysis for your diagram.
								</P>

							<hr/>

							<li><b>Summary file</b></li>
								<p>State Checker provides a full analysis in text-based file which
									can be downloaded for the user to be saved and be used as a documentation
									for their state machine diagram.
								</P>
	

							</ol>
							</section>


							
							
								
							


							

					</div>

			</div>
		</div>

		

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


</body>

</html>