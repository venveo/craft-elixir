<?php

namespace Craft;

class ElixirService extends BaseApplicationComponent
{
    /**
     * Find the files version.
     *
     * @param $file
     * @return mixed
     */
    public function version($file)
    {
        $manifest = $this->readManifestFile();

        return $manifest[$file];
    }

    /**
     * Returns the assets version with the appropriate tag.
     * TODO make this dump as HTML
     *
     * @param $file
     * @return string
     */
    public function withTag($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $manifest = $this->readManifestFile();

        // TODO make this return actual HTML
        if ($extension == 'js') {
            return '<script src="' . $manifest[$file] . '"></script>';
        }

        return '<link rel="stylesheet" href="' . $manifest[$file] . '">';
    }

    /**
     * Locate manifest and convert to an array.
     * TODO make the public path a setting and check for missing files.
     *
     * @return mixed
     */
    protected function readManifestFile()
    {
        $manifest = file_get_contents(CRAFT_BASE_PATH . '/public/build/rev-manifest.json');

        return json_decode($manifest, true);
    }
}
