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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2InspectConfig extends \Google\Collection
{
  protected $collection_key = 'ruleSet';
  public $contentOptions;
  protected $customInfoTypesType = GooglePrivacyDlpV2CustomInfoType::class;
  protected $customInfoTypesDataType = 'array';
  public $excludeInfoTypes;
  public $includeQuote;
  protected $infoTypesType = GooglePrivacyDlpV2InfoType::class;
  protected $infoTypesDataType = 'array';
  protected $limitsType = GooglePrivacyDlpV2FindingLimits::class;
  protected $limitsDataType = '';
  public $minLikelihood;
  protected $ruleSetType = GooglePrivacyDlpV2InspectionRuleSet::class;
  protected $ruleSetDataType = 'array';

  public function setContentOptions($contentOptions)
  {
    $this->contentOptions = $contentOptions;
  }
  public function getContentOptions()
  {
    return $this->contentOptions;
  }
  /**
   * @param GooglePrivacyDlpV2CustomInfoType[]
   */
  public function setCustomInfoTypes($customInfoTypes)
  {
    $this->customInfoTypes = $customInfoTypes;
  }
  /**
   * @return GooglePrivacyDlpV2CustomInfoType[]
   */
  public function getCustomInfoTypes()
  {
    return $this->customInfoTypes;
  }
  public function setExcludeInfoTypes($excludeInfoTypes)
  {
    $this->excludeInfoTypes = $excludeInfoTypes;
  }
  public function getExcludeInfoTypes()
  {
    return $this->excludeInfoTypes;
  }
  public function setIncludeQuote($includeQuote)
  {
    $this->includeQuote = $includeQuote;
  }
  public function getIncludeQuote()
  {
    return $this->includeQuote;
  }
  /**
   * @param GooglePrivacyDlpV2InfoType[]
   */
  public function setInfoTypes($infoTypes)
  {
    $this->infoTypes = $infoTypes;
  }
  /**
   * @return GooglePrivacyDlpV2InfoType[]
   */
  public function getInfoTypes()
  {
    return $this->infoTypes;
  }
  /**
   * @param GooglePrivacyDlpV2FindingLimits
   */
  public function setLimits(GooglePrivacyDlpV2FindingLimits $limits)
  {
    $this->limits = $limits;
  }
  /**
   * @return GooglePrivacyDlpV2FindingLimits
   */
  public function getLimits()
  {
    return $this->limits;
  }
  public function setMinLikelihood($minLikelihood)
  {
    $this->minLikelihood = $minLikelihood;
  }
  public function getMinLikelihood()
  {
    return $this->minLikelihood;
  }
  /**
   * @param GooglePrivacyDlpV2InspectionRuleSet[]
   */
  public function setRuleSet($ruleSet)
  {
    $this->ruleSet = $ruleSet;
  }
  /**
   * @return GooglePrivacyDlpV2InspectionRuleSet[]
   */
  public function getRuleSet()
  {
    return $this->ruleSet;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2InspectConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2InspectConfig');
