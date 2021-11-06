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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1Quota extends \Google\Model
{
  public $interval;
  public $limit;
  public $timeUnit;

  public function setInterval($interval)
  {
    $this->interval = $interval;
  }
  public function getInterval()
  {
    return $this->interval;
  }
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  public function setTimeUnit($timeUnit)
  {
    $this->timeUnit = $timeUnit;
  }
  public function getTimeUnit()
  {
    return $this->timeUnit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Quota::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Quota');
