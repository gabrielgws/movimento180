<?php

namespace App\Exports;

use App\Models\Retiro2025;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * Retorna todos os usuários da tabela retiro2025 para exportação.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Obtém todos os registros da tabela retiro2025
        $retiro2025 = Retiro2025::all();

        // Mapeia os valores dos campos para seus descritivos
        return $retiro2025->map(function ($item) {
            return [
                // $item->id,
                // $item->user_id,
                $item->nome_completo,
                $item->telefone,
                $item->birthday,
                $item->cpf,
                $item->rg,
                $this->mapFormaPagamento($item->forma_pagamento),
                $this->mapPagamentoRealizado($item->pagamento_realizado),
                $item->lote,
                $this->mapAdventista($item->adventista),
                $item->bairro_igreja,
                $item->outra_denominação,
                $this->mapVegetariano($item->vegetariano),
                $this->mapCarro($item->carro),
                $item->expectativa_retiro,
                $item->created_at,
                $item->updated_at,
                $item->ativo ? 'Ativo' : 'Inativo', // Ativo ou Inativo
                $item->descricao
            ];
        });
    }

    /**
     * Mapeia os valores do campo 'forma_pagamento' para descritivos.
     */
    private function mapFormaPagamento($value)
    {
        return $value === 'a_vista' ? 'À Vista' : 'Dividido';
    }

    /**
     * Mapeia os valores do campo 'pagamento_realizado' para descritivos.
     */
    private function mapPagamentoRealizado($value)
    {
        return $value ? 'Pagamento Realizado' : 'Pagamento Não Realizado';
    }

    /**
     * Mapeia os valores do campo 'adventista' para descritivos.
     */
    private function mapAdventista($value)
    {
        $map = [
            '0' => 'Sim, sou batizado.',
            '1' => 'Não, sou adventista.',
            '2' => 'Sou adventista mas afastado.',
            '3' => 'Não sou adventista mas pretendo ser.',
            '4' => 'Não sou adventista batizado mas estou sempre envolvido em programas e eventos.',
            '5' => 'Sou de outra denominação.'
        ];

        return $map[$value] ?? 'Desconhecido';
    }

    /**
     * Mapeia os valores do campo 'vegetariano' para descritivos.
     */
    private function mapVegetariano($value)
    {
        $map = [
            '0' => 'Sim',
            '1' => 'Vegano',
            '2' => 'Não'
        ];

        return $map[$value] ?? 'Desconhecido';
    }

    /**
     * Mapeia os valores do campo 'carro' para descritivos.
     */
    private function mapCarro($value)
    {
        $map = [
            '0' => 'Sim e posso dar carona',
            '1' => 'Sim e não tenho espaço para carona',
            '2' => 'Não e preciso de carona',
            '3' => 'Não, mas já tenho carona',
            '4' => 'Outro',
            '5' => 'Desconhecido'
        ];

        return $map[$value] ?? 'Desconhecido';
    }

    /**
     * Define os cabeçalhos da planilha de exportação.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            // 'ID',
            // 'User ID',
            'Nome Completo',
            'Telefone',
            'Data de Nascimento',
            'CPF',
            'RG',
            'Forma de Pagamento',
            'Pagamento Realizado',
            'Lote',
            'Adventista',
            'Bairro da Igreja',
            'Outra Denominação',
            'Vegetariano',
            'Carro',
            'Expectativa do Retiro',
            'Data de Criação',
            'Data de Atualização',
            'Ativo',
            'Descrição'
        ];
    }
}
