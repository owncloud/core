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

class Google_Service_Replicapool_ReplicaStatus extends Google_Model
{
  public $details;
  public $state;
  public $templateVersion;
  public $vmLink;
  public $vmStartTime;

  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTemplateVersion($templateVersion)
  {
    $this->templateVersion = $templateVersion;
  }
  public function getTemplateVersion()
  {
    return $this->templateVersion;
  }
  public function setVmLink($vmLink)
  {
    $this->vmLink = $vmLink;
  }
  public function getVmLink()
  {
    return $this->vmLink;
  }
  public function setVmStartTime($vmStartTime)
  {
    $this->vmStartTime = $vmStartTime;
  }
  public function getVmStartTime()
  {
    return $this->vmStartTime;
  }
}
