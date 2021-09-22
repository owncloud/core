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

class SubnetworksScopedList extends \Google\Collection
{
  protected $collection_key = 'subnetworks';
  protected $subnetworksType = Subnetwork::class;
  protected $subnetworksDataType = 'array';
  protected $warningType = SubnetworksScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param Subnetwork[]
   */
  public function setSubnetworks($subnetworks)
  {
    $this->subnetworks = $subnetworks;
  }
  /**
   * @return Subnetwork[]
   */
  public function getSubnetworks()
  {
    return $this->subnetworks;
  }
  /**
   * @param SubnetworksScopedListWarning
   */
  public function setWarning(SubnetworksScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return SubnetworksScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubnetworksScopedList::class, 'Google_Service_Compute_SubnetworksScopedList');
