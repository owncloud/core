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

namespace Google\Service\PagespeedInsights;

class PagespeedApiPagespeedResponseV5 extends \Google\Model
{
  /**
   * @var string
   */
  public $analysisUTCTimestamp;
  /**
   * @var string
   */
  public $captchaResult;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $lighthouseResultType = LighthouseResultV5::class;
  protected $lighthouseResultDataType = '';
  protected $loadingExperienceType = PagespeedApiLoadingExperienceV5::class;
  protected $loadingExperienceDataType = '';
  protected $originLoadingExperienceType = PagespeedApiLoadingExperienceV5::class;
  protected $originLoadingExperienceDataType = '';
  protected $versionType = PagespeedVersion::class;
  protected $versionDataType = '';

  /**
   * @param string
   */
  public function setAnalysisUTCTimestamp($analysisUTCTimestamp)
  {
    $this->analysisUTCTimestamp = $analysisUTCTimestamp;
  }
  /**
   * @return string
   */
  public function getAnalysisUTCTimestamp()
  {
    return $this->analysisUTCTimestamp;
  }
  /**
   * @param string
   */
  public function setCaptchaResult($captchaResult)
  {
    $this->captchaResult = $captchaResult;
  }
  /**
   * @return string
   */
  public function getCaptchaResult()
  {
    return $this->captchaResult;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LighthouseResultV5
   */
  public function setLighthouseResult(LighthouseResultV5 $lighthouseResult)
  {
    $this->lighthouseResult = $lighthouseResult;
  }
  /**
   * @return LighthouseResultV5
   */
  public function getLighthouseResult()
  {
    return $this->lighthouseResult;
  }
  /**
   * @param PagespeedApiLoadingExperienceV5
   */
  public function setLoadingExperience(PagespeedApiLoadingExperienceV5 $loadingExperience)
  {
    $this->loadingExperience = $loadingExperience;
  }
  /**
   * @return PagespeedApiLoadingExperienceV5
   */
  public function getLoadingExperience()
  {
    return $this->loadingExperience;
  }
  /**
   * @param PagespeedApiLoadingExperienceV5
   */
  public function setOriginLoadingExperience(PagespeedApiLoadingExperienceV5 $originLoadingExperience)
  {
    $this->originLoadingExperience = $originLoadingExperience;
  }
  /**
   * @return PagespeedApiLoadingExperienceV5
   */
  public function getOriginLoadingExperience()
  {
    return $this->originLoadingExperience;
  }
  /**
   * @param PagespeedVersion
   */
  public function setVersion(PagespeedVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return PagespeedVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PagespeedApiPagespeedResponseV5::class, 'Google_Service_PagespeedInsights_PagespeedApiPagespeedResponseV5');
