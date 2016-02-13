<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/10/2016
 * Time: 10:15 PM
 */

namespace ICalParser\Factory;


class AttributeFactory
{
    public static function createAttribute($attributeName, array $attributeProperties){

        $attributeObject = new \ICalParser\Component\Base\Attribute();

        $attributeObject->setName($attributeName);

        foreach($attributeProperties as $attributeVariableName => $attributeVariableValue){

            if(property_exists($attributeObject,strtolower($attributeVariableName))){
                $attributeObject->{'set'.ucfirst(strtolower($attributeVariableName))}($attributeVariableValue);
            }
        }

        return $attributeObject;
    }
}