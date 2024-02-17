<?php
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../class/Report.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ReportSignature
{
    private $_conn;
    private $_errorMessage;
    private $_Message;
    private $_SignatureInfo = [];
    private $_SignaturePos1 = [];
    private $_SignaturePos2 = [];

    /**
     * Add signature to PDF file
     * @param $reportInfo: report info
     * @param $TemplateInfo: template info
     * @param $userPermission: user permission
     * @return void
     */
    function AddSignature($reportInfo, $UserInfo, $PDFFileName)
    {
        $report = new Report();
        $TemplateID = $reportInfo['TemplateID'];
        $TemplateInfo = $report->getTemplateInfo($TemplateID);
        // if user is Medical Examiner then check if report permission include user permission
        switch ($UserInfo['permission']) {
            case '1': // Operator
                throw new Exception("Permission denied1", 1);
            case '2': // Medical Examiner
                if ($TemplateInfo['Approve'] == 1 || $TemplateInfo['Approve'] == 2) {
                    $this->AddSignature3($reportInfo, $TemplateInfo, $UserInfo, '1', $PDFFileName);
                } else {
                    throw new Exception("Permission denied2", 2);
                }
                break;
            case '3': // Doctor
                if ($TemplateInfo['Approve'] == 2) {
                    $this->AddSignature3($reportInfo, $TemplateInfo, $UserInfo, '2', $PDFFileName);
                } else {
                    throw new Exception("此份報告不須醫師簽核3", 3);
                }
                break;
            case '4': // Admin
                throw new Exception("Permission denied4", 4);
            default:
                throw new Exception("Permission denied5", 5);
        }
    }

    function RemoveSignature($Permission, $PDFFile)
    {
        switch ($Permission) {
            case '2':
                $this->RemoveSignature1($PDFFile);
                break;
            case '3':
                // RemoveSignature2($PDFFile);
                break;
            default:
                break;
        }
    }
    function AddSignature1($ReportInfo, $TemplateInfo, $UserInfo)
    {
        // try {
        //     $now = date('Y-m-d');
        //     $PDFFile = __DIR__ . "/../uploads/" . $ReportInfo['FileName'];
        //     // read singature image file from signature folder
        //     $SigFile = $UserInfo['SignatureFile'];
        //     $Pos = explode(',', $TemplateInfo['POS1']);
        //     $SignatureFile = __DIR__ . "/../signature/" . $SigFile;
        //     $mpdf = new Mpdf([
        //         'mode' => 'utf-8',
        //         'format' => 'A4',
        //         'use_cache' => false,
        //         'showImageErrors' => true
        //     ]);
        //     // Import the existing PDF
        //     $pageCount = $mpdf->SetSourceFile($PDFFile);
        //     // Add a new page
        //     $mpdf->AddPage();

        //     for ($i = 1; $i <= $pageCount; $i++) {
        //         // Import a page from the existing PDF
        //         $template = $mpdf->ImportPage($i);

        //         // Add the imported page to the new PDF
        //         $mpdf->UseTemplate($template);

        //         // Add an image to the new page (adjust the coordinates and size as needed)
        //         if ($i == $TemplateInfo['SignaturePage']) { // Add image only to the first page, for example
        //             $mpdf->Image($SignatureFile, $Pos[0], $Pos[1], 0, 0, 'png', '', true, false);
        //             $mpdf->WriteText($Pos[0] + 36, $Pos[1] + 12, $now); // parameters can be adjusted for text position
        //         }

        //         // Add a new page to the new PDF if there are more pages in the existing PDF
        //         if ($i < $pageCount) {
        //             $mpdf->AddPage();
        //         }
        //     }
        //     // Output the new PDF
        //     $mpdf->Output($PDFFile, 'F');
        // } catch (Exception $th) {
        //     throw new Exception("檔案格式有問題，請勿使用壓縮格式，請重新上傳報告" . $th->getMessage(), 1);
        // }
    }

    function AddSignature2($ReportInfo, $TemplateInfo, $UserInfo)
    {
        // try {
        //     $now = date('Y-m-d');
        //     $PDFFile = __DIR__ . "/../uploads/" . $ReportInfo['FileName'];
        //     // read singature image file from signature folder
        //     $SigFile = $UserInfo['SignatureFile'];
        //     $Pos = explode(',', $TemplateInfo['POS2']);
        //     $SignatureFile = __DIR__ . "/../signature/" . $SigFile;
        //     // $mpdf = new Mpdf([
        //     //     'mode' => 'utf-8',
        //     //     'format' => 'A4',
        //     //     'use_cache' => false,
        //     //     'showImageErrors' => true
        //     // ]);
        //     $mpdf = new Mpdf();
        //     // Import the existing PDF
        //     $pageCount = $mpdf->SetSourceFile($PDFFile);
        //     // Add a new page
        //     $mpdf->AddPage();

        //     for ($i = 1; $i <= $pageCount; $i++) {
        //         // Import a page from the existing PDF
        //         $template = $mpdf->ImportPage($i);

        //         // Add the imported page to the new PDF
        //         $mpdf->UseTemplate($template);

        //         // Add an image to the new page (adjust the coordinates and size as needed)
        //         if ($i == $TemplateInfo['SignaturePage']) { // Add image only to the first page, for example
        //             $mpdf->Image($SignatureFile, $Pos[0], $Pos[1], 0, 0, 'png', '', true, false);
        //             $mpdf->WriteText($Pos[0] + 36, $Pos[1] + 12, $now); // parameters can be adjusted for text position
        //         }

        //         // Add a new page to the new PDF if there are more pages in the existing PDF
        //         if ($i < $pageCount) {
        //             $mpdf->AddPage();
        //         }
        //     }
        //     // Output the new PDF
        //     $mpdf->Output($PDFFile, 'F');
        // } catch (Exception $th) {

        //     throw new Exception("檔案格式有問題，請勿使用壓縮格式，請重新上傳報告" . $th->getMessage(), 1);
        // }
    }

    // low down PDF version to 1.4
    function LowDownPDFVersion($PDFFile)
    {
        // if ($handle = opendir("c:/temp_in/")) {
        //     while (false !== ($file = readdir($handle))) {
        //         if ('.' === $file)
        //             continue;
        //         if ('..' === $file)
        //             continue;

        //         $result = shell_exec('"C:\Program Files\gs\gs9.27\bin\gswin64c" -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dBATCH -sOutputFile="c:\temp_done\\' . $file . '" "c:\temp_in\\' . $file . '" 2>&1');
        //         echo $result;
        //     }
        //     closedir($handle);
        // }
    }
    //實際簽核
    function AddSignature3($ReportInfo, $TemplateInfo, $UserInfo, $Role, $PDFFileName)
    {
        try {
            $now = date('Y-m-d');
            // $UpdateFile = __DIR__ . "/../uploads/" . $PDFFileName;
            $UpdateFile = __DIR__ . "/../uploads/"  . $ReportInfo['ReportID'] . "/" . $PDFFileName;
            // $PDFFile = __DIR__ . "/../uploads/" . $ReportInfo['FileName'];
            $PDFFile = __DIR__ . "/../uploads/" . $ReportInfo['ReportID'] . "/" . $ReportInfo['FileName'];
            // read singature image file from signature folder
            $SigFile = $UserInfo['SignatureFile'];
            // If the user is a medical examiner, use the signature file of the medical examiner
            // If the user is a doctor, use the signature file of the doctor
            switch ($Role) {
                case '2':
                    $Pos = explode(',', $TemplateInfo['POS2']);
                    break;
                case '1':
                    $Pos = explode(',', $TemplateInfo['POS1']);
                    break;
                default:
                    break;
            }
            $Size = explode(',', $UserInfo['SignatureSize']);
            $SignaturePos = array_merge($Pos, $Size);
            $SignatureFile = __DIR__ . "/../signature/" . $SigFile;
            $PageNumber = $TemplateInfo['SignaturePage'];

            // call web service to add signature
            if ($this->CallWebService($PDFFile, $SignatureFile, $SignaturePos, $PageNumber, $now, $UpdateFile)) {
                return true;
            } else {
                throw new Exception("報告簽核失敗，請重新簽核", 1);
            }
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }

    /**
     * Call the web service to add a signature image to a PDF file
     */
    function CallWebService($pdfPath, $signaturePath, $position, $PageNumber, $date, $UpdateFileName)
    {
        try {
            // Read $pdfPath
            $pdf = file_get_contents($pdfPath);
            // Convert $pdf to base64
            $pdfBase64 = base64_encode($pdf);
            // Read $signaturePath
            $signature = file_get_contents($signaturePath);
            // Convert $signature to base64
            $signatureBase64 = base64_encode($signature);
            $token = 'libobio_token';
            // Call web service Tina本機端測試 'http://192.168.2.121:5000'  正式環境改回'http://flask-api:5000'
            $client = new Client(['base_uri' => 'http://192.168.2.101:5000']);
            $data = [
                'pdf_file' => $pdfBase64,
                'signature_image' => $signatureBase64,
                'X' => $position[0],
                'Y' => $position[1],
                'W' => $position[2],
                'H' => $position[3],
                'page_number' => $PageNumber,
                'date' => $date,
            ];
            $response = $client->post('/', [
                'json' => $data,
            ]);

            $body = $response->getBody();
            $contents = $body->getContents();
            $contents = json_decode($contents, true);
            // Convert $contents to PDF file
            $contents = base64_decode($contents['pdf_file']);
            // Save $contents to $pdfPath
            file_put_contents($UpdateFileName, $contents);
        } catch (RequestException | Exception $e) {
            throw new Exception($e->getResponse()->getBody(), $e->getResponse()->getStatusCode());
        }
        return true;
    }

    function testCallWebService()
    {
        $ch = curl_init();

        $data = array(
            'key1' => 'value1',
            'key2' => 'value2'
        );

        curl_setopt($ch, CURLOPT_URL, "http://localhost:5000");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $output = curl_exec($ch);

        if ($output === FALSE) {
            echo "cURL Error: " . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }

    function AddSignature4($ReportInfo, $TemplateInfo, $UserInfo)
    {
        try {
            $now = date('Y-m-d');
            $PDFFile = __DIR__ . "/../uploads/" . $ReportInfo['FileName'];
            // read singature image file from signature folder
            $SigFile = $UserInfo['SignatureFile'];
            $Pos = explode(',', $TemplateInfo['POS2']);
            $Size = explode(',', $UserInfo['SignatureSize']);
            $SignaturePos = array_merge($Pos, $Size);
            $SignatureFile = __DIR__ . "/../signature/" . $SigFile;
            $PageNumber = $TemplateInfo['SignaturePage'];
            // create new pdf document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->AddPage();
            $pdf->setPage($PageNumber, true);
            $pdf->Image($SignatureFile, $Pos[0], $Pos[1], 0, 0, 'png', '', true, false);
            $pdf->Text($Pos[0] + 36, $Pos[1] + 12, $now); // parameters can be adjusted for text position
            $pdf->Output($PDFFile, 'F');
        } catch (Exception $th) {
            throw new Exception("檔案格式有問題，請勿使用壓縮格式，請重新上傳報告" . $th->getMessage(), 1);
        }
    }
    function rmdir_recursive($dir)
    {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file)
                continue;
            if (is_dir("$dir/$file"))
                $this->rmdir_recursive("$dir/$file");
            else
                unlink("$dir/$file");
        }
        rmdir($dir);
    }
    function RemoveSignature1($PDFFile)
    {
        // $pdf = new Mpdf();
        // $pdfContent = file_get_contents($PDFFile);
        // $pdf->WriteHTML($pdfContent);

        // $pageCount = $pdf->getPageCount();

        // for ($i = 1; $i <= $pageCount; $i++) {
        //     $pdf->setPage($i);
        //     // code to remove image from the page
        // }

        // $images = $pdf->findImage('image.png');

        // foreach ($images as $image) {
        //     $pdf->DeletePages($image['p']);
        // }

        // $pdf->Output('new.pdf', 'F');
    }

    /**
     * @return mixed
     */
    public function get_SignatureInfo()
    {
        return $this->_SignatureInfo;
    }
}