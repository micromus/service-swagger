<?php

namespace Micromus\ServiceSwagger\Attributes;

final class SchemaPathBuilder
{
    /**
     * @param class-string $class
     * @return string
     */
    public static function path(string $class): string
    {
        return '#/components/schemas/' . class_basename($class);
    }
}
