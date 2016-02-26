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

    public function __construct()
    {
        $this->attributes = array();
        $this->attributeCount = 0;
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
                $this->attributes[] = \ICalParser\Factory\AttributeFactory::createAttribute($attributeName,$attributeProperties);
            }
        } else {
            $parseFault = new \ICalParser\Debug\Fault\ParseFault();
            $parseFault->setMessage('Config Key not found for: '.get_class($this));
            return $parseFault;
        }

        return TRUE;
    }

    public function updateAttributes(array $newAttributes){
        $this->attributes = $newAttributes;
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

        $soapFault = new \ICalParser\Debug\Fault\ParseFault();
        $soapFault->setMessage('Attribute Name not found: '.$name);
        return $soapFault;
    }

    public function setAttributeValueByName($name,$value){

        foreach ($this->getAttributes() as $attribute) {
            if ($attribute->getName() === $name) {
                $attribute->setValue($value);
                return $attribute;
                break;
            }
        }

        $parseFault = new \ICalParser\Debug\Fault\ParseFault();
        $parseFault->setMessage('Config Key not found for: '.get_class($this));
        return $parseFault;
    }

    public function setAttributeOrderByName($name,$order){

        foreach ($this->getAttributes() as $attribute) {
            if ($attribute->getName() === $name) {
                $attribute->setOrder($order);
                return $attribute;
                break;
            }
        }

        $parseFault = new \ICalParser\Debug\Fault\ParseFault();
        $parseFault->setMessage('Config Key not found for: '.get_class($this));
        return $parseFault;
    }

    public function addVcomponentAsAttribute(\ICalParser\Component\Base\Vcomponent $vcomponent){
        $this->attributes[] = $vcomponent;
    }

    public function removeUnusedAttributes(){

        foreach($this->getAttributes() as $key => $attribute){
            if($attribute instanceof \ICalParser\Component\Base\Attribute) {
                if (!is_numeric($attribute->getOrder())) {
                    unset($this->attributes[$key]);
                }
            }
        }
    }

    //removes unused attributes and sorts them by their order value
    public function organizeAttributes(){

        $newAttributesArray = array();

        foreach($this->getAttributes() as $attribute){
            if (is_numeric($attribute->getOrder())) {
                $newAttributesArray[$attribute->getOrder()] = $attribute;
            }
        }

        ksort($newAttributesArray);

        $this->updateAttributes($newAttributesArray);
    }

    public function process($fh){

        while (!feof($fh)) {

            $line = fgets($fh);

            //var_dump($line);

            foreach ($this->getAttributes() as $attribute) {

                if ($attribute instanceof \ICalParser\Component\Base\Attribute) {

                    //var_dump('HERE?!');
                    //var_dump(strtoupper($line));
                    //var_dump($attribute);
                    //var_dump($attribute->getName());
                    //echo '<hr/>';

                    //if the attribute matches the beginning part of the line being parsed
                    if (strpos(strtoupper($line), strtoupper($attribute->getName() . ':')) === 0) {

                        $componentName = strtoupper($attribute->getName());
                        $componentValue = strtoupper(trim(substr($line, strlen($attribute->getName() . ':'), strlen($line))));

                        //if we're going to nest a child Component
                        if ($componentName. ':' == 'BEGIN:') {

                            //var_dump($componentName);
                            //var_dump($componentValue);
                            //echo '<hr/>';

                            $componentObject = \ICalParser\Factory\ComponentFactory::buildComponent(strtoupper($componentValue));
                            $componentObject->process($fh);
                            $componentObject->setOrder($this->getIncreaseAttributeOrderCounter());
                            $this->addVcomponentAsAttribute($componentObject);

                            //if we're ending the current Component, return back to the parent to continue parsing
                        } elseif ($componentName . ':' == 'END:') {
                            //var_dump($componentName);
                            //var_dump($componentValue);
                            //echo '<hr/>';

                            //$this->removeUnusedAttributes();
                            $this->organizeAttributes();
                            return TRUE;

                        } else {

                            $this->setAttributeValueByName($componentName, $componentValue);
                            $this->setAttributeOrderByName($componentName, $this->getIncreaseAttributeOrderCounter());
                        }

                    }
                }
            }
        }

        //an END line wasn't found, return FALSE
        $parseFault = new \ICalParser\Debug\Fault\ParseFault();
        $parseFault->setMessage('Config array key not found for: '.get_class($this));
        return $parseFault;
    }
} 