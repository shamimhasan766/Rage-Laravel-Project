<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    function Banner(){
        $banners = Banner::all();
        return view('admin.banner.banner', [
            'banners'=> $banners
        ]);
    }
    function BannerStore(Request $request){
        $request->validate([
            'title'=> 'required',
            'banner'=> 'required|image'
        ]);

        $banner = $request->banner;
        $extension = $banner->extension();
        $file_name = 'intro-banner'. uniqid(). '.'. $extension;
        Image::make($banner)->save(public_path('uploads/frontend/banner/'. $file_name));

        $NewBanner = new Banner();
        $NewBanner->title = $request->title;
        $NewBanner->banner_img = 'uploads/frontend/banner/'. $file_name ;
        $NewBanner->button_text = $request->button;
        $NewBanner->save();
        return back()->withSuccess('Banner Added');
    }
    function BannerStatus($id){
        $banner = Banner::find($id);
        $banner->status = $banner->status == 0 ? 1 : 0;
        $banner->save();
        return back();
    }
    function BannerDelete($id){
        $banner = Banner::find($id);
        unlink($banner->banner_img);
        $banner->delete();
        return back()->withDelete('Banner Deleted Successfully');
    }
    function ExistingOffer(){
        return view('admin.banner.existing_offer');
    }


}
