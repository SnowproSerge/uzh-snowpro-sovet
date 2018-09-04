<?php
/**
 * Created by PhpStorm.
 * User: naryshkin
 * Date: 30.08.2018
 * Time: 12:21
 */

namespace Uzh\Snowpro\Core\RestModel;


use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Mixed_;

class RestModel implements \JsonSerializable
{

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize():array
    {
        $ret = [];
        foreach ((array)this as $key=>$value) {
            if($value instanceof \JsonSerializable)
                $ret[$key] = $value->jsonSerialize();
            else
                $ret[$key] = $value;
        }
        // TODO: Implement jsonSerialize() method.
        return $ret;
    }

}