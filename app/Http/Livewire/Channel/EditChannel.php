<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class EditChannel extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $channel;
    public $logo;
    protected function rules()
    {
        return [
            'channel.name' => 'required|string|max:255|unique:channels,name,' . $this->channel->id,
            'channel.slug' => 'required|string|max:255|unique:channels,slug,' . $this->channel->id,
            'channel.description' => 'nullable|max:500',
            'logo' => 'nullable|image|max:1024', // 1MB Max
        ];
    }
    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }
    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function update()
    {
        $this->authorize('edit', $this->channel);
        $this->validate();
        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => $this->channel->slug,
            'description' => $this->channel->description
        ]);
        if ($this->logo) {
            $logo = $this->logo->storeAs('logos', $this->channel->uid . '.png');
            $this->channel->update([
                'image' => $logo
            ]);
        }

        session()->flash('message', 'Channel Updated!');
        return redirect()->route('channel.edit', $this->channel->slug);
    }
}
