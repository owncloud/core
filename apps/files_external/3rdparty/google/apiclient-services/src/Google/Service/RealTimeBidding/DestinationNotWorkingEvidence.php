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

class Google_Service_RealTimeBidding_DestinationNotWorkingEvidence extends Google_Model
{
  public $dnsError;
  public $expandedUrl;
  public $httpError;
  public $invalidPage;
  public $lastCheckTime;
  public $platform;
  public $redirectionError;
  public $urlRejected;

  public function setDnsError($dnsError)
  {
    $this->dnsError = $dnsError;
  }
  public function getDnsError()
  {
    return $this->dnsError;
  }
  public function setExpandedUrl($expandedUrl)
  {
    $this->expandedUrl = $expandedUrl;
  }
  public function getExpandedUrl()
  {
    return $this->expandedUrl;
  }
  public function setHttpError($httpError)
  {
    $this->httpError = $httpError;
  }
  public function getHttpError()
  {
    return $this->httpError;
  }
  public function setInvalidPage($invalidPage)
  {
    $this->invalidPage = $invalidPage;
  }
  public function getInvalidPage()
  {
    return $this->invalidPage;
  }
  public function setLastCheckTime($lastCheckTime)
  {
    $this->lastCheckTime = $lastCheckTime;
  }
  public function getLastCheckTime()
  {
    return $this->lastCheckTime;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
  public function setRedirectionError($redirectionError)
  {
    $this->redirectionError = $redirectionError;
  }
  public function getRedirectionError()
  {
    return $this->redirectionError;
  }
  public function setUrlRejected($urlRejected)
  {
    $this->urlRejected = $urlRejected;
  }
  public function getUrlRejected()
  {
    return $this->urlRejected;
  }
}
