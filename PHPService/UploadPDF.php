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
        // if ($FILES['ReportUploadPDF']['type'] != "application/pdf") {
        //     throw new Exception("檔案格式錯誤，報告請上傳PDF檔案。", 1);
        // }
        $ReportID = $_POST["ReportID"];
        $dirName = "./uploads/" . $ReportID;
        if (!file_exists($dirName)) {
            mkdir($dirName, 0777, true);
            chmod($dirName, 0777); // Create directory if it does not exist
        }
        // switch (true) {
        //     case ($FILES['ReportUploadPDF']['error'] == 0):
        //         $pdf_name = $FILES['ReportUploadPDF']['name'];
        //         $pdf_tmp_name = $FILES['ReportUploadPDF']['tmp_name'];
        //         $pdf_size = $FILES['ReportUploadPDF']['size'];
        //         $pdf_type = $FILES['ReportUploadPDF']['type'];
        //         $pdf_name = $_POST['ReportID'] . ".pdf";
        //         $ReportID = $_POST["ReportID"];
        //         move_uploaded_file($pdf_tmp_name, $dirName . '/' . $pdf_name);
        //         exec("chown libobioadmin . $dirName ." . '/' . $pdf_name);
        //         exec("chmod 777 . $dirName ." . '/' . $pdf_name);
        //         return $pdf_name;
        //         break;
    
        //     case ($FILES['ReportApply']['error'] == 0):
        //         $apply_name = $FILES['ReportApply']['name'];
        //         $apply_tmp_name = $FILES['ReportApply']['tmp_name'];
        //         $apply_size = $FILES['ReportApply']['size'];
        //         $apply_type = $FILES['ReportApply']['type'];
        //         move_uploaded_file($apply_tmp_name, $dirName . '/' . $apply_name);
        //         exec("chown libobioadmin . $dirName ." . '/' . $apply_name);
        //         exec("chmod 777 . $dirName ." . '/' . $apply_name);
        //         return $apply_name;
        //         break;
    
        //     // case ($FILES['ReportUploadLogoPDF']['error'] == 0):
        //     //     $Logo_name = $FILES['ReportUploadLogoPDF']['name'];
        //     //     $Logo_tmp_name = $FILES['ReportUploadLogoPDF']['tmp_name'];
        //     //     $Logo_size = $FILES['ReportUploadLogoPDF']['size'];
        //     //     $Logo_type = $FILES['ReportUploadLogoPDF']['type'];
        //     //     move_uploaded_file($Logo_tmp_name, $dirName . '/' . $Logo_name);
        //     //     exec("chown libobioadmin . $dirName ." . '/' . $Logo_name);
        //     //     exec("chmod 777 . $dirName ." . '/' . $Logo_name);
        //     //     return $Logo_name;
        //     //     break;
        // }

        // if ($FILES['ReportUploadPDF']['error']) {
            //申請單上傳
            if ($FILES['ReportApply']) {
            $apply_name = $FILES['ReportApply']['name'];
            $apply_tmp_name = $FILES['ReportApply']['tmp_name'];
            $apply_size = $FILES['ReportApply']['size'];
            $apply_type = $FILES['ReportApply']['type'];
            move_uploaded_file($apply_tmp_name, $dirName . '/' . $apply_name);
            exec("chown libobioadmin . $dirName ." . '/' . $apply_name); // Change file owner to libobioadmin
            exec("chmod 777 . $dirName ." . '/' . $apply_name); // Change file mode to 777
            // return $apply_name;
            }
            if ($FILES['ReportUploadPDF']) {
            $pdf_name = $FILES['ReportUploadPDF']['name'];
            $pdf_tmp_name = $FILES['ReportUploadPDF']['tmp_name'];
            $pdf_size = $FILES['ReportUploadPDF']['size'];
            $pdf_type = $FILES['ReportUploadPDF']['type'];
            // Change file name to ReportID.pdf
            $pdf_name = $_POST['ReportID'] . ".pdf";
            $ReportID = $_POST["ReportID"];


            move_uploaded_file($pdf_tmp_name, $dirName . '/' . $pdf_name);
            exec("chown libobioadmin . $dirName ." . '/' . $pdf_name); // Change file owner to libobioadmin
            exec("chmod 777 . $dirName ." . '/' . $pdf_name); // Change file mode to 777
            return $pdf_name;

        }



        // //上傳院所logo版本報告
        // if ($FILES['ReportUploadLogoPDF']['error'] == 0) {
        //     $Logo_name = $FILES['ReportUploadLogoPDF']['name'];
        //     $Logo_tmp_name = $FILES['ReportUploadLogoPDF']['tmp_name'];
        //     $Logo_size = $FILES['ReportUploadLogoPDF']['size'];
        //     $Logo_type = $FILES['ReportUploadLogoPDF']['type'];
        //     move_uploaded_file($Logo_tmp_name, $dirName . '/' . $Logo_name);
        //     exec("chown libobioadmin . $dirName ." . '/' . $Logo_name); // Change file owner to libobioadmin
        //     exec("chmod 777 . $dirName ." . '/' . $Logo_name); // Change file mode to 777
        //     return $Logo_name;
        // }

        return false;
    } catch (Exception $th) {
        throw new Exception("檔案無法更改屬性，請通知資訊處處理。" . $th->getMessage(), 1);
    }
}