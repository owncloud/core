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
  public $lastRefreshTime;
  /**
   * @var string
   */
  public $name;
  protected $primaryImpactType = GoogleCloudRecommenderV1Impact::class;
  protected $primaryImpactDataType = '';
  /**
   * @var string
   */
  public $priority;
  /**
   * @var string
   */
  public $recommenderSubtype;
  protected $stateInfoType = GoogleCloudRecommenderV1RecommendationStateInfo::class;
  protected $stateInfoDataType = '';
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string
   */
  public function setRecommenderSubtype($recommenderSubtype)
  {
    $this->recommenderSubtype = $recommenderSubtype;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setXorGroupId($xorGroupId)
  {
    $this->xorGroupId = $xorGroupId;
  }
  /**
   * @return string
   */
  public function getXorGroupId()
  {
    return $this->xorGroupId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommenderV1Recommendation::class, 'Google_Service_Recommender_GoogleCloudRecommenderV1Recommendation');
