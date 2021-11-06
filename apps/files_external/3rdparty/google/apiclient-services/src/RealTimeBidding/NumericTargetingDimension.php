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

namespace Google\Service\RealTimeBidding;

class NumericTargetingDimension extends \Google\Collection
{
  protected $collection_key = 'includedIds';
  public $excludedIds;
  public $includedIds;

  public function setExcludedIds($excludedIds)
  {
    $this->excludedIds = $excludedIds;
  }
  public function getExcludedIds()
  {
    return $this->excludedIds;
  }
  public function setIncludedIds($includedIds)
  {
    $this->includedIds = $includedIds;
  }
  public function getIncludedIds()
  {
    return $this->includedIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NumericTargetingDimension::class, 'Google_Service_RealTimeBidding_NumericTargetingDimension');
