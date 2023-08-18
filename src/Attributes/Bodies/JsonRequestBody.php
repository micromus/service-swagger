<?php

namespace Micromus\ServiceSwagger\Attributes\Bodies;

use Micromus\ServiceSwagger\Attributes\Bodies\Contents\JsonClassContent;
use OpenApi\Attributes\RequestBody;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class JsonRequestBody extends RequestBody
{
    public function __construct(string $requestClass, bool $required = true)
    {
        parent::__construct(
            required: $required,
            content: [new JsonClassContent($requestClass)]
        );
    }
}
