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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaSuspensionApprovalExpiration extends \Google\Model
{
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var bool
   */
  public $liftWhenExpired;
  /**
   * @var string
   */
  public $remindTime;

  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param bool
   */
  public function setLiftWhenExpired($liftWhenExpired)
  {
    $this->liftWhenExpired = $liftWhenExpired;
  }
  /**
   * @return bool
   */
  public function getLiftWhenExpired()
  {
    return $this->liftWhenExpired;
  }
  /**
   * @param string
   */
  public function setRemindTime($remindTime)
  {
    $this->remindTime = $remindTime;
  }
  /**
   * @return string
   */
  public function getRemindTime()
  {
    return $this->remindTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaSuspensionApprovalExpiration::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaSuspensionApprovalExpiration');
