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

class KnowledgeAnswersIntentQueryFunctionCall extends \Google\Collection
{
  protected $collection_key = 'unexplainedTokens';
  protected $argumentType = KnowledgeAnswersIntentQueryArgument::class;
  protected $argumentDataType = 'array';
  /**
   * @var string
   */
  public $catalogVersion;
  protected $contextualSensitivityType = KnowledgeAnswersSensitivitySensitivity::class;
  protected $contextualSensitivityDataType = 'array';
  protected $enabledRemodelingsType = NlpMeaningMeaningRemodelingControl::class;
  protected $enabledRemodelingsDataType = '';
  protected $ignoredTokensType = KnowledgeAnswersIntentQueryTokens::class;
  protected $ignoredTokensDataType = 'array';
  protected $keyType = KnowledgeAnswersMeaningSchemaKey::class;
  protected $keyDataType = '';
  protected $markerType = KnowledgeAnswersMarker::class;
  protected $markerDataType = '';
  protected $modifiersType = KnowledgeAnswersIntentModifiers::class;
  protected $modifiersDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $sensitivityType = KnowledgeAnswersSensitivitySensitivity::class;
  protected $sensitivityDataType = '';
  protected $signalsType = KnowledgeAnswersIntentQueryFunctionCallSignals::class;
  protected $signalsDataType = '';
  protected $unexplainedTokensType = KnowledgeAnswersIntentQueryTokens::class;
  protected $unexplainedTokensDataType = 'array';

  /**
   * @param KnowledgeAnswersIntentQueryArgument[]
   */
  public function setArgument($argument)
  {
    $this->argument = $argument;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgument[]
   */
  public function getArgument()
  {
    return $this->argument;
  }
  /**
   * @param string
   */
  public function setCatalogVersion($catalogVersion)
  {
    $this->catalogVersion = $catalogVersion;
  }
  /**
   * @return string
   */
  public function getCatalogVersion()
  {
    return $this->catalogVersion;
  }
  /**
   * @param KnowledgeAnswersSensitivitySensitivity[]
   */
  public function setContextualSensitivity($contextualSensitivity)
  {
    $this->contextualSensitivity = $contextualSensitivity;
  }
  /**
   * @return KnowledgeAnswersSensitivitySensitivity[]
   */
  public function getContextualSensitivity()
  {
    return $this->contextualSensitivity;
  }
  /**
   * @param NlpMeaningMeaningRemodelingControl
   */
  public function setEnabledRemodelings(NlpMeaningMeaningRemodelingControl $enabledRemodelings)
  {
    $this->enabledRemodelings = $enabledRemodelings;
  }
  /**
   * @return NlpMeaningMeaningRemodelingControl
   */
  public function getEnabledRemodelings()
  {
    return $this->enabledRemodelings;
  }
  /**
   * @param KnowledgeAnswersIntentQueryTokens[]
   */
  public function setIgnoredTokens($ignoredTokens)
  {
    $this->ignoredTokens = $ignoredTokens;
  }
  /**
   * @return KnowledgeAnswersIntentQueryTokens[]
   */
  public function getIgnoredTokens()
  {
    return $this->ignoredTokens;
  }
  /**
   * @param KnowledgeAnswersMeaningSchemaKey
   */
  public function setKey(KnowledgeAnswersMeaningSchemaKey $key)
  {
    $this->key = $key;
  }
  /**
   * @return KnowledgeAnswersMeaningSchemaKey
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param KnowledgeAnswersMarker
   */
  public function setMarker(KnowledgeAnswersMarker $marker)
  {
    $this->marker = $marker;
  }
  /**
   * @return KnowledgeAnswersMarker
   */
  public function getMarker()
  {
    return $this->marker;
  }
  /**
   * @param KnowledgeAnswersIntentModifiers
   */
  public function setModifiers(KnowledgeAnswersIntentModifiers $modifiers)
  {
    $this->modifiers = $modifiers;
  }
  /**
   * @return KnowledgeAnswersIntentModifiers
   */
  public function getModifiers()
  {
    return $this->modifiers;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param KnowledgeAnswersSensitivitySensitivity
   */
  public function setSensitivity(KnowledgeAnswersSensitivitySensitivity $sensitivity)
  {
    $this->sensitivity = $sensitivity;
  }
  /**
   * @return KnowledgeAnswersSensitivitySensitivity
   */
  public function getSensitivity()
  {
    return $this->sensitivity;
  }
  /**
   * @param KnowledgeAnswersIntentQueryFunctionCallSignals
   */
  public function setSignals(KnowledgeAnswersIntentQueryFunctionCallSignals $signals)
  {
    $this->signals = $signals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryFunctionCallSignals
   */
  public function getSignals()
  {
    return $this->signals;
  }
  /**
   * @param KnowledgeAnswersIntentQueryTokens[]
   */
  public function setUnexplainedTokens($unexplainedTokens)
  {
    $this->unexplainedTokens = $unexplainedTokens;
  }
  /**
   * @return KnowledgeAnswersIntentQueryTokens[]
   */
  public function getUnexplainedTokens()
  {
    return $this->unexplainedTokens;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryFunctionCall::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryFunctionCall');
