<?php

/**
 * Created by PhpStorm.
 * User: Theophilus Omoregbee <theo4u@ymail.com>
 * Date: 10/25/16
 * Time: 12:11 AM
 * This class serialize php object class to an instance compatible with json ecode
 */
class SerializeMe
{

    /**
     * This serialize our object to a normal single object
     * @param $object
     * @param array $option this is used to handle the number of inner iteration
     * to load or serialize
     * @return array
     */
    public static function serialize($object, $option = array("number_of_iteration"=>null, "return"=>"id"))
    {
        $reflect = new ReflectionClass($object);
        $props = $reflect->getDefaultProperties();

        foreach ($props as $key => $value) {
            $check_references = explode("_", $key);
            $getter = "";
            if (count($check_references) > 0) {
                foreach ($check_references as $reference)
                    $getter .= ucfirst($reference);
            } else
                $getter = ucfirst($key);

            $getter = "get" . $getter;
            if (is_object($object->$getter()))
                $props[$key] = SerializeMe::serialize($object->$getter());//continue serialization, till all object is free from serialization
            else
                if (is_array($object->$getter())) {
                    $props[$key] = array();
                    foreach ($object->$getter() as $anObject)
                        if (is_object($anObject))
                            $props[$key][] = SerializeMe::serialize($anObject);//continue serialization till we return normal value
                        else
                            $props[$key][] = $anObject;
                } else
                    $props[$key] = $object->$getter();
        }

        return $props;
    }
}

?>


