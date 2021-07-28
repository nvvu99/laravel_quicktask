<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\PersonalProfile;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSkillRequest $request, PersonalProfile $profile)
    {
        $validatedData = $request->all();

        $skill = new Skill();
        $skill->name = $validatedData['name'];
        $skill->personal_profile_id = $profile->id;
        $skill->save();

        return redirect()->route('profiles.show', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $this->authorize('update', $skill);

        $validatedData = $request->all();
        $skill->update($validatedData);

        $profile = $skill->profile;

        return redirect()->route('profiles.show', ['profile' => $profile]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $this->authorize('delete', $skill);

        $profile = $skill->profile;
        $skill->delete();

        return redirect()->route('profiles.show', ['profile' => $profile]);
    }
}
