<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class CandidacyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province_id' => 'required|string|max:255',
            'county' => 'required|string|max:255',

            'bi' => [
                'required',
                'string',
                'min:14',
                'max:14',
                Rule::unique('candidacies')->where(function ($query) {
                    return $query->where('province_id', $this->province_id);
                }),
            ],
            'fullname' => 'required|string|max:255',
            'birthdate' => [
                'required',
                'date',
                'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            ],
            'residence' => 'required|string|max:255',
            'tel' => 'required|string|min:9|max:14',
            'qualification' => 'required|string|max:255',
            'email' => 'required|email',
            'iban' => 'required|string|max:255',

            'doc_qualification' => 'required|mimes:jpg,png,jpeg,pdf|file|max:6048',
            'doc_iban' => 'required|mimes:jpg,png,jpeg,pdf|file|max:6048',
            'photo' => 'required|mimes:jpg,png,jpeg|file|max:6048',

            /*   'g-recaptcha-response' => 'required|recaptchav3:register,0.5', */

        ];
    }
    public function messages()
    {
        return [
            'province_id.required' => 'A Província é obrigatório.',
            'province_id.string' => 'A Província deve ser uma string.',
            'province_id.max' => 'A Província não pode ser superior a :max caracteres.',

            'county.required' => 'O Município é obrigatório.',
            'county.string' => 'O Município deve ser uma string.',
            'county.max' => 'O Município não pode ser superior a :max caracteres.',

            'bi.required' => 'O nº de bilhete de identidade é obrigatório.',
            'bi.string' => 'O nº de bilhete de identidade deve ser uma string.',
            'bi.max' => 'O nº de bilhete de identidade não pode ser superior a :max caracteres.',
            'bi.unique' => 'Já temos uma candidatura com o nº de bilhete de identidade inserido',

            'fullname.required' => 'O nome é obrigatório.',
            'fullname.string' => 'O nome deve ser uma string.',
            'fullname.max' => 'O nome não pode ser superior a :max caracteres.',

            'birthdate.required' => 'A data de nascimento é obrigatório.',
            'birthdate.date' => 'A data de nascimento não é uma data válida.',
            'birthdate.before_or_equal' => 'A data de nascimento deve ser uma data anterior ou igual a :date.',

            'residence.required' => 'O endereço da residência é obrigatório.',
            'residence.string' => 'O endereço da residência deve ser uma string.',
            'residence.max' => 'O endereço da residência não pode ser superior a :max caracteres.',

            'tel.required' => 'O Telefone é obrigatório.',
            'tel.string' => 'O Telefone deve ser uma string.',
            'tel.min' => 'O Telefone deve ser pelo menos :min dígitos.',
            'tel.max' => 'O Telefone não pode ser superior a :max dígitos.',

            'qualification.required' => 'O Nível Académico é obrigatório.',
            'qualification.string' => 'O Nível Académico deve ser uma string.',
            'qualification.max' => 'O Nível Académico não pode ser superior a :max caracteres.',

            'email.required' => 'O Email é obrigatório.',
            'email.email' => 'O Email deve ser um endereço de Email válido.',

            'iban.required' => 'O IBAN é obrigatório.',
            'iban.string' => 'O IBAN deve ser uma string.',
            'iban.max' => 'O IBAN não pode ser superior a :max caracteres.',

            'doc_qualification.required' => 'A Declaração ou Certificado de Habilitações literárias é obrigatório.',
            'doc_qualification.mimes' => 'A Declaração ou Certificado de Habilitações literárias deve ser um arquivo do tipo: :values.',
            'doc_qualification.max' => 'A Declaração ou Certificado de Habilitações literárias não pode ser superior a :max kilobytes.',
            'doc_qualification.file' => 'A Declaração ou Certificado de Habilitações literárias deve ser um arquivo.',


            'doc_iban.required' => 'O Documento de Detalhes da Conta onde apresenta o IBAN é obrigatório.',
            'doc_iban.mimes' => 'O Documento de Detalhes da Conta onde apresenta o IBAN deve ser um arquivo do tipo: :values.',
            'doc_iban.max' => 'O Documento de Detalhes da Conta onde apresenta o IBAN não pode ser superior a :max kilobytes.',
            'doc_iban.file' => 'O Documento de Detalhes da Conta onde apresenta o IBAN deve ser um arquivo.',

            'photo.required' => 'A Fotografia de Identificação é obrigatório.',
            'photo.mimes' => 'A Fotografia de Identificação deve ser um arquivo do tipo: :values.',
            'photo.max' => 'A Fotografia de Identificação não pode ser superior a :max kilobytes.',
            'photo.file' => 'A Fotografia de Identificação deve ser um arquivo.',


        ];
    }
}
