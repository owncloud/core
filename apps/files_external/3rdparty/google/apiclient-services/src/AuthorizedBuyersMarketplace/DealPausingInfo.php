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
  public $pauseReason;
  public $pauseRole;
  public $pausingConsented;

  public function setPauseReason($pauseReason)
  {
    $this->pauseReason = $pauseReason;
  }
  public function getPauseReason()
  {
    return $this->pauseReason;
  }
  public function setPauseRole($pauseRole)
  {
    $this->pauseRole = $pauseRole;
  }
  public function getPauseRole()
  {
    return $this->pauseRole;
  }
  public function setPausingConsented($pausingConsented)
  {
    $this->pausingConsented = $pausingConsented;
  }
  public function getPausingConsented()
  {
    return $this->pausingConsented;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DealPausingInfo::class, 'Google_Service_AuthorizedBuyersMarketplace_DealPausingInfo');
