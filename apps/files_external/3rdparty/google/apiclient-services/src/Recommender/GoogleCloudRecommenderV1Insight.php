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
  public $category;
  public $content;
  public $description;
  public $etag;
  public $insightSubtype;
  public $lastRefreshTime;
  public $name;
  public $observationPeriod;
  public $severity;
  protected $stateInfoType = GoogleCloudRecommenderV1InsightStateInfo::class;
  protected $stateInfoDataType = '';
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
  public function setCategory($category)
  {
    $this->category = $category;
  }
  public function getCategory()
  {
    return $this->category;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setInsightSubtype($insightSubtype)
  {
    $this->insightSubtype = $insightSubtype;
  }
  public function getInsightSubtype()
  {
    return $this->insightSubtype;
  }
  public function setLastRefreshTime($lastRefreshTime)
  {
    $this->lastRefreshTime = $lastRefreshTime;
  }
  public function getLastRefreshTime()
  {
    return $this->lastRefreshTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setObservationPeriod($observationPeriod)
  {
    $this->observationPeriod = $observationPeriod;
  }
  public function getObservationPeriod()
  {
    return $this->observationPeriod;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
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
  public function setTargetResources($targetResources)
  {
    $this->targetResources = $targetResources;
  }
  public function getTargetResources()
  {
    return $this->targetResources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommenderV1Insight::class, 'Google_Service_Recommender_GoogleCloudRecommenderV1Insight');
