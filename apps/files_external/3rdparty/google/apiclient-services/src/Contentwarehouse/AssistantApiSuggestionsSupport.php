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

class AssistantApiSuggestionsSupport extends \Google\Collection
{
  protected $collection_key = 'supportedDisplayTargets';
  /**
   * @var bool
   */
  public $clickImpersonationSupported;
  /**
   * @var bool
   */
  public $coloredChipBackgroundBorderSupported;
  /**
   * @var bool
   */
  public $coloredChipTextSupported;
  /**
   * @var bool
   */
  public $debugDataSupported;
  /**
   * @var bool
   */
  public $drlHistoryChipSupported;
  /**
   * @var string
   */
  public $escapeHatchSupported;
  /**
   * @var bool
   */
  public $executedTextSupported;
  /**
   * @var bool
   */
  public $executionContextSupported;
  protected $featureSpecificActionSupportType = AssistantApiFeatureSpecificActionSupport::class;
  protected $featureSpecificActionSupportDataType = '';
  /**
   * @var bool
   */
  public $featureSpecificAppActionsNotificationSupported;
  /**
   * @var bool
   */
  public $ruleIdInExecutionContextSupported;
  /**
   * @var bool
   */
  public $showExecutedTextSupported;
  /**
   * @var bool
   */
  public $showTranslationSupported;
  protected $supportedDisplayTargetsType = AssistantApiSuggestionsSupportDisplayTargetSupport::class;
  protected $supportedDisplayTargetsDataType = 'array';
  /**
   * @var bool
   */
  public $widgetDataSupported;

  /**
   * @param bool
   */
  public function setClickImpersonationSupported($clickImpersonationSupported)
  {
    $this->clickImpersonationSupported = $clickImpersonationSupported;
  }
  /**
   * @return bool
   */
  public function getClickImpersonationSupported()
  {
    return $this->clickImpersonationSupported;
  }
  /**
   * @param bool
   */
  public function setColoredChipBackgroundBorderSupported($coloredChipBackgroundBorderSupported)
  {
    $this->coloredChipBackgroundBorderSupported = $coloredChipBackgroundBorderSupported;
  }
  /**
   * @return bool
   */
  public function getColoredChipBackgroundBorderSupported()
  {
    return $this->coloredChipBackgroundBorderSupported;
  }
  /**
   * @param bool
   */
  public function setColoredChipTextSupported($coloredChipTextSupported)
  {
    $this->coloredChipTextSupported = $coloredChipTextSupported;
  }
  /**
   * @return bool
   */
  public function getColoredChipTextSupported()
  {
    return $this->coloredChipTextSupported;
  }
  /**
   * @param bool
   */
  public function setDebugDataSupported($debugDataSupported)
  {
    $this->debugDataSupported = $debugDataSupported;
  }
  /**
   * @return bool
   */
  public function getDebugDataSupported()
  {
    return $this->debugDataSupported;
  }
  /**
   * @param bool
   */
  public function setDrlHistoryChipSupported($drlHistoryChipSupported)
  {
    $this->drlHistoryChipSupported = $drlHistoryChipSupported;
  }
  /**
   * @return bool
   */
  public function getDrlHistoryChipSupported()
  {
    return $this->drlHistoryChipSupported;
  }
  /**
   * @param string
   */
  public function setEscapeHatchSupported($escapeHatchSupported)
  {
    $this->escapeHatchSupported = $escapeHatchSupported;
  }
  /**
   * @return string
   */
  public function getEscapeHatchSupported()
  {
    return $this->escapeHatchSupported;
  }
  /**
   * @param bool
   */
  public function setExecutedTextSupported($executedTextSupported)
  {
    $this->executedTextSupported = $executedTextSupported;
  }
  /**
   * @return bool
   */
  public function getExecutedTextSupported()
  {
    return $this->executedTextSupported;
  }
  /**
   * @param bool
   */
  public function setExecutionContextSupported($executionContextSupported)
  {
    $this->executionContextSupported = $executionContextSupported;
  }
  /**
   * @return bool
   */
  public function getExecutionContextSupported()
  {
    return $this->executionContextSupported;
  }
  /**
   * @param AssistantApiFeatureSpecificActionSupport
   */
  public function setFeatureSpecificActionSupport(AssistantApiFeatureSpecificActionSupport $featureSpecificActionSupport)
  {
    $this->featureSpecificActionSupport = $featureSpecificActionSupport;
  }
  /**
   * @return AssistantApiFeatureSpecificActionSupport
   */
  public function getFeatureSpecificActionSupport()
  {
    return $this->featureSpecificActionSupport;
  }
  /**
   * @param bool
   */
  public function setFeatureSpecificAppActionsNotificationSupported($featureSpecificAppActionsNotificationSupported)
  {
    $this->featureSpecificAppActionsNotificationSupported = $featureSpecificAppActionsNotificationSupported;
  }
  /**
   * @return bool
   */
  public function getFeatureSpecificAppActionsNotificationSupported()
  {
    return $this->featureSpecificAppActionsNotificationSupported;
  }
  /**
   * @param bool
   */
  public function setRuleIdInExecutionContextSupported($ruleIdInExecutionContextSupported)
  {
    $this->ruleIdInExecutionContextSupported = $ruleIdInExecutionContextSupported;
  }
  /**
   * @return bool
   */
  public function getRuleIdInExecutionContextSupported()
  {
    return $this->ruleIdInExecutionContextSupported;
  }
  /**
   * @param bool
   */
  public function setShowExecutedTextSupported($showExecutedTextSupported)
  {
    $this->showExecutedTextSupported = $showExecutedTextSupported;
  }
  /**
   * @return bool
   */
  public function getShowExecutedTextSupported()
  {
    return $this->showExecutedTextSupported;
  }
  /**
   * @param bool
   */
  public function setShowTranslationSupported($showTranslationSupported)
  {
    $this->showTranslationSupported = $showTranslationSupported;
  }
  /**
   * @return bool
   */
  public function getShowTranslationSupported()
  {
    return $this->showTranslationSupported;
  }
  /**
   * @param AssistantApiSuggestionsSupportDisplayTargetSupport[]
   */
  public function setSupportedDisplayTargets($supportedDisplayTargets)
  {
    $this->supportedDisplayTargets = $supportedDisplayTargets;
  }
  /**
   * @return AssistantApiSuggestionsSupportDisplayTargetSupport[]
   */
  public function getSupportedDisplayTargets()
  {
    return $this->supportedDisplayTargets;
  }
  /**
   * @param bool
   */
  public function setWidgetDataSupported($widgetDataSupported)
  {
    $this->widgetDataSupported = $widgetDataSupported;
  }
  /**
   * @return bool
   */
  public function getWidgetDataSupported()
  {
    return $this->widgetDataSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiSuggestionsSupport::class, 'Google_Service_Contentwarehouse_AssistantApiSuggestionsSupport');
