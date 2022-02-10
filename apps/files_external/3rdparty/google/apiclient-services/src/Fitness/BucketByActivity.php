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

namespace Google\Service\Fitness;

class BucketByActivity extends \Google\Model
{
  /**
   * @var string
   */
  public $activityDataSourceId;
  /**
   * @var string
   */
  public $minDurationMillis;

  /**
   * @param string
   */
  public function setActivityDataSourceId($activityDataSourceId)
  {
    $this->activityDataSourceId = $activityDataSourceId;
  }
  /**
   * @return string
   */
  public function getActivityDataSourceId()
  {
    return $this->activityDataSourceId;
  }
  /**
   * @param string
   */
  public function setMinDurationMillis($minDurationMillis)
  {
    $this->minDurationMillis = $minDurationMillis;
  }
  /**
   * @return string
   */
  public function getMinDurationMillis()
  {
    return $this->minDurationMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BucketByActivity::class, 'Google_Service_Fitness_BucketByActivity');
