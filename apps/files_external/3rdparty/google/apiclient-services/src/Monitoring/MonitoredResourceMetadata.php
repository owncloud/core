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

class MonitoredResourceMetadata extends \Google\Model
{
  /**
   * @var array[]
   */
  public $systemLabels;
  /**
   * @var string[]
   */
  public $userLabels;

  /**
   * @param array[]
   */
  public function setSystemLabels($systemLabels)
  {
    $this->systemLabels = $systemLabels;
  }
  /**
   * @return array[]
   */
  public function getSystemLabels()
  {
    return $this->systemLabels;
  }
  /**
   * @param string[]
   */
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  /**
   * @return string[]
   */
  public function getUserLabels()
  {
    return $this->userLabels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MonitoredResourceMetadata::class, 'Google_Service_Monitoring_MonitoredResourceMetadata');
