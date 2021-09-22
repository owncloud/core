<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Compute;

class RouterNatSubnetworkToNat extends \Google\Collection
{
  protected $collection_key = 'sourceIpRangesToNat';
  public $name;
  public $secondaryIpRangeNames;
  public $sourceIpRangesToNat;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSecondaryIpRangeNames($secondaryIpRangeNames)
  {
    $this->secondaryIpRangeNames = $secondaryIpRangeNames;
  }
  public function getSecondaryIpRangeNames()
  {
    return $this->secondaryIpRangeNames;
  }
  public function setSourceIpRangesToNat($sourceIpRangesToNat)
  {
    $this->sourceIpRangesToNat = $sourceIpRangesToNat;
  }
  public function getSourceIpRangesToNat()
  {
    return $this->sourceIpRangesToNat;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterNatSubnetworkToNat::class, 'Google_Service_Compute_RouterNatSubnetworkToNat');
