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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1Message extends \Google\Model
{
  /**
   * @var string
   */
  public $content;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $languageCode;
  protected $messageAnnotationType = GoogleCloudDialogflowV2beta1MessageAnnotation::class;
  protected $messageAnnotationDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $participant;
  /**
   * @var string
   */
  public $participantRole;
  /**
   * @var string
   */
  public $sendTime;
  protected $sentimentAnalysisType = GoogleCloudDialogflowV2beta1SentimentAnalysisResult::class;
  protected $sentimentAnalysisDataType = '';

  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1MessageAnnotation
   */
  public function setMessageAnnotation(GoogleCloudDialogflowV2beta1MessageAnnotation $messageAnnotation)
  {
    $this->messageAnnotation = $messageAnnotation;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1MessageAnnotation
   */
  public function getMessageAnnotation()
  {
    return $this->messageAnnotation;
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
   * @param string
   */
  public function setParticipant($participant)
  {
    $this->participant = $participant;
  }
  /**
   * @return string
   */
  public function getParticipant()
  {
    return $this->participant;
  }
  /**
   * @param string
   */
  public function setParticipantRole($participantRole)
  {
    $this->participantRole = $participantRole;
  }
  /**
   * @return string
   */
  public function getParticipantRole()
  {
    return $this->participantRole;
  }
  /**
   * @param string
   */
  public function setSendTime($sendTime)
  {
    $this->sendTime = $sendTime;
  }
  /**
   * @return string
   */
  public function getSendTime()
  {
    return $this->sendTime;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1SentimentAnalysisResult
   */
  public function setSentimentAnalysis(GoogleCloudDialogflowV2beta1SentimentAnalysisResult $sentimentAnalysis)
  {
    $this->sentimentAnalysis = $sentimentAnalysis;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1SentimentAnalysisResult
   */
  public function getSentimentAnalysis()
  {
    return $this->sentimentAnalysis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1Message::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1Message');
