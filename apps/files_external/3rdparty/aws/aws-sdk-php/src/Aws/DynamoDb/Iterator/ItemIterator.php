<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\DynamoDb\Iterator;

use Aws\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Collection;
use Guzzle\Common\ToArrayInterface;

/**
 * Converts items to a simple associative array form with type information
 * removed. Also performs base64_decode on values specified as binary. Each item
 * is yielded as an array-accessible Collection object.
 *
 * @deprecated The new DynamoDB document model, including the new types (L, M,
 *             BOOL, NULL), is not supported by this class.
 */
class ItemIterator extends \IteratorIterator implements \Countable, ToArrayInterface
{
    /**
     * Collects items from the result of a DynamoDB operation and returns them as an ItemIterator.
     *
     * @param Collection $result  The result of a DynamoDB operation that potentially contains items
     *                            (e.g., BatchGetItem, DeleteItem, GetItem, PutItem, Query, Scan, UpdateItem)
     *
     * @return self
     */
    public static function fromResult(Collection $result)
    {
        if (!($items = $result->get('Items'))) {
            if ($item = $result->get('Item') ?: $result->get('Attributes')) {
                $items = array($item);
            } else {
                $items = $result->getPath('Responses/*');
            }
        }

        return new self(new \ArrayIterator($items ?: array()));
    }

    /**
     * Ensures that the inner iterator is both Traversable and Countable
     *
     * {@inheritdoc}
     *
     * @throws InvalidArgumentException
     */
    public function __construct(\Traversable $iterator)
    {
        if (!($iterator instanceof \Countable)) {
            throw new InvalidArgumentException('The inner iterator for an ItemIterator must be Countable.');
        }

        parent::__construct($iterator);
    }

    /**
     * Returns the first item in the iterator
     */
    public function getFirst()
    {
        $this->rewind();

        return $this->current();
    }

    /**
     * {@inheritdoc}
     * @return Collection
     */
    public function current()
    {
        return new Collection(array_map(array($this, 'processAttribute'), parent::current()));
    }

    public function count()
    {
        return $this->getInnerIterator()->count();
    }

    public function toArray()
    {
        return iterator_to_array($this, false);
    }

    /**
     * Converts an item's attribute from the DynamoDB format to a typeless value in order to simplify the overall
     * array structure of an item. The method also base64 decodes the value any Binary attributes
     *
     * @param array $attribute
     *
     * @return array|string
     */
    protected function processAttribute(array $attribute)
    {
        list($type, $value) = each($attribute);

        if ($type === 'B') {
            $value = base64_decode($value);
        } elseif ($type === 'BS') {
            $value = array_map('base64_decode', $value);
        }

        return $value;
    }
}
