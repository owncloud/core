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

class GoogleCloudDialogflowV2Message extends \Google\Model
{
  public $content;
  public $createTime;
  public $languageCode;
  protected $messageAnnotationType = GoogleCloudDialogflowV2MessageAnnotation::class;
  protected $messageAnnotationDataType = '';
  public $name;
  public $participant;
  public $participantRole;

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
   * @param GoogleCloudDialogflowV2MessageAnnotation
   */
  public function setMessageAnnotation(GoogleCloudDialogflowV2MessageAnnotation $messageAnnotation)
  {
    $this->messageAnnotation = $messageAnnotation;
  }
  /**
   * @return GoogleCloudDialogflowV2MessageAnnotation
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2Message::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2Message');
