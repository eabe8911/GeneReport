<?php

/**
 * Check if the uploaded file is a PDF and move it to the uploads directory.
 *
 * @param array $FILES The $_FILES array containing information about the uploaded file.
 * @throws Exception If the file cannot be moved or its properties cannot be changed.
 */
function CheckPDF($FILES)
{
    try {
        if ($FILES['ReportUploadPDF']['error'] == 0) {
            $pdf_name = $FILES['ReportUploadPDF']['name'];
            $pdf_tmp_name = $FILES['ReportUploadPDF']['tmp_name'];
            $pdf_size = $FILES['ReportUploadPDF']['size'];
            $pdf_type = $FILES['ReportUploadPDF']['type'];
            // Change file name to ReportID.pdf
            $pdf_name = $_POST['ReportID'] . ".pdf";
            $ReportID = $_POST["ReportID"];
            $dirName = "./uploads/" . $ReportID;
            if (!file_exists($dirName)) {
                mkdir($dirName, 0777, true);
                chmod($dirName, 0777); // Create directory if it does not exist
            }

            move_uploaded_file($pdf_tmp_name, $dirName . '/' . $pdf_name);
            exec("chown libobioadmin . $dirName ." . '/' . $pdf_name); // Change file owner to libobioadmin
            exec("chmod 777 . $dirName ." . '/' . $pdf_name); // Change file mode to 777
            return $pdf_name;
        }
        return false;
    } catch (Exception $th) {
        throw new Exception("檔案無法更改屬性，請通知資訊處處理。" . $th->getMessage(), 1);
    }
}
?>