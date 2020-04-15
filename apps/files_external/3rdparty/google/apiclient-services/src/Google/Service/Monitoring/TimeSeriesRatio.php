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

class Google_Service_Monitoring_TimeSeriesRatio extends Google_Model
{
  public $badServiceFilter;
  public $goodServiceFilter;
  public $totalServiceFilter;

  public function setBadServiceFilter($badServiceFilter)
  {
    $this->badServiceFilter = $badServiceFilter;
  }
  public function getBadServiceFilter()
  {
    return $this->badServiceFilter;
  }
  public function setGoodServiceFilter($goodServiceFilter)
  {
    $this->goodServiceFilter = $goodServiceFilter;
  }
  public function getGoodServiceFilter()
  {
    return $this->goodServiceFilter;
  }
  public function setTotalServiceFilter($totalServiceFilter)
  {
    $this->totalServiceFilter = $totalServiceFilter;
  }
  public function getTotalServiceFilter()
  {
    return $this->totalServiceFilter;
  }
}
