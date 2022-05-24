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

namespace Google\Service\AIPlatformNotebooks;

class InstanceConfig extends \Google\Model
{
  /**
   * @var bool
   */
  public $enableHealthMonitoring;
  /**
   * @var string
   */
  public $notebookUpgradeSchedule;

  /**
   * @param bool
   */
  public function setEnableHealthMonitoring($enableHealthMonitoring)
  {
    $this->enableHealthMonitoring = $enableHealthMonitoring;
  }
  /**
   * @return bool
   */
  public function getEnableHealthMonitoring()
  {
    return $this->enableHealthMonitoring;
  }
  /**
   * @param string
   */
  public function setNotebookUpgradeSchedule($notebookUpgradeSchedule)
  {
    $this->notebookUpgradeSchedule = $notebookUpgradeSchedule;
  }
  /**
   * @return string
   */
  public function getNotebookUpgradeSchedule()
  {
    return $this->notebookUpgradeSchedule;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceConfig::class, 'Google_Service_AIPlatformNotebooks_InstanceConfig');
