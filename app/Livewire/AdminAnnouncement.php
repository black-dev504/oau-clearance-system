<?php

namespace App\Livewire;

use App\Models\Announcement;
use App\Services\AnnouncementService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminAnnouncement extends Component
{
    public string $title;
    public string $content;
    public string $priority;
    public array $recipients = [];
    public bool $editing = false;
    public  $selectedAnnouncement;

    public function submit(AnnouncementService $service)
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'recipients' => 'required|array',
            'recipients.*' => 'exists:units,id',

        ]);

        $service->makeAnnouncement($validated, $this->recipients);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Announcement created successfully!'
        ]);
        $this->js('$flux.modal("add-announcement").close()');
        $this->dispatch('clear-recipients');
        $this->reset(['title', 'content', 'priority', 'recipients']);
    }

    public function viewAnnouncement($id)
    {

        $this->selectedAnnouncement = Announcement::findOrFail($id);
        $this->dispatch('modal-show', name: 'view-announcement');
    }

    public function openEditMode($announcement_id)
    {
        $this->editing = true;
       $this->selectedAnnouncement = Announcement::findOrFail($announcement_id);
        $this->title =$this->selectedAnnouncement->title;
        $this->content =$this->selectedAnnouncement->content;
        $this->priority =$this->selectedAnnouncement->priority;
        $this->recipients = $this->selectedAnnouncement->units->pluck('id')->toArray();
        $this->dispatch('populate-recipients', recipients: $this->recipients );
        $this->dispatch('modal-show', name: 'add-announcement');
    }

    public function editAnnouncement(AnnouncementService $service)
    {

        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'recipients' => 'required|array',
            'recipients.*' => 'exists:units,id',
        ]);

        $service->editAnnouncement($this->selectedAnnouncement, $validated, $this->recipients);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Announcement updated successfully!'
        ]);
        $this->js('$flux.modal("add-announcement").close()');
        $this->dispatch('announcement-updated');
        $this->reset(['title', 'content', 'priority', 'recipients']);
    }

    public function resetModal()
    {
        $this->editing = false;
        $this->selectedAnnouncement = null;
        $this->dispatch('clear-recipients');
        $this->reset(['title', 'content', 'priority', 'recipients']);
    }


    public function deleteAnnouncement($id, AnnouncementService $service)
    {
        $service->deleteAnnouncement($id);
        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Announcement Deleted Successfully.'
        ]);    }
    public function render()
    {
        return view('livewire.app.admin.announcements', [
            'announcements' => Announcement::latest()->get(),
        ]);
    }
}
