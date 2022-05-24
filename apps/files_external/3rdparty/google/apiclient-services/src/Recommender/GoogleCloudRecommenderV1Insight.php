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

namespace Google\Service\Recommender;

class GoogleCloudRecommenderV1Insight extends \Google\Collection
{
  protected $collection_key = 'targetResources';
  protected $associatedRecommendationsType = GoogleCloudRecommenderV1InsightRecommendationReference::class;
  protected $associatedRecommendationsDataType = 'array';
  /**
   * @var string
   */
  public $category;
  /**
   * @var array[]
   */
  public $content;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $insightSubtype;
  /**
   * @var string
   */
  public $lastRefreshTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $observationPeriod;
  /**
   * @var string
   */
  public $severity;
  protected $stateInfoType = GoogleCloudRecommenderV1InsightStateInfo::class;
  protected $stateInfoDataType = '';
  /**
   * @var string[]
   */
  public $targetResources;

  /**
   * @param GoogleCloudRecommenderV1InsightRecommendationReference[]
   */
  public function setAssociatedRecommendations($associatedRecommendations)
  {
    $this->associatedRecommendations = $associatedRecommendations;
  }
  /**
   * @return GoogleCloudRecommenderV1InsightRecommendationReference[]
   */
  public function getAssociatedRecommendations()
  {
    return $this->associatedRecommendations;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param array[]
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return array[]
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setInsightSubtype($insightSubtype)
  {
    $this->insightSubtype = $insightSubtype;
  }
  /**
   * @return string
   */
  public function getInsightSubtype()
  {
    return $this->insightSubtype;
  }
  /**
   * @param string
   */
  public function setLastRefreshTime($lastRefreshTime)
  {
    $this->lastRefreshTime = $lastRefreshTime;
  }
  /**
   * @return string
   */
  public function getLastRefreshTime()
  {
    return $this->lastRefreshTime;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setObservationPeriod($observationPeriod)
  {
    $this->observationPeriod = $observationPeriod;
  }
  /**
   * @return string
   */
  public function getObservationPeriod()
  {
    return $this->observationPeriod;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param GoogleCloudRecommenderV1InsightStateInfo
   */
  public function setStateInfo(GoogleCloudRecommenderV1InsightStateInfo $stateInfo)
  {
    $this->stateInfo = $stateInfo;
  }
  /**
   * @return GoogleCloudRecommenderV1InsightStateInfo
   */
  public function getStateInfo()
  {
    return $this->stateInfo;
  }
  /**
   * @param string[]
   */
  public function setTargetResources($targetResources)
  {
    $this->targetResources = $targetResources;
  }
  /**
   * @return string[]
   */
  public function getTargetResources()
  {
    return $this->targetResources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommenderV1Insight::class, 'Google_Service_Recommender_GoogleCloudRecommenderV1Insight');
