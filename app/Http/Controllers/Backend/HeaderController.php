<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Settings;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function HeaderSetup()
    {
        return view('backend.settings.header');
    }

    public function SliderSetup()
    {
        return view('backend.settings.slider');
    }

    public function HomePackage()
    {
        $packages = Package::latest();
        if(request()->query('position')){
            $packages->where('position',request()->query('position'));
        }
        $packages = $packages->paginate(10);
        return view('backend.settings.home_package',['packages' => $packages]);
    }

    public function AddPackage()
    {
        return view('backend.settings.add-package');
    }

    public function EditPackage($id)
    {
        $package = Package::findOrFail(decrypt($id));
        return view('backend.settings.edit-package',['package' => $package]);
    }
    public function StorePackage(Request $request)
    {
        //dd($request->all());
        $package = new Package();
        $package->title = $request->title;
        if($request->hasFile('icon')){
            $file_name = 'uploads/'.date('dmYhis').$request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads'),$file_name);
            $package->icon = $file_name;

        }
        $package->sub_title = $request->sub_title;
        $package->badge = $request->badge;
        $package->amount = $request->amount;
        $package->btn_name = $request->btn_name;
        $package->btn_url = $request->btn_url;
        $package->position = $request->position;
        $package->btn_url = $request->btn_url;
        $options = [];
        for($i=0;$i<count($request->option_icon);$i++){
            array_push($options,[
                "icon" => $request->option_icon[$i],  	
                "name" => $request->option_name[$i],    
                "value" => $request->option_value[$i],
            ]);
        }
        $package->options = json_encode($options);
        $package->save();
        return redirect()->route('package',['position' => $package->position])->with('success','Package added successfully!');
    }
    public function UpdatePackage(Request $request,$id)
    {
        //dd($request->all());
        $package = Package::findOrFail(decrypt($id));
        $package->title = $request->title;
        if($request->hasFile('icon')){
            $file_name = 'uploads/'.date('dmYhis').$request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads'),$file_name);
            $package->icon = $file_name;

        }
        $package->sub_title = $request->sub_title;
        $package->badge = $request->badge;
        $package->amount = $request->amount;
        $package->btn_name = $request->btn_name;
        $package->btn_url = $request->btn_url;
        $package->position = $request->position;
        $package->btn_url = $request->btn_url;
        $options = [];
        for($i=0;$i<count($request->option_icon);$i++){
            array_push($options,[
                "icon" => $request->option_icon[$i],  	
                "name" => $request->option_name[$i],    
                "value" => $request->option_value[$i],
            ]);
        }
        $package->options = json_encode($options);
        $package->update();
        return redirect()->route('package',['position' => $package->position])->with('success','Package updated successfully!');
    }
    public function DeletePackage($id)
    {
        $package = Package::findOrFail(decrypt($id));
        $icon = asset($package->icon);
        if(file_exists($icon)){
            unlink($icon);
        }
        if($package->delete())
        {
            return back()->with('success','Package deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong.');
    }

    public function reviewSetup()
    {
        return view('backend.settings.review-setup');
    }

    public function FooterUpSetup()
    {
        return view('backend.settings.footer_up');
    }

    public function ResellerHeader()
    {
        return view('backend.settings.reseller-header');
    }

    public function ResellerOptionOne()
    {
        $options = Settings::where('key','reseller_option_one')->Orwhere('key','reseller_option_two')->paginate(10);
        //dd($options->toArray());
        return view('backend.settings.reseller_option_one',['options' => $options]);
    }

    public function ResellerOptionAdd()
    {
        return view('backend.settings.add_reseller_option');
    }

    public function ResellerOptionDelete($id)
    {
        $setings = Settings::findOrFail(decrypt($id));
        if($setings->delete())
        {
            return back()->with('success','Option deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong.');
    }

    public function ResellerFAQ()
    {
        $faqs = Settings::where('key','reseller_faq')->get();
        return view('backend.settings.reseller_faq',['faqs' => $faqs]);
    }

    public function ResellerAddFAQ()
    {
        return view('backend.settings.reseller_faq_add');
    }
}
