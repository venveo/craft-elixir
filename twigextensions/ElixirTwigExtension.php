<?php
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;
use Twig_Function_Method;

class ElixirTwigExtension extends \Twig_Extension
{
    /**
    * Returns the extension name.
    * 
    * @return string
    */
    public function getName()
    {
        return "Elixir";
    }

    /**
    * Returns the extensions filters.
    * 
    * @return array
    */
    public function getFilters()
    {
        return [
            'elixir' => new Twig_Filter_Method(
                $this, 'elixir'
            ),
        ];
    }

    /**
    * Returns the extensions functions.
    * 
    * @return string
    */
    public function getFunctions()
    {
        return [
            'elixir' => new Twig_Function_Method(
                $this, 'elixir'
            ),
        ];
    }

    /**
    * Returns versioned asset or the asset with tag.
    * 
    * @param $file
    * @param bool $tag 
    * @return mixed
    */
    public function elixir($file, $tag = false)
    {
        if ($tag) {
            return craft()->elixir->withTag($file);    
        }
        return craft()->elixir->version($file);
    }
}
