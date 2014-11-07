<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Extension\Twig;

use Assetic\ValueSupplierInterface;

/**
 * Container for values initialized lazily from a ValueSupplierInterface.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ValueContainer implements \ArrayAccess, \IteratorAggregate, \Countable
{
    private $values;
    private $valueSupplier;

    public function __construct(ValueSupplierInterface $valueSupplier)
    {
        $this->valueSupplier = $valueSupplier;
    }

    public function offsetExists($offset)
    {
        $this->initialize();

        return array_key_exists($offset, $this->values);
    }

    public function offsetGet($offset)
    {
        $this->initialize();

        if (!array_key_exists($offset, $this->values)) {
            throw new \OutOfRangeException(sprintf('The variable "%s" does not exist.', $offset));
        }

        return $this->values[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new \BadMethodCallException('The ValueContainer is read-only.');
    }

    public function offsetUnset($offset)
    {
        throw new \BadMethodCallException('The ValueContainer is read-only.');
    }

    public function getIterator()
    {
        $this->initialize();

        return new \ArrayIterator($this->values);
    }

    public function count()
    {
        $this->initialize();

        return count($this->values);
    }

    private function initialize()
    {
        if (null === $this->values) {
            $this->values = $this->valueSupplier->getValues();
        }
    }
}
