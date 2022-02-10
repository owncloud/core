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

class FirstPartyMobileApplicationTargeting extends \Google\Collection
{
  protected $collection_key = 'targetedAppIds';
  /**
   * @var string[]
   */
  public $excludedAppIds;
  /**
   * @var string[]
   */
  public $targetedAppIds;

  /**
   * @param string[]
   */
  public function setExcludedAppIds($excludedAppIds)
  {
    $this->excludedAppIds = $excludedAppIds;
  }
  /**
   * @return string[]
   */
  public function getExcludedAppIds()
  {
    return $this->excludedAppIds;
  }
  /**
   * @param string[]
   */
  public function setTargetedAppIds($targetedAppIds)
  {
    $this->targetedAppIds = $targetedAppIds;
  }
  /**
   * @return string[]
   */
  public function getTargetedAppIds()
  {
    return $this->targetedAppIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirstPartyMobileApplicationTargeting::class, 'Google_Service_AdExchangeBuyerII_FirstPartyMobileApplicationTargeting');
