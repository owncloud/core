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

namespace Google\Service\AuthorizedBuyersMarketplace;

class DealPausingInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $pauseReason;
  /**
   * @var string
   */
  public $pauseRole;
  /**
   * @var bool
   */
  public $pausingConsented;

  /**
   * @param string
   */
  public function setPauseReason($pauseReason)
  {
    $this->pauseReason = $pauseReason;
  }
  /**
   * @return string
   */
  public function getPauseReason()
  {
    return $this->pauseReason;
  }
  /**
   * @param string
   */
  public function setPauseRole($pauseRole)
  {
    $this->pauseRole = $pauseRole;
  }
  /**
   * @return string
   */
  public function getPauseRole()
  {
    return $this->pauseRole;
  }
  /**
   * @param bool
   */
  public function setPausingConsented($pausingConsented)
  {
    $this->pausingConsented = $pausingConsented;
  }
  /**
   * @return bool
   */
  public function getPausingConsented()
  {
    return $this->pausingConsented;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DealPausingInfo::class, 'Google_Service_AuthorizedBuyersMarketplace_DealPausingInfo');
