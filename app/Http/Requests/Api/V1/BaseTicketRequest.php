<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BaseTicketRequest extends FormRequest
{
    public function mappedAttributes()
    {
        $attributeMap = [
            'data.attributes.title' => 'title',
            'data.attributes.description' => 'description',
            'data.attributes.status' => 'status',
            'data.attributes.created_at' => 'created_at',
            'data.attributes.updated_at' => 'updated_at',
            'data.relationships.author.data.id' => 'user_id',
        ];

        $attributesToUpdate = [];

        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $attributesToUpdate[$attribute] = $this->input($key);
            }
        }
        
        return $attributesToUpdate;
    }

    public function messages() 
    {
        return [
            'data.attributes.status.in' => 'The status field must be one of the following values: A, C, H, X.',
            'data.relationships.author.data.id.exists' => 'The selected author does not exist.',
        ];
    }
}
