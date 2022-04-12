<?php

namespace Modules\Baocao\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Baocao\Entities\Baocaokhac;
use Modules\Baocao\Http\Requests\CreateBaocaokhacRequest;
use Modules\Baocao\Http\Requests\UpdateBaocaokhacRequest;
use Modules\Baocao\Repositories\BaocaokhacRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class BaocaokhacController extends AdminBaseController
{
    /**
     * @var BaocaokhacRepository
     */
    private $baocaokhac;

    public function __construct(BaocaokhacRepository $baocaokhac)
    {
        parent::__construct();

        $this->baocaokhac = $baocaokhac;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$baocaokhacs = $this->baocaokhac->all();

        return view('baocao::admin.baocaokhacs.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('baocao::admin.baocaokhacs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBaocaokhacRequest $request
     * @return Response
     */
    public function store(CreateBaocaokhacRequest $request)
    {
        $this->baocaokhac->create($request->all());

        return redirect()->route('admin.baocao.baocaokhac.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('baocao::baocaokhacs.title.baocaokhacs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Baocaokhac $baocaokhac
     * @return Response
     */
    public function edit(Baocaokhac $baocaokhac)
    {
        return view('baocao::admin.baocaokhacs.edit', compact('baocaokhac'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Baocaokhac $baocaokhac
     * @param  UpdateBaocaokhacRequest $request
     * @return Response
     */
    public function update(Baocaokhac $baocaokhac, UpdateBaocaokhacRequest $request)
    {
        $this->baocaokhac->update($baocaokhac, $request->all());

        return redirect()->route('admin.baocao.baocaokhac.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('baocao::baocaokhacs.title.baocaokhacs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Baocaokhac $baocaokhac
     * @return Response
     */
    public function destroy(Baocaokhac $baocaokhac)
    {
        $this->baocaokhac->destroy($baocaokhac);

        return redirect()->route('admin.baocao.baocaokhac.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('baocao::baocaokhacs.title.baocaokhacs')]));
    }
}
