<?php

namespace Craft;

class ElixirVariable
{
    /**
     * Returns the assets version.
     */
    public function version(string $file)
    {
        return craft()->elixir->version($file);
    }

    /**
     * Returns the assets version with the appropriate tag.
     */
    public function withTag(string $file)
    {
        return craft()->elixir->withTag($file);
    }
}
