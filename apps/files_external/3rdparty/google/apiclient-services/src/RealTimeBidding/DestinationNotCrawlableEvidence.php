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

namespace Google\Service\RealTimeBidding;

class DestinationNotCrawlableEvidence extends \Google\Model
{
  /**
   * @var string
   */
  public $crawlTime;
  /**
   * @var string
   */
  public $crawledUrl;
  /**
   * @var string
   */
  public $reason;

  /**
   * @param string
   */
  public function setCrawlTime($crawlTime)
  {
    $this->crawlTime = $crawlTime;
  }
  /**
   * @return string
   */
  public function getCrawlTime()
  {
    return $this->crawlTime;
  }
  /**
   * @param string
   */
  public function setCrawledUrl($crawledUrl)
  {
    $this->crawledUrl = $crawledUrl;
  }
  /**
   * @return string
   */
  public function getCrawledUrl()
  {
    return $this->crawledUrl;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DestinationNotCrawlableEvidence::class, 'Google_Service_RealTimeBidding_DestinationNotCrawlableEvidence');
