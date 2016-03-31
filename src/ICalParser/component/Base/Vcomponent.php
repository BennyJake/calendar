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
    private $order;

    private $attributeCount;

    //more for reference
    private $currentAttributeName;
    private $currentAttributeValue;

    public function __construct()
    {
        $this->attributes = array();
        $this->attributeCount = 0;
    }

    /**
     * @return mixed
     */
    public function getCurrentAttributeName()
    {
        return $this->currentAttributeName;
    }

    /**
     * @param mixed $currentAttributeName
     */
    public function setCurrentAttributeName($currentAttributeName)
    {
        $this->currentAttributeName = $currentAttributeName;
    }

    /**
     * @return mixed
     */
    public function getCurrentAttributeValue()
    {
        return $this->currentAttributeValue;
    }

    /**
     * @param mixed $currentAttributeValue
     */
    public function setCurrentAttributeValue($currentAttributeValue)
    {
        $this->currentAttributeValue = $currentAttributeValue;
    }

    /**
     * @return int
     */
    private function getIncreaseAttributeOrderCounter()
    {
        $this->attributeCount++;
        return $this->attributeCount;
    }

    /**
     * @return int
     */
    public function getAttributeCount()
    {
        return $this->attributeCount;
    }

    /**
     * @param int $attributeCount
     */
    public function setAttributeCount($attributeCount)
    {
        $this->attributeCount = $attributeCount;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function setAttributes(array $config)
    {
        if (isset($config[get_class($this)])) {
            foreach ($config[get_class($this)] as $attributeName => $attributeProperties) {
                $this->attributes[$attributeName] = \ICalParser\Factory\AttributeFactory::createAttribute($attributeName, $attributeProperties);
            }
        } else {
            $parseFault = new \ICalParser\Debug\Fault\ParseFault();
            $parseFault->setMessage('Config Key not found for: ' . get_class($this));
            return $parseFault;
        }

        return TRUE;
    }

    public function updateAttributes(array $newAttributes)
    {
        $this->attributes = $newAttributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAttributeByName($name)
    {
        if (isset($this->getAttributes()[$name])) {
            return $this->getAttributes()[$name];
        } else {
            $soapFault = new \ICalParser\Debug\Fault\ParseFault();
            $soapFault->setMessage('Attribute Name not found: ' . $name);
            return $soapFault;
        }
    }

    public function setAttributeValueByName($name, $value)
    {
        $result = $this->getAttributeByName($name);

        // we found a matching attribute based on the name
        if ($result instanceof \ICalParser\Component\Base\Attribute) {
            $result->setValue($value);
            return $result;
        } else {
            $parseFault = new \ICalParser\Debug\Fault\ParseFault();
            $parseFault->setMessage('Config key \''.$name.'\' not found for: ' . get_class($this));
            return $parseFault;
        }
    }

    /**
     * @param string $name
     * @param int $order
     * @return \ICalParser\Debug\Fault\ParseFault
     */
    public function setAttributeOrderByName($name, $order)
    {

        $result = $this->getAttributeByName($name);

        if ($result instanceof \ICalParser\Component\Base\Attribute) {
            $result->setOrder($order);
            return $result;
        } else {
            $parseFault = new \ICalParser\Debug\Fault\ParseFault();
            $parseFault->setMessage('Config Key not found for: ' . get_class($this));
            return $parseFault;
        }
    }

    public function addVcomponentAsAttribute(\ICalParser\Component\Base\Vcomponent $vcomponent)
    {
        $this->attributes[] = $vcomponent;
    }

    public function removeUnusedAttributes()
    {

        foreach ($this->getAttributes() as $key => $attribute) {
            if ($attribute instanceof \ICalParser\Component\Base\Attribute) {
                if (!is_numeric($attribute->getOrder())) {
                    unset($this->attributes[$key]);
                }
            }
        }
    }

    //removes unused attributes and sorts them by their order value
    public function organizeAttributes()
    {

        $newAttributesArray = array();

        foreach ($this->getAttributes() as $attribute) {
            if (is_numeric($attribute->getOrder())) {
                $newAttributesArray[$attribute->getOrder()] = $attribute;
            }
        }

        ksort($newAttributesArray);

        $this->updateAttributes($newAttributesArray);
    }

    public function process($fh, &$lineNumber, $firstComponentName, $firstComponentValue)
    {

        $this->setAttributeValueByName($firstComponentName, $firstComponentValue);
        $this->setAttributeOrderByName($firstComponentName, $this->getIncreaseAttributeOrderCounter());

        while (!feof($fh)) {

            $line = fgets($fh);
            $lineNumber++;

            $possibleName = strtoupper(explode(':',$line)[0]);
            $attribute = $this->getAttributeByName($possibleName);

            //if the attribute matches the beginning part of the line being parsed
            if ($attribute instanceof \ICalParser\Component\Base\Attribute) {

                $attributeName = strtoupper($attribute->getName());
                $attributeValue = strtoupper(trim(substr($line, strlen($attribute->getName() . ':'), strlen($line))));

                $this->setCurrentAttributeName($attributeName);
                $this->setCurrentAttributeValue($attributeValue);

                //if we're going to nest a child Component
                if ($attributeName . ':' == 'BEGIN:') {

                    //var_dump($attributeName);
                    //var_dump($attributeValue);
                    //echo '<hr/>';

                    $componentObject = \ICalParser\Factory\ComponentFactory::buildComponent(strtoupper($attributeValue));
                    $componentObject->process($fh, $lineNumber, $attributeName, $attributeValue);
                    $componentObject->setOrder($this->getIncreaseAttributeOrderCounter());
                    $this->addVcomponentAsAttribute($componentObject);

                    //if we're ending the current Component, return back to the parent to continue parsing
                } elseif ($attributeName . ':' == 'END:') {
                    //var_dump($attributeName);
                    //var_dump($attributeValue);
                    //echo '<hr/>';

                    $this->setAttributeValueByName($attributeName, $attributeValue);
                    $this->setAttributeOrderByName($attributeName, $this->getIncreaseAttributeOrderCounter());

                    //$this->removeUnusedAttributes();
                    $this->organizeAttributes();
                    return TRUE;

                } else {

                    $this->setAttributeValueByName($attributeName, $attributeValue);
                    $this->setAttributeOrderByName($attributeName, $this->getIncreaseAttributeOrderCounter());
                }
            }
            // if the line doesn't begin with an attribute that belongs to this component, then it must belong to the
            // attribute from the previous line (a multi-line attribute)
            else{
                if(isset($this->currentAttributeName) && isset($this->currentAttributeValue)){
                    $this->currentAttributeValue .= "\n".$line;
                    $this->setAttributeValueByName($this->getCurrentAttributeName(), $this->getCurrentAttributeValue());
                }
            }
        }

        //an END line wasn't found, return FALSE
        $parseFault = new \ICalParser\Debug\Fault\ParseFault();
        $parseFault->setMessage('Config array key not found for: ' . get_class($this));
        return $parseFault;
    }

    public function __toString()
    {

        $componentString = '';

        foreach ($this->getAttributes() as $attribute) {

            if ($attribute instanceof \ICalParser\Component\Base\Attribute) {

                if (is_array($attribute->getValue())) {
                    foreach ($attribute->getValue() as $singleValue) {
                        $componentString .= $attribute->getName() . ':';
                        $componentString .= $singleValue . "\r\n";
                    }
                } else {
                    $componentString .= $attribute->getName() . ':';
                    $componentString .= $attribute->getValue() . "\r\n";
                }
            } elseif ($attribute instanceof \ICalParser\Component\Base\Vcomponent) {
                $componentString .= $attribute->__toString();
            }
        }

        return $componentString;
    }
} 