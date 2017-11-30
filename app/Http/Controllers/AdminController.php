<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelLocalization;
use File;
use Input;
use \App\Room;
use \App\About;
use \App\Contact;
use \App\Partner;
use \App\Service;
use \App\Gallery;
use \App\Video;


class AdminController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    return view('administrator.pages.items');
  }


  // about
  public function about(){
     $about = About::first();
     return view('administrator.pages.about.edit',compact('about'));
  }

  public function storeAbout(Request $request){
     $about = About::first();

     if (!empty($about)) {
        $image = $request->image[0];
        if (isset($image)) {
           File::delete(public_path($about->$image));
           $extension = $image->getClientOriginalExtension();
           $image_name = '/upload/about/'.str_random().'.'.$extension;
           $image_path = public_path($image_name);
           file_put_contents($image_path,file_get_contents($image));
        }else {
           $image_name = $about->image;
        }

        $update = $about->update([
           'image'   => $image_name,
        ]);

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
           $this->validate($request, [
             'description_'.$localeCode => 'required',
             'title_'.$localeCode => 'required',
           ]);
           $about->aboutDetail()->where('lang',$localeCode)->first()->update([
             'description' => $request->input('description_'.$localeCode),
             'title' => $request->input('title_'.$localeCode),
           ]);
        }
        return back()->with(['success' => 'ინფორმაცია წარმატებით შეიცვალა']);
     }
     else {
        $this->validate($request, [
           'image' => 'required',
        ]);

        $image = $request->image[0];
        $extension = $image->getClientOriginalExtension();
        $image_name = '/upload/about/'.str_random().'.'.$extension;
        $image_path = public_path($image_name);
        file_put_contents($image_path,file_get_contents($image));


        $about = About::create([
           'image'   => $image_name,
        ]);

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
           $this->validate($request, [
             'description_'.$localeCode => 'required',
             'title_'.$localeCode => 'required',
           ]);
           $about->aboutDetail()->create([
             'description' => $request->input('description_'.$localeCode),
             'title' => $request->input('title_'.$localeCode),
             'lang' => $localeCode,
           ]);
        }
        return back()->with(['success' => 'ინფორმაცია წარმატებით დაემატა']);
    }
  }

  // Contact
  public function contact(){
     $contact = Contact::first();
     return view('administrator.pages.contact.edit',compact('contact'));
  }

  public function storeContact(Request $request){
     $contact = Contact::first();

     $this->validate($request, [
        'mobile' => 'required',
        'mail' => 'required',
        'phone' => 'required',
        'longitude' => 'required',
        'latitude' => 'required',
     ]);

     if (!empty($contact)) {

        $update = $contact->update([
           'facebook' => $request->facebook,
           'youtube' => $request->youtube,
           'instagram' => $request->instagram,
           'twitter' => $request->twitter,
           'mobile' => $request->mobile,
           'mail' => $request->mail,
           'phone'   => $request->phone,
           'longitude'   => $request->longitude,
           'latitude'   => $request->latitude,
        ]);

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
           $this->validate($request, [
              'address_'.$localeCode => 'required',
           ]);
           $contact->contactDetail()->where('lang',$localeCode)->first()->update([
              'address' => $request->input('address_'.$localeCode),
           ]);
        }
        return back()->with(['success' => 'ინფორმაცია წარმატებით შეიცვალა']);
     }
     else {

        $contact = Contact::create([
           'facebook' => $request->facebook,
           'youtube' => $request->youtube,
           'instagram' => $request->instagram,
           'twitter' => $request->twitter,
           'mobile' => $request->mobile,
           'mail' => $request->mail,
           'phone'   => $request->phone,
           'longitude'   => $request->longitude,
           'latitude'   => $request->latitude,
        ]);

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
           $this->validate($request, [
              'address_'.$localeCode => 'required',
           ]);
           $contact->contactDetail()->create([
              'address' => $request->input('address_'.$localeCode),
              'lang' => $localeCode,
           ]);
        }
        return back()->with(['success' => 'ინფორმაცია წარმატებით დაემატა']);
    }
  }


  // Gallery
  public function gallery(){
     $gallerys = Gallery::orderBy('created_at','DESC')->paginate(10);
     return view('administrator.gallery.items',compact('gallerys'));
  }

  public function createGallery(){
     return view('administrator.gallery.create');
  }

  public function storeGallery(Request $request){
     $this->validate($request, [
        'image' => 'required',
     ]);

     $image = $request->image[0];
     $extension = $image->getClientOriginalExtension();
     $image_name = '/upload/gallery/'.str_random().'.'.$extension;
     $image_path = public_path($image_name);
     file_put_contents($image_path,file_get_contents($image));


     $gallery = Gallery::create([
        'image' => $image_name,
        'publish'   => $request->publish == 'on' ? true : false,
     ]);

     if(!empty($request->images)){
        foreach ($request->images as $key => $images) {
          $extension = $images->getClientOriginalExtension();
          $images_name = '/upload/gallery/'.str_random().'.'.$extension;
          $images_path = public_path($images_name);
          file_put_contents($images_path,file_get_contents($images));
          $gallery->galleryImage()->create([
            'image' => $images_name,
          ]);
        }
     }

     foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
        $this->validate($request, [
            'title_'.$localeCode => 'required',
        ]);
        $gallery->galleryDetail()->create([
           'title' => $request->input('title_'.$localeCode),
           'lang' => $localeCode,
        ]);
    }
    return redirect('/admin/gallery')->with(['success' => 'ალბომი წარმატებით დაემატა']);
  }

  public function editGallery(Gallery $gallery){
    return view('administrator.gallery.update',compact('gallery'));
  }

  public function updateGallery(Request $request, Gallery $gallery){
     $image = $request->image[0];
     if (count($image) > 0) {
        File::delete(public_path($gallery->image));
        $extension = $image->getClientOriginalExtension();
        $image_name = '/upload/gallery/'.str_random().'.'.$extension;
        $image_path = public_path($image_name);
        file_put_contents($image_path,file_get_contents($image));
     }else {
        $image_name = $gallery->image;
     }

     $update = $gallery->update([
        'image' => $image_name,
        'publish'   => $request->publish == 'on' ? true : false,
     ]);


     if (count($request->images) > 0) {
        foreach ($request->images as $images) {
           $extension = $images->getClientOriginalExtension();
           $images_name = '/upload/gallery/'.str_random().'.'.$extension;
           $images_path = public_path($images_name);
           file_put_contents($images_path,file_get_contents($images));
           $gallery->galleryImage()->create([
              'image' => $images_name,
           ]);
        }
     }

     foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
        $this->validate($request, [
           'title_'.$localeCode => 'required',
        ]);
        $gallery->galleryDetail()->where('lang',$localeCode)->first()->update([
           'title' => $request->input('title_'.$localeCode),
           'lang' => $localeCode,
        ]);
    }

    if($update) {
        return back()->with(['success' => 'ალბომი წარმატებით განახლდა']);
    }
    $request->session()->flash('status', 'error');
    $request->session()->flash('message', 'დაფიქსირდა შეცდომა');
    return redirect('/admin/gallery');
  }

  public function deleteGallery(Request $request, Gallery $gallery){
     foreach ($gallery->galleryImage as $value) {
        File::delete(public_path($value->image));
        $value->delete();
     }

     foreach ($gallery->galleryDetail as $detail) {
        $detail->delete();
     }

     File::delete(public_path($gallery->image));
     $delete = $gallery->delete();

     if($delete){
        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'ალბომი წარმატებით წაიშალა');
        return back();
     }
     $request->session()->flash('status', 'error');
     $request->session()->flash('message', 'დაფიქსირდა შეცდომა');
     return back();
  }

  public function publishGallery(Request $request){
     $status = array('status' => 'error');
     $gallery = Gallery::find($request->id);
     $update = $gallery->update([
         'publish' => $request->publish,
     ]);
     if ($update){
        $status['status'] = 'success';
     }
     return json_encode($status);
  }

  public function deleteGalleryImg(Request $request){
     $status = array('status' => 'error');
     $gallery_image = \App\galleryImage::find($request->id);
     File::delete(public_path($gallery_image->image));
     $delete = $gallery_image->delete();
     if ($delete) {
        $status['status'] = 'success';
     }
     return json_encode($status);
  }



  // Videos
  public function video(){
    $videos = Video::orderBy('created_at','DESC')->paginate(10);
    return view('administrator.video.items',compact('videos'));
  }

  public function createVideo(){
    return view('administrator.video.create');
  }

  public function storeVideo(Request $request){
    $this->validate($request, [
      'video' => 'required',
    ]);

    $video = $request->video[0];
    $extension = $video->getClientOriginalExtension();
    $video_name = '/upload/video/'.str_random().'.'.$extension;
    $video_path = public_path('/upload/video/');
    $video->move($video_path, $video_name);


    $video = Video::create([
      'video' => $video_name,
      'publish'   => $request->publish == 'on' ? true : false,
    ]);

    return redirect('/admin/video')->with(['success' => 'ვიდეო წარმატებით დაემატა']);
  }

  public function editVideo(video $video){
    return view('administrator.video.update',compact('video'));
  }

  public function updateVideo(Request $request, video $video){
    $new_video = $request->video[0];
    if (count($new_video) > 0) {
      File::delete(public_path($video->video));
      $extension = $new_video->getClientOriginalExtension();
      $video_name = '/upload/video/'.str_random().'.'.$extension;
      $video_path = public_path('/upload/video/');
      $new_video->move($video_path, $video_name);
    }else {
      $video_name = $video->video;
    }

    $update = $video->update([
      'video' => $video_name,
      'publish'   => $request->publish == 'on' ? true : false,
    ]);

    if($update) {
      return back()->with(['success' => 'ვიდეო წარმატებით განახლდა']);
    }
    $request->session()->flash('status', 'error');
    $request->session()->flash('message', 'დაფიქსირდა შეცდომა');
    return redirect('/admin/video');
  }

  public function deleteVideo(Request $request, video $video){
    File::delete(public_path($video->video));
    $delete = $video->delete();

    if($delete){
      $request->session()->flash('status', 'success');
      $request->session()->flash('message', 'ვიდეო წარმატებით წაიშალა');
      return back();
    }
    $request->session()->flash('status', 'error');
    $request->session()->flash('message', 'დაფიქსირდა შეცდომა');
    return back();
  }

  public function publishVideo(Request $request){
    $status = array('status' => 'error');
    $video = Video::find($request->id);
    $update = $video->update([
      'publish' => $request->publish,
    ]);
    if ($update){
      $status['status'] = 'success';
    }
    return json_encode($status);
  }










    // Custom CMS Test

  protected $possibleModels = [
    'Service' => \App\Service::class,
    'Partner' => \App\Partner::class,
    'Room' => \App\Room::class,
  ];



  public function common(Request $request){
    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $model = $this->possibleModels[$request->model];
    $items = $model::orderBy('created_at','DESC')->paginate(10);
    $returningModel = $request->model;

    $view = 'administrator.'.$request->model.'.items';
    return view($view,compact('items', 'returningModel'));
  }

  public function createCommon(Request $request){
    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $view = 'administrator.'.$request->model.'.create';
    return view($view);
  }

  public function storeCommon(Request $request){

    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $model = $this->possibleModels[$request->model];

    $modelFillable = new $model();
    $fillables =  $modelFillable->getfillable();

    $modelDetails = $model.'Detail';
    $modelFillableDetails = new $modelDetails();
    $fillableDetails =  $modelFillableDetails->getfillable();

    $strlowerModel = strtolower($request->model);
    $redirect = 'admin/'.$strlowerModel.'?model='.$request->model;

    $this->validate($request, [
      'image' => 'required',
    ]);

    $image = $request->image[0];
    $extension = $image->getClientOriginalExtension();
    $image_name = '/upload/common/'.str_random().'.'.$extension;
    $image_path = public_path($image_name);
    file_put_contents($image_path,file_get_contents($image));

    $row = [];
    foreach ($fillables as $fillable) {
      if($fillable == 'image'){
        $row['image'] = $image_name;
      }
      else if($fillable == 'publish'){
        $row['publish'] = $request->publish == 'on' ? true : false;
      }
      else if($fillable != 'featured'){
        $row[$fillable] = $request->$fillable;
      }
    }

    $common = $model::create($row);

    if(!empty($request->images)){
      foreach ($request->images as $key => $images) {
        $extension = $images->getClientOriginalExtension();
        $images_name = '/upload/common/'.str_random().'.'.$extension;
        $images_path = public_path($images_name);
        file_put_contents($images_path,file_get_contents($images));
        $common->{$strlowerModel.'Image'}()->create([
          'image' => $images_name,
        ]);
      }
    }

    $rowDetails = [];
    foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
      foreach ($fillableDetails as $fillableDetail) {
        if($fillableDetail == 'lang'){
          $rowDetails['lang'] = $localeCode;
        }else{
          $rowDetails[$fillableDetail] = $request->{$fillableDetail.'_'.$localeCode};
        }
      }
      $common->{$strlowerModel.'Detail'}()->create($rowDetails);
    }

    return redirect($redirect)->with(['success' => 'წარმატებით დაემატა']);
  }

  public function editCommon(Request $request, $id){
    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $model = $this->possibleModels[$request->model];
    $returningModel = $request->model;

    $item = $model::find($id);
    $view = 'administrator.'.$request->model.'.update';
    return view($view,compact('item', 'returningModel'));
  }

  public function updateCommon(Request $request, $id){

    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $model = $this->possibleModels[$request->model];

    $modelFillable = new $model();
    $fillables =  $modelFillable->getfillable();

    $modelDetails = $model.'Detail';
    $modelFillableDetails = new $modelDetails();
    $fillableDetails =  $modelFillableDetails->getfillable();

    $strlowerModel = strtolower($request->model);
    $redirect = 'admin/'.$strlowerModel.'?model='.$request->model;

    $item = $model::find($id);

    $image = $request->image[0];
    if (count($image) > 0) {
      File::delete(public_path($item->image));
      $extension = $image->getClientOriginalExtension();
      $image_name = '/upload/common/'.str_random().'.'.$extension;
      $image_path = public_path($image_name);
      file_put_contents($image_path,file_get_contents($image));
    }else {
      $image_name = $item->image;
    }

    $row = [];
    foreach ($fillables as $fillable) {
      if($fillable == 'image'){
        $row['image'] = $image_name;
      }
      else if($fillable == 'publish'){
        $row['publish'] = $request->publish == 'on' ? true : false;
      }
      else if($fillable != 'featured'){
        $row[$fillable] = $request->$fillable;
      }
    }
    $update = $item->update($row);

    if (count($request->images) > 0) {
      foreach ($request->images as $images) {
        $extension = $images->getClientOriginalExtension();
        $images_name = '/upload/common/'.str_random().'.'.$extension;
        $images_path = public_path($images_name);
        file_put_contents($images_path,file_get_contents($images));
        $item->{$strlowerModel.'Image'}()->create([
          'image' => $images_name,
        ]);
      }
    }

    $rowDetails = [];
    foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
      foreach ($fillableDetails as $fillableDetail) {
        if($fillableDetail == 'lang'){
          $rowDetails['lang'] = $localeCode;
        }elseif($fillableDetail == $strlowerModel.'_id'){
          $rowDetails[$strlowerModel.'_id'] = $item->id;
        }else{
          $rowDetails[$fillableDetail] = $request->{$fillableDetail.'_'.$localeCode};
        }
      }
      $item->{$strlowerModel.'Detail'}()->where('lang',$localeCode)->first()->update($rowDetails);
    }


    if($update) {
      return back()->with(['success' => 'წარმატებით განახლდა']);
    }
    $request->session()->flash('status', 'error');
    $request->session()->flash('message', 'დაფიქსირდა შეცდომა');
    return redirect($redirect);
  }

  public function deleteCommon(Request $request, $id){

    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $model = $this->possibleModels[$request->model];

    $strlowerModel = strtolower($request->model);
    $redirect = 'admin/'.$strlowerModel.'?model='.$request->model;

    $item = $model::find($id);

    if(isset($item->{$strlowerModel.'Image'})){
      foreach ($item->{$strlowerModel.'Image'} as $value) {
        File::delete(public_path($value->image));
        $value->delete();
      }
    }

    foreach ($item->{$strlowerModel.'Detail'} as $detail) {
      $detail->delete();
    }

    File::delete(public_path($item->image));
    $delete = $item->delete();

    if($delete){
      $request->session()->flash('status', 'success');
      $request->session()->flash('message', 'წარმატებით წაიშალა');
      return back();
    }
    $request->session()->flash('status', 'error');
    $request->session()->flash('message', 'დაფიქსირდა შეცდომა');
    return back();
  }

  public function publishCommon(Request $request){
    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $model = $this->possibleModels[$request->model];
    $status = array('status' => 'error');
    $item = $model::find($request->id);
    $update = $item->update([
      'publish' => $request->publish,
    ]);
    if ($update){
      $status['status'] = 'success';
    }
    return json_encode($status);
  }

  public function deleteCommonImg(Request $request){

    if (!isset($this->possibleModels[$request->model])) {
        abort(404);
    }
    $model = $this->possibleModels[$request->model];
    $modelImage = $model.'Image';

    $wanted_image = $modelImage::find($request->id);
    File::delete(public_path($wanted_image->image));
    $delete = $wanted_image->delete();
    if ($delete) {
      $status['status'] = 'success';
    }
    return json_encode($status);
  }

}
