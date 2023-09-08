<?php

namespace App\Http\Controllers;

use App\Http\Traits\MessageTrait;
use App\Models\Template;
use App\Models\TemplateAction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplateController extends Controller
{
    use MessageTrait;
    public function index(Request $request)
    {
        if($request->ajax())
        {
            
            $data=$this->get_template();
            return DataTables()->of($data['data'])
            ->addIndexColumn()->tojson();
        }
        return view('pages.templates.index');
    }
    public function store(Request $request)
    {
    
        $request->validate([
            'category' => 'required',
            'language' => 'required',
            'name' => 'required',
            'type' => 'required',
            'format' => 'required',
            'template_action' => 'required'
        ]);
        $response=$this->create_template($request->all());
        if (isset($response->id)) {
            $this->saverecord($request->all(),$response->id);
            return back()->with("success","Template Created");
        }
        else{
           dd( $response);
            return back()->with("error","Somthing Wrong");
        }
      
    }
    function saverecord($data,$templateid)
    {
        try {
            DB::beginTransaction();
            $template = new Template();
            $template->company_id = 1;
            $template->user_id = Auth::user()->id;
            $template->category = $data['category'];

            $template->language = $data['language'];
            $template->name = strtolower(Str::slug($data['name'], '_'));
            $template->type = $data['type'];
            $template->msg_header = $data['msg_header'];
            $template->msg_body = $data['format'];
            $template->msg_footer = $data['msg_footer'];
            $template->msg_action = $data['template_action'];
            $template->template_id = $templateid;

            if ($template->save()) {
                if ($data['template_action'] == 'Call to Actions') {
                    $count = count($data['action_type']);
                    for ($i = 0; $i < $count; $i++) {
                        $insert = new TemplateAction();
                        $insert->template_id = $template->id;
                        $insert->title = $data['button_title'][$i];
                        $insert->value = $data['button_value'][$i];
                        $insert->type = $data['action_type'][$i];
                        $insert->save();
                    }
                } elseif ($data['template_action'] == 'Quick Replies') {
                    $count = count($data['quick_reply']);
                    for ($i = 0; $i < $count; $i++) {
                        $insert = new TemplateAction();
                        $insert->template_id = $template->id;
                        $insert->title = $data['quick_reply'][$i];
                        $insert->type = "QUICK_REPLY";
                        $insert->save();
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function getTemplate(Request $request){
        $template = Template::where('user_id', Auth::user()->id)
        ->when(!empty($request->search),function($query)use($request){
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        })
        ->orderBy('id','DESC')
        ->get();

        $html = '';
        foreach ($template as $item) {
            $msgBody = $item->msg_body;
            $truncatedMsgBody = $this->truncateText($msgBody, 50);
            $html .= '<tr>
                    <div class="card my-3 on_hover_template">
                        <div class="card-body px-3">
                            <h4>'.$item->name.'</h4>
                            <p class="">'.$truncatedMsgBody.'</p>
                        </div>
                    </div>
                </tr>';
        }
        return $html;
    }

    private function truncateText($text, $length) {
        $words = explode(' ', $text);
        $truncated = implode(' ', array_slice($words, 0, $length));
        if (count($words) > $length) {
            $truncated .= '...';
        }
        return $truncated;
    }

}
