<?php

namespace Micromus\ServiceSwagger\Attributes\Responses;

use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class ResourceResponse extends Response
{
    /**
     * @return void
     */
    public function __construct(string $resourceClass, string $description = 'Запрос успешно выполнен')
    {
        parent::__construct(
            response: 200,
            description: $description,
            content: new JsonContent(properties: [
                new Property(property: $resourceClass::$wrap, ref: '#/components/schemas/'.class_basename($resourceClass)),
            ])
        );
    }
}
