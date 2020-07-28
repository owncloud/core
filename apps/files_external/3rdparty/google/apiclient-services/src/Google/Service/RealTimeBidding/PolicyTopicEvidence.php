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

class Google_Service_RealTimeBidding_PolicyTopicEvidence extends Google_Model
{
  protected $destinationNotCrawlableType = 'Google_Service_RealTimeBidding_DestinationNotCrawlableEvidence';
  protected $destinationNotCrawlableDataType = '';
  protected $destinationNotWorkingType = 'Google_Service_RealTimeBidding_DestinationNotWorkingEvidence';
  protected $destinationNotWorkingDataType = '';
  protected $destinationUrlType = 'Google_Service_RealTimeBidding_DestinationUrlEvidence';
  protected $destinationUrlDataType = '';
  protected $domainCallType = 'Google_Service_RealTimeBidding_DomainCallEvidence';
  protected $domainCallDataType = '';
  protected $downloadSizeType = 'Google_Service_RealTimeBidding_DownloadSizeEvidence';
  protected $downloadSizeDataType = '';
  protected $httpCallType = 'Google_Service_RealTimeBidding_HttpCallEvidence';
  protected $httpCallDataType = '';
  protected $httpCookieType = 'Google_Service_RealTimeBidding_HttpCookieEvidence';
  protected $httpCookieDataType = '';

  /**
   * @param Google_Service_RealTimeBidding_DestinationNotCrawlableEvidence
   */
  public function setDestinationNotCrawlable(Google_Service_RealTimeBidding_DestinationNotCrawlableEvidence $destinationNotCrawlable)
  {
    $this->destinationNotCrawlable = $destinationNotCrawlable;
  }
  /**
   * @return Google_Service_RealTimeBidding_DestinationNotCrawlableEvidence
   */
  public function getDestinationNotCrawlable()
  {
    return $this->destinationNotCrawlable;
  }
  /**
   * @param Google_Service_RealTimeBidding_DestinationNotWorkingEvidence
   */
  public function setDestinationNotWorking(Google_Service_RealTimeBidding_DestinationNotWorkingEvidence $destinationNotWorking)
  {
    $this->destinationNotWorking = $destinationNotWorking;
  }
  /**
   * @return Google_Service_RealTimeBidding_DestinationNotWorkingEvidence
   */
  public function getDestinationNotWorking()
  {
    return $this->destinationNotWorking;
  }
  /**
   * @param Google_Service_RealTimeBidding_DestinationUrlEvidence
   */
  public function setDestinationUrl(Google_Service_RealTimeBidding_DestinationUrlEvidence $destinationUrl)
  {
    $this->destinationUrl = $destinationUrl;
  }
  /**
   * @return Google_Service_RealTimeBidding_DestinationUrlEvidence
   */
  public function getDestinationUrl()
  {
    return $this->destinationUrl;
  }
  /**
   * @param Google_Service_RealTimeBidding_DomainCallEvidence
   */
  public function setDomainCall(Google_Service_RealTimeBidding_DomainCallEvidence $domainCall)
  {
    $this->domainCall = $domainCall;
  }
  /**
   * @return Google_Service_RealTimeBidding_DomainCallEvidence
   */
  public function getDomainCall()
  {
    return $this->domainCall;
  }
  /**
   * @param Google_Service_RealTimeBidding_DownloadSizeEvidence
   */
  public function setDownloadSize(Google_Service_RealTimeBidding_DownloadSizeEvidence $downloadSize)
  {
    $this->downloadSize = $downloadSize;
  }
  /**
   * @return Google_Service_RealTimeBidding_DownloadSizeEvidence
   */
  public function getDownloadSize()
  {
    return $this->downloadSize;
  }
  /**
   * @param Google_Service_RealTimeBidding_HttpCallEvidence
   */
  public function setHttpCall(Google_Service_RealTimeBidding_HttpCallEvidence $httpCall)
  {
    $this->httpCall = $httpCall;
  }
  /**
   * @return Google_Service_RealTimeBidding_HttpCallEvidence
   */
  public function getHttpCall()
  {
    return $this->httpCall;
  }
  /**
   * @param Google_Service_RealTimeBidding_HttpCookieEvidence
   */
  public function setHttpCookie(Google_Service_RealTimeBidding_HttpCookieEvidence $httpCookie)
  {
    $this->httpCookie = $httpCookie;
  }
  /**
   * @return Google_Service_RealTimeBidding_HttpCookieEvidence
   */
  public function getHttpCookie()
  {
    return $this->httpCookie;
  }
}
