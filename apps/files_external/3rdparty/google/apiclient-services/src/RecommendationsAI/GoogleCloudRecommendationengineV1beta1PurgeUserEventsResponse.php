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

class GoogleCloudRecommendationengineV1beta1PurgeUserEventsResponse extends \Google\Collection
{
  protected $collection_key = 'userEventsSample';
  /**
   * @var string
   */
  public $purgedEventsCount;
  protected $userEventsSampleType = GoogleCloudRecommendationengineV1beta1UserEvent::class;
  protected $userEventsSampleDataType = 'array';

  /**
   * @param string
   */
  public function setPurgedEventsCount($purgedEventsCount)
  {
    $this->purgedEventsCount = $purgedEventsCount;
  }
  /**
   * @return string
   */
  public function getPurgedEventsCount()
  {
    return $this->purgedEventsCount;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1UserEvent[]
   */
  public function setUserEventsSample($userEventsSample)
  {
    $this->userEventsSample = $userEventsSample;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1UserEvent[]
   */
  public function getUserEventsSample()
  {
    return $this->userEventsSample;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1PurgeUserEventsResponse::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PurgeUserEventsResponse');
