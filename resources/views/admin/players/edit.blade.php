<x-layout>
@include ('_header')
    <x-admin.setting :heading="'Edit ' . $player->player_name">
        <x-panel>
            <form action="/admin/players/{{ $player->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <x-form.input name="player_status" type="checkbox" label="Active" value="1" :checked="$player->player_status == 1" />
                    <!-- <input type="hidden" name="player_status" value="0" id="player_status"> -->
                    <x-form.input name="player_name" type="text" label="Name" :value="old('player_name', $player->player_name)" />
                    <x-form.input name="player_dob" type="date" label="DOB" :value="old('player_dob', $player->player_dob)" />
                    <div class="sm:col-span-2">
                        <x-form.label name="position_id" label="Position" />
                        <select name="position_id" id="position_id">
                            @foreach (\App\Models\Position::all() as $position)
                                <option
                                    value="{{ $position->id}}"
                                    {{ old('position_id', $player->position_id) == $position->id ? 'selected' : '' }}
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
                                    {{ old('region_id', $player->region_id) == $region->id ? 'selected' : '' }}
                                >{{ ucwords($region->name) }}</option>
                            @endforeach
                        </select>
                        <x-form.error name="region_id" />
                    </div>
                    <x-form.textarea name="player_bio" type="text" label="Bio">{{ old('player_bio', $player->player_bio) }}</x-form.textarea>
                    <x-form.input name="player_height" type="text" label="Height" :value="old('player_height', $player->player_height)" />
                    <x-form.input name="player_preferred_foot" type="text" label="Preferred Foot" :value="old('player_preferred_foot', $player->player_preferred_foot)" />
                    <div class="flex mt-6 sm:col-span-2">
                        <div class="flex-1">
                            <x-form.input name="player_image" type="file" label="Image" :value="old('player_image', $player->player_image)" />
                        </div>
                        <img src="{{ asset('storage/' . $player->player_image) }}" alt="Player Image" class="round-xl ml-6" width="100">
                    </div>
                </div>
                <x-form.button name="Update Player" />

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