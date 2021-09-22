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

class GoogleCloudApigeeV1DebugSessionTransaction extends \Google\Collection
{
  protected $collection_key = 'point';
  public $completed;
  protected $pointType = GoogleCloudApigeeV1Point::class;
  protected $pointDataType = 'array';

  public function setCompleted($completed)
  {
    $this->completed = $completed;
  }
  public function getCompleted()
  {
    return $this->completed;
  }
  /**
   * @param GoogleCloudApigeeV1Point[]
   */
  public function setPoint($point)
  {
    $this->point = $point;
  }
  /**
   * @return GoogleCloudApigeeV1Point[]
   */
  public function getPoint()
  {
    return $this->point;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1DebugSessionTransaction::class, 'Google_Service_Apigee_GoogleCloudApigeeV1DebugSessionTransaction');
