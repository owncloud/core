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

namespace Google\Service\DisplayVideo;

class ReviewStatusInfo extends \Google\Collection
{
  protected $collection_key = 'publisherReviewStatuses';
  public $approvalStatus;
  public $contentAndPolicyReviewStatus;
  public $creativeAndLandingPageReviewStatus;
  protected $exchangeReviewStatusesType = ExchangeReviewStatus::class;
  protected $exchangeReviewStatusesDataType = 'array';
  protected $publisherReviewStatusesType = PublisherReviewStatus::class;
  protected $publisherReviewStatusesDataType = 'array';

  public function setApprovalStatus($approvalStatus)
  {
    $this->approvalStatus = $approvalStatus;
  }
  public function getApprovalStatus()
  {
    return $this->approvalStatus;
  }
  public function setContentAndPolicyReviewStatus($contentAndPolicyReviewStatus)
  {
    $this->contentAndPolicyReviewStatus = $contentAndPolicyReviewStatus;
  }
  public function getContentAndPolicyReviewStatus()
  {
    return $this->contentAndPolicyReviewStatus;
  }
  public function setCreativeAndLandingPageReviewStatus($creativeAndLandingPageReviewStatus)
  {
    $this->creativeAndLandingPageReviewStatus = $creativeAndLandingPageReviewStatus;
  }
  public function getCreativeAndLandingPageReviewStatus()
  {
    return $this->creativeAndLandingPageReviewStatus;
  }
  /**
   * @param ExchangeReviewStatus[]
   */
  public function setExchangeReviewStatuses($exchangeReviewStatuses)
  {
    $this->exchangeReviewStatuses = $exchangeReviewStatuses;
  }
  /**
   * @return ExchangeReviewStatus[]
   */
  public function getExchangeReviewStatuses()
  {
    return $this->exchangeReviewStatuses;
  }
  /**
   * @param PublisherReviewStatus[]
   */
  public function setPublisherReviewStatuses($publisherReviewStatuses)
  {
    $this->publisherReviewStatuses = $publisherReviewStatuses;
  }
  /**
   * @return PublisherReviewStatus[]
   */
  public function getPublisherReviewStatuses()
  {
    return $this->publisherReviewStatuses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReviewStatusInfo::class, 'Google_Service_DisplayVideo_ReviewStatusInfo');
