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

class GoogleCloudRecommendationengineV1beta1RejoinUserEventsRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $userEventRejoinScope;

  /**
   * @param string
   */
  public function setUserEventRejoinScope($userEventRejoinScope)
  {
    $this->userEventRejoinScope = $userEventRejoinScope;
  }
  /**
   * @return string
   */
  public function getUserEventRejoinScope()
  {
    return $this->userEventRejoinScope;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1RejoinUserEventsRequest::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1RejoinUserEventsRequest');
