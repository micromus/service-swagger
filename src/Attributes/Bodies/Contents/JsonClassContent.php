<?php

namespace Micromus\ServiceSwagger\Attributes\Bodies\Contents;

use Attribute;
use Micromus\ServiceSwagger\Attributes\SchemaPathBuilder;
use OpenApi\Attributes\JsonContent;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class JsonClassContent extends JsonContent
{
    public function __construct(string $requestClass)
    {
        parent::__construct(ref: SchemaPathBuilder::path($requestClass));
    }
}
