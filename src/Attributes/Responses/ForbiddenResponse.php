<?php

namespace KEERill\ServiceSwagger\Attributes\Responses;

use OpenApi\Attributes\Response;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class ForbiddenResponse extends Response
{
    public function __construct(string $message = 'Доступ запрещен')
    {
        parent::__construct(response: 403, description: $message);
    }
}
