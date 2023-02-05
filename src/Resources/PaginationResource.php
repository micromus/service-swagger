<?php

namespace KEERill\ServiceSwagger\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use OpenApi\Attributes\Property;

final class PaginationResource extends JsonResource
{
    /**
     * @var LengthAwarePaginator
     */
    public $resource;

    public function __construct(LengthAwarePaginator $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        return [
            'current_page' => $this->resource->currentPage(),
            'per_page' => $this->resource->perPage(),
            'last_page' => $this->resource->lastPage(),
            'total' => $this->resource->total(),
            'data' => [
                'from' => $this->resource->firstItem(),
                'to' => $this->resource->lastItem()
            ]
        ];
    }
}
