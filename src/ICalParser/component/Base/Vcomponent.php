<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/19/14
 * Time: 9:05 PM
 */

namespace ICalParser\Component\Base;

//use ICalParser\ComponentFactory;

class Vcomponent
{

    private $attributes;

    public function __construct()
    {
        $this->attributes = array();
    }

    public function setAttributes(array $config)
    {


        if (isset($config[get_class($this)])) {
            foreach ($config[get_class($this)] as $attributeName => $attributeProperties) {
                $this->attributes[] = \ICalParser\Factory\AttributeFactory::createAttribute($attributeName,$attributeProperties);
            }
        } else {
            return FALSE;
        }

        echo '<pre>';
        var_dump($this->attributes);
        echo '</pre>';
        return TRUE;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAttributeByName($name)
    {
        foreach ($this->getAttributes() as $attribute) {
            if ($attribute->getName() === $name) {
                return $attribute;
                break;
            }
        }
    }
} 