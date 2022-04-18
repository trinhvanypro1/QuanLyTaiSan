<?php

namespace Modules\Danhmuctaisan\Http\Controllers\Admin;

use DB;
use PharIo\Manifest\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bangiaotaisan\Entities\Bangiaotaisan;
use Modules\Danhmuctaisan\Entities\Nhaptaisan;
use Modules\Danhmuctaisan\Http\Requests\CreateNhaptaisanRequest;
use Modules\Danhmuctaisan\Http\Requests\UpdateNhaptaisanRequest;
use Modules\Danhmuctaisan\Repositories\NhaptaisanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class NhaptaisanController extends AdminBaseController
{
    /**
     * @var NhaptaisanRepository
     */
    private $nhaptaisan;

    public function __construct(NhaptaisanRepository $nhaptaisan)
    {
        parent::__construct();

        $this->nhaptaisan = $nhaptaisan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nhaptaisans = DB::table('taisan')->orderby('id','desc')->get();
        $join_loaitaisan = DB::table('danhmucloaitaisan')->get();
        
        $join_nhacungcap = DB::table('danhmucnhacungcap')->get();
        
        return view('danhmuctaisan::admin.nhaptaisans.index', compact('nhaptaisans'))
        ->with('join_loaitaisan',$join_loaitaisan)->with('join_nhacungcap',$join_nhacungcap);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        $loaitaisan = DB::table('danhmucloaitaisan')->orderby('id','desc')->get();
        $tennhacungcap = DB::table('danhmucnhacungcap')->orderby('id','desc')->get();
        return view('danhmuctaisan::admin.nhaptaisans.create')
        ->with('loaitaisan',$loaitaisan)
        ->with('tennhacungcap',$tennhacungcap);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNhaptaisanRequest $request
     * @return Response
     */
    public function store(CreateNhaptaisanRequest $request)
    {
        $data = array();
        $price=filter_var($request->tongtaisan, FILTER_SANITIZE_NUMBER_INT);
        
        do {
            $timestamp = mt_rand(0, 9999);
            $mataisan = 'TS-'.date("Yd-").$timestamp;
         } while ( DB::table( 'taisan' )->where( 'mataisan',$mataisan)->exists() );
        $data['mataisan']=$mataisan;

        $data['tentaisan']= $request->tentaisan;
        $data['soluong']= $request->soluong;
        $data['soserial']= $request->soserial;
        $data['donvi']= $request->donvi;
        $data['phanloaitaisan']= $request->phanloaitaisan;
        $data['loaitaisan_id']= $request->loaitaisan_id;
        $data['muckhtbhangnam']= $request->muckhtbhangnam;
        $data['nhacungcap_id']= $request->nhacungcap_id;
        $data['tongtaisan']= $price;
        $data['ngaysudung']= $request->ngaysudung;
        $data['baohanh']= $request->baohanh;
        $data['mota']=$request->mota;

        $get_image = $request->file('hinhanh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image= current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images', $new_image);
            $data['hinhanh']=$new_image;
            DB::table('taisan')->orderby('id','desc')->insert($data);
            return redirect()->route('admin.danhmuctaisan.nhaptaisan.index');
        }
        $data['hinhanh']='';
        DB::table('taisan')->orderby('id','desc')->insert($data);
        return redirect()->route('admin.danhmuctaisan.nhaptaisan.index');
        // $this->nhaptaisan->create($request->all());

        // return redirect()->route('admin.danhmuctaisan.nhaptaisan.index')
        //     ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuctaisan::nhaptaisans.title.nhaptaisans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Nhaptaisan $nhaptaisan
     * @return Response
     */
    public function edit(Nhaptaisan $nhaptaisan)
    {
        $edit_taisan = DB::table('taisan')->where('id',$nhaptaisan->id)->get();
        $phanloaitaisan = DB::table('taisan')->orderby('id','desc')->get();
        $phongban = DB::table('danhmucphongban')->orderby('id','desc')->get();
        $loaitaisan = DB::table('danhmucloaitaisan')->orderby('id','desc')->get();
        $tennhanvien = DB::table('danhmucnhanvien')->orderby('id','desc')->get();
        $tennhacungcap = DB::table('danhmucnhacungcap')->orderby('id','desc')->get();
        return view('danhmuctaisan::admin.nhaptaisans.edit', compact('nhaptaisan'))
        ->with('loaitaisan',$loaitaisan)->with('phongban',$phongban)
        ->with('tennhanvien',$tennhanvien)->with('tennhacungcap',$tennhacungcap)
        ->with('edit_taisan',$edit_taisan)->with('phanloaitaisan',$phanloaitaisan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Nhaptaisan $nhaptaisan
     * @param  UpdateNhaptaisanRequest $request
     * @return Response
     */
    public function update(Nhaptaisan $nhaptaisan, UpdateNhaptaisanRequest $request)
    {
        // $data = array();
        // $data['mataisan']= $request->mataisan;
        // $data['tentaisan']= $request->tentaisan;
        // $data['soluong']= $request->soluong;
        // $data['soserial']= $request->soserial;
        // $data['donvi']= $request->donvi;
        // $data['phanloaitaisan']= $request->phanloaitaisan;
        // $data['maloaitaisan']= $request->maloaitaisan;
        // $data['muckhtbhangnam']= $request->muckhtbhangnam;
        // $data['manhacungcap']= $request->manhacungcap;
        // $data['tongtaisan']= $request->tongtaisan;
        // $data['mataisan']= $request->mataisan;

        // $get_image = $request->file('hinhanh');
        // if($get_image){
        //     $get_name_image = $get_image->getClientOriginalName();
        //     $name_image= current(explode('.', $get_name_image));
        //     $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('public/images', $new_image);
        //     $data['hinhanh']=$new_image;
        //     DB::table('taisan')->where('id',$nhaptaisan->id)->update($data);
        //     return redirect()->route('admin.danhmuctaisan.nhaptaisan.index');
        // }
        // $data['hinhanh']='';
        // DB::table('taisan')->insert($data);
        // return redirect()->route('admin.danhmuctaisan.nhaptaisan.index');
        $this->nhaptaisan->update($nhaptaisan, $request->all());

        return redirect()->route('admin.danhmuctaisan.nhaptaisan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('danhmuctaisan::nhaptaisans.title.nhaptaisans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Nhaptaisan $nhaptaisan
     * @return Response
     */
    public function destroy(Nhaptaisan $nhaptaisan)
    {
        $this->nhaptaisan->destroy($nhaptaisan);

        return redirect()->route('admin.danhmuctaisan.nhaptaisan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('danhmuctaisan::nhaptaisans.title.nhaptaisans')]));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Nhaptaisan $nhaptaisan
     * @return Response
     */
    public function details(Nhaptaisan $nhaptaisan)
    {
        
        $join_loaitaisan = DB::table('danhmucloaitaisan')
        ->get();
        
        $join_nhacungcap = DB::table('danhmucnhacungcap')
        ->get();
        
        return view('danhmuctaisan::admin.nhaptaisans.details', compact('nhaptaisan'))
        ->with('join_loaitaisan',$join_loaitaisan)->with('join_nhacungcap',$join_nhacungcap);
        
    }

            /**
     * Remove the specified resource from storage.
     *
     * @param  Nhaptaisan $nhaptaisan
     * @return Response
     */
    public function usage_history(Nhaptaisan $nhaptaisan)
    {
    
        $bangiaotaisans = DB::table('bangiaotaisan')->get();
        $thuhoitaisans = DB::table('thuhoitaisan')->get();
        $users = DB::table('users')->get();
        $taisans = DB::table('taisan')->get();
        $phongbans = DB::table('danhmucphongban')->get();
        $nhanviens = DB::table('danhmucnhanvien')->get();
        return view('danhmuctaisan::admin.nhaptaisans.usage-history', compact('nhaptaisan'))
        ->with('bangiaotaisans',$bangiaotaisans)
        ->with('thuhoitaisans',$thuhoitaisans)
        ->with('users',$users)
        ->with('phongbans',$phongbans)
        ->with('taisans',$taisans)
        ->with('nhanviens',$nhanviens);
        
        
    }

}
