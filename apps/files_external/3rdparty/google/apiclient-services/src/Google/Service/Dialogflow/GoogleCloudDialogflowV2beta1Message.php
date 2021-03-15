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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1Message extends Google_Model
{
  public $content;
  public $createTime;
  public $languageCode;
  protected $messageAnnotationType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1MessageAnnotation';
  protected $messageAnnotationDataType = '';
  public $name;
  public $participant;
  public $participantRole;
  public $sendTime;
  protected $sentimentAnalysisType = 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SentimentAnalysisResult';
  protected $sentimentAnalysisDataType = '';

  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1MessageAnnotation
   */
  public function setMessageAnnotation(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1MessageAnnotation $messageAnnotation)
  {
    $this->messageAnnotation = $messageAnnotation;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1MessageAnnotation
   */
  public function getMessageAnnotation()
  {
    return $this->messageAnnotation;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParticipant($participant)
  {
    $this->participant = $participant;
  }
  public function getParticipant()
  {
    return $this->participant;
  }
  public function setParticipantRole($participantRole)
  {
    $this->participantRole = $participantRole;
  }
  public function getParticipantRole()
  {
    return $this->participantRole;
  }
  public function setSendTime($sendTime)
  {
    $this->sendTime = $sendTime;
  }
  public function getSendTime()
  {
    return $this->sendTime;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SentimentAnalysisResult
   */
  public function setSentimentAnalysis(Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SentimentAnalysisResult $sentimentAnalysis)
  {
    $this->sentimentAnalysis = $sentimentAnalysis;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1SentimentAnalysisResult
   */
  public function getSentimentAnalysis()
  {
    return $this->sentimentAnalysis;
  }
}
