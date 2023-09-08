<?php

namespace App\Http\Controllers;

use App\Http\Traits\MessageTrait;
use App\Models\Media;
use App\Models\Template;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class CampaignController extends Controller
{
    use MessageTrait;
    public function index()
    {
        return view('pages.campaign.index');
    }
    public function create()
    {
        $template = Template::orderBy('id', 'DESC')->get();
        return view('pages.campaign.create', compact(['template']));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        /*  $datafile = $request->file('csv_file');
        if ($datafile) {
            $fName = Carbon::now()->format('Ymdhsu') . '.' . $datafile->getClientOriginalExtension();
            $datafile->move(public_path('contact/csv/'), $fName);
        }

        $contacts = (new FastExcel)->import(public_path('contact/csv/').$fName); */

        /*  foreach($contacts as $contact)
        {
            //text/reaction/image/document/audio/video/template
            $this->send_message('template',"+918400700004",)
        } */
        $fileurl = $request->file_url;
        $fileurl = 'https://images.shiksha.com/mediadata/images/1638945231phpMHtTJQ_1280x960.jpg';


        $response = $this->send_template_message("+918400700004", $fileurl, $request->format_value_of_text, $request->template_name);
        if ($response->messages[0]->id) {
            dd($response->messages[0]->id);
        } else {
            dd($response);
        }
    }
    public function message()
    {
        
       $extension= pathinfo('https://dl.espressif.com/dl/audio/ff-16b-2c-44100hz.mp3', PATHINFO_EXTENSION);
     //  $response= $this->send_message('text', "+918400700004", 'https://images.shiksha.com/mediadata/images/1638945231phpMHtTJQ_1280x960.jpg', "hi, how r you");
      // $response= $this->send_message('video', "+918400700004", 'https://whatsapp-media-library.s3.ap-south-1.amazonaws.com/VIDEO/6462161727d8012f03aadb0e/8483960_Task1Video.mp4', null);
       //$response= $this->send_message('document', "+918400700004", 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf', null);
      $response= $this->send_message('audio', "+918400700004", 'https://dl.espressif.com/dl/audio/ff-16b-2c-44100hz.mp3', null);
       dd( $response);
    }
}
