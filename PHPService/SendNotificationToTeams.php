<?php
function sendNotificationToTeams($Action, $message = "test message from Report System")
{
//     $WebHookURL = "";
//     switch ($Action) {
//         case 'ADD':
//             // $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/053f4f706c7a45f9bafe5788c3a2bdbf/1c799440-63aa-4898-be3c-b003ef085c56";
//             $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/88c2c2915c654cc4ba72a3a4d49102fb/76ee434a-cec5-419a-bedb-b6c58c4ece96";
//             break;
//         case 'EDIT':
//             // $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/053f4f706c7a45f9bafe5788c3a2bdbf/1c799440-63aa-4898-be3c-b003ef085c56";
//             $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/023bf5ab255544fda981b8563f18850a/76ee434a-cec5-419a-bedb-b6c58c4ece96";
//             break;
//         case 'DELETE':
//             // $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/053f4f706c7a45f9bafe5788c3a2bdbf/1c799440-63aa-4898-be3c-b003ef085c56";
//             $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/023bf5ab255544fda981b8563f18850a/76ee434a-cec5-419a-bedb-b6c58c4ece96";
//             break;
//         case 'APPROVED':
//             // $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/b97660804d36459fb53919e87664bf77/1c799440-63aa-4898-be3c-b003ef085c56";
//             $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/862ab2487f9e4923b54c0cacec75547f/76ee434a-cec5-419a-bedb-b6c58c4ece96";
//             break;
//         case 'REJECT':
//             // $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/b97660804d36459fb53919e87664bf77/1c799440-63aa-4898-be3c-b003ef085c56";
//             $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/862ab2487f9e4923b54c0cacec75547f/76ee434a-cec5-419a-bedb-b6c58c4ece96";
//             break;
//         case 'SENDEMAIL':
//             $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/2ea97839-e1d2-4c98-b158-56fff95adb5d@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/80355e05baa84ad6979ccd15c092f1c0/1c799440-63aa-4898-be3c-b003ef085c56";
//             break;
//         // case 'TEST':
//         //     $WebHookURL = "https://libobio0.webhook.office.com/webhookb2/bf38d417-e5e2-4520-9340-c75e45864fa1@5303bff1-a523-4d20-92ec-e1f1f0f62e61/IncomingWebhook/9a6af9f5cd194ddf8f8cba20b1f2a639/76ee434a-cec5-419a-bedb-b6c58c4ece96";
//         //     break;
//     }
//     $payload = [
//         'text' => $message
//     ];
//     $payloadJson = json_encode($payload);
//     $ch = curl_init($WebHookURL);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadJson);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, [
//         'Content-Type: application/json',
//         'Content-Length: ' . strlen($payloadJson)
//     ]);

//     $result = curl_exec($ch);
//     curl_close($ch);

//     return $result;
}
?>