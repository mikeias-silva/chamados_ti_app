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
       
        $situacoesServiceMock = $this->createMock(SituacoesService::class);

       
        $situacaoSimulada = new Situacoes();
        $situacoesServiceMock->expects($this->once())
            ->method('createSituacao')
            ->willReturn($situacaoSimulada);

  
        $this->app->instance(SituacoesService::class, $situacoesServiceMock);

      
        $response = $this->post('/situacoes', [
            'nome' => 'Novo'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Cadastrado com sucesso!');
    }
}
