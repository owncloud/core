<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic;

/**
 * Value Supplier Interface.
 *
 * Implementations determine runtime values for compile-time variables.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
interface ValueSupplierInterface
{
    /**
     * Returns a map of values.
     *
     * @return array
     */
    public function getValues();
}
