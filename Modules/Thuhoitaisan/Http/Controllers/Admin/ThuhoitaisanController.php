<?php

namespace Modules\Thuhoitaisan\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bangiaotaisan\Entities\Bangiaotaisan;
use Modules\Danhmuctaisan\Entities\Nhaptaisan;
use Modules\Thuhoitaisan\Entities\Thuhoitaisan;
use Modules\Thuhoitaisan\Http\Requests\CreateThuhoitaisanRequest;
use Modules\Thuhoitaisan\Http\Requests\UpdateThuhoitaisanRequest;
use Modules\Thuhoitaisan\Repositories\ThuhoitaisanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ThuhoitaisanController extends AdminBaseController
{
    /**
     * @var ThuhoitaisanRepository
     */
    private $thuhoitaisan;

    public function __construct(ThuhoitaisanRepository $thuhoitaisan)
    {
        parent::__construct();

        $this->thuhoitaisan = $thuhoitaisan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Thuhoitaisan $thuhoitaisan
     * @return Response
     */
    public function index()
    {
        $muontaisans = DB::table('bangiaotaisan')->get();
        $join_taisan = DB::table('taisan')->get();
        $join_phongban = DB::table('danhmucphongban')->get();
        $join_nhanvien = DB::table('danhmucnhanvien')->get();
        $join_user = DB::table('users')->get();
        return view('thuhoitaisan::admin.thuhoitaisans.index')
            ->with('join_taisan',$join_taisan)
            ->with('join_user',$join_user)
            ->with('join_phongban',$join_phongban)
            ->with('join_nhanvien',$join_nhanvien)
            ->with('muontaisans',$muontaisans);
    }

    public function dsthuhoitaisan(){
        $thuhoitaisans = DB::table('thuhoitaisan')->get();
        $join_taisan = DB::table('taisan')->get();
        $join_phongban = DB::table('danhmucphongban')->get();
        $join_nhanvien = DB::table('danhmucnhanvien')->get();
        $join_user = DB::table('users')->get();
        return view('thuhoitaisan::admin.thuhoitaisans.dsthuhoitaisan')
        ->with('join_taisan',$join_taisan)
        ->with('join_user',$join_user)
        ->with('join_phongban',$join_phongban)
        ->with('join_nhanvien',$join_nhanvien)
        ->with('thuhoitaisans',$thuhoitaisans);
    }
    public function thuhoi(Bangiaotaisan $bangiaotaisan){
        $taisans=DB::table('taisan')->get();
        $users = DB::table('users')->get();
        $phongbans = DB::table('danhmucphongban')->get();
        $nhanviens = DB::table('danhmucnhanvien')->get();
        return view('thuhoitaisan::admin.thuhoitaisans.thuhoi',compact('bangiaotaisan'))
        ->with('taisans',$taisans)
        ->with('users',$users)
        ->with('phongbans',$phongbans)
        ->with('nhanviens',$nhanviens);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bangiaotaisan $bangiaotaisan
     * @return Response
     */
    public function create()
    {

        
        return view('thuhoitaisan::admin.thuhoitaisans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateThuhoitaisanRequest $request
     * @return Response
     */
    public function store(Request $request)
    {


        $tinhtrang = $request->tinhtrang;
        if($tinhtrang==1){
            $data= array();
            $data['ngaythuhoi']=$request->ngaythuhoi;
            $data['nhanvienthuhoi_id']=$request->nhanvienthuhoi;
            $data['bophanbithuhoi_id']=$request->phongbanbithuhoi;
            $data['nhanvienbithuhoi_id']=$request->nhanvienbithuhoi;
            $data['soluong']=$request->soluong;
            $data['tinhtrang']=$request->tinhtrang;
            $data['lydothuhoi']=$request->lydothuhoi;
            $data['taisan_id']=$request->taisanthuhoi;
    
            do {
                $timestamp = mt_rand(0, 9999);
                $mathuhoi = 'MTH-'.date("Yd-").$timestamp;
             } while ( DB::table( 'thuhoitaisan' )->where( 'mathuhoi',$mathuhoi  )->exists() );
            $data['mathuhoi']=$mathuhoi;
            $taisan = DB::table('taisan')->where('id','=',$request->taisanthuhoi)
            ->decrement('soluong', (int) $request->soluong);
            
            $thuhoi = DB::table('bangiaotaisan')->where('taisan_id','=',$request->taisanthuhoi)
            ->decrement('so_luong_ban_giao', (int) $request->soluong);
    
            DB::table('thuhoitaisan')->insert($data);
            return redirect()->route('admin.thuhoitaisan.thuhoitaisan.index')
            ->with('mathuhoi',$mathuhoi)
            ->with('taisan',$taisan)
            ->with('thuhoi',$thuhoi);
        }
        elseif($tinhtrang==2){
            $data= array();
            $data['ngaythuhoi']=$request->ngaythuhoi;
            $data['nhanvienthuhoi_id']=$request->nhanvienthuhoi;
            $data['bophanbithuhoi_id']=$request->phongbanbithuhoi;
            $data['nhanvienbithuhoi_id']=$request->nhanvienbithuhoi;
            $data['soluong']=$request->soluong;
            $data['tinhtrang']=$request->tinhtrang;
            $data['lydothuhoi']=$request->lydothuhoi;
            $data['taisan_id']=$request->taisanthuhoi;
    
            do {
                $timestamp = mt_rand(0, 9999);
                $mathuhoi = 'MTH-'.date("Yd-").$timestamp;
             } while ( DB::table( 'thuhoitaisan' )->where( 'mathuhoi',$mathuhoi  )->exists() );
            $data['mathuhoi']=$mathuhoi;
            
            $thuhoi = DB::table('bangiaotaisan')->where('taisan_id','=',$request->taisanthuhoi)
            ->decrement('so_luong_ban_giao', (int) $request->soluong);
    
            DB::table('thuhoitaisan')->insert($data);
            return redirect()->route('admin.thuhoitaisan.thuhoitaisan.index')
            ->with('mathuhoi',$mathuhoi)
            ->with('thuhoi',$thuhoi);
        }
        else{
            $data= array();
            $data['ngaythuhoi']=$request->ngaythuhoi;
            $data['nhanvienthuhoi_id']=$request->nhanvienthuhoi;
            $data['bophanbithuhoi_id']=$request->phongbanbithuhoi;
            $data['nhanvienbithuhoi_id']=$request->nhanvienbithuhoi;
            $data['soluong']=$request->soluong;
            $data['tinhtrang']=$request->tinhtrang;
            $data['lydothuhoi']=$request->lydothuhoi;
            $data['taisan_id']=$request->taisanthuhoi;
    
            do {
                $timestamp = mt_rand(0, 9999);
                $mathuhoi = 'MTH-'.date("Yd-").$timestamp;
             } while ( DB::table( 'thuhoitaisan' )->where( 'mathuhoi',$mathuhoi  )->exists() );
            $data['mathuhoi']=$mathuhoi;
            
            $thuhoi = DB::table('bangiaotaisan')->where('taisan_id','=',$request->taisanthuhoi)
            ->decrement('so_luong_ban_giao', (int) $request->soluong);
    
            DB::table('thuhoitaisan')->insert($data);
            return redirect()->route('admin.thuhoitaisan.thuhoitaisan.index')
            ->with('mathuhoi',$mathuhoi)

            ->with('thuhoi',$thuhoi);
        }
        
        // $this->thuhoitaisan->create($request->all());

        // return redirect()->route('admin.thuhoitaisan.thuhoitaisan.index')
        //     ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('thuhoitaisan::thuhoitaisans.title.thuhoitaisans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Thuhoitaisan $thuhoitaisan
     * @return Response
     */
    public function edit(Thuhoitaisan $thuhoitaisan)
    {
        return view('thuhoitaisan::admin.thuhoitaisans.edit', compact('thuhoitaisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Thuhoitaisan $thuhoitaisan
     * @param  UpdateThuhoitaisanRequest $request
     * @return Response
     */
    public function update(Thuhoitaisan $thuhoitaisan, UpdateThuhoitaisanRequest $request)
    {
        $this->thuhoitaisan->update($thuhoitaisan, $request->all());

        return redirect()->route('admin.thuhoitaisan.thuhoitaisan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('thuhoitaisan::thuhoitaisans.title.thuhoitaisans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Thuhoitaisan $thuhoitaisan
     * @return Response
     */
    public function destroy(Thuhoitaisan $thuhoitaisan)
    {
        $this->thuhoitaisan->destroy($thuhoitaisan);

        return redirect()->route('admin.thuhoitaisan.thuhoitaisan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('thuhoitaisan::thuhoitaisans.title.thuhoitaisans')]));
    }
}
