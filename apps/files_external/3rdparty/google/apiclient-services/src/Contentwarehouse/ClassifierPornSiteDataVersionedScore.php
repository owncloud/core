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

class ClassifierPornSiteDataVersionedScore extends \Google\Collection
{
  protected $collection_key = 'siteRule';
  /**
   * @var float
   */
  public $score;
  /**
   * @var string[]
   */
  public $siteRule;
  /**
   * @var int
   */
  public $version;
  /**
   * @var float
   */
  public $verticals4Score;

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
   * @param string[]
   */
  public function setSiteRule($siteRule)
  {
    $this->siteRule = $siteRule;
  }
  /**
   * @return string[]
   */
  public function getSiteRule()
  {
    return $this->siteRule;
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
  /**
   * @param float
   */
  public function setVerticals4Score($verticals4Score)
  {
    $this->verticals4Score = $verticals4Score;
  }
  /**
   * @return float
   */
  public function getVerticals4Score()
  {
    return $this->verticals4Score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClassifierPornSiteDataVersionedScore::class, 'Google_Service_Contentwarehouse_ClassifierPornSiteDataVersionedScore');
