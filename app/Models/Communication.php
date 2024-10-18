<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Communication extends Model
{
    /** @use HasFactory<\Database\Factories\CommunicationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'api_comunicacao_id',
        'data_disponibilizacao',
        'sigla_tribunal',
        'tipo_comunicacao',
        'nome_orgao',
        'texto',
        'numero_processo',
        'meio',
        'link',
        'tipo_documento',
        'nome_classe',
        'codigo_classe',
        'numero_comunicacao',
        'ativo',
        'hash',
        'status',
        'motivo_cancelamento',
        'data_cancelamento',
        'data_envio',
        'meiocompleto',
        'numeroprocessocommascara',
        'notificado_email',
        'notificado_whatsapp',
    ];

    protected $casts =[
        'data_disponibilizacao' => 'date:Y-m-d',
        'data_cancelamento' => 'date:Y-m-d',
    ];

    protected function dataDisponibilizacao(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y'),
        );
    }

}
