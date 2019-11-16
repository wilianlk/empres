<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 16/06/18
 * Time: 10:50 AM
 */

namespace AppBundle\Services;

use Twig_SimpleFunction;

class Helpers extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('file_exists', 'file_exists'),
        );
    }

    public function getName()
    {
        return 'adin_file_exists';
    }
}