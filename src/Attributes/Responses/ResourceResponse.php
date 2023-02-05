<?php

namespace Micromus\ServiceSwagger\Attributes\Responses;

use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class ResourceResponse extends Response
{
    /**
     * @param string $resourceClass
     * @param string $description
     * @return void
     */
    public function __construct(string $resourceClass, string $description = 'Запрос успешно выполнен')
    {
        parent::__construct(
            response: 200,
            description: $description,
            content: new JsonContent(properties: [
                new Property(property: 'data', ref: '#/components/schemas/' . class_basename($resourceClass))
            ])
        );
    }
}
