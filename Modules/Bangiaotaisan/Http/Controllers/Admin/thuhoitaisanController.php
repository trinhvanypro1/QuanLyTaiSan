<?php

namespace Modules\Bangiaotaisan\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bangiaotaisan\Entities\thuhoitaisan;
use Modules\Bangiaotaisan\Http\Requests\CreatethuhoitaisanRequest;
use Modules\Bangiaotaisan\Http\Requests\UpdatethuhoitaisanRequest;
use Modules\Bangiaotaisan\Repositories\thuhoitaisanRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class thuhoitaisanController extends AdminBaseController
{
    /**
     * @var thuhoitaisanRepository
     */
    private $thuhoitaisan;

    public function __construct(thuhoitaisanRepository $thuhoitaisan)
    {
        parent::__construct();

        $this->thuhoitaisan = $thuhoitaisan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$thuhoitaisans = $this->thuhoitaisan->all();

        return view('bangiaotaisan::admin.thuhoitaisans.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bangiaotaisan::admin.thuhoitaisans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatethuhoitaisanRequest $request
     * @return Response
     */
    public function store(CreatethuhoitaisanRequest $request)
    {
        $this->thuhoitaisan->create($request->all());

        return redirect()->route('admin.bangiaotaisan.thuhoitaisan.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bangiaotaisan::thuhoitaisans.title.thuhoitaisans')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  thuhoitaisan $thuhoitaisan
     * @return Response
     */
    public function edit(thuhoitaisan $thuhoitaisan)
    {
        return view('bangiaotaisan::admin.thuhoitaisans.edit', compact('thuhoitaisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  thuhoitaisan $thuhoitaisan
     * @param  UpdatethuhoitaisanRequest $request
     * @return Response
     */
    public function update(thuhoitaisan $thuhoitaisan, UpdatethuhoitaisanRequest $request)
    {
        $this->thuhoitaisan->update($thuhoitaisan, $request->all());

        return redirect()->route('admin.bangiaotaisan.thuhoitaisan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bangiaotaisan::thuhoitaisans.title.thuhoitaisans')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  thuhoitaisan $thuhoitaisan
     * @return Response
     */
    public function destroy(thuhoitaisan $thuhoitaisan)
    {
        $this->thuhoitaisan->destroy($thuhoitaisan);

        return redirect()->route('admin.bangiaotaisan.thuhoitaisan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bangiaotaisan::thuhoitaisans.title.thuhoitaisans')]));
    }
}
