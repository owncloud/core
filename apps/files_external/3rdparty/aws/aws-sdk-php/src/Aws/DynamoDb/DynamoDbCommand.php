<?php
namespace Aws\DynamoDb;

use Aws\Common\Command\JsonCommand;

/**
 * Short-circuits validation for DynamoDB and handles binary value decoding in
 * the response, if enabled.
 *
 * @internal
 */
class DynamoDbCommand extends JsonCommand
{
    protected function validate()
    {
        // No validation for DynamoDB ever. This is because the service
        // description does everything with additionalParameters
        return;
    }

    protected function process()
    {
        parent::process();

        // Decode B/BS values when Response processing is enabled
        if ($this[self::RESPONSE_PROCESSING] == self::TYPE_MODEL) {
            foreach ($this->result as $key => $value) {
                $this->result[$key] = self::unmarshalAttributes($value);
            }
        }
    }

    /**
     * Recursively searches for N/NS/B/BS values within the given value and
     * marshals them (e.g., base64_encode) into a DynamoDB compatible format.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public static function marshalAttributes($value)
    {
        if (is_array($value)) {
            array_walk($value, ($fn = function(&$v, $k) use (&$fn) {
                if ($k === 'N' && (is_int($v) || is_float($v))) {
                    $v = strval($v);
                } elseif ($k === 'NS' && is_array($v) && isset($v[0])) {
                    $v = array_map('strval', $v);
                } elseif ($k === 'B' && is_string($v)) {
                    $v = base64_encode($v);
                } elseif ($k === 'BS' && is_array($v) && isset($v[0])) {
                    $v = array_map('base64_encode', $v);
                } elseif (is_array($v)) {
                    array_walk($v, $fn);
                }
            }));
        }

        return $value;
    }

    /**
     * Recursively searches for B/BS values within the given value and
     * decodes them into their original string format.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public static function unmarshalAttributes($value)
    {
        if (is_array($value)) {
            array_walk($value, ($fn = function(&$v, $k) use (&$fn) {
                if ($k === 'B' && is_string($v)) {
                    $v = base64_decode($v);
                } elseif ($k === 'BS' && is_array($v) && isset($v[0])) {
                    $v = array_map('base64_decode', $v);
                } elseif (is_array($v)) {
                    array_walk($v, $fn);
                }
            }));
        }

        return $value;
    }
}
