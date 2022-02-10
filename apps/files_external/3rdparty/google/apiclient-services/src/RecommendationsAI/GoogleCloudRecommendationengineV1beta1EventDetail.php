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
  /**
   * @var string[]
   */
  public $experimentIds;
  /**
   * @var string
   */
  public $pageViewId;
  /**
   * @var string
   */
  public $recommendationToken;
  /**
   * @var string
   */
  public $referrerUri;
  /**
   * @var string
   */
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
  /**
   * @param string[]
   */
  public function setExperimentIds($experimentIds)
  {
    $this->experimentIds = $experimentIds;
  }
  /**
   * @return string[]
   */
  public function getExperimentIds()
  {
    return $this->experimentIds;
  }
  /**
   * @param string
   */
  public function setPageViewId($pageViewId)
  {
    $this->pageViewId = $pageViewId;
  }
  /**
   * @return string
   */
  public function getPageViewId()
  {
    return $this->pageViewId;
  }
  /**
   * @param string
   */
  public function setRecommendationToken($recommendationToken)
  {
    $this->recommendationToken = $recommendationToken;
  }
  /**
   * @return string
   */
  public function getRecommendationToken()
  {
    return $this->recommendationToken;
  }
  /**
   * @param string
   */
  public function setReferrerUri($referrerUri)
  {
    $this->referrerUri = $referrerUri;
  }
  /**
   * @return string
   */
  public function getReferrerUri()
  {
    return $this->referrerUri;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1EventDetail::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1EventDetail');
