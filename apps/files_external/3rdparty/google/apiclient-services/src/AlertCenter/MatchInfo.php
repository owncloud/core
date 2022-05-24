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

namespace Google\Service\AlertCenter;

class MatchInfo extends \Google\Model
{
  protected $predefinedDetectorType = PredefinedDetectorInfo::class;
  protected $predefinedDetectorDataType = '';
  protected $userDefinedDetectorType = UserDefinedDetectorInfo::class;
  protected $userDefinedDetectorDataType = '';

  /**
   * @param PredefinedDetectorInfo
   */
  public function setPredefinedDetector(PredefinedDetectorInfo $predefinedDetector)
  {
    $this->predefinedDetector = $predefinedDetector;
  }
  /**
   * @return PredefinedDetectorInfo
   */
  public function getPredefinedDetector()
  {
    return $this->predefinedDetector;
  }
  /**
   * @param UserDefinedDetectorInfo
   */
  public function setUserDefinedDetector(UserDefinedDetectorInfo $userDefinedDetector)
  {
    $this->userDefinedDetector = $userDefinedDetector;
  }
  /**
   * @return UserDefinedDetectorInfo
   */
  public function getUserDefinedDetector()
  {
    return $this->userDefinedDetector;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MatchInfo::class, 'Google_Service_AlertCenter_MatchInfo');
