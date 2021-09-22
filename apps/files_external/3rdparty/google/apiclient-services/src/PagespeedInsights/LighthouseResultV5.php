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

class LighthouseResultV5 extends \Google\Collection
{
  protected $collection_key = 'stackPacks';
  protected $auditsType = LighthouseAuditResultV5::class;
  protected $auditsDataType = 'map';
  protected $categoriesType = Categories::class;
  protected $categoriesDataType = '';
  protected $categoryGroupsType = CategoryGroupV5::class;
  protected $categoryGroupsDataType = 'map';
  protected $configSettingsType = ConfigSettings::class;
  protected $configSettingsDataType = '';
  protected $environmentType = Environment::class;
  protected $environmentDataType = '';
  public $fetchTime;
  public $finalUrl;
  protected $i18nType = I18n::class;
  protected $i18nDataType = '';
  public $lighthouseVersion;
  public $requestedUrl;
  public $runWarnings;
  protected $runtimeErrorType = RuntimeError::class;
  protected $runtimeErrorDataType = '';
  protected $stackPacksType = StackPack::class;
  protected $stackPacksDataType = 'array';
  protected $timingType = Timing::class;
  protected $timingDataType = '';
  public $userAgent;

  /**
   * @param LighthouseAuditResultV5[]
   */
  public function setAudits($audits)
  {
    $this->audits = $audits;
  }
  /**
   * @return LighthouseAuditResultV5[]
   */
  public function getAudits()
  {
    return $this->audits;
  }
  /**
   * @param Categories
   */
  public function setCategories(Categories $categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return Categories
   */
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param CategoryGroupV5[]
   */
  public function setCategoryGroups($categoryGroups)
  {
    $this->categoryGroups = $categoryGroups;
  }
  /**
   * @return CategoryGroupV5[]
   */
  public function getCategoryGroups()
  {
    return $this->categoryGroups;
  }
  /**
   * @param ConfigSettings
   */
  public function setConfigSettings(ConfigSettings $configSettings)
  {
    $this->configSettings = $configSettings;
  }
  /**
   * @return ConfigSettings
   */
  public function getConfigSettings()
  {
    return $this->configSettings;
  }
  /**
   * @param Environment
   */
  public function setEnvironment(Environment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return Environment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setFetchTime($fetchTime)
  {
    $this->fetchTime = $fetchTime;
  }
  public function getFetchTime()
  {
    return $this->fetchTime;
  }
  public function setFinalUrl($finalUrl)
  {
    $this->finalUrl = $finalUrl;
  }
  public function getFinalUrl()
  {
    return $this->finalUrl;
  }
  /**
   * @param I18n
   */
  public function setI18n(I18n $i18n)
  {
    $this->i18n = $i18n;
  }
  /**
   * @return I18n
   */
  public function getI18n()
  {
    return $this->i18n;
  }
  public function setLighthouseVersion($lighthouseVersion)
  {
    $this->lighthouseVersion = $lighthouseVersion;
  }
  public function getLighthouseVersion()
  {
    return $this->lighthouseVersion;
  }
  public function setRequestedUrl($requestedUrl)
  {
    $this->requestedUrl = $requestedUrl;
  }
  public function getRequestedUrl()
  {
    return $this->requestedUrl;
  }
  public function setRunWarnings($runWarnings)
  {
    $this->runWarnings = $runWarnings;
  }
  public function getRunWarnings()
  {
    return $this->runWarnings;
  }
  /**
   * @param RuntimeError
   */
  public function setRuntimeError(RuntimeError $runtimeError)
  {
    $this->runtimeError = $runtimeError;
  }
  /**
   * @return RuntimeError
   */
  public function getRuntimeError()
  {
    return $this->runtimeError;
  }
  /**
   * @param StackPack[]
   */
  public function setStackPacks($stackPacks)
  {
    $this->stackPacks = $stackPacks;
  }
  /**
   * @return StackPack[]
   */
  public function getStackPacks()
  {
    return $this->stackPacks;
  }
  /**
   * @param Timing
   */
  public function setTiming(Timing $timing)
  {
    $this->timing = $timing;
  }
  /**
   * @return Timing
   */
  public function getTiming()
  {
    return $this->timing;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LighthouseResultV5::class, 'Google_Service_PagespeedInsights_LighthouseResultV5');
