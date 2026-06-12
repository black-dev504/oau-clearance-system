<?php

namespace App\Services;
use App\Models\Announcement;
use App\Models\Unit;

class AnnouncementService
{
    public function getAnnouncements(Unit $unit, $searchValue, $priority= null)
    {

        $query =  Announcement::query()
            ->whereHas('units', function ($q) use ($unit, $priority) {
                $q->where('units.id', $unit->id)
                    ->when($priority != 'all', fn ($q) => $q->where('priority', $priority));
                ;
            });


        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('title', 'like', '%'.$searchValue.'%');
            });

        }

        return $query->paginate();
    }

    public function makeAnnouncement(array $data, array $recipients)
    {
        $announcement = Announcement::create(
            [
                ...$data,
                'created_by' => auth()->id(),
            ]
        );
        $announcement->units()->attach($recipients);
    }

        public function editAnnouncement(Announcement $announcement, array $data, array $recipients)
        {
            $announcement->update($data);
            $announcement->units()->sync($recipients);
        }

    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
    }
}
