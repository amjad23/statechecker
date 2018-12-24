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

//initialize empty array
$listitem = [];


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
                                    }

                                    //check final state is present
                                    if($child5['type'] == "final-state"){
                                        $checkfinalstate = true;
                                    }

                                    //check state is present
                                    if($child5['type'] == "state"){
                                        $checkstate = true;
                                    }

                                    //check composite-state
                                    if($child5['type'] == "composite-state" ){
                                        $checkcompositestate = true;
                                    }

                                    //check decision
                                    if($child5['type'] == "decision" ){
                                        $checkdecision = true;
                                    }

                                    //////////////////////////////////////////////////////////////////////////////////////////

                                    //check state name
                                    if($child5['name'] == null){
                                        $checkstatename = true;
                                    }

                                    //check initialstatename
                                    if($child5['name'] == null){
                                        $checkinitialstatename = true;
                                    }

                                    //check finalstatename
                                    if($child5['name'] == null){
                                        $checkfinalstatename = true;
                                    }

                                    //check composite state name
                                    if($child5['name'] == null){
                                        $checkcompositestatename = true;
                                    }

                                    //check decision name
                                    if($child5['name'] == null){
                                        $checkdecisionname = true;
                                    }

                                    

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
                                    if($child5['type'] == "general-transition"){
                                        if(($child5['initial-state'] == null)|| ($child5['final-state'] == ""){
                                            $checkinitialexist = true;
                                            $checkfinalexist = true;
                                        }
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
                                                echo " TRANSITION NAME : ".$child7;
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
    echo "initial state is present ";
}
//final state present
if($checkfinalstate == true){
    echo "final state is present ";
}
//state present
if($checkstate == true){
    echo "state is present ";
}

//check for general transition
if($checkgeneraltransition == true){
    echo "general transition is present ";
}

//composite state
if($checkcompositestate == true){
    echo "composite state is present";
}

//decision
if($checkdecision == true){
    echo "decision is present";
}

//output transition present
if($checktransition == true){
    echo "transition is present ";
    }

//transition

//////////////////////////////////////////////////////////////////////////////////////////


//check for elements name
//state name absent
if($checkstatename == true){
    echo "state name is absent ";
}else{
    echo "state name is available";
}

//initial state name absent
if($checkinitialstatename == true){
    echo "initial state name is absent ";
}else{
    echo "initial state name is available";
}

//final state name absent
if($checkfinalstatename == true){
    echo "final state name is absent ";
}else{
    echo "final state name is available";
}

//general transition name absent
if($checkgeneraltransitionname == true){
    echo "general transition name is absent";
}else{
    echo "general transition name is available";
}

//composite state name absent
if($checkcompositestatename == true){
    echo "composite state name is absent";
}else{
    echo "composite state name is available";
}

//decison name
if($checkdecision == true){
    echo "decision name is absent";
}else{
    echo "decision name is absent";
}

//output transition name
if($checktransitionname == true){
echo "transition name is present ";
}




//////////////////////////////////////////////////////////////////////////////////////////

//check general transtion from and to
if(($checkfrom == true)||($checkto == true)){
    echo "connectivity is not complete";
}

//////////////////////////////////////////////////////////////////////////////////////////


//list array type and name
$arraylength = count($listitem);

for($x = 0; $x < $arraylength; $x++) {
    $array2lentgh = count($listitem[$x]);
    for($y = 0; $y < $array2lentgh; $y++){
        if($y == 0){
            echo " this item type is ".$listitem[$x][$y];
        }elseif($y == 1){
            echo " this item name is ".$listitem[$x][$y];
        // }if($checkgeneraltransitionname == true){
        //     echo "general transition name is absent";
        // }
        } 
    }
    echo "<br>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>lol</h1> 
</body>
</html>