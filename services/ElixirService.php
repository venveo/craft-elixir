<?php

namespace Craft;

class ElixirService extends BaseApplicationComponent
{
    /**
     * @var string
     */
    protected $buildPath;

    /**
     * @var string
     */
    protected $publicPath;

    /**
     * ElixirService constructor.
     */
    public function __construct()
    {
        $settings = craft()->plugins->getPlugin('elixir')->getSettings();
        $this->buildPath = $settings->buildPath;
        $this->publicPath = $settings->publicPath;
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

        return $this->buildPath . '/' . $manifest[$file];
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
                return '<script src="' . $this->buildPath . '/' . $file . '"></script>';
            }

            return '<link rel="stylesheet" href="' . $file . '">';
        }

        if ($extension == 'js') {
            return '<script src="' . $this->buildPath . '/' . $manifest[$file] . '"></script>';
        }

        return '<link rel="stylesheet" href="' . $this->buildPath . '/' . $manifest[$file] . '">';
    }

    /**
     * Locate manifest and convert to an array.
     *
     * @return mixed
     */
    protected function readManifestFile()
    {
        $manifest = file_get_contents(CRAFT_BASE_PATH . $this->publicPath . '/' . $this->buildPath . '/rev-manifest.json');

        return json_decode($manifest, true);
    }
}