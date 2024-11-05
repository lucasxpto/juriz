<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlegacaoFinalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'enderecamento' => ['required', 'string', 'max:255'],
            'numero_processo' => ['required', 'string', 'max:255'],
            'nome_do_acusado' => ['required', 'string', 'max:255'],
            'anexo_inquerito' => ['nullable', 'file', 'mimes:pdf', 'max:10240'], // 10MB
            'anexo_denuncia' => ['nullable', 'file', 'mimes:pdf', 'max:10240'], // 10MB
            'anexo_resposta_acusacao' => ['nullable', 'file', 'mimes:pdf', 'max:10240'], // 10MB
            'anexo_recebimento_denuncia' => ['nullable', 'file', 'mimes:pdf', 'max:10240'], // 10MB
            'anexo_alegacoes_finais_mp' => ['nullable', 'file', 'mimes:pdf', 'max:10240'], // 10MB
            'dinamica_fatos' => ['required', 'string'],
            'preliminar_merito' => ['required', 'string'],
            'teses_preliminares_merito' => ['required', 'array',
                function ($attribute, $value, $fail) {
                    if (!in_array(true, $value, true)) {
                        $fail('Selecione pelo menos uma tese.');
                    }
                }
            ],
            'teses_preliminares_merito.*' => ['boolean'],
            'merito_processual' => ['required', 'string'],
            'teses_merito_processual' => ['required', 'array',
                function ($attribute, $value, $fail) {
                    if (!in_array(true, $value, true)) {
                        $fail('Selecione pelo menos uma tese.');

                    }
                }
            ],
            'teses_merito_processual.*' => ['boolean'],
            'requerimentos' => ['required', 'array', 'min:1'],
            'requerimentos.*.value' => ['required', 'string', 'max:255'],
            'advogados' => ['required', 'array', 'min:1'],
            'advogados.*.nome' => ['required', 'string'],
            'advogados.*.oab' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'requerimentos.*.value' => 'Requerimento',
            'advogados.*.nome' => 'Nome do advogado',
            'advogados.*.oab' => 'OAB do advogado',
        ];
    }
}
