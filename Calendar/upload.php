<?php
	session_start();
?>
<?php
$userid = $_SESSION['users_id'];

if (isset($_POST['submit'])) {

    $newFileName = $_POST['filename'];
    // If the filename input is left empty give it a standard name
    if (empty($newFileName)) {
        $newFileName = "gallery";
    // replace spaces to dashes and transform all letters to lowecase if existant in filename
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];
    $siteLink = $_POST['filelink'];
    $doorid = $_POST['doorid'];

    $file = $_FILES['file'];

    // print_r $file to see what we get on form submission

    // Declaring form submission response for later error handling
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    // Exploding the filename to get the last part after the .
    $fileExt = explode(".", $fileName);
    // lowercasing the extension
    $fileActualExt = strtolower(end($fileExt));

    // Declaring which filetypes are allowed to upload
    $allowed = array("jpg", "jpeg", "png");

    // Checking for errors and handling them
       if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000) {
                // Declaring a unique filename for each uploaded image
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                // Declaring where the file will get stored
                $fileDestination = "uploads/" . $imageFullName;

                // Connecting to the database
                include_once "dbcon.php";

                // Checking if input fields are empty
                if (empty($imageTitle) || empty($imageDesc)) {
                    header("Location: index.php?upload=empty");
                    exit();
                } else {
                    // Inserting data from the image into the database
                    $sql = "INSERT INTO content (titleContent, descContent, linkContent, imgNameContent, calendarUsers_id, calendarDoors_idCalendarDoors) VALUES (?, ?, ?, ?, ?, ?);";
                    if (!$stmt = $link->prepare($sql)) {
                        echo "SQL statement failed!";
                    } else {
                        $stmt->bind_param("ssssii", $imageTitle, $imageDesc, $siteLink, $imageFullName, $userid, $doorid);
                        $stmt->execute();

                        // Uploading image to server
                        move_uploaded_file($fileTempName, $fileDestination);

                        header("Location: index.php?upload=success");
                    }
                }
            } else {
                echo "Billedets størrelse er for stort!";
                exit();
            }
        } else {
            echo "Der opstod en fejl, prøv venligst igen!";
            exit();          
        }
    } else {
        echo "Denne filtype er ikke understøttet. De understøttede filtyper er: jpg, jpeg samt png";
        exit();
    }

}