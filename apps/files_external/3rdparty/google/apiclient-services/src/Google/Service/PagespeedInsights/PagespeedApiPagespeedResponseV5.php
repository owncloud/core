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

class Google_Service_PagespeedInsights_PagespeedApiPagespeedResponseV5 extends Google_Model
{
  public $analysisUTCTimestamp;
  public $captchaResult;
  public $id;
  public $kind;
  protected $lighthouseResultType = 'Google_Service_PagespeedInsights_LighthouseResultV5';
  protected $lighthouseResultDataType = '';
  protected $loadingExperienceType = 'Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5';
  protected $loadingExperienceDataType = '';
  protected $originLoadingExperienceType = 'Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5';
  protected $originLoadingExperienceDataType = '';
  protected $versionType = 'Google_Service_PagespeedInsights_PagespeedVersion';
  protected $versionDataType = '';

  public function setAnalysisUTCTimestamp($analysisUTCTimestamp)
  {
    $this->analysisUTCTimestamp = $analysisUTCTimestamp;
  }
  public function getAnalysisUTCTimestamp()
  {
    return $this->analysisUTCTimestamp;
  }
  public function setCaptchaResult($captchaResult)
  {
    $this->captchaResult = $captchaResult;
  }
  public function getCaptchaResult()
  {
    return $this->captchaResult;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_PagespeedInsights_LighthouseResultV5
   */
  public function setLighthouseResult(Google_Service_PagespeedInsights_LighthouseResultV5 $lighthouseResult)
  {
    $this->lighthouseResult = $lighthouseResult;
  }
  /**
   * @return Google_Service_PagespeedInsights_LighthouseResultV5
   */
  public function getLighthouseResult()
  {
    return $this->lighthouseResult;
  }
  /**
   * @param Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5
   */
  public function setLoadingExperience(Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5 $loadingExperience)
  {
    $this->loadingExperience = $loadingExperience;
  }
  /**
   * @return Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5
   */
  public function getLoadingExperience()
  {
    return $this->loadingExperience;
  }
  /**
   * @param Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5
   */
  public function setOriginLoadingExperience(Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5 $originLoadingExperience)
  {
    $this->originLoadingExperience = $originLoadingExperience;
  }
  /**
   * @return Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5
   */
  public function getOriginLoadingExperience()
  {
    return $this->originLoadingExperience;
  }
  /**
   * @param Google_Service_PagespeedInsights_PagespeedVersion
   */
  public function setVersion(Google_Service_PagespeedInsights_PagespeedVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_PagespeedInsights_PagespeedVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}
