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

namespace Google\Service\Contentwarehouse;

class AssistantApiClockCapabilities extends \Google\Model
{
  /**
   * @var int
   */
  public $maxSupportedAlarms;
  protected $maxSupportedExtendedTimerDurationType = AssistantApiDuration::class;
  protected $maxSupportedExtendedTimerDurationDataType = '';
  protected $maxSupportedTimerDurationType = AssistantApiDuration::class;
  protected $maxSupportedTimerDurationDataType = '';
  /**
   * @var int
   */
  public $maxSupportedTimers;
  protected $preferredStopwatchProviderType = AssistantApiCoreTypesProvider::class;
  protected $preferredStopwatchProviderDataType = '';
  /**
   * @var bool
   */
  public $restrictAlarmsToNext24h;

  /**
   * @param int
   */
  public function setMaxSupportedAlarms($maxSupportedAlarms)
  {
    $this->maxSupportedAlarms = $maxSupportedAlarms;
  }
  /**
   * @return int
   */
  public function getMaxSupportedAlarms()
  {
    return $this->maxSupportedAlarms;
  }
  /**
   * @param AssistantApiDuration
   */
  public function setMaxSupportedExtendedTimerDuration(AssistantApiDuration $maxSupportedExtendedTimerDuration)
  {
    $this->maxSupportedExtendedTimerDuration = $maxSupportedExtendedTimerDuration;
  }
  /**
   * @return AssistantApiDuration
   */
  public function getMaxSupportedExtendedTimerDuration()
  {
    return $this->maxSupportedExtendedTimerDuration;
  }
  /**
   * @param AssistantApiDuration
   */
  public function setMaxSupportedTimerDuration(AssistantApiDuration $maxSupportedTimerDuration)
  {
    $this->maxSupportedTimerDuration = $maxSupportedTimerDuration;
  }
  /**
   * @return AssistantApiDuration
   */
  public function getMaxSupportedTimerDuration()
  {
    return $this->maxSupportedTimerDuration;
  }
  /**
   * @param int
   */
  public function setMaxSupportedTimers($maxSupportedTimers)
  {
    $this->maxSupportedTimers = $maxSupportedTimers;
  }
  /**
   * @return int
   */
  public function getMaxSupportedTimers()
  {
    return $this->maxSupportedTimers;
  }
  /**
   * @param AssistantApiCoreTypesProvider
   */
  public function setPreferredStopwatchProvider(AssistantApiCoreTypesProvider $preferredStopwatchProvider)
  {
    $this->preferredStopwatchProvider = $preferredStopwatchProvider;
  }
  /**
   * @return AssistantApiCoreTypesProvider
   */
  public function getPreferredStopwatchProvider()
  {
    return $this->preferredStopwatchProvider;
  }
  /**
   * @param bool
   */
  public function setRestrictAlarmsToNext24h($restrictAlarmsToNext24h)
  {
    $this->restrictAlarmsToNext24h = $restrictAlarmsToNext24h;
  }
  /**
   * @return bool
   */
  public function getRestrictAlarmsToNext24h()
  {
    return $this->restrictAlarmsToNext24h;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiClockCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiClockCapabilities');
