<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingresso;
use App\Models\Sessao;

class IngressoSeeder extends Seeder
{
    public function run(): void
    {
        $sessoes = Sessao::orderBy('id')->pluck('id')->all();

        $clientes = ['João Silva', 'Maria Souza', 'Carlos Pereira', 'Eric Zannini', 'Ana Lima', 'Pedro Rocha', 'Júlia Alves', 'Bruno Dias'];
        $tipos = ['Inteira', 'Meia'];

        // Gera vendas espalhadas nos últimos 10 dias (para o gráfico de área)
        for ($d = 9; $d >= 0; $d--) {
            $data = now()->subDays($d)->toDateString();
            $quantidade = rand(1, 5);

            for ($i = 0; $i < $quantidade; $i++) {
                Ingresso::create([
                    'sessao_id' => $sessoes[array_rand($sessoes)],
                    'cliente_nome' => $clientes[array_rand($clientes)],
                    'assento' => chr(rand(65, 70)) . rand(1, 10),
                    'tipo_ingresso' => $tipos[array_rand($tipos)],
                    'data_venda' => $data,
                ]);
            }
        }
    }
}
