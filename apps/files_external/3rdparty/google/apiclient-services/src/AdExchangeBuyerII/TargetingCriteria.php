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

namespace Google\Service\AdExchangeBuyerII;

class TargetingCriteria extends \Google\Collection
{
  protected $collection_key = 'inclusions';
  protected $exclusionsType = TargetingValue::class;
  protected $exclusionsDataType = 'array';
  protected $inclusionsType = TargetingValue::class;
  protected $inclusionsDataType = 'array';
  public $key;

  /**
   * @param TargetingValue[]
   */
  public function setExclusions($exclusions)
  {
    $this->exclusions = $exclusions;
  }
  /**
   * @return TargetingValue[]
   */
  public function getExclusions()
  {
    return $this->exclusions;
  }
  /**
   * @param TargetingValue[]
   */
  public function setInclusions($inclusions)
  {
    $this->inclusions = $inclusions;
  }
  /**
   * @return TargetingValue[]
   */
  public function getInclusions()
  {
    return $this->inclusions;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetingCriteria::class, 'Google_Service_AdExchangeBuyerII_TargetingCriteria');
