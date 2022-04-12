<?php

namespace Modules\Bangiaotaisan\Http\Controllers\Admin;

use DB;
use validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Danhmuc\Entities\Danhmucnhanvien;
use Modules\Danhmuc\Entities\Danhmucphongban;
use Modules\Bangiaotaisan\Entities\Bangiaotaisan;
use Modules\Bangiaotaisan\Http\Requests\CreateBangiaotaisanRequest;
use Modules\Bangiaotaisan\Http\Requests\UpdateBangiaotaisanRequest;
use Modules\Bangiaotaisan\Repositories\BangiaotaisanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BangiaotaisanController extends AdminBaseController
{
    /**
     * @var BangiaotaisanRepository
     */
    private $bangiaotaisan;

    public function __construct(BangiaotaisanRepository $bangiaotaisan)
    {
        parent::__construct();

        $this->bangiaotaisan = $bangiaotaisan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bangiaotaisans = DB::table('bangiaotaisan')->get();
        $join_nhanviennhantaisan = DB::table('danhmucnhanvien')->get();
        $join_phongbannhantaisan = DB::table('danhmucphongban')->get();
        $join_taisan = DB::table('taisan')->get();
        $join_nhanvienbangiao = DB::table('users')->get();
        return view('bangiaotaisan::admin.bangiaotaisans.index', compact('bangiaotaisans'))
        ->with('join_taisan',$join_taisan)
        ->with('join_nhanviennhantaisan',$join_nhanviennhantaisan)
        ->with('join_phongbannhantaisan',$join_phongbannhantaisan)
        ->with('join_nhanvienbangiao',$join_nhanvienbangiao);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(CreateBangiaotaisanRequest $request)
    {
        
        $nhanvienbangiao = DB::table('users')->orderby('id','desc')->get();
        $phongbannhantaisan = Danhmucphongban::orderby('id','ASC')->get();
        $nhanvien = DB::table('danhmucnhanvien')->orderby('phongban_id','ASC')->get();;
        $taisan= DB::table('taisan')->orderby('id','desc')->get();
        return view('bangiaotaisan::admin.bangiaotaisans.create')
                            ->with('phongbannhantaisan',$phongbannhantaisan)
                            ->with('nhanvien',$nhanvien)
                            ->with('taisan',$taisan)
                            ->with('nhanvienbangiao',$nhanvienbangiao);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBangiaotaisanRequest $request
     * @return Response
     */
    public function store(CreateBangiaotaisanRequest $request)
    {

        $data= array();
        $data['loai_ban_giao']=$request->loai_ban_giao;
        $data['ngay_ban_giao']=$request->ngay_ban_giao;
        $data['nhanvienbangiao_id']=$request->nhanvienbangiao;
        $data['phongbannhantaisan_id']=$request->phongban;
        $data['nhanviennhantaisan_id']=$request->nhanvien;
        $data['taisan_id']=$request->taisan;
        $data['so_luong_ban_giao']=$request->so_luong_ban_giao;
        $data['tinh_trang']=$request->tinh_trang;
        
        $taisan = DB::table('taisan')->where('id','=',$request->taisan)
        ->decrement('soluong', (int) $request->so_luong_ban_giao);

        do {
            $timestamp = mt_rand(0, 9999);
            $mabangiao = 'MBG-'.date("Yd-").$timestamp;
         } while ( DB::table( 'bangiaotaisan' )->where( 'ma_ban_giao',$mabangiao  )->exists() );
        $data['ma_ban_giao']=$mabangiao;

        $get_document = $request->file('hop_dong_ban_giao');
        if($get_document){
            $get_name_document = $get_document->getClientOriginalName();
            $name_document= current(explode('.', $get_name_document));
            $new_document = $name_document.rand(0,99).'.'.$get_document->getClientOriginalExtension();
            $get_document->move('public/document/', $new_document);
            $data['hop_dong_ban_giao']=$new_document;
            DB::table('bangiaotaisan')->insert($data);
            return redirect()->route('admin.bangiaotaisan.bangiaotaisan.index');
        } 
        $data['hop_dong_ban_giao']='';
        DB::table('bangiaotaisan')->insert($data);
        return redirect()->route('admin.bangiaotaisan.bangiaotaisan.index')->with('mabangiao',$mabangiao)->with('taisan',$taisan);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bangiaotaisan $bangiaotaisan
     * @return Response
     */
    public function edit(Bangiaotaisan $bangiaotaisan)
    {
        return view('bangiaotaisan::admin.bangiaotaisans.edit', compact('bangiaotaisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Bangiaotaisan $bangiaotaisan
     * @param  UpdateBangiaotaisanRequest $request
     * @return Response
     */
    public function update(Bangiaotaisan $bangiaotaisan, UpdateBangiaotaisanRequest $request)
    {
        $this->bangiaotaisan->update($bangiaotaisan, $request->all());

        return redirect()->route('admin.bangiaotaisan.bangiaotaisan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bangiaotaisan::bangiaotaisans.title.bangiaotaisans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bangiaotaisan $bangiaotaisan
     * @return Response
     */
    public function destroy(Bangiaotaisan $bangiaotaisan)
    {
        $this->bangiaotaisan->destroy($bangiaotaisan);

        return redirect()->route('admin.bangiaotaisan.bangiaotaisan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bangiaotaisan::bangiaotaisans.title.bangiaotaisans')]));
    }
    public function selectNhanvien(Request $request){
        $data = $request->all();
        if($data['action']){
            $output='';
            if($data['action']=="phongban"){   
                $select_nhanvien = Danhmucnhanvien::where('phongban_id',$data['ma_id'])->orderby('id','DESC')->get();
                $output.='<option>--Chọn nhân viên--</option>';
                foreach($select_nhanvien as $key => $nhanvien){
                    
                    $output .= '<option value="'.$nhanvien->id.'">'.$nhanvien->tennhanvien.'</option>';
                
            }
            }
        }
        echo $output;
    }

}
