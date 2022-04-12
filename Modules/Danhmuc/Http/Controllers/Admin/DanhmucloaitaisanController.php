<?php

namespace Modules\Danhmuc\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Danhmuc\Entities\Danhmucloaitaisan;
use Modules\Danhmuc\Http\Requests\CreateDanhmucloaitaisanRequest;
use Modules\Danhmuc\Http\Requests\UpdateDanhmucloaitaisanRequest;
use Modules\Danhmuc\Repositories\DanhmucloaitaisanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DanhmucloaitaisanController extends AdminBaseController
{
    /**
     * @var DanhmucloaitaisanRepository
     */
    private $danhmucloaitaisan;

    public function __construct(DanhmucloaitaisanRepository $danhmucloaitaisan)
    {
        parent::__construct();

        $this->danhmucloaitaisan = $danhmucloaitaisan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $danhmucloaitaisans = $this->danhmucloaitaisan->all();

        return view('danhmuc::admin.danhmucloaitaisans.index', compact('danhmucloaitaisans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = array();
        do {
            $timestamp = mt_rand(0, 10000);
            $maloaitaisan = 'LTS-'.date("ds").$timestamp;
         } while ( DB::table( 'danhmucloaitaisan' )->where( 'maloaitaisan',$maloaitaisan)->exists() );
        $data['maloaitaisan']=$maloaitaisan;
        return view('danhmuc::admin.danhmucloaitaisans.create')->with('maloaitaisan',$maloaitaisan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDanhmucloaitaisanRequest $request
     * @return Response
     */
    public function store(CreateDanhmucloaitaisanRequest $request)
    {
        $this->danhmucloaitaisan->create($request->all());

        return redirect()->route('admin.danhmuc.danhmucloaitaisan.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuc::danhmucloaitaisans.title.danhmucloaitaisans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Danhmucloaitaisan $danhmucloaitaisan
     * @return Response
     */
    public function edit(Danhmucloaitaisan $danhmucloaitaisan)
    {
        return view('danhmuc::admin.danhmucloaitaisans.edit', compact('danhmucloaitaisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Danhmucloaitaisan $danhmucloaitaisan
     * @param  UpdateDanhmucloaitaisanRequest $request
     * @return Response
     */
    public function update(Danhmucloaitaisan $danhmucloaitaisan, UpdateDanhmucloaitaisanRequest $request)
    {
        $this->danhmucloaitaisan->update($danhmucloaitaisan, $request->all());

        return redirect()->route('admin.danhmuc.danhmucloaitaisan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('danhmuc::danhmucloaitaisans.title.danhmucloaitaisans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Danhmucloaitaisan $danhmucloaitaisan
     * @return Response
     */
    public function destroy(Danhmucloaitaisan $danhmucloaitaisan)
    {
        $this->danhmucloaitaisan->destroy($danhmucloaitaisan);

        return redirect()->route('admin.danhmuc.danhmucloaitaisan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('danhmuc::danhmucloaitaisans.title.danhmucloaitaisans')]));
    }
}
