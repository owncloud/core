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

class Google_Service_Spanner_DerivedMetric extends Google_Model
{
  protected $denominatorType = 'Google_Service_Spanner_LocalizedString';
  protected $denominatorDataType = '';
  protected $numeratorType = 'Google_Service_Spanner_LocalizedString';
  protected $numeratorDataType = '';

  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setDenominator(Google_Service_Spanner_LocalizedString $denominator)
  {
    $this->denominator = $denominator;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getDenominator()
  {
    return $this->denominator;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setNumerator(Google_Service_Spanner_LocalizedString $numerator)
  {
    $this->numerator = $numerator;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getNumerator()
  {
    return $this->numerator;
  }
}
