<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\User\AdminUserRequest;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('user_type', 1)->get();
        return view('admin.user.admin-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.admin-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request, ImageService $imageService)
    {

        $inputs = $request->all();


        if ($request->hasFile('profile_photo_path')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));

            if ($result === false) {
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['profile_photo_path'] = $result;
        }



        $inputs['password'] = Hash::make($request->password);
        $inputs['user_type'] = 1;
        $user = User::create($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', ' ادمین با موفقیت ثبت شد');
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
    public function edit(User $user)
    {
         return view('admin.user.admin-user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, User $user, ImageService $imageService)
    {
        $inputs = $request->all();



        if ($request->hasFile('profile_photo_path')) {

            if (!empty($user->profile_photo_path)) {
                $imageService->deleteImage($user->profile_photo_path);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');


            $result = $imageService->save($request->file('profile_photo_path'));

            if ($result === false) {
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
        //logo end


        $user->update($inputs);

        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $user->forceDelete();
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', ' ادمین با موفقیت حذف شد');
    }


    public function status(User $user)
    {

        $user->status = $user->status == 0 ? 1 : 0;
        $result = $user->save();
        if ($result) {

            if ($user->status == 0) {

                return response()->json(['status' => true, 'checked' => false]);
            } else {

                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {

            return response()->json(['status' => false]);
        }
    }

    public function activation(User $user)
    {
        $user->activation = $user->activation == 0 ? 1 : 0;
        $result = $user->save();
        if ($result) {

            if ($user->activation == 0) {

                return response()->json(['activation' => true, 'checked' => false]);
            } else {

                return response()->json(['activation' => true, 'checked' => true]);
            }
        } else {

            return response()->json(['activation' => false]);
        }
    }
}
