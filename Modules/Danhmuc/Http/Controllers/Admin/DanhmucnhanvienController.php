<?php

namespace Modules\Danhmuc\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;
use Modules\Danhmuc\Entities\Danhmucnhanvien;
use Modules\Danhmuc\Http\Requests\CreateDanhmucnhanvienRequest;
use Modules\Danhmuc\Http\Requests\UpdateDanhmucnhanvienRequest;
use Modules\Danhmuc\Repositories\DanhmucnhanvienRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DanhmucnhanvienController extends AdminBaseController
{
    /**
     * @var DanhmucnhanvienRepository
     */
    private $danhmucnhanvien;

    public function __construct(DanhmucnhanvienRepository $danhmucnhanvien)
    {
        parent::__construct();

        $this->danhmucnhanvien = $danhmucnhanvien;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $danhmucnhanviens = DB::table('danhmucnhanvien')->orderby('id','desc')->get();
        $join_nhanvien = DB::table('danhmucphongban')->get();

        return view('danhmuc::admin.danhmucnhanviens.index', compact('danhmucnhanviens'))->with('join_nhanvien',$join_nhanvien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $phongban = DB::table('danhmucphongban')->orderby('id','desc')->get();
        $city = DB::table('tbl_tinhthanhpho')->orderby('matp','ASC')->get();
        $data = array();
        do {
            $timestamp = mt_rand(0, 10000);
            $manhanvien = 'NV-'.date("ds").$timestamp;
         } while ( DB::table( 'danhmucnhanvien' )->where( 'manhanvien',$manhanvien)->exists() );
        $data['manhanvien']=$manhanvien;

        return view('danhmuc::admin.danhmucnhanviens.create')
                ->with('phongban',$phongban)
                ->with('manhanvien',$manhanvien)
                ->with('city',$city);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDanhmucnhanvienRequest $request
     * @return Response
     */
    public function selectDiachi(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = DB::table('tbl_quanhuyen')->where('matp','=',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output .= '<option>--Chọn Quận/Huyện--</option>';
                foreach($select_province as $key => $province){
                    $output .= '<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else{

                $select_wards = DB::table('tbl_xaphuongthitran')->where('maqh','=',$data['ma_id'])->orderby('xaid','ASC')->get();
                    $output .= '<option>--Chọn Xã/Phường--</option>';
                foreach($select_wards as $key => $wards){
                    $output .= '<option value="'.$wards->xaid.'">'.$wards->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDanhmucnhanvienRequest $request
     * @return Response
     */
    public function store(CreateDanhmucnhanvienRequest $request)
    {
        $data= array();
        $data['manhanvien']=$request->manhanvien;
        $data['tennhanvien']=$request->tennhanvien;
        $data['gioitinh']=$request->gioitinh;
        $data['ngaysinh']=$request->ngaysinh;
        $data['cmnd']=$request->cmnd;
        $data['tongiao']=$request->tongiao;
        $data['dantoc']=$request->dantoc;
        $data['sonha']=$request->sonha;
        $data['xaphuong']=$request->xaphuong;
        $data['quanhuyen']=$request->quanhuyen;
        $data['tinhtp']=$request->tinhtp;
        $data['chuyenmon']=$request->chuyenmon;
        $data['trinhdo']=$request->trinhdo;
        $data['phongban_id']=$request->phongban;

        $get_image = $request->file('hinhanh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image= current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images_nhanvien', $new_image);
            $data['hinhanh']=$new_image;
            DB::table('danhmucnhanvien')->orderby('id','desc')->insert($data);
            return redirect()->route('admin.danhmuc.danhmucnhanvien.index');
        }
        $data['hinhanh']='';
        DB::table('danhmucnhanvien')->insert($data);
        return redirect()->route('admin.danhmuc.danhmucnhanvien.index');
        // $this->danhmucnhanvien->create($request->all());

        // return redirect()->route('admin.danhmuc.danhmucnhanvien.index')
        //     ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuc::danhmucnhanviens.title.danhmucnhanviens')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Danhmucnhanvien $danhmucnhanvien
     * @return Response
     */
    public function edit(Danhmucnhanvien $danhmucnhanvien)
    {
        $phongban = DB::table('danhmucphongban')->orderby('id','desc')->get();
        return view('danhmuc::admin.danhmucnhanviens.edit', compact('danhmucnhanvien'))->with('phongban',$phongban);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Danhmucnhanvien $danhmucnhanvien
     * @param  UpdateDanhmucnhanvienRequest $request
     * @return Response
     */
    public function update(Danhmucnhanvien $danhmucnhanvien, UpdateDanhmucnhanvienRequest $request)
    {
        $this->danhmucnhanvien->update($danhmucnhanvien, $request->all());

        return redirect()->route('admin.danhmuc.danhmucnhanvien.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('danhmuc::danhmucnhanviens.title.danhmucnhanviens')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Danhmucnhanvien $danhmucnhanvien
     * @return Response
     */
    public function destroy(Danhmucnhanvien $danhmucnhanvien)
    {
        $this->danhmucnhanvien->destroy($danhmucnhanvien);

        return redirect()->route('admin.danhmuc.danhmucnhanvien.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('danhmuc::danhmucnhanviens.title.danhmucnhanviens')]));
    }
}
