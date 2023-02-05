<?php

namespace Micromus\ServiceSwagger\Attributes\Responses;

use OpenApi\Attributes\Response;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class UnauthorizedResponse extends Response
{
    public function __construct(string $message = 'Вы не авторизированны')
    {
        parent::__construct(response: 401, description: $message);
    }
}
