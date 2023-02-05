<?php

namespace Micromus\ServiceSwagger\Attributes\Responses;

use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class PaginationResourcesResponse extends Response
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
                new Property(property: 'meta', properties: [
                    new Property(property: 'pagination', properties: [
                        new Property(
                            property: 'current_page',
                            description: 'Номер текущей страницы',
                            example: 1
                        ),

                        new Property(
                            property: 'per_page',
                            description: 'Максимально возможное количество записей на одну страницу',
                            example: 20
                        ),

                        new Property(
                            property: 'last_page',
                            description: 'Номер последней страницы',
                            example: 1
                        ),

                        new Property(
                            property: 'total',
                            description: 'Общее количество записей',
                            example: 1
                        ),

                        new Property(
                            property: 'data',
                            properties: [
                                new Property(property: 'from', description: 'Номер первого элемента страницы', type: 'integer', example: 1),
                                new Property(property: 'to', description: 'Номер последнего элемента страницы', type: 'integer', example: 1)
                            ]
                        )
                    ])
                ]),
                new Property(property: 'data', type: 'array', items: new Items(ref: '#/components/schemas/' . class_basename($resourceClass)))
            ])
        );
    }
}
