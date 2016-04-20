<?php

namespace Craft;

class ElixirService extends BaseApplicationComponent
{
    /**
     * @var BaseModel
     */
    protected $settings;

    /**
     * ElixirService constructor.
     */
    public function __construct()
    {
        $this->settings = craft()->plugins->getPlugin('elixir')->getSettings();
    }

    /**
     * Find the files version.
     *
     * @param $file
     * @return mixed
     */
    public function version($file)
    {
        $manifest = $this->readManifestFile();

        // if no manifest, return the regular asset
        if (!$manifest) {
            return $file;
        }

        return $this->settings->buildPath . '/' . $manifest[$file];
    }

    /**
     * Returns the assets version with the appropriate tag.
     *
     * @param $file
     * @return string
     */
    public function withTag($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $manifest = $this->readManifestFile();

        // if no manifest, return the regular asset
        if (!$manifest) {
            if ($extension == 'js') {
                return '<script src="' . $this->settings->buildPath . '/' . $file . '"></script>';
            }

            return '<link rel="stylesheet" href="' . $file . '">';
        }

        if ($extension == 'js') {
            return '<script src="' . $this->settings->buildPath . '/' . $manifest[$file] . '"></script>';
        }

        return '<link rel="stylesheet" href="' . $this->settings->buildPath . '/' . $manifest[$file] . '">';
    }

    /**
     * Locate manifest and convert to an array.
     *
     * @return mixed
     */
    protected function readManifestFile()
    {
        $manifest = file_get_contents(CRAFT_BASE_PATH . $this->settings->publicPath . '/' . $this->settings->buildPath . '/rev-manifest.json');

        return json_decode($manifest, true);
    }
}