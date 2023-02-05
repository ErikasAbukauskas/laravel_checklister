<?php

namespace App\Http\Controllers\Admin;

use App\Models\Checklist;
use Illuminate\Http\Request;
use App\Models\ChecklistGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;

class ChecklistController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create', compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChecklistRequest  $request
     * @param  \App\Models\ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->checklists()->create($request->validated());

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChecklistGroup $checklistGroup
     * @param  \App\Models\Checklist $Checklist
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklists.edit', compact('checklistGroup', 'checklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreChecklistRequest  $request
     * @param  \App\Models\ChecklistGroup $checklistGroup
     * @param  \App\Models\Checklist $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($request->validated());

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChecklistGroup $checklistGroup
     * @param  \App\Models\Checklist $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();

        return redirect()->route('home');
    }
}
