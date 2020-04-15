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

class Google_Service_Compute_InstanceGroupManagerUpdatePolicy extends Google_Model
{
  public $instanceRedistributionType;
  protected $maxSurgeType = 'Google_Service_Compute_FixedOrPercent';
  protected $maxSurgeDataType = '';
  protected $maxUnavailableType = 'Google_Service_Compute_FixedOrPercent';
  protected $maxUnavailableDataType = '';
  public $minimalAction;
  public $replacementMethod;
  public $type;

  public function setInstanceRedistributionType($instanceRedistributionType)
  {
    $this->instanceRedistributionType = $instanceRedistributionType;
  }
  public function getInstanceRedistributionType()
  {
    return $this->instanceRedistributionType;
  }
  /**
   * @param Google_Service_Compute_FixedOrPercent
   */
  public function setMaxSurge(Google_Service_Compute_FixedOrPercent $maxSurge)
  {
    $this->maxSurge = $maxSurge;
  }
  /**
   * @return Google_Service_Compute_FixedOrPercent
   */
  public function getMaxSurge()
  {
    return $this->maxSurge;
  }
  /**
   * @param Google_Service_Compute_FixedOrPercent
   */
  public function setMaxUnavailable(Google_Service_Compute_FixedOrPercent $maxUnavailable)
  {
    $this->maxUnavailable = $maxUnavailable;
  }
  /**
   * @return Google_Service_Compute_FixedOrPercent
   */
  public function getMaxUnavailable()
  {
    return $this->maxUnavailable;
  }
  public function setMinimalAction($minimalAction)
  {
    $this->minimalAction = $minimalAction;
  }
  public function getMinimalAction()
  {
    return $this->minimalAction;
  }
  public function setReplacementMethod($replacementMethod)
  {
    $this->replacementMethod = $replacementMethod;
  }
  public function getReplacementMethod()
  {
    return $this->replacementMethod;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
