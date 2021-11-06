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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2Interval extends \Google\Model
{
  public $exclusiveMaximum;
  public $exclusiveMinimum;
  public $maximum;
  public $minimum;

  public function setExclusiveMaximum($exclusiveMaximum)
  {
    $this->exclusiveMaximum = $exclusiveMaximum;
  }
  public function getExclusiveMaximum()
  {
    return $this->exclusiveMaximum;
  }
  public function setExclusiveMinimum($exclusiveMinimum)
  {
    $this->exclusiveMinimum = $exclusiveMinimum;
  }
  public function getExclusiveMinimum()
  {
    return $this->exclusiveMinimum;
  }
  public function setMaximum($maximum)
  {
    $this->maximum = $maximum;
  }
  public function getMaximum()
  {
    return $this->maximum;
  }
  public function setMinimum($minimum)
  {
    $this->minimum = $minimum;
  }
  public function getMinimum()
  {
    return $this->minimum;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2Interval::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2Interval');
