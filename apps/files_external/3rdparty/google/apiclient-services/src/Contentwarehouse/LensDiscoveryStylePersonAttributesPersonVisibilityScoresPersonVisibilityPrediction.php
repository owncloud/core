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

namespace Google\Service\Contentwarehouse;

class LensDiscoveryStylePersonAttributesPersonVisibilityScoresPersonVisibilityPrediction extends \Google\Model
{
  /**
   * @var int
   */
  public $discretizedIconicPersonVisibilityConfidence;
  /**
   * @var string
   */
  public $iconicPersonVisibilityType;

  /**
   * @param int
   */
  public function setDiscretizedIconicPersonVisibilityConfidence($discretizedIconicPersonVisibilityConfidence)
  {
    $this->discretizedIconicPersonVisibilityConfidence = $discretizedIconicPersonVisibilityConfidence;
  }
  /**
   * @return int
   */
  public function getDiscretizedIconicPersonVisibilityConfidence()
  {
    return $this->discretizedIconicPersonVisibilityConfidence;
  }
  /**
   * @param string
   */
  public function setIconicPersonVisibilityType($iconicPersonVisibilityType)
  {
    $this->iconicPersonVisibilityType = $iconicPersonVisibilityType;
  }
  /**
   * @return string
   */
  public function getIconicPersonVisibilityType()
  {
    return $this->iconicPersonVisibilityType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LensDiscoveryStylePersonAttributesPersonVisibilityScoresPersonVisibilityPrediction::class, 'Google_Service_Contentwarehouse_LensDiscoveryStylePersonAttributesPersonVisibilityScoresPersonVisibilityPrediction');
