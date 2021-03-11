<?php

namespace Statamic\Addons\Unaugment\Http\Resources;

use Statamic\Http\Resources\API\EntryResource as StatamicEntryResource;

class EntryResource extends StatamicEntryResource
{
    private array $unaugmentedFieldTypes;
    private array $unaugmentedFieldHandles;

    function __construct($resource)
    {
        parent::__construct($resource);
        $this->unaugmentedFieldTypes = config('unaugment.field_types', []);
        $this->unaugmentedFieldHandles = config('unaugment.fields', []);
    }

    public function toArray($request)
    {
        $result = parent::toArray($request);

        $blueprint = $this->resource->blueprint();

        foreach ($blueprint->fields()->all() as $field) {
            $fieldHandle = $field->handle();
            $handles = implode('.', [$blueprint->handle(), $fieldHandle]);
            if (
                !in_array($field->type(), $this->unaugmentedFieldTypes) &&
                !in_array($handles, $this->unaugmentedFieldHandles)
            ) continue(1);

            $result[$fieldHandle] = $this->resource->get($fieldHandle);
        }

        return $result;
    }
}
