<?php

namespace App\Http\Controllers\Backend\Administration\Machine;

use App\Models\Administration\Machine;
use App\Repositories\Backend\Administration\MachineRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Administration\MachineRequest;

/**
 * Class MachineController.
 */
class MachineController extends Controller
{

    /**
     * @var MachineRepository
     */
    protected $machineRepository;

    /**
     *
     */
    public function __construct(MachineRepository $machineRepository)
    {
        $this->machineRepository = $machineRepository;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function index(MachineRequest $request)
    {
        $machines = Machine::orderBy('nom','asc')->get();

        return view('backend.administration.machine.index')
            ->with('machines', $machines);
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(MachineRequest $request)
    {
        return view('backend.administration.machine.create');
    }

    /**
     * @param MachineRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function store(MachineRequest $request)
    {
        $this->machineRepository->create($request->only('nom', 'description', 'image', 'active'));

        return redirect()->route('admin.administration.machine.index')->withFlashSuccess(__('alerts.backend.machines.created'));
    }

    /**
     * @param MachineRequest $request
     * @param Machine              $machine
     *
     * @return mixed
     */
    public function edit(MachineRequest $request, Machine $machine)
    {
        return view('backend.administration.machine.edit')
            ->with('machine', $machine);
    }

    /**
     * @param MachineRequest $request
     * @param Machine              $machine
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(MachineRequest $request, Machine $machine)
    {
        $this->machineRepository->update($machine, $request->only('nom', 'description', 'image', 'active'));

        return redirect()->route('admin.administration.machine.index')->withFlashSuccess(__('alerts.backend.machines.updated'));
    }

    /**
     * @param MachineRequest $request
     * @param Machine        $machine
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(MachineRequest $request, Machine $machine)
    {
        $this->machineRepository->deleteById($machine->id);

        return redirect()->route('admin.administration.machine.index')->withFlashSuccess(__('alerts.backend.machines.deleted'));
    }
}
