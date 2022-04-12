<?php

namespace Modules\Danhmuctaisan\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Danhmuctaisan\Entities\Suachua;
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
        //$suachuas = $this->suachua->all();

        return view('danhmuctaisan::admin.suachuas.index', compact(''));
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
     * Store a newly created resource in storage.
     *
     * @param  CreateSuachuaRequest $request
     * @return Response
     */
    public function store(CreateSuachuaRequest $request)
    {
        $this->suachua->create($request->all());

        return redirect()->route('admin.danhmuctaisan.suachua.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('danhmuctaisan::suachuas.title.suachuas')]));
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
