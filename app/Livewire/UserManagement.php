<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    // Adjust this list to match the roles your app actually uses
    public array $roles = ['student', 'admin', 'officer'];

    // Badge color per role, keyed the same as $roles — used by x-badge in the view
    public array $roleColors = [
        'student' => '#1447E6',
        'officer' => '#E17100',
        'admin' => '#C6005C',
    ];

    public string $search = '';

    // Form fields
    public ?int $editingUserId = null;
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $role = 'student';
    public string $password = '';
    public string $password_confirmation = '';

    public ?int $deleteId = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openCreateModal()
    {
        $this->reset(['editingUserId', 'first_name', 'last_name', 'email', 'role', 'password', 'password_confirmation']);
        $this->role = 'student';
        $this->js('$flux.modal("user-form-modal").show()');
    }

    public function openEditMode(int $userId)
    {
        $user = User::findOrFail($userId);

        $this->editingUserId = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->password = '';
        $this->password_confirmation = '';

        $this->js('$flux.modal("user-form-modal").show()');
    }

    protected function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->editingUserId),
            ],
            'role' => ['required', Rule::in($this->roles)],
            'password' => $this->editingUserId
                ? 'nullable|string|min:8|confirmed'
                : 'required|string|min:8|confirmed',
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->editingUserId) {
            $user = User::findOrFail($this->editingUserId);
            $user->first_name = $validated['first_name'];
            $user->last_name = $validated['last_name'];
            $user->email = $validated['email'];
            $user->role = $validated['role'];

            if (filled($this->password)) {
                $user->password = Hash::make($this->password);
            }

            $user->save();

            $message = 'User updated successfully';

        } else {
            User::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'role' => $validated['role'],
                'password' => Hash::make($this->password),
                'email_verified_at' => now(),
            ]);

            $message = 'User added successfully';
        }

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => $message,
        ]);

        $this->js('$flux.modal("user-form-modal").close()');
        $this->reset(['editingUserId', 'first_name', 'last_name', 'email', 'role', 'password', 'password_confirmation']);
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->deleteId);

        // Guard against a superadmin deleting their own account by accident
        if ($user->id === auth()->id()) {
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => "You can't delete your own account.",
            ]);
            return;
        }

        $user->delete();

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'User deleted successfully',
        ]);

        $this->deleteId = null;
        $this->js('$flux.modal("delete-user").close()');

    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('first_name', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.app.admin.user-management', [
            'users' => $users,
        ]);
    }
}
