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

class QualitySherlockKnexAnnotationItem extends \Google\Model
{
  /**
   * @var float
   */
  public $calibratedScore;
  /**
   * @var string
   */
  public $debugName;
  /**
   * @var string
   */
  public $equivalentMid;
  /**
   * @var float
   */
  public $score;
  /**
   * @var int
   */
  public $version;

  /**
   * @param float
   */
  public function setCalibratedScore($calibratedScore)
  {
    $this->calibratedScore = $calibratedScore;
  }
  /**
   * @return float
   */
  public function getCalibratedScore()
  {
    return $this->calibratedScore;
  }
  /**
   * @param string
   */
  public function setDebugName($debugName)
  {
    $this->debugName = $debugName;
  }
  /**
   * @return string
   */
  public function getDebugName()
  {
    return $this->debugName;
  }
  /**
   * @param string
   */
  public function setEquivalentMid($equivalentMid)
  {
    $this->equivalentMid = $equivalentMid;
  }
  /**
   * @return string
   */
  public function getEquivalentMid()
  {
    return $this->equivalentMid;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySherlockKnexAnnotationItem::class, 'Google_Service_Contentwarehouse_QualitySherlockKnexAnnotationItem');
