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

class Google_Service_Compute_PerInstanceConfig extends Google_Model
{
  public $fingerprint;
  public $name;
  protected $preservedStateType = 'Google_Service_Compute_PreservedState';
  protected $preservedStateDataType = '';
  public $status;

  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Compute_PreservedState
   */
  public function setPreservedState(Google_Service_Compute_PreservedState $preservedState)
  {
    $this->preservedState = $preservedState;
  }
  /**
   * @return Google_Service_Compute_PreservedState
   */
  public function getPreservedState()
  {
    return $this->preservedState;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}
