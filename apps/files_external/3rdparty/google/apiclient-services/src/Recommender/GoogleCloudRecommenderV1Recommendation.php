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

class GoogleCloudRecommenderV1Recommendation extends \Google\Collection
{
  protected $collection_key = 'associatedInsights';
  protected $additionalImpactType = GoogleCloudRecommenderV1Impact::class;
  protected $additionalImpactDataType = 'array';
  protected $associatedInsightsType = GoogleCloudRecommenderV1RecommendationInsightReference::class;
  protected $associatedInsightsDataType = 'array';
  protected $contentType = GoogleCloudRecommenderV1RecommendationContent::class;
  protected $contentDataType = '';
  public $description;
  public $etag;
  public $lastRefreshTime;
  public $name;
  protected $primaryImpactType = GoogleCloudRecommenderV1Impact::class;
  protected $primaryImpactDataType = '';
  public $priority;
  public $recommenderSubtype;
  protected $stateInfoType = GoogleCloudRecommenderV1RecommendationStateInfo::class;
  protected $stateInfoDataType = '';
  public $xorGroupId;

  /**
   * @param GoogleCloudRecommenderV1Impact[]
   */
  public function setAdditionalImpact($additionalImpact)
  {
    $this->additionalImpact = $additionalImpact;
  }
  /**
   * @return GoogleCloudRecommenderV1Impact[]
   */
  public function getAdditionalImpact()
  {
    return $this->additionalImpact;
  }
  /**
   * @param GoogleCloudRecommenderV1RecommendationInsightReference[]
   */
  public function setAssociatedInsights($associatedInsights)
  {
    $this->associatedInsights = $associatedInsights;
  }
  /**
   * @return GoogleCloudRecommenderV1RecommendationInsightReference[]
   */
  public function getAssociatedInsights()
  {
    return $this->associatedInsights;
  }
  /**
   * @param GoogleCloudRecommenderV1RecommendationContent
   */
  public function setContent(GoogleCloudRecommenderV1RecommendationContent $content)
  {
    $this->content = $content;
  }
  /**
   * @return GoogleCloudRecommenderV1RecommendationContent
   */
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
  /**
   * @param GoogleCloudRecommenderV1Impact
   */
  public function setPrimaryImpact(GoogleCloudRecommenderV1Impact $primaryImpact)
  {
    $this->primaryImpact = $primaryImpact;
  }
  /**
   * @return GoogleCloudRecommenderV1Impact
   */
  public function getPrimaryImpact()
  {
    return $this->primaryImpact;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setRecommenderSubtype($recommenderSubtype)
  {
    $this->recommenderSubtype = $recommenderSubtype;
  }
  public function getRecommenderSubtype()
  {
    return $this->recommenderSubtype;
  }
  /**
   * @param GoogleCloudRecommenderV1RecommendationStateInfo
   */
  public function setStateInfo(GoogleCloudRecommenderV1RecommendationStateInfo $stateInfo)
  {
    $this->stateInfo = $stateInfo;
  }
  /**
   * @return GoogleCloudRecommenderV1RecommendationStateInfo
   */
  public function getStateInfo()
  {
    return $this->stateInfo;
  }
  public function setXorGroupId($xorGroupId)
  {
    $this->xorGroupId = $xorGroupId;
  }
  public function getXorGroupId()
  {
    return $this->xorGroupId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommenderV1Recommendation::class, 'Google_Service_Recommender_GoogleCloudRecommenderV1Recommendation');
