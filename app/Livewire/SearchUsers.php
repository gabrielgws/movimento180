<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public $tab = 'active';

    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        $usuarios = User::whereHas('retiro2025', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        });

        // Filtro baseado na aba ativa
        if ($this->tab === 'active') {
            $usuarios->whereHas('retiro2025', function ($query) {
                $query->where('ativo', true);
            });
        } elseif ($this->tab === 'inactive') {
            $usuarios->whereHas('retiro2025', function ($query) {
                $query->where('ativo', false);
            });
        }

        return view('livewire.search-users', [
            'usuarios' => $usuarios->get(),
        ]);
    }
}
