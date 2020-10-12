<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateProduct extends FormRequest
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
            'product_id'        => 'required|exists:products,id',
            'name'              => 'required|string|min:5',
            'descriptionShort'  => 'max:255',
            'descriptionLarge'  => 'max:255',
            'unitsInStock'      => 'required|numeric|min:0',
            'unitPrice'         => 'required|between:0,9999.99',
            'image'             => 'image',
            'stars'             => 'numeric|between:0,5',
            'weight'            => 'required|string',
            'department_id'     => 'required|exists:departments,id'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required'       => 'Es necesario enviar el producto',
            'product_id.exists'         => 'No existe el producto seleccionado',
            'name.required'             => 'Ingrese el nombre del producto.',
            'name.string'               => 'El nombre del producto debe contener caracteres válidos',
            'name.min'                  => 'El nombre del producto es muy corto',
            'descriptionShort.max'      => 'La descripción corta es muy larga',
            'descriptionLarge.max'      => 'La descripción larga es muy larga',
            'unitsInStock.required'     => 'Ingrese las unidades en stock',
            'unitsInStock.numeric'      => 'Las unidades en stock deben ser numericos',
            'unitsInStock.min'          => 'Las unidades en stock deben ser minimo 0',
            'unitPrice.required'        => 'Ingrese el precio unitario',
            'unitPrice.between'         => 'El precio esta fuera del rango permitido (0-9999.99)',
            'image.image'               => 'Ingrese una imagen correcta',
            'stars.numeric'             => 'La calificación debe ser numerica',
            'stars.between'             => 'La calificación esta fuera del rango (0-5)',
            'weight.required'           => 'Ingrese la forma de presentación',
            'weight.string'             => 'La forma de presentacion debe contener caracteres válidos',
            'department_id.required'    => 'Seleccione un departamento',
            'department_id.exists'      => 'No existe el departamento indicado',
        ];
    }

    public $validator = null;
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
