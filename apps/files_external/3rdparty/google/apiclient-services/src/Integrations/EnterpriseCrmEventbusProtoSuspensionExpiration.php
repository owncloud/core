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

class EnterpriseCrmEventbusProtoSuspensionExpiration extends \Google\Model
{
  /**
   * @var int
   */
  public $expireAfterMs;
  /**
   * @var bool
   */
  public $liftWhenExpired;
  /**
   * @var int
   */
  public $remindAfterMs;

  /**
   * @param int
   */
  public function setExpireAfterMs($expireAfterMs)
  {
    $this->expireAfterMs = $expireAfterMs;
  }
  /**
   * @return int
   */
  public function getExpireAfterMs()
  {
    return $this->expireAfterMs;
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
   * @param int
   */
  public function setRemindAfterMs($remindAfterMs)
  {
    $this->remindAfterMs = $remindAfterMs;
  }
  /**
   * @return int
   */
  public function getRemindAfterMs()
  {
    return $this->remindAfterMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoSuspensionExpiration::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoSuspensionExpiration');
