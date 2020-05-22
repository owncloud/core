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

class Google_Service_AdExchangeBuyerII_OperatingSystemTargeting extends Google_Model
{
  protected $operatingSystemCriteriaType = 'Google_Service_AdExchangeBuyerII_CriteriaTargeting';
  protected $operatingSystemCriteriaDataType = '';
  protected $operatingSystemVersionCriteriaType = 'Google_Service_AdExchangeBuyerII_CriteriaTargeting';
  protected $operatingSystemVersionCriteriaDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function setOperatingSystemCriteria(Google_Service_AdExchangeBuyerII_CriteriaTargeting $operatingSystemCriteria)
  {
    $this->operatingSystemCriteria = $operatingSystemCriteria;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function getOperatingSystemCriteria()
  {
    return $this->operatingSystemCriteria;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function setOperatingSystemVersionCriteria(Google_Service_AdExchangeBuyerII_CriteriaTargeting $operatingSystemVersionCriteria)
  {
    $this->operatingSystemVersionCriteria = $operatingSystemVersionCriteria;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_CriteriaTargeting
   */
  public function getOperatingSystemVersionCriteria()
  {
    return $this->operatingSystemVersionCriteria;
  }
}
