<?php

namespace App\Http\Controllers\Backend;

use App\Models\Bill;
use Carbon\CarbonPeriod;
use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Information;
use App\Models\Subscribe;

class StudentController extends Controller
{
    public function Students(Request $request)
    {
        $students = Admission::latest();
        if($request->search !== null){
            $students
            ->where('student_name','LIKE',"%{$request->search}%")
            ->orWhere('email','LIKE',"%{$request->search}%")
            ->orWhere('phone','LIKE',"%{$request->search}%")
            ->orWhere('course_name','LIKE',"%{$request->search}%");
        }
        $students = $students->paginate(20);
        return view('backend.students',['students' => $students]);
    }

    public function Edit($id)
    {
        $student = Admission::findOrFail(decrypt($id));
        return view('backend.edit-student',['student' => $student]);
    }
    public function Delete($id)
    {
        $setings = Admission::findOrFail(decrypt($id));
        if($setings->delete())
        {
            return back()->with('success','Student deleted successfully!');
        }
        return back()->with('error','Sorry! Something went wrong.');
    }
    public function Update(Request $request,$id)
    {
        $student = Admission::findOrFail(decrypt($id));
        if($student->course_duration == $request->course_duration){
            $student->bill_status = 1;
        }else{
            $student->bill_status = 0;
        }
        $student->student_name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->course_duration = $request->course_duration;


        $student->update();
        return redirect()->route('students')->with('success','Student updated successfully!');
    }

    public function PaymentDetails($id)
    {
        $student = Admission::findOrFail(decrypt($id));
        $admission_end_date = Carbon::createFromFormat('Y-m',$student->created_at->format('Y-m'))->addMonth($student->course_duration)->format('Y-m');
        $period = CarbonPeriod::create($student->created_at->format('Y-m'),'1 Month',$admission_end_date);
        //dd($admission_end_date);
        if($student->bill_status == 0){
            foreach ($period as $key => $dt) {
                $db = Bill::where('admission_id',$student->id)->where('date',$dt)->first();
                if(empty($db)){
                    if(date('Y-m',strtotime($dt)) !== $student->created_at->format('Y-m')){
                        $bill                 = new Bill();
                        $bill->date           = $dt;
                        $bill->admission_id   = $student->id;
                        $bill->due            = 0;
                        $bill->discount       = 0;
                        $bill->amount         = 1500;
                        $bill->save();
                    }
                }
    
            }
            $student->bill_status = 1;
            $student->update();
        }
        $payments = Bill::where('admission_id',decrypt($id))->latest()->paginate(24);
        return view('backend.bill_details',['student' => $student,'payments' => $payments] );
    }

    public function Pay($id)
    {
        $payment = Bill::with('student')->findOrFail(decrypt($id));
        return view('backend.pay',['payment' => $payment]);
    }

    public function OneTimePayment($id)
    {
        $student = Admission::findOrFail(decrypt($id));
        return view('backend.one-time-pay',['student' => $student]);
    }

    public function OneTimePaymentStore(Request $request)
    {
        $previous_bill = Bill::where('admission_id',$request->admission_id);
        $previous_bill->delete();

        $bill                 = new Bill();
        $bill->admission_id   = $request->admission_id;
        $bill->date           = date('Y-m-d');
        $bill->amount         = $request->amount;
        $bill->due            = $request->due ?? 0;
        $bill->discount       = $request->discount ?? 0;
        $bill->status         = $request->status;
        $bill->save();


        return redirect()->route('payment.details',encrypt($request->admission_id))->with('success','Pay successfully!');
    }

    public function PayStore(Request $request,$id)
    {
        $pay = Bill::findOrFail(decrypt($id));

        $pay->amount = $request->amount;
        $pay->student->due_amount -= $request->amount;
        $pay->student->update();
        $pay->due = $request->due;
        $pay->discount = $request->discount;
        $pay->status = $request->status;
        $pay->update();

        return redirect()->route('payment.details',encrypt($pay->student->id))->with('success','Pay successfully!');
    }

    public function PaymentInvoice($id)
    {
        $bill = Bill::findOrFail(decrypt($id));
        $pdf = PDF::loadView('bill_invoice', ['bill' => $bill]);
	    return $pdf->stream('payment-invoice.pdf');
    }

    public function InformationCollect()
    {
        $categories = Category::latest()->get();
        return view('backend.information_collect',['categories' => $categories]);
    }

    public function InformationStore(Request $request)
    {
        $info = new Information();
        $info->meeting_with = $request->meeting_with;
        $info->category_id = $request->category_id;
        $info->name = $request->name;
        $info->for_whom = $request->for_whom;
        $info->which_course = $request->which_course;
        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->profession = $request->profession;
        $info->institution = $request->institution;
        $info->approximate_age = $request->approximate_age;
        $info->address = $request->address;
        $info->additional = $request->additional;
        $info->reminder_date = date('Y-m-d',strtotime($request->reminder_date));
        $info->save();

        return back()->with('success','Information Collection Done!');
    }

    public function InformationList()
    {
        $informations = Information::with('category')->latest();
        if(request()->month){
            $informations->whereMonth('created_at',request()->month);
        }
        if(request()->year){
            $informations->whereYear('created_at',request()->year);
        }

        return view('backend.information-list',['informations' => $informations->paginate(20)]);
    }

    public function InformationEdit($id)
    {
        $information = Information::with('category')->findOrFail(decrypt($id));
        $categories = Category::latest()->get();
        return view('backend.edit-information',['information' => $information,'categories' => $categories]);
    }

    public function SubscriberList()
    {
        $subscribers = Subscribe::latest()->paginate(15);
        return view('backend.subscriber',['subscribers' => $subscribers]);
    }
    public function InformationUpdate(Request $request,$id)
    {

        $info = Information::findOrFail(decrypt($id));
        $info->meeting_with = $request->meeting_with;
        $info->category_id = $request->category_id;
        $info->name = $request->name;
        $info->for_whom = $request->for_whom;
        $info->which_course = $request->which_course;
        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->profession = $request->profession;
        $info->institution = $request->institution;
        $info->approximate_age = $request->approximate_age;
        $info->address = $request->address;
        $info->additional = $request->additional;
        $info->status = $request->status;
        $info->reminder_date = date('Y-m-d',strtotime($request->reminder_date));
        $info->update();

        return back()->with('success','Information Collection Updated Done!');
    }
}
