<?php

namespace Micromus\ServiceSwagger\Attributes\Bodies;

use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\MediaType;
use OpenApi\Attributes\RequestBody;
use OpenApi\Attributes\Schema;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class FormRequestBody extends RequestBody
{
    public function __construct(string $requestClass, bool $required = true)
    {
        $ref = '#/components/schemas/'.class_basename($requestClass);

        parent::__construct(
            required: $required,
            content: [
                new JsonContent(ref: $ref),
                new MediaType(
                    mediaType: 'application/x-www-form-urlencoded',
                    schema: new Schema(ref: $ref)
                ),
            ]
        );
    }
}
