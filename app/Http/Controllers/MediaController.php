<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'media_name' => 'required|string|max:255',
            'media_file' => 'required|file|max:16384', // Max file size in kilobytes (16 MB)
        ]);
        $media = new Media();
        $media->name = $request->media_name;
        $dataMedia = $request->file('media_file');
        if ($dataMedia) {
            $ImgName = Carbon::now()->format('Ymdhsu') . '.' . $dataMedia->getClientOriginalExtension();
            $media->file = $ImgName;
            $dataMedia->move(public_path('images/media/'), $ImgName);
        }
        $media->link = 'images/media/' . $ImgName;
        $media->save();
        return response()->json(['message' => 'File uploaded successfully.']);
    }

    public function deleteMedia(Request $request){
        // dd($request->all(),'deleted');
        $delete = Media::find($request->media_id);
        if(!is_null($delete)){
            if($delete->link){
                $path = public_path('images/media/'.$delete->file);
                if(file_exists($path)){
                    unlink($path);
                }
            }
            $delete->delete();
            return response()->json(['message' => 'Media deleted successfully.']);
        }
        return response()->json(['message' => 'Media not found, Try again!']);
    }


    //    $mediaAll = Media::whereDate('media.created_at', '<>', Carbon::today())->get();
    public function getMedia(Request $request)
    {
        if ($request->ajax()) {
            $mediaToday = Media::whereDate('created_at', '=', Carbon::today())->orderBy('id','DESC')->get();
            $mediaTodayCount = Media::whereDate('created_at', '=', Carbon::today())->count();
            $result = '';
            $result .= '<h4>Recent Uploaded ('.$mediaTodayCount.')</h4>';
            foreach ($mediaToday as $item) {
                $imageSrc = '';
                $extension = pathinfo($item->link, PATHINFO_EXTENSION);

                if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
                    $imageSrc = asset('images/crm_image.png');
                } elseif (in_array($extension, ['pdf', 'xlsx', 'csv'])) {
                    $imageSrc = asset('images/crm_file.png');
                } elseif ($extension === 'mp4') {
                    $imageSrc = asset('images/crm_video.png');
                } elseif ($extension === 'mp3') {
                    $imageSrc = asset('images/crm_audio.png');
                }

                $result .= '<div class="col-xl-3 col-lg-6 col-sm-12">
                            <div class="card custom-card border">
                                <div class="card-body">
                                    <div>
                                        <h6 class="main-content-label mb-1 card-sub-title text-capitalize text-truncate">' . $item->name . '</h6>
                                        <p class="text-muted card-sub-title"></p>
                                    </div>
                                    <div class="h-100  attached-file-grid6">
                                        <div class="pro-img-box attached-file-image">
                                            <a href="#">
                                                <img class="pic-1 pos-relative rounded-5" src="' . $imageSrc . '" alt="attached-file-image">
                                                <span class="image-pic text-truncate">'. $item->file .'</span>
                                            </a>
                                            <ul class="icons">
                                                <li class="me-1"><a href="' . asset($item->link) . '" data-placement="top" data-bs-toggle="tooltip" title="download" download="download"><i class="fe fe-download"></i></a></li>
                                                <li class="me-1"><a onclick="DeleteMedia('.$item->id.')" data-placement="top" data-bs-toggle="tooltip" title="delete"><i class="fe fe-trash"></i></a></li>
                                                <li class="me-1"><a  onclick="copyToClipboard(\'' . asset($item->link) . '\')" data-placement="top" data-bs-toggle="tooltip" title="Copy Link"><i class="fa fa-clone"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }


            return $result;
        }
    }
    public function getMediaAll(Request $request)
    {
        if ($request->ajax()) {
            $mediaAll = Media::whereDate('created_at', '<>', Carbon::today())->orderBy('id','DESC')->get();
            $mediaAllCount = Media::whereDate('created_at', '<>', Carbon::today())->count();
            $result = '';
            $result .= '<h4>All Files & Media('.$mediaAllCount.')</h4>';
            foreach ($mediaAll as $item) {
                $imageSrc = '';
                $extension = pathinfo($item->link, PATHINFO_EXTENSION);

                if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
                    $imageSrc = asset('images/crm_image.png');
                } elseif (in_array($extension, ['pdf', 'xlsx', 'csv'])) {
                    $imageSrc = asset('images/crm_file.png');
                } elseif ($extension === 'mp4') {
                    $imageSrc = asset('images/crm_video.png');
                } elseif ($extension === 'mp3') {
                    $imageSrc = asset('images/crm_audio.png');
                }

                $result .= '<div class="col-xl-3 col-lg-6 col-sm-12">
                            <div class="card custom-card border">
                                <div class="card-body">
                                    <div>
                                        <h6 class="main-content-label mb-1 card-sub-title text-truncate">' . $item->name . '</h6>
                                        <p class="text-muted card-sub-title"></p>
                                    </div>
                                    <div class="h-100  attached-file-grid6">
                                        <div class="pro-img-box attached-file-image">
                                            <a href="#">
                                                <img class="pic-1 pos-relative rounded-5" src="' . $imageSrc . '" alt="attached-file-image">
                                                <span class="image-pic text-truncate">'. $item->file .'</span>
                                            </a>
                                            <ul class="icons">
                                                <li class="me-1"><a href="' . asset($item->link) . '" data-placement="top" data-bs-toggle="tooltip" title="download" download="download"><i class="fe fe-download"></i></a></li>
                                                <li class="me-1"><a onclick="DeleteMedia('.$item->id.')" data-placement="top" data-bs-toggle="tooltip" title="delete"><i class="fe fe-trash"></i></a></li>
                                                <li class="me-1"><a  onclick="copyToClipboard(\'' . asset($item->link) . '\')" data-placement="top" data-bs-toggle="tooltip" title="Copy Link"><i class="fa fa-clone"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }


            return $result;
        }
    }


}
