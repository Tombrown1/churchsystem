<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AnnoucementCategory;
use App\Models\announcement;
use App\Models\GalleryCategory;
use App\Models\Gallery;
use App\Models\Slider;
use JD\Cloudder\Facades\Cloudder;
use Image;
use Storage;
use Auth;

class NewsEventController extends Controller
{
    public function announcement()
    {   
        $announce_cat = AnnoucementCategory::get();
        $announcement = announcement::with(['announce_cat','user'])->orderBy('id', 'DESC')->get();
         
        return view('admin.announcement', compact('announce_cat', 'announcement'));
    }

    public function announcement_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        // return $request;

        $announ_cat = new AnnoucementCategory;

        $announ_cat->name = $request->name;
        $announ_cat->description = $request->description;

        if($announ_cat->save())
        {
            return back()->with('message', 'Announcement Category added sucessfully!');
        }
    }

    public function save_announce(Request $request)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);
            

        $user_id = Auth::User()->id;
        // return $request;

        $announce = new announcement;

        $announce->user_id = $user_id;
        $announce->annouce_cat_id = $request->cat_id;
        $announce->title = $request->title;
        $announce->message = $request->message;

            // Script for image Validation;
        if($request->hasfile('image')){
            $request->validate([
                'image' => 'required',
                'image' => 'mimes:png,jpg,pdf,jpeg,gif|max:2048'
            ]);
            
            if(env('APP_ENV') == 'local'){
                $file = $request->file('image');
                $path = Storage::disk('public')->putFile('announcement', $file);
                $announce->image = $path;
            }else{
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

                $path = $image_url;
            }

            $file = $request->file('image');
            $path = Storage::disk('public')->putFile('announcement', $file);
            $announce->image = $path;
        }

        // return $announce;
        if($announce->save())
        {
            return back()->with('message', "Announcement Created Successfully!");
        }

    }
    
    public function edit_announce(Request $request, $id)
    {
        $this->validate($request, [
            'annouce_cat_id' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        // return $request;

        $old_image = $request->old_image;

        // return $old_image;

        // $announ_img = $request->file('image');
        // $name_gen = hexdec(uniqid()).'.'.$announ_img->getClientOrinalExtension();
        // Image::make($announ_img)->resize(500, 500)->save('images/announce'.$name_gen);
        // $last_image = 'images/announce'.$name_gen;

        if($request->hasfile('image')){
            $request->validate([
                'image' => 'required',
                'image' => 'mimes:png,jpg,jpeg,pdf,gif|max:2048'
            ]);
            
            if(env('APP_ENV') == 'local'){
                $file = $request->file('image');
                $path = Storage::disk('public')->putFile('announcement', $file);
                $announce->image = $path;
            }else{
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

                $path = $image_url;
            }


            $file = $request->file('image');
            $path = Storage::disk('public')->putFile('announce', $file);

            // return $path;
        }

        $user_id = Auth::user()->id;
        $update_announce = announcement::find($id);
        // return $update_announce;

        $update_announce->user_id = $user_id;
        $update_announce->annouce_cat_id = $request->annouce_cat_id;
        $update_announce->title = $request->title;
        $update_announce->message = $request->message;
        $update_announce->image = $path;

        if($update_announce->update())
        {
            return back()->with('message', 'Announcement record successfully updated');
        }
        
    }

    public function view_announcement($id)
    {
        $announcement = announcement::with('announce_cat','user')->find($id);
        // return $announcement;

        return view('admin.view_announcement', compact('announcement'));
    }


    public function photo_gallery()
    {     
        $gallerys = Gallery::with('gallery_cat', 'user')->orderBy('id', 'DESC')->get();
        // return $gallerys;
        $gallery_cat = GalleryCategory::get();
        // return $gallery_cat;
        return view('admin.photo_gallery', compact('gallery_cat', 'gallerys'));
    }

    public function save_gallery_photo(Request $request)
    {
        $this->validate($request,[
            'gallery_cat_id' =>'required',
            'image_name' =>'required',
        ]);
        // Script for image Validation;
        if($request->hasfile('image')){
            $request->validate([
                'image' => 'required',
                'image' => 'mimes:png,jpg,pdf,jpeg,gif|max:2048'
            ]);
            if(env('APP_ENV') == 'local'){
                $gallery_image = $request->file('image');
                $name_gen = hexdec(Uniqid()).'.'.$gallery_image->getClientOriginalExtension();
                image::make($gallery_image)->resize(800,640)->save('images/gallery/'.$name_gen);

                $last_image = 'images/gallery/'.$name_gen;
            }else{
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                $last_image = $image_url;
            }
            $gallery_image = $request->file('image');
            $name_gen = hexdec(Uniqid()).'.'.$gallery_image->getClientOriginalExtension();
            image::make($gallery_image)->resize(800,640)->save('images/gallery/'.$name_gen);

            $last_image = 'images/gallery/'.$name_gen;
           
        }
        $user_id = Auth::User()->id;
        // return $user_id;
        $save_gallery = new Gallery;
        $save_gallery->user_id = $user_id;
        $save_gallery->gallery_cat_id = $request->gallery_cat_id;
        $save_gallery->image_name = $request->image_name;
        $save_gallery->image = $last_image;

        // return $save_gallery;
        if($save_gallery->save())
        {
            return back()->with('message', 'Gallery images successfully saved!');
        }
    }

    public function update_gallery(Request $request, $id)
    {
       $this->validate($request, [
           'gallery_cat_id' => 'required',
           'image_name' => 'required',
       ]);

       if(env('APP_ENV') == 'local'){
        $gallery_image = $request->file('image');
        $name_gen = hexdec(Uniqid()).'.'.$gallery_image->getClientOriginalExtension();
        image::make($gallery_image)->resize(800,640)->save('images/gallery/'.$name_gen);

        $last_image = 'images/gallery/'.$name_gen;
        }else{
            $image_name = $file->getRealPath();
            Cloudder::upload($image_name, null);
            
            list($width, $height) = getimagesize($image_name);

            $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            $last_image = $image_url;
        }

       $old_image = $request->old_image;
       //Validate Image
       $gallery_image = $request->file('image');
       $name_gen = hexdec(uniqid()).'.'.$gallery_image->getClientOriginalExtension();
       image::make($gallery_image)->resize(800, 640)->save('images/gallery/'.$name_gen);
       $last_image = 'images/gallery/'.$name_gen;

        $user_id = Auth::user()->id;

        unlink($old_image);

        $update_image = Gallery::find($id);

        $update_image->gallery_cat_id = $request->gallery_cat_id;
        $update_image->user_id = $user_id;
        $update_image->image_name = $request->image_name;
        $update_image->image = $last_image;

        // return $update_image;
    if($update_image->update())
    {
        return back()->with('message', 'Gallery Image successfully updated!');
    }
        
    }

    public function gallery_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
         
         $gallery_cat = new GalleryCategory;
         $gallery_cat->name = $request->name;
         $gallery_cat->description = $request->description;

        //  return $gallery_cat;
         if($gallery_cat->save()){

            return back()->with('message', 'Image Category Successfully created!');
         }
    }

    public function image_slider()
    {
        $sliders = Slider::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.slider', compact('sliders'));
    }

    public function save_slider(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required' 
        ]);
        // Script for image Validation;
        if($request->hasfile('image'))
        {
            $request->validate([
                'image' => 'required',
                'image' => 'mimes:jpeg,jpg,gif,png,pdf|max:6144'
            ]);

            if(env('APP_ENV') == 'local'){
                $slider_image = $request->file('image');
                $name_gen = hexdec(Uniqid()).'.'.$slider_image->getClientOriginalExtension();
                image::make($slider_image)->resize(2000,1333)->save('images/slider/'.$name_gen);
    
                $last_image = 'images/slider/'.$name_gen; 
            }else{
                $image_name = $file->getRealPath();

                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                
                $last_image = $image_url;
            }

            $slider_image = $request->file('image');
            $name_gen = hexdec(Uniqid()).'.'.$slider_image->getClientOriginalExtension();
            image::make($slider_image)->resize(2000,1333)->save('images/slider/'.$name_gen);

            $last_image = 'images/slider/'.$name_gen;
        }  
        
        $user_id = Auth::user()->id;
        $slider = new Slider;

        $slider->user_id = $user_id;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $last_image;

        // return $slider;

        if($slider->save())
        {
            return back()->with('message', 'Slide image successfully created');
        }

    }

    public function update_slider(Request $request, $id)
    {
        $this->validate($request, [
           
            'title' => 'required',
            'description' => 'required',
        ]);

        $old_image = $request->old_image;

        if($request->hasFile('image'))
        {
            $request->validate([
                'image' => 'required',
                'image' => 'mimes:jpg,jpeg,png,pdf|max:6144'
            ]);

            if(env('APP_ENV') == 'local'){
                $slider_image = $request->file('image');
                $name_gen = hexdec(Uniqid()).'.'.$slider_image->getClientOriginalExtension();
                image::make($slider_image)->resize(2000,1333)->save('images/slider/'.$name_gen);
    
                $last_image = 'images/slider/'.$name_gen; 
            }else{
                $image_name = $file->getRealPath();

                Cloudder::upload($image_name, null);
                
                list($width, $height) = getimagesize($image_name);
    
                $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                
                $last_image = $image_url;
            }

            $slider_image = $request->file('image');
            $name_gen = hexdec(Uniqid()).'.'.$slider_image->getClientOriginalExtension();
            image::make($slider_image)->resize(2000,1333)->save('images/slider/'.$name_gen);

            $last_image = 'images/slider/'.$name_gen;            
        }

        // if(request()->hasFile('image'))
        // {
        //     $slideImage = public_path("images/"{$sliders->image});// Get the Previous image from folder
        //     if(File::exists($slideImage)){ //Unlink or remove image from folder
        //         unlink($slideImage);
        //     }
        // }
        unlink($old_image);
        $user_id = Auth::user()->id;
        $update_slider = Slider::find($id);

        $update_slider->user_id = $user_id;
        $update_slider->title = $request->title;
        $update_slider->description = $request->description;
        $update_slider->image = $last_image;

        // return $update_slider;
        if($update_slider->update())
        {
            return back()->with('message', 'Record Updated successfully!');
        }
    }


}
