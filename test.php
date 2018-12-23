<?php
					  $reader = new XMLReader();
					  
					  $doc = new DOMDocument;
					  
					  // read file external xml file...
					  if (!$reader->open("state.simp")) {
						  die("Failed to open 'user-data.xml'");
					  }
						
						$i = 1;
					  // reading xml data...
					  while($reader->read()) {
						if ($reader->nodeType == XMLReader::ELEMENT){
							$node = simplexml_import_dom($doc->importNode($reader->expand(), true));
							
							if (($reader ->name == 'abstract-items') && (!($reader->isEmptyElement))){
								$item = array();
								
									echo "success";

									
										echo $reader->readInnerXml();
									

								
							}
							
							

							
		
						
						  
									
						// 		echo "<pre>";
						// 		echo "success";
						// 	   //get employee join date
						// // 	   echo $address = $reader->getAttribute('joindate')."<br/>";   
					  // //  // get username
						// // 	  echo $node->username."<br/>";
					  // //  // get employee id
					  // //  echo $node->empid."<br/>";
					  // //  // get employee age
					  // //  echo $node->age."<br/>";
					  // //  //get employee salary 
						
						// 	echo $node->item."<br/>";
						
					  //  echo "</pre>";
						  
						 }
					  }
					  $reader->close();
            ?>
