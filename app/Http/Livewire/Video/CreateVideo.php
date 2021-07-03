<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;

    public  $channel;
    public  $video;
    public $videoFile;

    protected function rules()
    {
        return [
            'videoFile' => 'required|mimes:mp4|max:102400'

        ];
    }

    public function mount(Channel $channel, Video $video)
    {
        $this->channel = $channel;
    }
    public function render()
    {
        return view('livewire.video.create-video')
            ->extends('layouts.app');
    }

    public function uploadCompleted()
    {
        $this->validate();
        $path = $this->videoFile->store('videos-temp');

        $this->video = $this->channel->videos()->create([
            'title' => 'untitled',
            'uid' => uniqid(true),
            'path' => basename($path)

        ]);

        return redirect()->route('video.edit', [$this->channel, $this->video]);
    }

    /* public function upload()
    {
        $this->validate([
            'videoFile' => 'required|mimes:mp4|max:102400',
        ]);
    }*/
}
