<?php

namespace Micromus\ServiceSwagger\Attributes\Bodies\Contents;

use Micromus\ServiceSwagger\Attributes\SchemaPathBuilder;
use OpenApi\Attributes\MediaType;
use OpenApi\Attributes\Schema;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class MediaClassContent extends MediaType
{
    public function __construct(string $requestClass)
    {
        parent::__construct(
            mediaType: 'application/x-www-form-urlencoded',
            schema: new Schema(ref: SchemaPathBuilder::path($requestClass))
        );
    }
}
