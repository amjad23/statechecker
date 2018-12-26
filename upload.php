<?php

//initialize boolean
$checkinitialstate = false;
$checkfinalstate = false;
$checkstate = false;
$checkgeneraltransition = false;
$checkcompositestate = false;
$checkdecision = false;
$checktransition = false;

$checkstatename = false;
$checkinitialstatename = false;
$checkfinalstatename = false;
$checkcompositestatename = false;
$checkgeneraltransitionname = false;
$checkdecisionname = false;
$checktransitionname = false;

$checkfrom = false;                                        
$checkto = false;
$checkinitialexist = false;
$checkfinalexist = false;
$checkinitial2exist = false;
$checkfinal2exist = false;

//initialize empty array
$listitem = [];
$transitioname = [];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$_FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = ($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is compatible - ";
        $uploadOk = 1;
    } else {
        echo "File is not compatible.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($_FileType != "simp" && $_FileType != "xml" ) {
    echo "Sorry, only SIMP, & XML files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$smp = "uploads/".$_FILES["fileToUpload"]["name"];
// echo $smp;
$xml=simplexml_load_file($smp);
// print_r($xml);
foreach ($xml->children() as $child)
{
    if($child->getName() == "models"){
        foreach ($child->children() as $child2){
            if($child2->getName() == "model"){
                foreach ($child2->children() as $child3){
                    if($child3->getName() == "diagram"){
                        foreach ($child3->children() as $child4){
                            if($child4->getname() == "abstract-items"){
                                foreach ($child4->children() as $child5){

                                    

                                    //array list type and name
                                    $arraytopush = array($child5['type'],$child5['name']);
                                    array_push($listitem,$arraytopush);


                                    //check if initial-state is presenet
                                    if($child5['type'] == "initial-state"){
                                        $checkinitialstate = true;
                                         //check initialstatename
                                         if($child5['name'] == ""){
                                            $checkinitialstatename = true;
                                        }
                                    }

                                    //check final state is present
                                    if($child5['type'] == "final-state"){
                                        $checkfinalstate = true;
                                        //check finalstatename
                                    if($child5['name'] == ""){
                                        $checkfinalstatename = true;
                                    }
                                    }

                                    //check state is present
                                    if($child5['type'] == "state"){
                                        $checkstate = true;
                                        //check state name
                                        if($child5['name'] == ""){
                                            $checkstatename = true;
                                        }
                                    }

                                    //check composite-state
                                    if($child5['type'] == "composite-state" ){
                                        $checkcompositestate = true;
                                        //check composite state name
                                    if($child5['name'] == ""){
                                        $checkcompositestatename = true;
                                    }
                                    }

                                    //check decision
                                    if($child5['type'] == "decision" ){
                                        $checkdecision = true;
                                        //check decision name
                                    if($child5['name'] == ""){
                                        $checkdecisionname = true;
                                    }
                                    }

                                    //check general transition 
                                    if($child['type'] == "general-transition"){
                                        $checkgeneraltransition = true;
                                        //check general transition name
                                    if($child5['name'] == ""){
                                        $checkgeneraltransitionname = true;
                                    }    
                                    }

                                    //////////////////////////////////////////////////////////////////////////////////////////
                                    

                                    //////////////////////////////////////////////////////////////////////////////////////////

                                    //check general transition connectivity
                                    if($child5['type'] == "general-transition"){
                                        $checkgeneraltransition = true;
                                    }

                                    //////////////////////////////////////////////////////////////////////////////////////////

                                    //check general transition from and to
                                    if($child5['type'] == "general-transition"){
                                        if(($child5['from'] == "")||($child5['to'] == "")){
                                            $checkfrom = true;
                                            $checkto = true;
                                        }
                                    }

                                    //check initial and final state
                                       
                                        if($child5['name'] == "InitialState1"){
                                            $checkinitialexist = true;
                                        }

                                        if($child5['name'] == "FinalState1"){                                        
                                            $checkfinalexist = true;
                                    }

                                    //substate initial and final state
                                    if($child5['name'] == "InitialState2"){
                                        $checkinitial2exist = true;
                                    }

                                    if($child5['name'] == "FinalState2"){                                        
                                        $checkfinal2exist = true;
                                }
                                

                                    //get name for transition
                                    foreach($child5->children() as $child6){
                                        if($child6->getname() == "transition"){
                                            foreach($child6->children() as $child7){
                                            
                                            //check for transition
                                            if($child6['type'] == "transition"){
                                              $checktransition = true;
                                            }
                                            
                                            //check transitionname
                                            if($child6['transition'] == ""){
                                                $checktransitionname = true;
                                            }
                                                array_push($transitioname,$child7);

                                            }
                                        }
                                    }

                                    }
                                }

                                }


                            }
                        }
                    }
                }
            }
        }
    


//output for element structure
//initial state present
if($checkinitialstate == true){
    // echo "initial state is present ";
}else{
    // echo " Your diagram should have initial state.";
}
//final state present
if($checkfinalstate == true){
    // echo "final state is present ";
}
//state present
if($checkstate == true){
    // echo "state is present ";
}

//check for general transition
if($checkgeneraltransition == true){
    // echo "general transition is present ";
}

//composite state
if($checkcompositestate == true){
    // echo "composite state is present";
}

//decision
if($checkdecision == true){
    // echo "decision is present";
}

//output transition present
if($checktransition == true){
    // echo "transition is present ";
    }

//transition

//////////////////////////////////////////////////////////////////////////////////////////


//check for elements name
//state name absent
if($checkstatename == true){
    // echo "state name is absent ";
}else{
    // echo "state name is available";
}

//initial state name absent
if($checkinitialstatename == true){
    // echo "initial state name is absent ";
}else{
    // echo "initial state name is available";
}

//final state name absent
if($checkfinalstatename == true){
    // echo "final state name is absent ";
}else{
    // echo "final state name is available";
}

//general transition name absent
if($checkgeneraltransitionname == true){
    // echo "general transition name is absent";
}else{
    // echo "general transition name is available";
}

//composite state name absent
if($checkcompositestatename == true){
    // echo "composite state name is absent";
}else{
    // echo "composite state name is available";
}

//decison name
if($checkdecision == true){
    // echo "decision name is absent";
}else{
    // echo "decision name is available";
}

//output transition name
if($checktransitionname == true){
// echo "transition name is present ";
}




//////////////////////////////////////////////////////////////////////////////////////////

//check general transtion from and to
if(($checkfrom == true)||($checkto == true)){
    // echo "connectivity is not complete";
}else{
    // echo "connectivity is complete";
}

//check final and initial
// echo "\n initial state is ".$checkinitialexist;

// echo "\n final state is ".$checkfinalexist;

if(($checkinitialexist == false)||($checkfinalexist == false)){
    // echo "initial or final state is not exist";
}else{
    // echo "initial and final state exists ";
}

// echo "\n initial state is ".$checkinitial2exist;

// echo "\n final state is ".$checkfinal2exist;

if(($checkinitial2exist == false)||($checkfinal2exist == false)){
    // echo "initial or final in sub-state is not exist";
}else{
    // echo "initial and final in sub-state exists ";
}


//////////////////////////////////////////////////////////////////////////////////////////


//list array type and name
$arraylength = count($listitem);

for($x = 0; $x < $arraylength; $x++) {
    $array2lentgh = count($listitem[$x]);
    for($y = 0; $y < $array2lentgh; $y++){
        if($y == 0){
            // echo " this item type is ".$listitem[$x][$y];
        }elseif($y == 1){
            // echo " this item name is ".$listitem[$x][$y];
        } 
    }
    // echo "<br>";
}

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
                            <li><a href="uploadfile.php">FILE UPLOAD</a></li>
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
                    <h2>Check Your State Machine Diagram</h2>
                </header>

                <div class="row gtr-150">
                    <div class="col-4 col-12-medium">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <h3>Check Elements Existence</h3>
                                <p>Output shown shows the elements should
                                    exist in a State Machine Diagram.
                                </p>
                            </section>
                        </section>
                    </div>

                    <div class="col-8 col-12-medium imp-medium">
                        <!-- Content -->
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="" rows="3"><?php
                                        //initial state present
if($checkinitialstate == true){
    echo "initial state is present \n";
}else{
    echo "initial state is absent \n";
}
//final state present
if($checkfinalstate == true){
    echo "final state is present \n";
}else{
    echo "final state is absent \n";
}
//state present
if($checkstate == true){
    echo "state is present \n";
}else{
    echo "state is absent \n";
}

//check for general transition
if($checkgeneraltransition == true){
    echo " transition is present \n";
}else{
     echo " transition is absent \n";
}

//composite state
if($checkcompositestate == true){
    echo "composite state is present \n";
}else{
    echo "composite state is absent \n";
}

//decision
if($checkdecision == true){
    echo "decision is present \n";
}else{
    echo "decision is absent \n";
}

// // //output transition present
// // if($checktransition == true){
// //     echo "transition is present \n";
// //     }else{
// //         echo "transition is absent \n";
//     }

                                        ?></textarea>
                        </div>

                        <br>

                    </div>
                </div>

                <hr>

                <div class="row gtr-150">
                    <div class="col-4 col-12-medium">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <h3>Check Elements Name</h3>
                                <p>Output shown shows the name of each elements
                                    existed in the State Machine Diagram.
                                </p>
                            </section>
                        </section>
                    </div>

                    <div class="col-8 col-12-medium imp-medium">
                        <!-- Content -->
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="" rows="3"><?php 
//state name absent
if($checkstatename == true){
    echo "state name is absent \n";
}else{
    echo "state name is available \n";
}

//initial state name absent
if($checkinitialstatename == true){
    echo "initial state name is absent  \n";
}else{
    echo "initial state name is available  \n";
}

//final state name absent
if($checkfinalstatename == true){
    echo "final state name is absent  \n";
}else{
    echo "final state name is available  \n";
}

//general transition name absent
if($checkgeneraltransitionname == true){
    echo " transition name is absent  \n";
}else{
    echo " transition name is available  \n";
}

//composite state name absent
if($checkcompositestatename == true){
    echo "composite state name is absent  \n";
}else{
    echo "composite state name is available  \n";
}

//decison name
if($checkdecisionname == true){
    echo "decision name is absent  \n";
}else{
    echo "decision name is available  \n";
}

// // //output transition name
// if($checktransitionname == true){
// echo "transition name is absent  \n";
// }else{
//     echo "transition name is present \n";
// }

                                            ?></textarea>
                        </div>
                        <br>
                    </div>

                </div>

                <hr>

                <div class="row gtr-150">
                    <div class="col-4 col-12-medium">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <h3>Check Existence of Initial and Final State</h3>
                                <p>Initial State and Final State should exists
                                    side-by-side. If one of the elements not existed,
                                    the diagram is wrong.
                                </p>
                            </section>
                        </section>
                    </div>

                    <div class="col-8 col-12-medium imp-medium">
                        <!-- Content -->
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="" rows="3" disabled><?php
                                            
                                            if(($checkinitialexist == false)||($checkfinalexist == false)){
                                                echo "initial or final state is not exist ";
                                            }else{
                                                echo "initial and final state exists ";
                                            }
                                            echo "\n initial state : ".$checkinitialexist;
                                            
                                            echo "\n final state : ".$checkfinalexist;

                                            echo "\n";


                                            if(($checkinitial2exist == false)||($checkfinal2exist == false)){
                                                echo "initial or final state in sub-state is not exist ";
                                            }else{
                                                echo "initial and final state in sub-state exists ";
                                            }
                                                echo "\n initial state : ".$checkinitial2exist;
                                            
                                                echo "\n final state : ".$checkfinal2exist;
                                            ?></textarea>
                        </div>
                        <br>
                    </div>
                </div>

                <hr>

                <div class="row gtr-150">
                    <div class="col-4 col-12-medium">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <h3>Check Transition Name</h3>
                                <p>Output shows the transition name for
                                    each transition available in the uploaded
                                    diagram.
                                </p>
                            </section>
                        </section>
                    </div>

                    <div class="col-8 col-12-medium imp-medium">
                        <!-- Content -->
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="" rows="3"><?php

                                                foreach($transitioname as $trans){
                                                    echo $trans."\n";
                                                }if ($transitioname == ""){
                                                    echo "your transition should have event name";
                                                }

                                            ?></textarea>
                        </div>
                        <br>
                    </div>
                </div>

                <hr>

                <div class="row gtr-150">
                    <div class="col-4 col-12-medium">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <h3>Check Transition Connectivity</h3>
                                <p>Transition connectivity is checked between
                                    each phase of the state.
                                </p>
                            </section>
                        </section>
                    </div>

                    <div class="col-8 col-12-medium imp-medium">
                        <!-- Content -->
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="" rows="3"><?php
                                            //check general transtion from and to
if(($checkfrom == true)||($checkto == true)){
    echo "connectivity is not complete \n";
}else{
    echo "connectivity is complete \n";
}
                                            ?></textarea>
                        </div>
                        <br>
                    </div>
                </div>

                <hr>

                <div class="row gtr-150">
                    <div class="col-4 col-12-medium">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <h3>Overall Elements Exist For This Diagram</h3>
                                <p>The output shows the overall existing elements
                                    available in the uploaded diagram.
                                </p>
                            </section>
                        </section>
                    </div>

                    <div class="col-8 col-12-medium imp-medium">
                        <!-- Content -->
                        <div class="col-12">
                            <textarea name="message" id="message" placeholder="" rows="3"><?php
                                            $arraylength = count($listitem);

                                            for($x = 0; $x < $arraylength; $x++) {
                                                $array2lentgh = count($listitem[$x]);
                                                for($y = 0; $y < $array2lentgh; $y++){
                                                    if($y == 0){
                                                        echo " this item type is ".$listitem[$x][$y];
                                                    }elseif($y == 1){
                                                        echo " this item name is ".$listitem[$x][$y];
                                                    } 
                                                }
                                                echo "\n";
                                            }
                                            ?></textarea>
                        </div>
                        <br>
                    </div>
                </div>

                <hr>

                <div class="row gtr-150">
                    <div class="col-4 col-12-medium">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <h3>Summary For This Diagram</h3>
                                <p>The output shows the summary of existing elements
                                    available in the uploaded diagram.
                                </p>
                            </section>
										<ul class="actions fit">
											<li><a class="button fit" onclick="myFunction()">Summary</a></li>
										</ul>
                        </section>
                    </div>

                    <div class="col-8 col-12-medium imp-medium">
                        <!-- Content -->
                        <div class="col-12">
                            <textarea name="message" id="summary" placeholder="" rows="3"><?php
echo "ELEMENTS EXISTED: \n";
//initial state present
if($checkinitialstate == true){
    echo "initial state is present \n";
}else{
    echo "initial state is absent \n";
}
//final state present
if($checkfinalstate == true){
    echo "final state is present \n";
}else{
    echo "final state is absent \n";
}
//state present
if($checkstate == true){
    echo "state is present \n";
}else{
    echo "state is absent \n";
}

//check for general transition
if($checkgeneraltransition == true){
    echo " transition is present \n";
}else{
     echo " transition is absent \n";
}

//composite state
if($checkcompositestate == true){
    echo "composite state is present \n";
}else{
    echo "composite state is absent \n";
}

//decision
if($checkdecision == true){
    echo "decision is present \n";
}else{
    echo "decision is absent \n";
}

// // //output transition present
// // if($checktransition == true){
// //     echo "transition is present \n";
// //     }else{
// //         echo "transition is absent \n";
//     }

echo "\n";

//elements name existed
echo "ELEMENTS NAME EXISTED: \n";
foreach($transitioname as $trans){
    echo $trans."\n";
}if ($transitioname == ""){
    echo "your transition should have event name";
}

echo "\n";

//check initial and final state existence
echo " INITIAL OR FINAL STATE EXISTENCE: \n";
if(($checkinitialexist == false)||($checkfinalexist == false)){
    echo "initial or final state is not exist ";
}else{
    echo "initial and final state exists ";
}
echo "\n initial state : ".$checkinitialexist;

echo "\n final state : ".$checkfinalexist;

echo "\n";


if(($checkinitial2exist == false)||($checkfinal2exist == false)){
    echo "initial or final state in sub-state is not exist ";
}else{
    echo "initial and final state in sub-state exists ";
}
    echo "\n initial state : ".$checkinitial2exist;

    echo "\n final state : ".$checkfinal2exist;

    echo "\n";

    echo "\n";echo "\n";


//transition name
echo "TRANSITION NAME: \n";
foreach($transitioname as $trans){
    echo $trans."\n";
}if ($transitioname == ""){
    echo "your transition should have event name \n";
}

  echo "\n";

//check general transtion from and to
echo " CONNECTIVITY: \n";
if(($checkfrom == true)||($checkto == true)){
    echo "connectivity is not complete \n";
}else{
    echo "connectivity is complete \n";
}

 echo "\n";

 //list item
 echo "ELEMENTS IN DIAGRAM: \n";
                                            $arraylength = count($listitem);

                                            for($x = 0; $x < $arraylength; $x++) {
                                                $array2lentgh = count($listitem[$x]);
                                                for($y = 0; $y < $array2lentgh; $y++){
                                                    if($y == 0){
                                                        echo " this item type is ".$listitem[$x][$y];
                                                    }elseif($y == 1){
                                                        echo " this item name is ".$listitem[$x][$y];
                                                    } 
                                                }
                                                echo "\n";
                                            }

                                        ?></textarea>

                        </div>
                        <br>
                    </div>
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
   
</body>

</html>