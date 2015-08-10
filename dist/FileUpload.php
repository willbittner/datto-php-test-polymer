
<?php

	 $target_dir = "uploaded/";
	 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	 $uploadOk = 1;
	 $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
	 if (isset($_POST["submit"])) {
		 if ($_FILES["fileToUpload"]["size"] > 10) {
			 echo "Upload is ok";
			 $uploadOk = 1;
		 } else {

			 $uploadOk = 0;
		 }
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
		 if ($uploadOk == 0) {
			 echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
		 } else {
			 if ($_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK               //checks for errors
				 && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])
			 ) { //checks that file is uploaded
				 //echo file_get_contents($_FILES['fileToUpload']['tmp_name']);
				 $fcontents = file_get_contents($_FILES['fileToUpload']['tmp_name']);
				 $cleanContents = preg_replace('[:punct:]', '', $fcontents);

				 $words = explode(' ', $cleanContents);
				 $highLetter = '';
				 $highLetterCount = 0;
				 $highword = '';


				 foreach ($words as $wrd) {

					 // split into letters
					 // echo "A word" + $wrd;
					 $letterCount = array();
					 $letters = str_split($wrd);
					 foreach ($letters as $let) {
						 $letterCount->
						 $letterCount[$let] += 1;
						 if ($let != ' ') {


							 if ($letterCount[$let] > $highLetterCount) {

								 $highLetterCount = $letterCount[$let];
								 $highLetter = $let;
								 $highword = $wrd;
								 //	echo( "New leader!! :   $let ");
							 }
							 //		echo ("Letter:  $let   has count:  $letterCount[$let]");
						 }
					 }


				 }
				 echo("Most Freq Letter:  $highLetter   has count: $highLetterCount the word $highword");
			 }
			 // findBest($_FILES['uploadedfile']['tmp_name']);
		 }


	 }





?>
