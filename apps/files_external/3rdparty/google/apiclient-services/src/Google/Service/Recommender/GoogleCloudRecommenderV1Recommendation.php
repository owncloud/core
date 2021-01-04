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

class Google_Service_Recommender_GoogleCloudRecommenderV1Recommendation extends Google_Collection
{
  protected $collection_key = 'associatedInsights';
  protected $additionalImpactType = 'Google_Service_Recommender_GoogleCloudRecommenderV1Impact';
  protected $additionalImpactDataType = 'array';
  protected $associatedInsightsType = 'Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationInsightReference';
  protected $associatedInsightsDataType = 'array';
  protected $contentType = 'Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationContent';
  protected $contentDataType = '';
  public $description;
  public $etag;
  public $lastRefreshTime;
  public $name;
  protected $primaryImpactType = 'Google_Service_Recommender_GoogleCloudRecommenderV1Impact';
  protected $primaryImpactDataType = '';
  public $recommenderSubtype;
  protected $stateInfoType = 'Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationStateInfo';
  protected $stateInfoDataType = '';

  /**
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1Impact[]
   */
  public function setAdditionalImpact($additionalImpact)
  {
    $this->additionalImpact = $additionalImpact;
  }
  /**
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1Impact[]
   */
  public function getAdditionalImpact()
  {
    return $this->additionalImpact;
  }
  /**
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationInsightReference[]
   */
  public function setAssociatedInsights($associatedInsights)
  {
    $this->associatedInsights = $associatedInsights;
  }
  /**
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationInsightReference[]
   */
  public function getAssociatedInsights()
  {
    return $this->associatedInsights;
  }
  /**
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationContent
   */
  public function setContent(Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationContent $content)
  {
    $this->content = $content;
  }
  /**
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationContent
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
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1Impact
   */
  public function setPrimaryImpact(Google_Service_Recommender_GoogleCloudRecommenderV1Impact $primaryImpact)
  {
    $this->primaryImpact = $primaryImpact;
  }
  /**
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1Impact
   */
  public function getPrimaryImpact()
  {
    return $this->primaryImpact;
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
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationStateInfo
   */
  public function setStateInfo(Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationStateInfo $stateInfo)
  {
    $this->stateInfo = $stateInfo;
  }
  /**
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1RecommendationStateInfo
   */
  public function getStateInfo()
  {
    return $this->stateInfo;
  }
}
