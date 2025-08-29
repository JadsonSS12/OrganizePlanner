<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Relatory extends Model
{

    private DateTime $periodo;
    private int $quantidadeMetasCriadas;
    private int $quantidadeMetasCumpridas;
    private string $porcentagemMetasCumpridas; // Exibido como porcentagem com 2 casas decimais
    private int $quantidadeMetasNaoCumpridas;
    private int $quantidadeTarefasCriadas;
    private int $quantidadeTarefasExecutadas;
    private string $porcentagemTarefasExecutadas;
    private int $quantidadeTarefasNaoExecutadas;
    private string $semanasMaisProdutivas;
    private string $mesesMaisProdutivos;
    private string $turnosMaisProdutivos;
    private string $categoriaTarefaMaisRealizada;
    private string $categoriaMetaMaisRealizada;

    

    protected $fillable = [
        'titulo',
        'descricao',
        'data_inicio',
        'data_fim',
        'quantidade',
        'valor_total'
    ];
    
    public function getPeriodo(): DateTime {
        return $this->periodo;
    }

    public function setPeriodo(DateTime $periodo): void {
        $this->periodo = $periodo;
    }

    public function getQuantidadeMetasCriadas(): int {
        return $this->quantidadeMetasCriadas;
    }

    public function setQuantidadeMetasCriadas(int $qtd): void {
        $this->quantidadeMetasCriadas = $qtd;
    }

    public function getQuantidadeMetasCumpridas(): int {
        return $this->quantidadeMetasCumpridas;
    }

    public function setQuantidadeMetasCumpridas(int $qtd): void {
        $this->quantidadeMetasCumpridas = $qtd;
    }

    public function getPorcentagemMetasCumpridas(): string {
        return $this->porcentagemMetasCumpridas;
    }

    public function setPorcentagemMetasCumpridas(string $porcentagem): void {
        $this->porcentagemMetasCumpridas = $porcentagem;
    }

    public function getQuantidadeMetasNaoCumpridas(): int {
        return $this->quantidadeMetasNaoCumpridas;
    }

    public function setQuantidadeMetasNaoCumpridas(int $qtd): void {
        $this->quantidadeMetasNaoCumpridas = $qtd;
    }

    public function getQuantidadeTarefasCriadas(): int {
        return $this->quantidadeTarefasCriadas;
    }

    public function setQuantidadeTarefasCriadas(int $qtd): void {
        $this->quantidadeTarefasCriadas = $qtd;
    }

    public function getQuantidadeTarefasExecutadas(): int {
        return $this->quantidadeTarefasExecutadas;
    }

    public function setQuantidadeTarefasExecutadas(int $qtd): void {
        $this->quantidadeTarefasExecutadas = $qtd;
    }

    public function getPorcentagemTarefasExecutadas(): string {
        return $this->porcentagemTarefasExecutadas;
    }

    public function setPorcentagemTarefasExecutadas(string $porcentagem): void {
        $this->porcentagemTarefasExecutadas = $porcentagem;
    }

    public function getQuantidadeTarefasNaoExecutadas(): int {
        return $this->quantidadeTarefasNaoExecutadas;
    }

    public function setQuantidadeTarefasNaoExecutadas(int $qtd): void {
        $this->quantidadeTarefasNaoExecutadas = $qtd;
    }

    public function getSemanasMaisProdutivas(): string {
        return $this->semanasMaisProdutivas;
    }

    public function setSemanasMaisProdutivas(string $semanas): void {
        $this->semanasMaisProdutivas = $semanas;
    }

    public function getMesesMaisProdutivos(): string {
        return $this->mesesMaisProdutivos;
    }

    public function setMesesMaisProdutivos(string $meses): void {
        $this->mesesMaisProdutivos = $meses;
    }

    public function getTurnosMaisProdutivos(): string {
        return $this->turnosMaisProdutivos;
    }

    public function setTurnosMaisProdutivos(string $turnos): void {
        $this->turnosMaisProdutivos = $turnos;
    }

    public function getCategoriaTarefaMaisRealizada(): string {
        return $this->categoriaTarefaMaisRealizada;
    }

    public function setCategoriaTarefaMaisRealizada(string $categoria): void {
        $this->categoriaTarefaMaisRealizada = $categoria;
    }

    public function getCategoriaMetaMaisRealizada(): string {
        return $this->categoriaMetaMaisRealizada;
    }

    public function setCategoriaMetaMaisRealizada(string $categoria): void {
        $this->categoriaMetaMaisRealizada = $categoria;
    }
}
