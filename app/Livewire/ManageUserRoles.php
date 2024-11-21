<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ManageUserRoles extends Component
{
    public $search = '';
    public $roles = [];

    public function mount()
    {
        $this->roles = [
            0 => 'Super Admin',
            1 => 'Admin',
            2 => 'Manager',
            3 => 'Editor',
            4 => 'Author',
            5 => 'User',
        ];
    }

    public function updateRole($userId, $role)
    {
        $user = User::find($userId);

        if($user) {
            $user->role = $role;
            $user->save();

            session()->flash('success', 'Role updated successfully');
        }
    }

    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.manage-user-roles', ['users' => $users]);
    }
}
