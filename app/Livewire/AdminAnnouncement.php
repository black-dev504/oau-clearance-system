<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminAnnouncement extends Component
{
    public string $title;
    public string $content;
    public string $priority;
    public array $recipients = [];

    public function submit()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'recipients' => 'required|array',
            'recipients.*' => 'exists:units,id',

        ]);

        $announcement = Announcement::create(
            [
                ...$validated,
                'created_by' => auth()->id(),
            ]
        );
        $announcement->units()->attach($this->recipients);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Announcement created successfully!'
        ]);
        $this->js('$flux.modal("add-announcement").close()');
        $this->dispatch('announcement-created');
        $this->reset(['title', 'content', 'priority', 'recipients']);
    }

    public function render()
    {
        return view('livewire.app.admin.announcements', [
            'announcements' => Announcement::latest()->get(),
        ]);
    }
}
