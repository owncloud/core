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

class Google_Service_WebSecurityScanner_Finding extends Google_Model
{
  public $body;
  public $description;
  public $finalUrl;
  public $findingType;
  public $frameUrl;
  public $fuzzedUrl;
  public $httpMethod;
  public $name;
  protected $outdatedLibraryType = 'Google_Service_WebSecurityScanner_OutdatedLibrary';
  protected $outdatedLibraryDataType = '';
  public $reproductionUrl;
  public $trackingId;
  protected $violatingResourceType = 'Google_Service_WebSecurityScanner_ViolatingResource';
  protected $violatingResourceDataType = '';
  protected $vulnerableHeadersType = 'Google_Service_WebSecurityScanner_VulnerableHeaders';
  protected $vulnerableHeadersDataType = '';
  protected $vulnerableParametersType = 'Google_Service_WebSecurityScanner_VulnerableParameters';
  protected $vulnerableParametersDataType = '';
  protected $xssType = 'Google_Service_WebSecurityScanner_Xss';
  protected $xssDataType = '';

  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFinalUrl($finalUrl)
  {
    $this->finalUrl = $finalUrl;
  }
  public function getFinalUrl()
  {
    return $this->finalUrl;
  }
  public function setFindingType($findingType)
  {
    $this->findingType = $findingType;
  }
  public function getFindingType()
  {
    return $this->findingType;
  }
  public function setFrameUrl($frameUrl)
  {
    $this->frameUrl = $frameUrl;
  }
  public function getFrameUrl()
  {
    return $this->frameUrl;
  }
  public function setFuzzedUrl($fuzzedUrl)
  {
    $this->fuzzedUrl = $fuzzedUrl;
  }
  public function getFuzzedUrl()
  {
    return $this->fuzzedUrl;
  }
  public function setHttpMethod($httpMethod)
  {
    $this->httpMethod = $httpMethod;
  }
  public function getHttpMethod()
  {
    return $this->httpMethod;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_WebSecurityScanner_OutdatedLibrary
   */
  public function setOutdatedLibrary(Google_Service_WebSecurityScanner_OutdatedLibrary $outdatedLibrary)
  {
    $this->outdatedLibrary = $outdatedLibrary;
  }
  /**
   * @return Google_Service_WebSecurityScanner_OutdatedLibrary
   */
  public function getOutdatedLibrary()
  {
    return $this->outdatedLibrary;
  }
  public function setReproductionUrl($reproductionUrl)
  {
    $this->reproductionUrl = $reproductionUrl;
  }
  public function getReproductionUrl()
  {
    return $this->reproductionUrl;
  }
  public function setTrackingId($trackingId)
  {
    $this->trackingId = $trackingId;
  }
  public function getTrackingId()
  {
    return $this->trackingId;
  }
  /**
   * @param Google_Service_WebSecurityScanner_ViolatingResource
   */
  public function setViolatingResource(Google_Service_WebSecurityScanner_ViolatingResource $violatingResource)
  {
    $this->violatingResource = $violatingResource;
  }
  /**
   * @return Google_Service_WebSecurityScanner_ViolatingResource
   */
  public function getViolatingResource()
  {
    return $this->violatingResource;
  }
  /**
   * @param Google_Service_WebSecurityScanner_VulnerableHeaders
   */
  public function setVulnerableHeaders(Google_Service_WebSecurityScanner_VulnerableHeaders $vulnerableHeaders)
  {
    $this->vulnerableHeaders = $vulnerableHeaders;
  }
  /**
   * @return Google_Service_WebSecurityScanner_VulnerableHeaders
   */
  public function getVulnerableHeaders()
  {
    return $this->vulnerableHeaders;
  }
  /**
   * @param Google_Service_WebSecurityScanner_VulnerableParameters
   */
  public function setVulnerableParameters(Google_Service_WebSecurityScanner_VulnerableParameters $vulnerableParameters)
  {
    $this->vulnerableParameters = $vulnerableParameters;
  }
  /**
   * @return Google_Service_WebSecurityScanner_VulnerableParameters
   */
  public function getVulnerableParameters()
  {
    return $this->vulnerableParameters;
  }
  /**
   * @param Google_Service_WebSecurityScanner_Xss
   */
  public function setXss(Google_Service_WebSecurityScanner_Xss $xss)
  {
    $this->xss = $xss;
  }
  /**
   * @return Google_Service_WebSecurityScanner_Xss
   */
  public function getXss()
  {
    return $this->xss;
  }
}
