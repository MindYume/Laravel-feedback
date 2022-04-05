<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function addApplication(Request $request) {
        $validateRequest = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'company' => 'required',
            'application_title' => 'required',
            'message' => 'required'
        ]);

       

        $application = new Feedback;
        $application->user_id = Auth::user()->id;
        $application->name = $request->name;
        $application->phone_number = $request->phone_number;
        $application->company = $request->company;
        $application->application_title = $request->application_title;
        $application->message = $request->message;
        
        if(isset($request->file)) {
                $application->file_path = "storage/".$request->file('file')->store('uploads', 'public');
                $application->file_name = $request->file('file')->getClientOriginalName();
        } else {
            $application->file_path = "No file";
            $application->file_name = "No file";
        }

        $application->save();

        return redirect(route('applications'));
    }

    public function deleteApplication(Request $request) {
        $validateRequest = $request->validate([
            'application_id' => 'required',
        ]);

        $application = Feedback::find($request->application_id);
        if($application->file_path != "No file") {
            unlink(public_path($application->file_path));
        }
        $application->delete();

        return redirect(route('applications'));
    }
}
