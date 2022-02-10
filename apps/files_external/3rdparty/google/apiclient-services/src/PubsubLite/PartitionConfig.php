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

namespace Google\Service\PubsubLite;

class PartitionConfig extends \Google\Model
{
  protected $capacityType = Capacity::class;
  protected $capacityDataType = '';
  /**
   * @var string
   */
  public $count;
  /**
   * @var int
   */
  public $scale;

  /**
   * @param Capacity
   */
  public function setCapacity(Capacity $capacity)
  {
    $this->capacity = $capacity;
  }
  /**
   * @return Capacity
   */
  public function getCapacity()
  {
    return $this->capacity;
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
   * @param int
   */
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  /**
   * @return int
   */
  public function getScale()
  {
    return $this->scale;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartitionConfig::class, 'Google_Service_PubsubLite_PartitionConfig');
