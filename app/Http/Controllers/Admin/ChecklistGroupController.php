<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChecklistGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;

class ChecklistGroupController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.checklist_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChecklistGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist_groups.edit', compact('checklistGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreChecklistGroupRequest  $request
     * @param  \App\Models\ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();

        return redirect()->route('home');
    }
}
