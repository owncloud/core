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

class AllocationSpecificSKUReservation extends \Google\Model
{
  /**
   * @var string
   */
  public $assuredCount;
  /**
   * @var string
   */
  public $count;
  /**
   * @var string
   */
  public $inUseCount;
  protected $instancePropertiesType = AllocationSpecificSKUAllocationReservedInstanceProperties::class;
  protected $instancePropertiesDataType = '';

  /**
   * @param string
   */
  public function setAssuredCount($assuredCount)
  {
    $this->assuredCount = $assuredCount;
  }
  /**
   * @return string
   */
  public function getAssuredCount()
  {
    return $this->assuredCount;
  }
  /**
   * @param string
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return string
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param string
   */
  public function setInUseCount($inUseCount)
  {
    $this->inUseCount = $inUseCount;
  }
  /**
   * @return string
   */
  public function getInUseCount()
  {
    return $this->inUseCount;
  }
  /**
   * @param AllocationSpecificSKUAllocationReservedInstanceProperties
   */
  public function setInstanceProperties(AllocationSpecificSKUAllocationReservedInstanceProperties $instanceProperties)
  {
    $this->instanceProperties = $instanceProperties;
  }
  /**
   * @return AllocationSpecificSKUAllocationReservedInstanceProperties
   */
  public function getInstanceProperties()
  {
    return $this->instanceProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AllocationSpecificSKUReservation::class, 'Google_Service_Compute_AllocationSpecificSKUReservation');
