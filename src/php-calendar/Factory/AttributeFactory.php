<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/10/2016
 * Time: 10:15 PM
 */

namespace phpCalendar\Factory;


class AttributeFactory
{
    public static function createAttribute(array $array){

        foreach($array as $attributeName => $attributeVariable){

            $attribute = new \PhpCalendar\Component\Base\Attribute();

            if(property_exists($attribute,strtolower($attributeName))){
                $attribute->set{${ucfirst(strtolower($attributeName))}};
            }
        }

    }
}