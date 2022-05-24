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

namespace Google\Service\Monitoring;

class AlertStrategy extends \Google\Model
{
  /**
   * @var string
   */
  public $autoClose;
  protected $notificationRateLimitType = NotificationRateLimit::class;
  protected $notificationRateLimitDataType = '';

  /**
   * @param string
   */
  public function setAutoClose($autoClose)
  {
    $this->autoClose = $autoClose;
  }
  /**
   * @return string
   */
  public function getAutoClose()
  {
    return $this->autoClose;
  }
  /**
   * @param NotificationRateLimit
   */
  public function setNotificationRateLimit(NotificationRateLimit $notificationRateLimit)
  {
    $this->notificationRateLimit = $notificationRateLimit;
  }
  /**
   * @return NotificationRateLimit
   */
  public function getNotificationRateLimit()
  {
    return $this->notificationRateLimit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AlertStrategy::class, 'Google_Service_Monitoring_AlertStrategy');
