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

class Google_Service_CloudTalentSolution_GoogleCloudTalentV4CompensationInfoCompensationRange extends Google_Model
{
  protected $maxCompensationType = 'Google_Service_CloudTalentSolution_Money';
  protected $maxCompensationDataType = '';
  protected $minCompensationType = 'Google_Service_CloudTalentSolution_Money';
  protected $minCompensationDataType = '';

  /**
   * @param Google_Service_CloudTalentSolution_Money
   */
  public function setMaxCompensation(Google_Service_CloudTalentSolution_Money $maxCompensation)
  {
    $this->maxCompensation = $maxCompensation;
  }
  /**
   * @return Google_Service_CloudTalentSolution_Money
   */
  public function getMaxCompensation()
  {
    return $this->maxCompensation;
  }
  /**
   * @param Google_Service_CloudTalentSolution_Money
   */
  public function setMinCompensation(Google_Service_CloudTalentSolution_Money $minCompensation)
  {
    $this->minCompensation = $minCompensation;
  }
  /**
   * @return Google_Service_CloudTalentSolution_Money
   */
  public function getMinCompensation()
  {
    return $this->minCompensation;
  }
}
