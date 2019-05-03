<?php

namespace App\Http\Controllers;

use App\User;
use App\Franchise;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFranchiseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;
use App\FranchiseWorkingDay;

class FranchiseController extends Controller
{
    protected $image_path = 'public/franchise_logo/';
    protected $thumbnail_big_image_path = 'public/franchise_logo/thumbnail_big/';
    protected $thumbnail_small_image_path = 'public/franchise_logo/thumbnail_small/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $franchises = User::find(session('user')->id)->franchises;
        $franchises = Franchise::where([
            ['user_id', '=', session('user')->id],
            ['status', '=', 1]
        ])->get();

        return view('franchise.index', ['franchises' => $franchises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('franchise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFranchiseRequest $request)
    {
        $validated = $request->validated();

        $franchise = new Franchise();
        $franchise->user_id = session('user')->id;
        $franchise->name = $request->name;
        $franchise->tag_line = $request->tag_line;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        $franchise->additional_phone = $request->additional_phone;
        $franchise->email = $request->email;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $db_filename = time() . '-' . $file->getClientOriginalName();

            if (strlen(trim($db_filename)) > 0) {
                $request->file('logo')->storeAs('public/franchise_logo/', $db_filename);
                $request->file('logo')->storeAs('public/franchise_logo/thumbnail_big/', $db_filename);
                $request->file('logo')->storeAs('public/franchise_logo/thumbnail_small/', $db_filename);

                $thumbnailpath = public_path('storage/franchise_logo/thumbnail_big/' . $db_filename);
                $img = Image::make($thumbnailpath)->resize(90, 90, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);

                $thumbnailpath = public_path('storage/franchise_logo/thumbnail_small/' . $db_filename);
                $img = Image::make($thumbnailpath)->resize(45, 45, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);

                $franchise->logo = $db_filename;
            }
        }

        $franchise->monday = $request->monday;
        $franchise->tuesday = $request->tuesday;
        $franchise->wednesday = $request->wednesday;
        $franchise->thursday = $request->thursday;
        $franchise->friday = $request->friday;
        $franchise->saturday = $request->saturday;
        $franchise->sunday = $request->sunday;

        $franchise->save();

        return redirect()->route('franchisesPage');
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
    public function edit($id)
    {
        $franchise = Franchise::find($id);
        return view('franchise.edit', [
            'franchise' => $franchise
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFranchiseRequest $request, $id)
    {
        $validated = $request->validated();

        $franchise = Franchise::find($id);
        $franchise->name = $request->name;
        $franchise->tag_line = $request->tag_line;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        $franchise->additional_phone = $request->additional_phone;
        $franchise->email = $request->email;

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $db_filename = time() . '-' . $file->getClientOriginalName();

            if (strlen(trim($db_filename)) > 0) {

                if (strlen(trim($franchise->logo)) > 0 and Storage::disk('local')->exists($franchise->logo)) {
                    $this->deleteProfileImage($franchise->logo);
                    $this->deleteProfileImageThumbnailBig($franchise->logo);
                    $this->deleteProfileImageThumbnailSmall($franchise->logo);
                }

                $request->file('logo')->storeAs('public/franchise_logo/', $db_filename);
                $request->file('logo')->storeAs('public/franchise_logo/thumbnail_big/', $db_filename);
                $request->file('logo')->storeAs('public/franchise_logo/thumbnail_small/', $db_filename);

                $thumbnailpath = public_path('storage/franchise_logo/thumbnail_big/' . $db_filename);
                $img = Image::make($thumbnailpath)->resize(90, 90, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);

                $thumbnailpath = public_path('storage/franchise_logo/thumbnail_small/' . $db_filename);
                $img = Image::make($thumbnailpath)->resize(45, 45, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);

                $franchise->logo = $db_filename;
            }
        }

        $franchise->monday = $request->monday;
        $franchise->tuesday = $request->tuesday;
        $franchise->wednesday = $request->wednesday;
        $franchise->thursday = $request->thursday;
        $franchise->friday = $request->friday;
        $franchise->saturday = $request->saturday;
        $franchise->sunday = $request->sunday;

        $franchise->save();

        $request->session()->flash('status', 'Franchise Updated!');

        return redirect()->route('editFranchisePage', $franchise->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function operations($id)
    {
        $franchise = Franchise::find($id);

        return view('franchise.operations', [
            'franchise' => $franchise,
        ]);
    }

    public function fetchLogoImage($filename)
    {
        $file = Storage::disk('local')->get($this->image_path . $filename);
        return $file;
    }

    public function fetchLogoImageThumbnailBig($filename)
    {
        $file = Storage::disk('local')->get($this->thumbnail_big_image_path . $filename);
        return $file;
    }

    public function fetchLogoImageThumbnailSmall($filename)
    {
        $file = Storage::disk('local')->get($this->thumbnail_small_image_path . $filename);
        return $file;
    }

    public function franchiseArenas($id)
    {
        $franchise = Franchise::find($id);

        return view('franchise.franchiseArenas', [
            'franchise' => $franchise
        ]);
    }
}
