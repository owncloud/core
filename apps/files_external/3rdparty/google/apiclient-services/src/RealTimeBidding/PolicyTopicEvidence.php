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

class PolicyTopicEvidence extends \Google\Model
{
  protected $destinationNotCrawlableType = DestinationNotCrawlableEvidence::class;
  protected $destinationNotCrawlableDataType = '';
  protected $destinationNotWorkingType = DestinationNotWorkingEvidence::class;
  protected $destinationNotWorkingDataType = '';
  protected $destinationUrlType = DestinationUrlEvidence::class;
  protected $destinationUrlDataType = '';
  protected $domainCallType = DomainCallEvidence::class;
  protected $domainCallDataType = '';
  protected $downloadSizeType = DownloadSizeEvidence::class;
  protected $downloadSizeDataType = '';
  protected $httpCallType = HttpCallEvidence::class;
  protected $httpCallDataType = '';
  protected $httpCookieType = HttpCookieEvidence::class;
  protected $httpCookieDataType = '';

  /**
   * @param DestinationNotCrawlableEvidence
   */
  public function setDestinationNotCrawlable(DestinationNotCrawlableEvidence $destinationNotCrawlable)
  {
    $this->destinationNotCrawlable = $destinationNotCrawlable;
  }
  /**
   * @return DestinationNotCrawlableEvidence
   */
  public function getDestinationNotCrawlable()
  {
    return $this->destinationNotCrawlable;
  }
  /**
   * @param DestinationNotWorkingEvidence
   */
  public function setDestinationNotWorking(DestinationNotWorkingEvidence $destinationNotWorking)
  {
    $this->destinationNotWorking = $destinationNotWorking;
  }
  /**
   * @return DestinationNotWorkingEvidence
   */
  public function getDestinationNotWorking()
  {
    return $this->destinationNotWorking;
  }
  /**
   * @param DestinationUrlEvidence
   */
  public function setDestinationUrl(DestinationUrlEvidence $destinationUrl)
  {
    $this->destinationUrl = $destinationUrl;
  }
  /**
   * @return DestinationUrlEvidence
   */
  public function getDestinationUrl()
  {
    return $this->destinationUrl;
  }
  /**
   * @param DomainCallEvidence
   */
  public function setDomainCall(DomainCallEvidence $domainCall)
  {
    $this->domainCall = $domainCall;
  }
  /**
   * @return DomainCallEvidence
   */
  public function getDomainCall()
  {
    return $this->domainCall;
  }
  /**
   * @param DownloadSizeEvidence
   */
  public function setDownloadSize(DownloadSizeEvidence $downloadSize)
  {
    $this->downloadSize = $downloadSize;
  }
  /**
   * @return DownloadSizeEvidence
   */
  public function getDownloadSize()
  {
    return $this->downloadSize;
  }
  /**
   * @param HttpCallEvidence
   */
  public function setHttpCall(HttpCallEvidence $httpCall)
  {
    $this->httpCall = $httpCall;
  }
  /**
   * @return HttpCallEvidence
   */
  public function getHttpCall()
  {
    return $this->httpCall;
  }
  /**
   * @param HttpCookieEvidence
   */
  public function setHttpCookie(HttpCookieEvidence $httpCookie)
  {
    $this->httpCookie = $httpCookie;
  }
  /**
   * @return HttpCookieEvidence
   */
  public function getHttpCookie()
  {
    return $this->httpCookie;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolicyTopicEvidence::class, 'Google_Service_RealTimeBidding_PolicyTopicEvidence');
