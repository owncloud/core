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

namespace Google\Service\AlertCenter;

class MergeInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $newAlertId;
  /**
   * @var string
   */
  public $newIncidentTrackingId;

  /**
   * @param string
   */
  public function setNewAlertId($newAlertId)
  {
    $this->newAlertId = $newAlertId;
  }
  /**
   * @return string
   */
  public function getNewAlertId()
  {
    return $this->newAlertId;
  }
  /**
   * @param string
   */
  public function setNewIncidentTrackingId($newIncidentTrackingId)
  {
    $this->newIncidentTrackingId = $newIncidentTrackingId;
  }
  /**
   * @return string
   */
  public function getNewIncidentTrackingId()
  {
    return $this->newIncidentTrackingId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MergeInfo::class, 'Google_Service_AlertCenter_MergeInfo');
