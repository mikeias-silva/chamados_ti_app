<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Http\Requests\SituacoesRequest;
use App\Services\SituacoesService;
use App\Models\Situacoes;

class SituacoesControllerTest extends TestCase
{
    public function testStore()
    {
        // Cria o mock do serviço SituacoesService
        $situacoesServiceMock = $this->createMock(SituacoesService::class);

        // Configura o mock para retornar um objeto Situacoes simulado quando o método createSituacao() for chamado
        $situacaoSimulada = new Situacoes(); // Substitua essa linha pela criação do objeto simulado real com os dados esperados
        $situacoesServiceMock->expects($this->once())
            ->method('createSituacao')
            ->willReturn($situacaoSimulada);

        // Define o mock como a instância de SituacoesService usada no controlador
        $this->app->instance(SituacoesService::class, $situacoesServiceMock);

        // Executa a chamada para a rota store usando o método post()
        $response = $this->post('/situacoes', [
            'nome' => 'Novo'
        ]);

        // Verifica se a resposta é bem-sucedida e contém a mensagem de sucesso
        $response->assertStatus(302); // Redirecionamento de sucesso
        $response->assertSessionHas('success', 'Cadastrado com sucesso!');
    }
}
