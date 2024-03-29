<?php

namespace Micromus\ServiceSwagger\Attributes\Bodies;

use Micromus\ServiceSwagger\Attributes\Bodies\Contents\JsonClassContent;
use Micromus\ServiceSwagger\Attributes\Bodies\Contents\MediaClassContent;
use OpenApi\Attributes\RequestBody;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class FormRequestBody extends RequestBody
{
    public function __construct(string $requestClass, bool $required = true)
    {
        parent::__construct(
            required: $required,
            content: [
                new JsonClassContent($requestClass),
                new MediaClassContent($requestClass),
            ]
        );
    }
}
