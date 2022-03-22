<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Review;
use App\Models\Settings;
use App\Models\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        return view('dashboard');
    }

    public function Admission()
    {
        return view('invoice');
    }

    public function MyProfile()
    {
        return view('backend.my_profile');
    }

    public function AccountUpdate(Request $request)
    {
        $request->validate([
            'password' => 'confirmed'
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }
        $user->update();

        return back()->with('success','Profile Updated successfully!');
    }

    public function AdmissionStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bill_to_email' => 'nullable|email',
            'bill_to_phone' => 'required',
            'num_of_course' => 'required',
            'total_course_fee' => 'required',
            'paid_amount' => 'required',
        ]);
        $admission = Admission::where('phone',$request->bill_to_phone)->where('student_name',$request->name)->orWhere('email',$request->bill_to_email)->first();

        if($admission == null){
            $admission = new Admission();
            $admission->student_name = $request->name;
            $admission->address = $request->bill_to_address;
            $admission->email = $request->bill_to_email;
            $admission->course_name = $request->course_name;
            $admission->course_duration = $request->course_duration;
            $admission->num_of_course = $request->num_of_course;
            $admission->phone = $request->bill_to_phone;
            $admission->num_of_course = $request->num_of_course;
            $admission->total_course_fee = $request->total_course_fee;
            $admission->paid_amount = $request->paid_amount;
            $admission->due_amount = $request->due_amount;
            $admission->discount_amount = $request->discount_amount;
            $admission->sub_total = $request->sub_total;
            $admission->admission_fee = $request->amount;
            $admission->save();    
        }

        $pdf = PDF::loadView('print_invoice', ['admission' => $admission]);
	    return $pdf->stream('invoice.pdf');
    }

    public function SettingsStore(Request $request)
    {
        foreach($request->types as $type)
        {
            if($type == 'header_phone'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->header_phone;
                $settings->update();
            }elseif($type == 'login_btn_url'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->login_btn_url;
                $settings->update();
            }elseif($type == 'logo'){
                if($request->hasFile('logo')){
                    $settings = Settings::where('key',$type)->first();
                    $file_name = 'uploads/'.date('dmYhis').$request->logo->getClientOriginalName();
                    $request->logo->move(public_path('uploads'),$file_name);
                    $settings->value = $file_name;
                    $settings->update();
                }
            }elseif($type == 'site_icon'){
                if($request->hasFile('site_icon')){
                    $settings = Settings::where('key',$type)->first();
                    $file_name = 'uploads/'.date('dmYhis').$request->site_icon->getClientOriginalName();
                    $request->site_icon->move(public_path('uploads'),$file_name);
                    $settings->value = $file_name;
                    $settings->update();
                }
            }elseif($type == 'slider_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->slider_title;
                $settings->update();
            }elseif($type == 'slider_typed_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->slider_typed_title;
                $settings->update();
            }
            elseif($type == 'slider_btn_1_url'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->slider_btn_1_url;
                $settings->update();
            }
            elseif($type == 'header_menu_background'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->header_menu_background;
                $settings->update();
            }
            elseif($type == 'header_menu_color'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->header_menu_color;
                $settings->update();
            }
            elseif($type == 'slider_btn_2_url'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->slider_btn_2_url;
                $settings->update();
            }
            elseif($type == 'slider_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->slider_description;
                $settings->update();
            }
            elseif($type == 'slider_btn_1'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->slider_btn_1;
                $settings->update();
            }
            elseif($type == 'slider_btn_2'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->slider_btn_2;
                $settings->update();
            }
            elseif($type == 'load_balancing_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_balancing_title;
                $settings->update();
            }
            elseif($type == 'load_balancing_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_balancing_description;
                $settings->update();
            }
            elseif($type == 'load_section_one_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_section_one_title;
                $settings->update();
            }
            elseif($type == 'load_section_one_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_section_one_description;
                $settings->update();
            }
            elseif($type == 'load_section_two_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_section_two_title;
                $settings->update();
            }
            elseif($type == 'load_section_two_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_section_two_description;
                $settings->update();
            }
            elseif($type == 'load_section_three_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_section_three_title;
                $settings->update();
            }
            elseif($type == 'load_section_three_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->load_section_three_description;
                $settings->update();
            }
            elseif($type == 'why_choose_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->why_choose_title;
                $settings->update();
            }
            elseif($type == 'why_choose_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->why_choose_description;
                $settings->update();
            }
            elseif($type == 'why_choose_options'){
                $settings = Settings::where('key',$type)->first();
                $options = [];
                for($i=0;$i<count($request->title);$i++){
                    array_push($options,[
                        'badge' => $request->badge[$i],
                        'icon' => $request->icon[$i],
                        'title' => $request->title[$i],
                        'description' => $request->description[$i],
                        'btn_name' => $request->btn_name[$i],
                        'btn_url' => $request->btn_url[$i],
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'reivew_badge'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->reivew_badge;
                $settings->update();
            }
            elseif($type == 'review_background_image'){
                if($request->hasFile('review_background_image')){
                    $settings = Settings::where('key',$type)->first();
                    $file_name = 'uploads/'.date('dmYhis').$request->review_background_image->getClientOriginalName();
                    $request->review_background_image->move(public_path('uploads'),$file_name);
                    $settings->value = $file_name;
                    $settings->update();
                }
            }
            elseif($type == 'footer_up_section_one'){
                $settings = Settings::where('key',$type)->first();
                $options = [
                    'title' => $request->one_title,
                    'description' => $request->one_description,
                    'url' => $request->one_url,
                ];
                $settings->value = serialize($options);
                $settings->update();
            }
            elseif($type == 'footer_up_section_two'){
                $settings = Settings::where('key',$type)->first();
                $options = [
                    'title' => $request->two_title,
                    'description' => $request->two_description,
                    'url' => $request->two_url,
                ];
                $settings->value = serialize($options);
                $settings->update();
            }
            elseif($type == 'footer_up_section_three'){
                $settings = Settings::where('key',$type)->first();
                $options = [
                    'title' => $request->three_title,
                    'description' => $request->three_description,
                    'url' => $request->three_url,
                ];
                $settings->value = serialize($options);
                $settings->update();
            }
            elseif($type == 'reseller_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->reseller_title;
                $settings->update();
            }
            elseif($type == 'reseller_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->reseller_description;
                $settings->update();
            }
            elseif($type == 'reseller_option_one_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->reseller_option_one_title;
                $settings->update();
            }
            elseif($type == 'reseller_option_two_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->reseller_option_two_title;
                $settings->update();
            }
            elseif($type == 'reseller_faq'){
                $settings = new Settings();
                $settings->key = 'reseller_faq';
                $options = [
                    'question' => $request->question,
                    'answer' => $request->answer
                ];
                $settings->value = json_encode($options);
                $settings->save();
            }
            elseif($type == 'reseller_option_one' || $type == 'reseller_option_two'){
                $settings = new Settings();
                $file_name = 'uploads/'.date('dmYhis').$request->icon->getClientOriginalName();
                $request->icon->move(public_path('uploads'),$file_name);
                $options = [
                    'icon' => $file_name,
                    'title' => $request->title,
                    'url' => $request->url,
                ];
                $settings->key = $type;
                $settings->value = json_encode($options);

                $settings->save();
            }
            elseif($type == 'reseller_faq_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->reseller_faq_title;
                $settings->update();
            }
            elseif($type == 'reseller_faq_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->reseller_faq_description;
                $settings->update();
            }
            elseif($type == 'web_hosting_header_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_header_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_header_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_header_description;
                $settings->update();
            }
            elseif($type == 'web_hosting_header_options'){
                $settings = Settings::where('key',$type)->first();
                $options = [];
                foreach($request->title as $title){
                    array_push($options,$title);
                }
                $settings->value = $options;
                $settings->update();
            }
            elseif($type == 'web_hosting_options'){
                $settings = new Settings();
                $settings->key = $type;
                $file_name = 'uploads/'.date('dmYhis').$request->image->getClientOriginalName();
                $request->image->move(public_path('uploads'),$file_name);
                $options = [
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $file_name,
                    'btn_name' => $request->btn_name,
                    'url' => $request->url,
                ];
                $settings->value = json_encode($options);
                $settings->save();
            }
            elseif($type == 'web_hosting_option_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_option_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_badge'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_badge;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package'){
                $settings = Settings::where('key',$type)->first();
                $options = [];
                for($i=0;$i<count($request->title);$i++){
                    array_push($options,['title' => $request->title[$i],'subtitle' => $request->subtitle[$i],'price' => $request->price[$i],'btn_name' => $request->btn_name[$i],'url' => $request->url[$i]]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_1'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature1);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature1[$i],
                        'feature1' => $request->feature1_value_1[$i],
                        'feature2' => $request->feature1_value_2[$i],
                        'feature3' => $request->feature1_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_2'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature2);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature2[$i],
                        'feature1' => $request->feature2_value_1[$i],
                        'feature2' => $request->feature2_value_2[$i],
                        'feature3' => $request->feature2_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_2_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_package_2_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_3_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_package_3_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_3'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature3);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature3[$i],
                        'feature1' => $request->feature3_value_1[$i],
                        'feature2' => $request->feature3_value_2[$i],
                        'feature3' => $request->feature3_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_4_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_package_4_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_4'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature4);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature4[$i],
                        'feature1' => $request->feature4_value_1[$i],
                        'feature2' => $request->feature4_value_2[$i],
                        'feature3' => $request->feature4_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_5_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_package_5_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_5'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature5);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature5[$i],
                        'feature1' => $request->feature5_value_1[$i],
                        'feature2' => $request->feature5_value_2[$i],
                        'feature3' => $request->feature5_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_6_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_package_6_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_6'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature6);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature6[$i],
                        'feature1' => $request->feature6_value_1[$i],
                        'feature2' => $request->feature6_value_2[$i],
                        'feature3' => $request->feature6_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_7_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_package_7_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_7'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature7);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature7[$i],
                        'feature1' => $request->feature7_value_1[$i],
                        'feature2' => $request->feature7_value_2[$i],
                        'feature3' => $request->feature7_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_8_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->web_hosting_feature_package_8_title;
                $settings->update();
            }
            elseif($type == 'web_hosting_feature_package_8'){
                $settings = Settings::where('key',$type)->first();
                //dd($request->all());
                $options = [];
                for($i=0;$i<count($request->feature8);$i++){
                    array_push($options,
                    [
                        'feature_name' => $request->feature8[$i],
                        'feature1' => $request->feature8_value_1[$i],
                        'feature2' => $request->feature8_value_2[$i],
                        'feature3' => $request->feature8_value_3[$i]
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }

            elseif($type == 'dedicated_server_header_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->dedicated_server_header_title;
                $settings->update();
            }
            elseif($type == 'dedicated_server_header_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->dedicated_server_header_description;
                $settings->update();
            }
            elseif($type == 'dedicated_server_page_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->dedicated_server_page_description;
                $settings->update();
            }
            elseif($type == 'feature_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->feature_title;
                $settings->update();
            }
            elseif($type == 'feature_one_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->feature_one_title;
                $settings->update();
            }
            elseif($type == 'feature_two_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->feature_two_title;
                $settings->update();
            }
            elseif($type == 'feature_three_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->feature_three_title;
                $settings->update();
            }
            elseif($type == 'dedicated_server_features'){
                $settings = Settings::where('key',$type)->first();
                $options = [];
                for($i=0;$i<count($request->feature1);$i++){
                    array_push($options,[
                        'feature1' => $request->feature1[$i],
                        'feature2' => $request->feature2[$i],
                        'feature3' => $request->feature3[$i],
                    ]);
                }
                $settings->value = json_encode($options);
                $settings->update();
            }
            elseif($type == 'vps_title'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->vps_title;
                $settings->update();
            }
            elseif($type == 'vps_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->vps_description;
                $settings->update();
            }
            elseif($type == 'vps_page_description'){
                $settings = Settings::where('key',$type)->first();
                $settings->value = $request->vps_page_description;
                $settings->update();
            }
            elseif($type == 'header_menus'){
                $settings = Settings::where('key',$type)->first();
                $options = [];
                for($i=0;$i<count($request->menu_name);$i++){
                    array_push($options,[
                        'menu_name' => $request->menu_name[$i],
                        'menu_url' => $request->menu_url[$i],
                    ]);
                }
                $settings->key = $type;
                $settings->value = json_encode($options);

                $settings->save();
            }
        }

        return back()->with('success','Settings updated successfully!');
    }

    public function LoadBalance()
    {
        return view('backend.settings.load_balancing');
    }

    public function WhyChoose()
    {
        return view('backend.settings.why_choose');
    }

    public function Review()
    {
        $reviews = Review::latest()->paginate(10);
        return view('backend.settings.reviews',['reviews' => $reviews]);
    }

    public function AddReview()
    {
        return view('backend.settings.add-review');
    }

    public function StoreReview(Request $request)
    {
        $review = new Review();
        $review->customer_name = $request->customer_name;
        $review->review = $request->review;
        $review->button = $request->btn_name;
        $review->url = $request->url;
        $review->save();

        return redirect()->route('reviews')->with('success','Review added successfully!');
    }

    public function deleteReview($id)
    {
        $review = Review::findOrFail(decrypt($id));
        if($review->delete())
        {
            return back()->with('success','Review deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong');
    }
    public function deleteFaq($id)
    {
        $faq = Settings::findOrFail(decrypt($id));
        if($faq->delete())
        {
            return back()->with('success','Review deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong');
    }

    public function WebHostingHeader()
    {
        return view('backend.settings.web_hosting_header');
    }

    public function WebHostingOptions()
    {
        $options = Settings::where('key','web_hosting_options')->get();
        return view('backend.settings.web_hosting_options',['options' => $options]);
    }

    public function WebHostingAddOption()
    {
        return view('backend.settings.web_hosting_add_option');
    }
    public function WebHostingDeleteOption($id)
    {
        $setings = Settings::findOrFail(decrypt($id));
        if($setings->delete())
        {
            return back()->with('success','Option deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong.');
    }

    public function WebHostingFeatureOption()
    {
        return view('backend.settings.web_hosting_features');
    }

    public function DedicatedServerHeader()
    {
        return view('backend.settings.dedicated_server_header');
    }

    public function DedicatedServerFeature()
    {
        return view('backend.settings.dedicated_server_feature');
    }
    public function VPSServer()
    {
        return view('backend.settings.vps_server');
    }

    public function Category()
    {
        $categories = Category::latest()->paginate(10);
        return view('backend.category',['categories' => $categories]);
    }

    public function AddCategory()
    {
        return view('backend.add-category');
    }

    public function StoreCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category')->with('success','Category added successfully!');
    }

    public function EditCategory($id)
    {
        $category = Category::findOrFail(decrypt($id));
        return view('backend.edit-category',['category' => $category]);
    }

    public function UpdateCategory(Request $request,$id)
    {
        $category = Category::findOrFail(decrypt($id));
        $category->name = $request->name;
        $category->update();

        return redirect()->route('category')->with('success','Category updated successfully!');
    }

    public function DeleteCategory($id)
    {
        $category = Category::findOrFail(decrypt($id));
        $category->delete();

        return redirect()->route('category')->with('success','Category deleted successfully!');

    }
}
