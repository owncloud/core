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

class Google_Service_AndroidEnterprise_AutoInstallPolicy extends Google_Collection
{
  protected $collection_key = 'autoInstallConstraint';
  protected $autoInstallConstraintType = 'Google_Service_AndroidEnterprise_AutoInstallConstraint';
  protected $autoInstallConstraintDataType = 'array';
  public $autoInstallMode;
  public $autoInstallPriority;
  public $minimumVersionCode;

  /**
   * @param Google_Service_AndroidEnterprise_AutoInstallConstraint
   */
  public function setAutoInstallConstraint($autoInstallConstraint)
  {
    $this->autoInstallConstraint = $autoInstallConstraint;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AutoInstallConstraint
   */
  public function getAutoInstallConstraint()
  {
    return $this->autoInstallConstraint;
  }
  public function setAutoInstallMode($autoInstallMode)
  {
    $this->autoInstallMode = $autoInstallMode;
  }
  public function getAutoInstallMode()
  {
    return $this->autoInstallMode;
  }
  public function setAutoInstallPriority($autoInstallPriority)
  {
    $this->autoInstallPriority = $autoInstallPriority;
  }
  public function getAutoInstallPriority()
  {
    return $this->autoInstallPriority;
  }
  public function setMinimumVersionCode($minimumVersionCode)
  {
    $this->minimumVersionCode = $minimumVersionCode;
  }
  public function getMinimumVersionCode()
  {
    return $this->minimumVersionCode;
  }
}
