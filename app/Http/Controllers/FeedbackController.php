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
        $application->save();

        return redirect(route('home'));
    }

    public function deleteApplication(Request $request) {
        $validateRequest = $request->validate([
            'application_id' => 'required',
        ]);

        $application = Feedback::find($request->application_id);
        $application->delete();

        return redirect(route('home'));
    }
}
