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

namespace Google\Service\BigtableAdmin;

class Frame extends \Google\Model
{
  /**
   * @var string
   */
  public $targetName;
  /**
   * @var string
   */
  public $workflowGuid;
  /**
   * @var string
   */
  public $zoneId;

  /**
   * @param string
   */
  public function setTargetName($targetName)
  {
    $this->targetName = $targetName;
  }
  /**
   * @return string
   */
  public function getTargetName()
  {
    return $this->targetName;
  }
  /**
   * @param string
   */
  public function setWorkflowGuid($workflowGuid)
  {
    $this->workflowGuid = $workflowGuid;
  }
  /**
   * @return string
   */
  public function getWorkflowGuid()
  {
    return $this->workflowGuid;
  }
  /**
   * @param string
   */
  public function setZoneId($zoneId)
  {
    $this->zoneId = $zoneId;
  }
  /**
   * @return string
   */
  public function getZoneId()
  {
    return $this->zoneId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Frame::class, 'Google_Service_BigtableAdmin_Frame');
