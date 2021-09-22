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

class GoogleCloudRecommendationengineV1beta1UserEvent extends \Google\Model
{
  protected $eventDetailType = GoogleCloudRecommendationengineV1beta1EventDetail::class;
  protected $eventDetailDataType = '';
  public $eventSource;
  public $eventTime;
  public $eventType;
  protected $productEventDetailType = GoogleCloudRecommendationengineV1beta1ProductEventDetail::class;
  protected $productEventDetailDataType = '';
  protected $userInfoType = GoogleCloudRecommendationengineV1beta1UserInfo::class;
  protected $userInfoDataType = '';

  /**
   * @param GoogleCloudRecommendationengineV1beta1EventDetail
   */
  public function setEventDetail(GoogleCloudRecommendationengineV1beta1EventDetail $eventDetail)
  {
    $this->eventDetail = $eventDetail;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1EventDetail
   */
  public function getEventDetail()
  {
    return $this->eventDetail;
  }
  public function setEventSource($eventSource)
  {
    $this->eventSource = $eventSource;
  }
  public function getEventSource()
  {
    return $this->eventSource;
  }
  public function setEventTime($eventTime)
  {
    $this->eventTime = $eventTime;
  }
  public function getEventTime()
  {
    return $this->eventTime;
  }
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1ProductEventDetail
   */
  public function setProductEventDetail(GoogleCloudRecommendationengineV1beta1ProductEventDetail $productEventDetail)
  {
    $this->productEventDetail = $productEventDetail;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1ProductEventDetail
   */
  public function getProductEventDetail()
  {
    return $this->productEventDetail;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1UserInfo
   */
  public function setUserInfo(GoogleCloudRecommendationengineV1beta1UserInfo $userInfo)
  {
    $this->userInfo = $userInfo;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1UserInfo
   */
  public function getUserInfo()
  {
    return $this->userInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1UserEvent::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEvent');
