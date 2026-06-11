<?php

namespace App\Livewire;

use App\Models\Announcement;
use App\Models\ClearanceRequest;
use App\Models\Unit;
use App\Services\AnnouncementService;
use Livewire\Component;

class Announcements extends Component
{

    public string $search = '';
    public string $priority = 'all';


    public function getAnnouncementsProperty(AnnouncementService $service)
    {
       return $service->getAnnouncements(
           user()->unit,
           $this->search,
           $this->priority
       );
    }


    public function render()
    {
        return view('livewire.app.officer.announcements',
            [
                'announcements' => $this->announcements,
            ]
        );
    }
}
