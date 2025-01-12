<?php


namespace App\Libraries;

use CodeIgniter\I18n\Time;

class Api
{
     public function getData()
     {
          $username = env('usernameFastPrint');

          $now = Time::now();
          $password = 'bisacoding-' . $now->format('d-m-y');
          $md5 = md5($password);

          $curl = curl_init();

          curl_setopt_array($curl, array(
               CURLOPT_URL => 'https://recruitment.fastprint.co.id/tes/api_tes_programmer',
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => '',
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 0,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => 'POST',
               CURLOPT_POSTFIELDS => array('username' => $username, 'password' => $md5),
               CURLOPT_HTTPHEADER => array(
                    'Cookie: ci_session=o7evjkqhk4u19hsnupoaan7u7l5lhpvt'
               ),
          ));

          $response = curl_exec($curl);

          if (curl_errno($curl)) {
               return 'Curl error: ' . curl_error($curl);
          }

          curl_close($curl);
          return $response;
     }
}
