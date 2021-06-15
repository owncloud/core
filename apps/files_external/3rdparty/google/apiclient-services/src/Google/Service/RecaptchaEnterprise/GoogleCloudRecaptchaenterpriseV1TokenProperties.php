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

class Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1TokenProperties extends Google_Model
{
  public $action;
  public $createTime;
  public $hostname;
  public $invalidReason;
  public $valid;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setHostname($hostname)
  {
    $this->hostname = $hostname;
  }
  public function getHostname()
  {
    return $this->hostname;
  }
  public function setInvalidReason($invalidReason)
  {
    $this->invalidReason = $invalidReason;
  }
  public function getInvalidReason()
  {
    return $this->invalidReason;
  }
  public function setValid($valid)
  {
    $this->valid = $valid;
  }
  public function getValid()
  {
    return $this->valid;
  }
}
