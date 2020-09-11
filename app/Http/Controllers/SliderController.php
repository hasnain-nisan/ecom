<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Image;
use File;


class SliderController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    $sliders = Slider::orderby('priority', 'asc')->get();
    return view('admin.slider.manage', compact('sliders'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'image' => 'required|image',
      'priority' => 'required',
      'button_link' =>'nullable|url'
    ],
    [
      'title.required' => 'please provide slider title',
      'image.required' => 'please provie a slider image',
      'image.image' => 'please provide a valid image',
      'priority.required'=> 'please provide the slider priority',
      'button_link.url' => 'please provide a valid url'
    ]);

    $slider = new Slider();
    $slider->title = $request->title;
    if($request->hasFile('image')) {
      $image = $request->file('image');
      $img = rand(). '.' .$image->getClientOriginalExtension();
      $location = public_path('images/sliders/' .$img);
      Image::make($image)->save($location);
      $slider->iamge = $img;
     }
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;
    $slider->save();

   session()->flash('success', 'A new slider has added successfully');
   return redirect()-> route('admin.sliders');
  }

  public function update(Request $request, $id)
  {
    // $this->validate($request, [
    //   'title' => 'required',
    //   'image' => 'required|image',
    //   'priority' => 'required',
    //   'button_link' =>'nullable|url'
    // ],
    // [
    //   'title.required' => 'please provide slider title',
    //   'image.required' => 'please provie a slider image',
    //   'image.image' => 'please provide a valid image',
    //   'priority.required'=> 'please provide the slider priority',
    //   'button_link.url' => 'please provide a valid url'
    // ]);

    $slider = Slider::find($id);

    $slider->title = $request->title;
    //inserting one image and saving
    if (!is_null($request->image)) {
     //deleteing old images
     if (File::exists('images/sliders/' .$slider->iamge)){
       File::delete('images/sliders/' .$slider->iamge);
     }

      $image = $request->file('image');
      $img = rand(). '.' .$image->getClientOriginalExtension();
      $location = public_path('images/sliders/' .$img);
      Image::make($image)->save($location);
      $slider->iamge = $img;
    }
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;
    $slider->save();
    session()->flash('success', 'Slider has updated successfully');
    return redirect()-> route('admin.sliders');
  }

  public function delete($id)
    {
      $slider = Slider::find($id);
      if(!is_null($slider)) {
         //deleteing slider image
         if (File::exists('images/sliders/' .$slider->iamge)){
           File::delete('images/sliders/' .$slider->iamge);
         }
      $slider->delete();
    }
      session()->flash('error', 'Selected slider has deleted successfully');
      return redirect()->route('admin.sliders');
    }

}
