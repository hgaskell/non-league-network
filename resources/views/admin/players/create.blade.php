<x-layout>
@include ('_header')
    <x-admin.setting heading="Create New Player">
        <x-panel>
            <form action="/admin/players" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <x-form.input name="player_status" type="checkbox" label="Active" value="1" checked />
                    <x-form.input name="player_name" type="text" label="Name" />
                    <x-form.input name="player_dob" type="date" label="DOB" />
                    <div class="sm:col-span-2">
                        <x-form.label name="position_id" label="Position" />
                        <select name="position_id" id="position_id">
                            @foreach (\App\Models\Position::all() as $position)
                                <option
                                    value="{{ $position->id}}"
                                    {{ old('position_id') == $position->id ? 'selected' : '' }}
                                >{{ ucwords($position->name) }}</option>
                            @endforeach
                        </select>
                        <x-form.error name="position_id" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-form.label name="region_id" label="Region" />
                        <select name="region_id" id="region_id">
                            @foreach (\App\Models\Region::all() as $region)
                                <option
                                    value="{{ $region->id}}"
                                    {{ old('region_id') == $region->id ? 'selected' : '' }}
                                >{{ ucwords($region->name) }}</option>
                            @endforeach
                        </select>
                        <x-form.error name="region_id" />
                    </div>
                    <x-form.textarea name="player_bio" type="text" label="Bio" />
                    <x-form.input name="player_height" type="text" label="Height" />
                    <x-form.input name="player_preferred_foot" type="text" label="Preferred Foot" />
                    <x-form.input name="player_image" type="file" label="Image" />
                </div>
                <x-form.button name="Create Player" />

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </x-panel>
    </x-admin.setting>
</x-layout>