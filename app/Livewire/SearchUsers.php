<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers extends Component
{
    use WithPagination;

    public $search = '';
    public $tab = 'active';
    public $perPage = 5;

    // Novos filtros
    public $filtroPagamento = null;
    public $filtroPagamentoRealizado = null;
    public $filtroLote = null;
    public $filtroAdventista = null;
    public $filtroCarro = null;
    public $filtroVegetariano = null;
    public $filtroDataCadastro = null;

    public function setTab($tab)
    {
        $this->tab = $tab;
        $this->resetPage();
    }

    public function updatingSearch($propertyName)
    {
        // Lista de filtros que podem disparar o reset da página
        $filtrosQueResetamPagina = [
            'filtroPagamento',
            'filtroPagamentoRealizado',
            'filtroLote',
            'filtroAdventista',
            'filtroVegetariano',
            'filtroDataCadastro',
        ];

        // Se a propriedade que está sendo atualizada for um dos filtros, reseta a página
        if (in_array($propertyName, $filtrosQueResetamPagina)) {
            $this->resetPage();
        }
    }


    public function setPerPage($number)
    {
        $this->perPage = $number;
        $this->resetPage();
    }

    public function render()
    {
        $query = User::whereHas('retiro2025', function ($q) {
            if ($this->tab === 'active') {
                $q->where('ativo', true);
            } elseif ($this->tab === 'inactive') {
                $q->where('ativo', false);
            }
        });

        // Aplicar pesquisa nos campos desejados
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhereHas('retiro2025', function ($q2) {
                        $q2->where('cpf', 'like', '%' . $this->search . '%')
                            ->orWhere('telefone', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Filtro para Forma de Pagamento
        if (!empty($this->filtroPagamento)) {
            $query->whereHas('retiro2025', function ($q) {
                $q->where('forma_pagamento', $this->filtroPagamento);
            });
        }

        // Filtro para Pagamento Realizado
        if (isset($this->filtroPagamentoRealizado) && $this->filtroPagamentoRealizado !== '') {
            $query->whereHas('retiro2025', function ($q) {
                $q->where('pagamento_realizado', $this->filtroPagamentoRealizado);
            });
        }

        // Filtro para Lote
        if (!empty($this->filtroLote)) {
            $query->whereHas('retiro2025', function ($q) {
                $q->where('lote', $this->filtroLote);
            });
        }

        // Filtro para Adventista
        if ($this->filtroAdventista !== null) {
            $query->whereHas('retiro2025', function ($q) {
                // Verifica se o valor de filtroAdventista não está vazio e aplica o filtro
                if ($this->filtroAdventista !== '') {
                    $q->where('adventista', $this->filtroAdventista);
                }
            });
        }

        // Filtro para Vegetariano
        if ($this->filtroVegetariano !== null && $this->filtroVegetariano !== '') {
            $query->whereHas('retiro2025', function ($q) {
                $q->where('vegetariano', $this->filtroVegetariano);
            });
        }

        // Filtro para Carro
        if ($this->filtroCarro !== null) {
            $query->whereHas('retiro2025', function ($q) {
                $q->where('carro', $this->filtroCarro);
            });
        }

        // Filtro para Data de Cadastro
        if ($this->filtroDataCadastro) {
            switch ($this->filtroDataCadastro) {
                case 'hoje':
                    $query->whereDate('created_at', today());
                    break;
                case 'ultima_semana':
                    $query->where('created_at', '>=', now()->subWeek());
                    break;
                case 'ultimo_mes':
                    $query->where('created_at', '>=', now()->subMonth());
                    break;
                case 'crescente':
                    $query->orderBy('created_at', 'asc'); // Ordena da mais antiga para a mais nova
                    break;
                case 'decrescente':
                    $query->orderBy('created_at', 'desc'); // Ordena da mais recente para a mais antiga
                    break;
            }
        }


        return view('livewire.search-users', [
            'usuarios' => $query->paginate($this->perPage),
            'totalAtivos' => User::whereHas('retiro2025', function ($q) {
                $q->where('ativo', true);
            })->count(),
            'totalInativos' => User::whereHas('retiro2025', function ($q) {
                $q->where('ativo', false);
            })->count(),
        ]);
    }
}
