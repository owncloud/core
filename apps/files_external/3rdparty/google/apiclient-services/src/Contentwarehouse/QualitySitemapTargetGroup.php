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

namespace Google\Service\Contentwarehouse;

class QualitySitemapTargetGroup extends \Google\Collection
{
  protected $collection_key = 'twoLevelTarget';
  protected $internal_gapi_mappings = [
        "dEPRECATEDCountry" => "DEPRECATEDCountry",
        "target" => "Target",
  ];
  /**
   * @var int
   */
  public $dEPRECATEDCountry;
  protected $targetType = QualitySitemapTarget::class;
  protected $targetDataType = 'array';
  /**
   * @var bool
   */
  public $allTargetsNamedAnchors;
  /**
   * @var bool
   */
  public $allTargetsNamedTopictagsScrollto;
  protected $breadcrumbTargetType = QualitySitemapBreadcrumbTarget::class;
  protected $breadcrumbTargetDataType = '';
  protected $coClickTargetType = QualitySitemapCoClickTarget::class;
  protected $coClickTargetDataType = 'array';
  /**
   * @var string
   */
  public $countryCode;
  /**
   * @var string
   */
  public $label;
  /**
   * @var int
   */
  public $language;
  /**
   * @var bool
   */
  public $modifiedByHostcardHandler;
  protected $scoringSignalsType = QualitySitemapScoringSignals::class;
  protected $scoringSignalsDataType = '';
  protected $topUrlType = QualitySitemapTopURL::class;
  protected $topUrlDataType = 'array';
  protected $twoLevelTargetType = QualitySitemapTwoLevelTarget::class;
  protected $twoLevelTargetDataType = 'array';

  /**
   * @param int
   */
  public function setDEPRECATEDCountry($dEPRECATEDCountry)
  {
    $this->dEPRECATEDCountry = $dEPRECATEDCountry;
  }
  /**
   * @return int
   */
  public function getDEPRECATEDCountry()
  {
    return $this->dEPRECATEDCountry;
  }
  /**
   * @param QualitySitemapTarget[]
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return QualitySitemapTarget[]
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param bool
   */
  public function setAllTargetsNamedAnchors($allTargetsNamedAnchors)
  {
    $this->allTargetsNamedAnchors = $allTargetsNamedAnchors;
  }
  /**
   * @return bool
   */
  public function getAllTargetsNamedAnchors()
  {
    return $this->allTargetsNamedAnchors;
  }
  /**
   * @param bool
   */
  public function setAllTargetsNamedTopictagsScrollto($allTargetsNamedTopictagsScrollto)
  {
    $this->allTargetsNamedTopictagsScrollto = $allTargetsNamedTopictagsScrollto;
  }
  /**
   * @return bool
   */
  public function getAllTargetsNamedTopictagsScrollto()
  {
    return $this->allTargetsNamedTopictagsScrollto;
  }
  /**
   * @param QualitySitemapBreadcrumbTarget
   */
  public function setBreadcrumbTarget(QualitySitemapBreadcrumbTarget $breadcrumbTarget)
  {
    $this->breadcrumbTarget = $breadcrumbTarget;
  }
  /**
   * @return QualitySitemapBreadcrumbTarget
   */
  public function getBreadcrumbTarget()
  {
    return $this->breadcrumbTarget;
  }
  /**
   * @param QualitySitemapCoClickTarget[]
   */
  public function setCoClickTarget($coClickTarget)
  {
    $this->coClickTarget = $coClickTarget;
  }
  /**
   * @return QualitySitemapCoClickTarget[]
   */
  public function getCoClickTarget()
  {
    return $this->coClickTarget;
  }
  /**
   * @param string
   */
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  /**
   * @return string
   */
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param bool
   */
  public function setModifiedByHostcardHandler($modifiedByHostcardHandler)
  {
    $this->modifiedByHostcardHandler = $modifiedByHostcardHandler;
  }
  /**
   * @return bool
   */
  public function getModifiedByHostcardHandler()
  {
    return $this->modifiedByHostcardHandler;
  }
  /**
   * @param QualitySitemapScoringSignals
   */
  public function setScoringSignals(QualitySitemapScoringSignals $scoringSignals)
  {
    $this->scoringSignals = $scoringSignals;
  }
  /**
   * @return QualitySitemapScoringSignals
   */
  public function getScoringSignals()
  {
    return $this->scoringSignals;
  }
  /**
   * @param QualitySitemapTopURL[]
   */
  public function setTopUrl($topUrl)
  {
    $this->topUrl = $topUrl;
  }
  /**
   * @return QualitySitemapTopURL[]
   */
  public function getTopUrl()
  {
    return $this->topUrl;
  }
  /**
   * @param QualitySitemapTwoLevelTarget[]
   */
  public function setTwoLevelTarget($twoLevelTarget)
  {
    $this->twoLevelTarget = $twoLevelTarget;
  }
  /**
   * @return QualitySitemapTwoLevelTarget[]
   */
  public function getTwoLevelTarget()
  {
    return $this->twoLevelTarget;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySitemapTargetGroup::class, 'Google_Service_Contentwarehouse_QualitySitemapTargetGroup');
