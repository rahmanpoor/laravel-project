<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Models\User;
use App\Models\Notify\SMS;
use App\Jobs\SendSmsToUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Http\Requests\Admin\Notify\SMSRequest;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sms = SMS::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.notify.sms.index', compact('sms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SMSRequest $request)
    {

        $inputs = $request->all();

        // //date fixes
        // $realTimestampStart = substr($request->published_at, 0, 10);
        // $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);

        $sms = SMS::create($inputs);

        return redirect()->route('admin.notify.sms.index')->with('swal-success', 'پیامک با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SMS $sms)
    {
        return view('admin.notify.sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SMSRequest $request, SMS $sms)
    {
        $inputs = $request->all();

        //date fixes
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$realTimestampStart);

        $sms->update($inputs);

        return redirect()->route('admin.notify.sms.index')->with('swal-success', 'پیامک با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMS $sms)
    {
        $result = $sms->delete();
        return redirect()->route('admin.notify.sms.index')->with('swal-success', 'اطلاعیه با موفقیت حذف شد');
    }

    public function status(SMS $sms)
    {
        $sms->status = $sms->status == 0 ? 1 : 0;
        $result = $sms->save();
        if ($result) {

            if ($sms->status == 0) {

                return response()->json(['status' => true, 'checked' => false]);
            } else {

                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {

            return response()->json(['status' => false]);
        }
    }

    public function sendSMS(SMS $sms)
    {

        // $mobiles = User::whereNotNull('mobile')
        //     ->pluck('mobile')
        //     ->implode(',');


            $smsService = new SmsService();
            $smsService->setFrom('50002710066430');
            $smsService->setTo($sms->to);
            $smsService->setText($sms->body);
            $smsService->sendSms();




        return back()->with('swal-success', 'پیامک با موفقیت ارسال شد');
    }
}
