<?php

namespace NFePHP\NFe\Tests;

use NFePHP\Common\Certificate;
use NFePHP\NFe\Tools;

class ToolsTest extends NFeTestCase
{
    /**
     * @var Tools
     */
    protected $tools;
    
    protected function setUp()
    {
        $this->tools = new Tools($this->configJson, Certificate::readPfx($this->contentpfx, $this->passwordpfx));
    }
    
    /**
     * Testa a consulta pelo n�mero do recibo validando o par�metro vazio.
     */
    public function testSefazConsultaReciboThrowsInvalidArgExceptionSemRecibo()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->tools->sefazConsultaRecibo('');
    }
    
    /**
     * Testa a consulta pela chave validando o par�metro da chave vazio.
     */
    public function testSefazConsultaChaveThrowsInvalidArgExceptionSemChave()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->tools->sefazConsultaChave('');
    }
    
    /**
     * Testa a consulta pela chave validando o par�metro de chave incompleta (comprimento diferente de 44 d�gitos).
     */
    public function testSefazConsultaChaveThrowsInvalidArgExceptionChaveCompleta()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->tools->sefazConsultaChave('1234567890123456789012345678901234567890123'); // 43 d�gitos
    }
    
    /**
     * Testa a consulta pela chave validando uma chave alfanum�rica.
     */
    public function testSefazConsultaChaveThrowsInvalidArgExceptionChaveNaoNumerica()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->tools->sefazConsultaChave('aqui temos uma chave nao numerica');
    }
}
