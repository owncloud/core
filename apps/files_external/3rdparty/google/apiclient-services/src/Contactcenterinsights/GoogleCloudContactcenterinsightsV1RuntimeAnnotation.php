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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1RuntimeAnnotation extends \Google\Model
{
  public $annotationId;
  protected $answerFeedbackType = GoogleCloudContactcenterinsightsV1AnswerFeedback::class;
  protected $answerFeedbackDataType = '';
  protected $articleSuggestionType = GoogleCloudContactcenterinsightsV1ArticleSuggestionData::class;
  protected $articleSuggestionDataType = '';
  public $createTime;
  protected $dialogflowInteractionType = GoogleCloudContactcenterinsightsV1DialogflowInteractionData::class;
  protected $dialogflowInteractionDataType = '';
  protected $endBoundaryType = GoogleCloudContactcenterinsightsV1AnnotationBoundary::class;
  protected $endBoundaryDataType = '';
  protected $faqAnswerType = GoogleCloudContactcenterinsightsV1FaqAnswerData::class;
  protected $faqAnswerDataType = '';
  protected $smartComposeSuggestionType = GoogleCloudContactcenterinsightsV1SmartComposeSuggestionData::class;
  protected $smartComposeSuggestionDataType = '';
  protected $smartReplyType = GoogleCloudContactcenterinsightsV1SmartReplyData::class;
  protected $smartReplyDataType = '';
  protected $startBoundaryType = GoogleCloudContactcenterinsightsV1AnnotationBoundary::class;
  protected $startBoundaryDataType = '';

  public function setAnnotationId($annotationId)
  {
    $this->annotationId = $annotationId;
  }
  public function getAnnotationId()
  {
    return $this->annotationId;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1AnswerFeedback
   */
  public function setAnswerFeedback(GoogleCloudContactcenterinsightsV1AnswerFeedback $answerFeedback)
  {
    $this->answerFeedback = $answerFeedback;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1AnswerFeedback
   */
  public function getAnswerFeedback()
  {
    return $this->answerFeedback;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1ArticleSuggestionData
   */
  public function setArticleSuggestion(GoogleCloudContactcenterinsightsV1ArticleSuggestionData $articleSuggestion)
  {
    $this->articleSuggestion = $articleSuggestion;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1ArticleSuggestionData
   */
  public function getArticleSuggestion()
  {
    return $this->articleSuggestion;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1DialogflowInteractionData
   */
  public function setDialogflowInteraction(GoogleCloudContactcenterinsightsV1DialogflowInteractionData $dialogflowInteraction)
  {
    $this->dialogflowInteraction = $dialogflowInteraction;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1DialogflowInteractionData
   */
  public function getDialogflowInteraction()
  {
    return $this->dialogflowInteraction;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function setEndBoundary(GoogleCloudContactcenterinsightsV1AnnotationBoundary $endBoundary)
  {
    $this->endBoundary = $endBoundary;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function getEndBoundary()
  {
    return $this->endBoundary;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1FaqAnswerData
   */
  public function setFaqAnswer(GoogleCloudContactcenterinsightsV1FaqAnswerData $faqAnswer)
  {
    $this->faqAnswer = $faqAnswer;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1FaqAnswerData
   */
  public function getFaqAnswer()
  {
    return $this->faqAnswer;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1SmartComposeSuggestionData
   */
  public function setSmartComposeSuggestion(GoogleCloudContactcenterinsightsV1SmartComposeSuggestionData $smartComposeSuggestion)
  {
    $this->smartComposeSuggestion = $smartComposeSuggestion;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1SmartComposeSuggestionData
   */
  public function getSmartComposeSuggestion()
  {
    return $this->smartComposeSuggestion;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1SmartReplyData
   */
  public function setSmartReply(GoogleCloudContactcenterinsightsV1SmartReplyData $smartReply)
  {
    $this->smartReply = $smartReply;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1SmartReplyData
   */
  public function getSmartReply()
  {
    return $this->smartReply;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function setStartBoundary(GoogleCloudContactcenterinsightsV1AnnotationBoundary $startBoundary)
  {
    $this->startBoundary = $startBoundary;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1AnnotationBoundary
   */
  public function getStartBoundary()
  {
    return $this->startBoundary;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1RuntimeAnnotation::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1RuntimeAnnotation');
