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

class Google_Service_JobService_CustomAttribute extends Google_Model
{
  public $filterable;
  public $longValue;
  protected $stringValuesType = 'Google_Service_JobService_StringValues';
  protected $stringValuesDataType = '';

  public function setFilterable($filterable)
  {
    $this->filterable = $filterable;
  }
  public function getFilterable()
  {
    return $this->filterable;
  }
  public function setLongValue($longValue)
  {
    $this->longValue = $longValue;
  }
  public function getLongValue()
  {
    return $this->longValue;
  }
  /**
   * @param Google_Service_JobService_StringValues
   */
  public function setStringValues(Google_Service_JobService_StringValues $stringValues)
  {
    $this->stringValues = $stringValues;
  }
  /**
   * @return Google_Service_JobService_StringValues
   */
  public function getStringValues()
  {
    return $this->stringValues;
  }
}
