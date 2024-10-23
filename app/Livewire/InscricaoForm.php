<?php

namespace App\Livewire;

use App\Models\Retiro2025;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class InscricaoForm extends Component
{
    public $nome_completo;
    public $telefone;
    public $birthday;
    public $cpf;
    public $rg;
    public $forma_pagamento;
    public $pagamento_realizado = false;

    public $adventista;
    public $bairro_igreja;
    public $outra_denominação;
    public $vegetariano;
    public $expectativa_retiro;

    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'nome_completo' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'telefone' => 'required|string',
        'birthday' => 'required|date_format:d/m/Y', // Validação para data em formato dd/mm/yyyy
        'cpf' => 'required|string|max:14',
        'rg' => 'required|string|max:20',
        'forma_pagamento' => 'required|in:a_vista,dividido',
//        'adventista' => 'required|in:sou batizado.,Não sou adventista.,Sou adventista mas afastado.,Não sou adventista mas pretendo ser.,Não sou adventista batizado mas estou sempre envolvido em programas e eventos.,Sou de outra denominação.',
        'adventista' => 'required|in:0,1,2,3,4,5',
        'bairro_igreja' => 'nullable|string|max:255',
        'outra_denominação' => 'nullable|string|max:255',
//        'vegetariano' => 'required|in:Sim,Sim, e vegano.,Não',
        'vegetariano' => 'required|in:0,1,2',
        'expectativa_retiro' => 'nullable|string',
        'password' => 'required|string|min:8|same:password_confirmation',
    ];

    // Mensagens de erro personalizadas
    protected function messages()
    {
        return [
            'nome_completo.required' => 'Por favor, insira o seu nome completo.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'telefone.required' => 'O número de telefone é obrigatório.',
            'birthday.required' => 'A data de nascimento é obrigatória.',
            'birthday.date_format' => 'A data de nascimento deve estar no formato dd/mm/yyyy.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.max' => 'O CPF não pode ter mais de 14 caracteres.',
            'rg.required' => 'O RG é obrigatório.',
            'forma_pagamento.required' => 'Escolha uma forma de pagamento.',
            'adventista.required' => 'Por favor, selecione sua condição adventista.',
            'vegetariano.required' => 'Informe se você é vegetariano.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'password.same' => 'As senhas devem coincidir.',
        ];
    }

    public function submit(): User
    {
        // Verifica a validação
        $validatedData = $this->validate();

        // Converte a data de nascimento para o formato esperado pelo banco de dados (yyyy-mm-dd)
        $birthday = Carbon::createFromFormat('d/m/Y', $this->birthday)->format('Y-m-d');

        $user = User::create([
            'name' => $this->nome_completo,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Salvar os detalhes de inscrição
        Retiro2025::create([
            'user_id' => $user->id,
            'nome_completo' => $this->nome_completo,
            'telefone' => $this->telefone,
            'birthday' => $birthday,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'forma_pagamento' => $this->forma_pagamento,
            'pagamento_realizado' => $this->pagamento_realizado,
            'adventista' => $this->adventista,
            'bairro_igreja' => $this->bairro_igreja,
            'outra_denominação' => $this->outra_denominação,
            'vegetariano' => $this->vegetariano,
            'expectativa_retiro' => $this->expectativa_retiro,
        ]);

//        session()->flash('message', 'Inscrição realizada com sucesso!');

        DB::transaction(function () use ($user) {
            $this->createTeam($user);
        });

        redirect()->route('obrigado');

        return $user;
    }

    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }

    public function render()
    {
        return view('livewire.inscricao-form');
    }
}
