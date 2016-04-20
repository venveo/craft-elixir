<?php

namespace Craft;

class ElixirPlugin extends BasePlugin
{
    /**
     * Define the plugins name.
     *
     * @return string
     */
    public function getName()
    {
        return 'Elixir';
    }

    /**
     * Define the plugins version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '0.9.0';
    }

    /**
     * Get the Developer.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Venveo';
    }

    /**
     * Define the developers website.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://www.venveo.com';
    }
}
