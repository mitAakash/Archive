<?php

namespace App\Http\Traits;

use App\Models\Template;
use App\Models\TemplateAction;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

trait MessageTrait
{

    function create_template($data)
    {
        $body = [];
        $body['name'] = $data['name'];
        $body['language'] = $data['language'];
        $body['category'] = $data['category'];
        $body['components'] = [];
        if (!empty($data['msg_header'])) {
            $totla_variable = substr_count($data['format'], '{{', 1, strlen($data['format']) - 1);

            $example = [];
            if ($totla_variable >= 1) {
                $example = ["header_text" => array("Summer Sale")];
                $header = ["type" => "HEADER", "format" => "TEXT", "text" => $data['msg_header'], "example" => $example];
            } else {
                $header = ["type" => "HEADER", "format" => "TEXT", "text" => $data['msg_header']];
            }
            array_push($body['components'], $header);
        } else if ($data['type'] == "IMAGE" || $data['type'] == "DOCUMENT" || $data['type'] == "VIDEO" || $data['type'] == "LOCATION") {
            $header = ["type" => "HEADER", "format" => $data['type']];
            array_push($body['components'], $header);
        }
        $totla_variable = 0;
        $totla_variable = substr_count($data['format'], '{{', 1, strlen($data['format']) - 1);
        $example = [];
        if ($totla_variable >= 1) {
            $example = ["body_text" => array($this->getsample_data($totla_variable))];
            $body_text = ["type" => "BODY", "text" => $data['format'], "example" => $example];
        } else {
            $body_text = ["type" => "BODY", "text" => $data['format']];
        }
        array_push($body['components'],  $body_text);
        if (!empty($data['msg_footer'])) {
            $footer = ["type" => "FOOTER",  "text" => $data['msg_footer']];
            array_push($body['components'], $footer);
        }

        if (($data['template_action'] == "Call to Actions") || ($data['template_action'] == "Quick Replies")) {
            $buttons = [];
            if ($data['template_action'] == 'Call to Actions') {
                $count = count($data['action_type']);
                for ($i = 0; $i < $count; $i++) {

                    $temp = ['type' => $data['action_type'][$i], 'text' => $data['button_title'][$i], strtolower($data['action_type'][$i]) => $data['button_value'][$i]];
                    array_push($buttons, $temp);
                }
            } else {
                $count = count($data['quick_reply']);

                for ($i = 0; $i < $count; $i++) {
                    $temp = ['type' => "QUICK_REPLY", 'text' => $data['quick_reply'][$i]];
                    array_push($buttons, $temp);
                }
            }


            $button = ['type' => "BUTTONS", "buttons" => $buttons];
            array_push($body['components'], $button);
        }

        $send_data = json_encode($body);

        try {
            $token = config('wb.token');
            $url = config('wb.url') . config('wb.wb_id') . "/message_templates";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>  $send_data,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $token
                ),
            ));

            $response = json_decode(curl_exec($curl));
            curl_close($curl);
            return $response;
        } catch (Exception $e) {
            return $e;
        }
    }
    function getsample_data($records)
    {
        $data = ["Summer Sale", 'the end of August', '25%', '25OFF', 'Welcome', 'John Doe', '50%', 'Winter Sale'];
        $sample = [];
        for ($i = 0; $i < $records; ++$i) {
            array_push($sample, $data[array_rand($data)]);
        }
        return $sample;
    }

    function get_template()
    {
        try {
            $token = config('wb.token');
            $url = config('wb.url') . config('wb.wb_id') . "/message_templates";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $token
                ),
            ));

            $response = json_decode(curl_exec($curl), true);
            curl_close($curl);
            return $response;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function send_message($message_type, $number, $fileurl, $msg)
    {
        try {
            //text/reaction/image/document/audio/video/template
            $body = [];
            $body['messaging_product'] = "whatsapp";
            $body['recipient_type'] = "individual";
            $body['type'] = $message_type;
            $body['to'] = $number;
            if ($message_type == "text") {
                $body['text'] = ['preview_url' => false, 'body' => $msg];
            } else if ($message_type == "reaction") {
                $body['reaction'] = ['message_id' => false, 'emoji' => $msg];
            } else if ($message_type == "image" || $message_type == "document" || $message_type == "audio" || $message_type == "video") {
                $body[$message_type] = ['link' => $fileurl];
            }
            $send_data = json_encode($body);
            return $this->message_curl($send_data);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function send_template_message($number, $fileurl, $parameter, $template_id)
    {
        try {
            $body = [];
            $body['messaging_product'] = "whatsapp";
            $body['recipient_type'] = "individual";
            $body['type'] = 'template';
            $body['to'] = $number;
            $template = Template::find($template_id);
            if ($template->type == 'IMAGE' || $template->type == 'DOCUMENT' || $template->type == 'VIDEO' || $template->type == 'VIDEO' || $template->type == 'LOCATION') {
                $header = ["type" => "header", "parameters" => array(array("type" => strtolower($template->type), strtolower($template->type) => ["link" => $fileurl]))];
                if (count($parameter) > 0) {
                    $data = array();
                    foreach ($parameter as $param) {
                        $tmp = array("type" => "text", "text" => $param);
                        array_push($data, $tmp);
                    }
                    $msgbody = ["type" => "body", "parameters" => $data];
                }

                $body['template'] = ["name" => $template->name, "language" => ["code" => $template->language], "components" => [$header, $msgbody]];
            } else if ($template->type == 'TEXT') {
                if (count($parameter) > 0) {
                    $data = array();
                    foreach ($parameter as $param) {
                        $tmp = array("type" => "text", "text" => $param);
                        array_push($data, $tmp);
                    }
                    $msgbody = ["type" => "body", "parameters" => $data];
                    $body['template'] = ["name" => $template->name, "language" => ["code" => $template->language], "components" => [$msgbody]];
                } else {
                    $body['template'] = ["name" => $template->name, "language" => ["code" => $template->language]];
                }
            }

            $send_data = json_encode($body);
            return $this->message_curl($send_data);
        } catch (Exception $e) {

            return $e;
        }
    }
    public function message_curl($data)
    {
        $token = config('wb.token');
        $url = config('wb.url') . config('wb.phone_id') . "/messages";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>  $data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ),
        ));
        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return $response;
    }
    
}
