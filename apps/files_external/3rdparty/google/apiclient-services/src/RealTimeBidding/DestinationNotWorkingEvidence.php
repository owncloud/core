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

class DestinationNotWorkingEvidence extends \Google\Model
{
  /**
   * @var string
   */
  public $dnsError;
  /**
   * @var string
   */
  public $expandedUrl;
  /**
   * @var int
   */
  public $httpError;
  /**
   * @var string
   */
  public $invalidPage;
  /**
   * @var string
   */
  public $lastCheckTime;
  /**
   * @var string
   */
  public $platform;
  /**
   * @var string
   */
  public $redirectionError;
  /**
   * @var string
   */
  public $urlRejected;

  /**
   * @param string
   */
  public function setDnsError($dnsError)
  {
    $this->dnsError = $dnsError;
  }
  /**
   * @return string
   */
  public function getDnsError()
  {
    return $this->dnsError;
  }
  /**
   * @param string
   */
  public function setExpandedUrl($expandedUrl)
  {
    $this->expandedUrl = $expandedUrl;
  }
  /**
   * @return string
   */
  public function getExpandedUrl()
  {
    return $this->expandedUrl;
  }
  /**
   * @param int
   */
  public function setHttpError($httpError)
  {
    $this->httpError = $httpError;
  }
  /**
   * @return int
   */
  public function getHttpError()
  {
    return $this->httpError;
  }
  /**
   * @param string
   */
  public function setInvalidPage($invalidPage)
  {
    $this->invalidPage = $invalidPage;
  }
  /**
   * @return string
   */
  public function getInvalidPage()
  {
    return $this->invalidPage;
  }
  /**
   * @param string
   */
  public function setLastCheckTime($lastCheckTime)
  {
    $this->lastCheckTime = $lastCheckTime;
  }
  /**
   * @return string
   */
  public function getLastCheckTime()
  {
    return $this->lastCheckTime;
  }
  /**
   * @param string
   */
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return string
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param string
   */
  public function setRedirectionError($redirectionError)
  {
    $this->redirectionError = $redirectionError;
  }
  /**
   * @return string
   */
  public function getRedirectionError()
  {
    return $this->redirectionError;
  }
  /**
   * @param string
   */
  public function setUrlRejected($urlRejected)
  {
    $this->urlRejected = $urlRejected;
  }
  /**
   * @return string
   */
  public function getUrlRejected()
  {
    return $this->urlRejected;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DestinationNotWorkingEvidence::class, 'Google_Service_RealTimeBidding_DestinationNotWorkingEvidence');
