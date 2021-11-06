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

namespace Google\Service\RecommendationsAI;

class GoogleCloudRecommendationengineV1beta1EventDetail extends \Google\Collection
{
  protected $collection_key = 'experimentIds';
  protected $eventAttributesType = GoogleCloudRecommendationengineV1beta1FeatureMap::class;
  protected $eventAttributesDataType = '';
  public $experimentIds;
  public $pageViewId;
  public $recommendationToken;
  public $referrerUri;
  public $uri;

  /**
   * @param GoogleCloudRecommendationengineV1beta1FeatureMap
   */
  public function setEventAttributes(GoogleCloudRecommendationengineV1beta1FeatureMap $eventAttributes)
  {
    $this->eventAttributes = $eventAttributes;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1FeatureMap
   */
  public function getEventAttributes()
  {
    return $this->eventAttributes;
  }
  public function setExperimentIds($experimentIds)
  {
    $this->experimentIds = $experimentIds;
  }
  public function getExperimentIds()
  {
    return $this->experimentIds;
  }
  public function setPageViewId($pageViewId)
  {
    $this->pageViewId = $pageViewId;
  }
  public function getPageViewId()
  {
    return $this->pageViewId;
  }
  public function setRecommendationToken($recommendationToken)
  {
    $this->recommendationToken = $recommendationToken;
  }
  public function getRecommendationToken()
  {
    return $this->recommendationToken;
  }
  public function setReferrerUri($referrerUri)
  {
    $this->referrerUri = $referrerUri;
  }
  public function getReferrerUri()
  {
    return $this->referrerUri;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1EventDetail::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1EventDetail');
