<?php

namespace Modules\Thuhoitaisan\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bangiaotaisan\Entities\Bangiaotaisan;
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
    public function index(Thuhoitaisan $thuhoitaisan)
    {
        $muontaisans = DB::table('bangiaotaisan')->get();
        $join_taisan = DB::table('taisan')->get();
        $join_phongban = DB::table('danhmucphongban')->get();
        $join_nhanvien = DB::table('danhmucnhanvien')->get();
        $join_user = DB::table('users')->get();
        return view('thuhoitaisan::admin.thuhoitaisans.index', compact('thuhoitaisan'))
            ->with('join_taisan',$join_taisan)
            ->with('join_user',$join_user)
            ->with('join_phongban',$join_phongban)
            ->with('join_nhanvien',$join_nhanvien)
            ->with('muontaisans',$muontaisans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bangiaotaisan $bangiaotaisan
     * @return Response
     */
    public function create(Bangiaotaisan $bangiaotaisan)
    {
        $join_taisan = DB::table('taisan')->get();
        return view('thuhoitaisan::admin.thuhoitaisans.create',compact('bangiaotaisan'))
        ->with('join_taisan',$join_taisan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateThuhoitaisanRequest $request
     * @return Response
     */
    public function store(CreateThuhoitaisanRequest $request)
    {
        $this->thuhoitaisan->create($request->all());

        return redirect()->route('admin.thuhoitaisan.thuhoitaisan.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('thuhoitaisan::thuhoitaisans.title.thuhoitaisans')]));
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
