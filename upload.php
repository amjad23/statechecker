<?php

//initialize boolean
$checkinitialstate = false;
$checkfinalstate = false;
$checkstate = false;
$checkstatename = false;
$checkinitialstatename = false;
$checkfinalstatename = false;
$checkgeneraltransition = false;
$checkfrom = false;                                        
$checkto = false;



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
                                    // echo $child5['type']." ";

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

//////////////////////////////////////////////////////////////////////////////////////////


//check for elements name
//state name absent
if($checkstatename == true){
    echo "state name is absent ";
}

//initial state name absent
if($checkinitialstatename == true){
    echo "initial state name is absent ";
}

//final state name absent
if($checkfinalstatename == true){
    echo "final state name is absent ";
}

//////////////////////////////////////////////////////////////////////////////////////////

//check for general transition
if($checkgeneraltransition == true){
    echo "general transition is exist ";
}

//////////////////////////////////////////////////////////////////////////////////////////

//check general transtion from and to
if(($checkfrom == true)||($checkto == true)){
    echo "connectivity is not complete";
}
?>