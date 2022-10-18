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

class KnowledgeAnswersIntentQueryArgument extends \Google\Model
{
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  protected $heuristicEvalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $heuristicEvalDataDataType = '';
  protected $keyType = KnowledgeAnswersMeaningSchemaSlotKey::class;
  protected $keyDataType = '';
  protected $modifiersType = KnowledgeAnswersIntentModifiers::class;
  protected $modifiersDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $signalsType = KnowledgeAnswersIntentQueryArgumentSignals::class;
  protected $signalsDataType = '';
  protected $valueType = KnowledgeAnswersIntentQueryArgumentValue::class;
  protected $valueDataType = '';

  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setHeuristicEvalData(NlpSemanticParsingAnnotationEvalData $heuristicEvalData)
  {
    $this->heuristicEvalData = $heuristicEvalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getHeuristicEvalData()
  {
    return $this->heuristicEvalData;
  }
  /**
   * @param KnowledgeAnswersMeaningSchemaSlotKey
   */
  public function setKey(KnowledgeAnswersMeaningSchemaSlotKey $key)
  {
    $this->key = $key;
  }
  /**
   * @return KnowledgeAnswersMeaningSchemaSlotKey
   */
  public function getKey()
  {
    return $this->key;
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
   * @param KnowledgeAnswersIntentQueryArgumentSignals
   */
  public function setSignals(KnowledgeAnswersIntentQueryArgumentSignals $signals)
  {
    $this->signals = $signals;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgumentSignals
   */
  public function getSignals()
  {
    return $this->signals;
  }
  /**
   * @param KnowledgeAnswersIntentQueryArgumentValue
   */
  public function setValue(KnowledgeAnswersIntentQueryArgumentValue $value)
  {
    $this->value = $value;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgumentValue
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryArgument::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryArgument');
