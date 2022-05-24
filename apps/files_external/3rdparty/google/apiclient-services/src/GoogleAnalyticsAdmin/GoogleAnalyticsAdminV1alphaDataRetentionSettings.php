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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaDataRetentionSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $eventDataRetention;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $resetUserDataOnNewActivity;

  /**
   * @param string
   */
  public function setEventDataRetention($eventDataRetention)
  {
    $this->eventDataRetention = $eventDataRetention;
  }
  /**
   * @return string
   */
  public function getEventDataRetention()
  {
    return $this->eventDataRetention;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setResetUserDataOnNewActivity($resetUserDataOnNewActivity)
  {
    $this->resetUserDataOnNewActivity = $resetUserDataOnNewActivity;
  }
  /**
   * @return bool
   */
  public function getResetUserDataOnNewActivity()
  {
    return $this->resetUserDataOnNewActivity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaDataRetentionSettings::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaDataRetentionSettings');
