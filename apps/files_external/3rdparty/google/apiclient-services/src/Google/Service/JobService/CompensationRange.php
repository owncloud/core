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

class Google_Service_JobService_CompensationRange extends Google_Model
{
  protected $maxType = 'Google_Service_JobService_Money';
  protected $maxDataType = '';
  protected $minType = 'Google_Service_JobService_Money';
  protected $minDataType = '';

  /**
   * @param Google_Service_JobService_Money
   */
  public function setMax(Google_Service_JobService_Money $max)
  {
    $this->max = $max;
  }
  /**
   * @return Google_Service_JobService_Money
   */
  public function getMax()
  {
    return $this->max;
  }
  /**
   * @param Google_Service_JobService_Money
   */
  public function setMin(Google_Service_JobService_Money $min)
  {
    $this->min = $min;
  }
  /**
   * @return Google_Service_JobService_Money
   */
  public function getMin()
  {
    return $this->min;
  }
}
