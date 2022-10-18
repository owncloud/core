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

class ResearchScienceSearchFieldOfStudyInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $classificationSource;
  /**
   * @var string
   */
  public $isAboveThreshold;
  /**
   * @var string
   */
  public $label;
  public $probability;

  /**
   * @param string
   */
  public function setClassificationSource($classificationSource)
  {
    $this->classificationSource = $classificationSource;
  }
  /**
   * @return string
   */
  public function getClassificationSource()
  {
    return $this->classificationSource;
  }
  /**
   * @param string
   */
  public function setIsAboveThreshold($isAboveThreshold)
  {
    $this->isAboveThreshold = $isAboveThreshold;
  }
  /**
   * @return string
   */
  public function getIsAboveThreshold()
  {
    return $this->isAboveThreshold;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  public function setProbability($probability)
  {
    $this->probability = $probability;
  }
  public function getProbability()
  {
    return $this->probability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchFieldOfStudyInfo::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchFieldOfStudyInfo');
