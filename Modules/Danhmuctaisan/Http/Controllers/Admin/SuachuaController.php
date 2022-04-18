<?php

namespace Modules\Danhmuctaisan\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Danhmuctaisan\Entities\Suachua;
use Modules\Thuhoitaisan\Entities\Thuhoitaisan;
use Modules\Danhmuctaisan\Http\Requests\CreateSuachuaRequest;
use Modules\Danhmuctaisan\Http\Requests\UpdateSuachuaRequest;
use Modules\Danhmuctaisan\Repositories\SuachuaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SuachuaController extends AdminBaseController
{
    /**
     * @var SuachuaRepository
     */
    private $suachua;

    public function __construct(SuachuaRepository $suachua)
    {
        parent::__construct();

        $this->suachua = $suachua;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $biencotaisans = DB::table('thuhoitaisan')->get();
        $join_taisan = DB::table('taisan')->get();
        $join_phongban = DB::table('danhmucphongban')->get();
        $join_nhanvien = DB::table('danhmucnhanvien')->get();

        return view('danhmuctaisan::admin.suachuas.index')
        ->with('biencotaisans',$biencotaisans)
        ->with('join_taisan',$join_taisan)
        ->with('join_phongban',$join_phongban)
        ->with('join_nhanvien',$join_nhanvien);
    }

    public function dsmat(){
        $biencotaisans = DB::table('thuhoitaisan')->get();
        $join_taisan = DB::table('taisan')->get();
        $join_phongban = DB::table('danhmucphongban')->get();
        $join_nhanvien = DB::table('danhmucnhanvien')->get();

        return view('danhmuctaisan::admin.suachuas.dsmat')
        ->with('biencotaisans',$biencotaisans)
        ->with('join_taisan',$join_taisan)
        ->with('join_phongban',$join_phongban)
        ->with('join_nhanvien',$join_nhanvien);
    }
    public function dssuachua(){
        $suachuas = DB::table('suachua')->get();
        $join_taisan = DB::table('taisan')->get();
        $join_nhacungcap = DB::table('danhmucnhacungcap')->get();
        $join_user = DB::table('users')->get();
        return view('danhmuctaisan::admin.suachuas.dssuachua')
        ->with('join_taisan',$join_taisan)
        ->with('join_nhacungcap',$join_nhacungcap)
        ->with('join_user',$join_user)
        ->with('suachuas',$suachuas);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhmuctaisan::admin.suachuas.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Thuhoitaisan $thuhoitaisan
     * @return Response
     */
    public function taosuachua(Thuhoitaisan $thuhoitaisan){
        $taisans=DB::table('taisan')->get();
        $users = DB::table('users')->get();
        $phongbans = DB::table('danhmucphongban')->get();
        $nhanviens = DB::table('danhmucnhanvien')->get();
        $nhacungcaps = DB::table('danhmucnhacungcap')->get();
        return view('danhmuctaisan::admin.suachuas.taosuachua', compact('thuhoitaisan'))
            ->with('taisans',$taisans)
            ->with('users',$users)
            ->with('phongbans',$phongbans)
            ->with('nhanviens',$nhanviens)
            ->with('nhacungcaps',$nhacungcaps);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Suachua $suachua
     * @return Response
     */
    public function capnhatsuachua(Suachua $suachua){
        $taisans=DB::table('taisan')->get();
        $users = DB::table('users')->get();
        $phongbans = DB::table('danhmucphongban')->get();
        $nhanviens = DB::table('danhmucnhanvien')->get();
        $nhacungcaps = DB::table('danhmucnhacungcap')->get();
        return view('danhmuctaisan::admin.suachuas.capnhatsuachua',compact('suachua'))
        ->with('taisans',$taisans)
        ->with('users',$users)
        ->with('phongbans',$phongbans)
        ->with('nhanviens',$nhanviens)
        ->with('nhacungcaps',$nhacungcaps);
    }

    public function cnsuachua(CreateSuachuaRequest $request){
        $this->suachua->capnhatsuachua($request->all());

        return redirect()->route('admin.danhmuctaisan.suachua.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuctaisan::suachuas.title.suachuas')]));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSuachuaRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data= array();
        $data['taisansuachua_id']=$request->taisansuachua;
        $data['nhanviennhap_id']=$request->nhanviennhap;
        $data['nhacungcap_id']=$request->nhacungcap;
        $data['tinhtrang']=$request->tinhtrang;
        $data['ngaysuachua']=$request->ngaysuachua;
        $data['motahuhai']=$request->motahuhai;
        $data['soluongsuachua']=$request->soluongsuachua;
        do {
            $timestamp = mt_rand(0, 9999);
            $masuachua = 'MSC-'.date("Yd-").$timestamp;
         } while ( DB::table( 'suachua' )->where( 'masuachua',$masuachua  )->exists() );
        $data['masuachua']=$masuachua;
        DB::table('suachua')->insert($data);
            return redirect()->route('admin.danhmuctaisan.suachua.index')
            ->with('masuachua',$masuachua);
        // $this->suachua->create($request->all());

        // return redirect()->route('admin.danhmuctaisan.suachua.index')
        //     ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuctaisan::suachuas.title.suachuas')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Suachua $suachua
     * @return Response
     */
    public function edit(Suachua $suachua)
    {
        return view('danhmuctaisan::admin.suachuas.edit', compact('suachua'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Suachua $suachua
     * @param  UpdateSuachuaRequest $request
     * @return Response
     */
    public function update(Suachua $suachua, UpdateSuachuaRequest $request)
    {
        $this->suachua->update($suachua, $request->all());

        return redirect()->route('admin.danhmuctaisan.suachua.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('danhmuctaisan::suachuas.title.suachuas')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Suachua $suachua
     * @return Response
     */
    public function destroy(Suachua $suachua)
    {
        $this->suachua->destroy($suachua);

        return redirect()->route('admin.danhmuctaisan.suachua.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('danhmuctaisan::suachuas.title.suachuas')]));
    }
}
