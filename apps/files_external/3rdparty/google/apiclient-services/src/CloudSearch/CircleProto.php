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

namespace Google\Service\CloudSearch;

class CircleProto extends \Google\Model
{
  /**
   * @var string
   */
  public $circleId;
  /**
   * @var string
   */
  public $ownerGaiaId;
  /**
   * @var string
   */
  public $requiredConsistencyTimestampUsec;

  /**
   * @param string
   */
  public function setCircleId($circleId)
  {
    $this->circleId = $circleId;
  }
  /**
   * @return string
   */
  public function getCircleId()
  {
    return $this->circleId;
  }
  /**
   * @param string
   */
  public function setOwnerGaiaId($ownerGaiaId)
  {
    $this->ownerGaiaId = $ownerGaiaId;
  }
  /**
   * @return string
   */
  public function getOwnerGaiaId()
  {
    return $this->ownerGaiaId;
  }
  /**
   * @param string
   */
  public function setRequiredConsistencyTimestampUsec($requiredConsistencyTimestampUsec)
  {
    $this->requiredConsistencyTimestampUsec = $requiredConsistencyTimestampUsec;
  }
  /**
   * @return string
   */
  public function getRequiredConsistencyTimestampUsec()
  {
    return $this->requiredConsistencyTimestampUsec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CircleProto::class, 'Google_Service_CloudSearch_CircleProto');
