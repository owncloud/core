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

class NlpSemanticParsingModelsShoppingAssistantProductExpression extends \Google\Collection
{
  protected $collection_key = 'phrases';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var string
   */
  public $grammaticalGender;
  /**
   * @var string
   */
  public $grammaticalNumber;
  protected $phrasesType = NlpSemanticParsingModelsShoppingAssistantPhrase::class;
  protected $phrasesDataType = 'array';
  protected $productClassificationType = NlpSemanticParsingModelsShoppingAssistantProductClassification::class;
  protected $productClassificationDataType = '';
  protected $shoppingListItemInfoType = NlpSemanticParsingModelsShoppingAssistantShoppingListItemInfo::class;
  protected $shoppingListItemInfoDataType = '';

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
   * @param string
   */
  public function setGrammaticalGender($grammaticalGender)
  {
    $this->grammaticalGender = $grammaticalGender;
  }
  /**
   * @return string
   */
  public function getGrammaticalGender()
  {
    return $this->grammaticalGender;
  }
  /**
   * @param string
   */
  public function setGrammaticalNumber($grammaticalNumber)
  {
    $this->grammaticalNumber = $grammaticalNumber;
  }
  /**
   * @return string
   */
  public function getGrammaticalNumber()
  {
    return $this->grammaticalNumber;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantPhrase[]
   */
  public function setPhrases($phrases)
  {
    $this->phrases = $phrases;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantPhrase[]
   */
  public function getPhrases()
  {
    return $this->phrases;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantProductClassification
   */
  public function setProductClassification(NlpSemanticParsingModelsShoppingAssistantProductClassification $productClassification)
  {
    $this->productClassification = $productClassification;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantProductClassification
   */
  public function getProductClassification()
  {
    return $this->productClassification;
  }
  /**
   * @param NlpSemanticParsingModelsShoppingAssistantShoppingListItemInfo
   */
  public function setShoppingListItemInfo(NlpSemanticParsingModelsShoppingAssistantShoppingListItemInfo $shoppingListItemInfo)
  {
    $this->shoppingListItemInfo = $shoppingListItemInfo;
  }
  /**
   * @return NlpSemanticParsingModelsShoppingAssistantShoppingListItemInfo
   */
  public function getShoppingListItemInfo()
  {
    return $this->shoppingListItemInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsShoppingAssistantProductExpression::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsShoppingAssistantProductExpression');
