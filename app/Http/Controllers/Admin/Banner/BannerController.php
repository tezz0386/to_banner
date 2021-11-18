<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Models\Admin\Banner\Banner;
use App\Support\ImageSupport;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use Auth;

class BannerController extends Controller
{
    protected $imageSupport;
    protected $banner;
    protected $imageWidth=810;
    protected $imageHeight=456;
    protected $folderName='admin.banner.';
    function __construct(Banner $banner, ImageSupport $imageSupport)
    {
        $this->middleware('auth');
        $this->imageSupport=$imageSupport;
        $this->banner = $banner;
    }
    public function getBanners()
    {
        return Banner::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->folderName.'index', [
            'banners'=>$this->getBanners(),
            'page'=>'banner',
            'activePage'=>'banner_list',
            'n'=>1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->folderName.'form', [
            'page'=>'banner',
            'activePage'=>'banner_create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //
        $this->banner->fill($request->all());
        $image = $this->imageSupport->saveAnyImg($request, 'banners', 'image', $this->imageWidth, $this->imageHeight);
        $this->banner->image=$image;
        $this->banner->created_by = Auth::user()->id;
        if(!$request->has('status')){
            $this->banner->status=false;
        }
        if($this->banner->save()){
            Toastr::success('Successfully 1 banner has added', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully 1 banner has added');
        }else{
            return back()->withInput()->with('error', 'Oppsss, Could not be added please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
        return view($this->folderName.'form', [
            'banner'=>$banner,
            'activePage'=>'banner_create',
            'page'=>'banner',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        //
        $this->banner = $banner;
        $this->banner->fill($request->all());
        $this->banner->created_by = Auth::user()->id;
        if(!$request->file('image')==''){
            $image = $this->imageSupport->saveAnyImg($request, 'banners', 'image', $this->imageWidth, $this->imageHeight);
            $this->banner->image=$image;
        }
        if(!$request->has('status')){
            $this->banner->status=false;
        }
        if($this->banner->save()){
            Toastr::success('Successfully 1 banner has updated', 'Success !!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully 1 banner has updated');
        }else{
            return back()->withInput()->with('error', 'Oppsss, Could not be updated please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Banner\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
        if($banner->delete()){
            Toastr::success('Successfully Banner has deleted', 'Success !!!', ['positionClass'=>'toast-buttom-right']);
            return redirect()->route('banner.index')->with('success', 'Successfully Banner has deleted');
        }else{
            return back()->withInput()->with('error', 'Could not be deleted please try again later');
        }
    }
}
