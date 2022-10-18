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

class QualityActionsNewsProviderAnnotationDataProvider extends \Google\Collection
{
  protected $collection_key = 'locales';
  /**
   * @var string[]
   */
  public $locales;
  /**
   * @var string
   */
  public $officialName;
  /**
   * @var string
   */
  public $officialNamePronunciation;
  /**
   * @var int
   */
  public $providerId;
  public $score;

  /**
   * @param string[]
   */
  public function setLocales($locales)
  {
    $this->locales = $locales;
  }
  /**
   * @return string[]
   */
  public function getLocales()
  {
    return $this->locales;
  }
  /**
   * @param string
   */
  public function setOfficialName($officialName)
  {
    $this->officialName = $officialName;
  }
  /**
   * @return string
   */
  public function getOfficialName()
  {
    return $this->officialName;
  }
  /**
   * @param string
   */
  public function setOfficialNamePronunciation($officialNamePronunciation)
  {
    $this->officialNamePronunciation = $officialNamePronunciation;
  }
  /**
   * @return string
   */
  public function getOfficialNamePronunciation()
  {
    return $this->officialNamePronunciation;
  }
  /**
   * @param int
   */
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  /**
   * @return int
   */
  public function getProviderId()
  {
    return $this->providerId;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsNewsProviderAnnotationDataProvider::class, 'Google_Service_Contentwarehouse_QualityActionsNewsProviderAnnotationDataProvider');
