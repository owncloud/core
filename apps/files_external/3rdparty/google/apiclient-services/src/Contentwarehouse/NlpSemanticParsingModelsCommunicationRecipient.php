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

class NlpSemanticParsingModelsCommunicationRecipient extends \Google\Model
{
  protected $calendarEventType = AssistantApiCoreTypesCalendarEvent::class;
  protected $calendarEventDataType = '';
  protected $calendarEventWrapperType = AssistantApiCoreTypesCalendarEventWrapper::class;
  protected $calendarEventWrapperDataType = '';
  protected $contactType = NlpSemanticParsingModelsPersonPerson::class;
  protected $contactDataType = '';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var bool
   */
  public $isAnnotatedFromText;
  /**
   * @var string
   */
  public $nameAnnotationSource;
  /**
   * @var string
   */
  public $numberAnnotationSource;
  /**
   * @var string
   */
  public $rawText;
  /**
   * @var string
   */
  public $recipientType;
  protected $relationshipType = NlpSemanticParsingModelsCommunicationRelationshipArgument::class;
  protected $relationshipDataType = '';
  /**
   * @var int
   */
  public $sensitiveNumBytes;
  /**
   * @var int
   */
  public $sensitiveStartByte;

  /**
   * @param AssistantApiCoreTypesCalendarEvent
   */
  public function setCalendarEvent(AssistantApiCoreTypesCalendarEvent $calendarEvent)
  {
    $this->calendarEvent = $calendarEvent;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEvent
   */
  public function getCalendarEvent()
  {
    return $this->calendarEvent;
  }
  /**
   * @param AssistantApiCoreTypesCalendarEventWrapper
   */
  public function setCalendarEventWrapper(AssistantApiCoreTypesCalendarEventWrapper $calendarEventWrapper)
  {
    $this->calendarEventWrapper = $calendarEventWrapper;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEventWrapper
   */
  public function getCalendarEventWrapper()
  {
    return $this->calendarEventWrapper;
  }
  /**
   * @param NlpSemanticParsingModelsPersonPerson
   */
  public function setContact(NlpSemanticParsingModelsPersonPerson $contact)
  {
    $this->contact = $contact;
  }
  /**
   * @return NlpSemanticParsingModelsPersonPerson
   */
  public function getContact()
  {
    return $this->contact;
  }
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
   * @param bool
   */
  public function setIsAnnotatedFromText($isAnnotatedFromText)
  {
    $this->isAnnotatedFromText = $isAnnotatedFromText;
  }
  /**
   * @return bool
   */
  public function getIsAnnotatedFromText()
  {
    return $this->isAnnotatedFromText;
  }
  /**
   * @param string
   */
  public function setNameAnnotationSource($nameAnnotationSource)
  {
    $this->nameAnnotationSource = $nameAnnotationSource;
  }
  /**
   * @return string
   */
  public function getNameAnnotationSource()
  {
    return $this->nameAnnotationSource;
  }
  /**
   * @param string
   */
  public function setNumberAnnotationSource($numberAnnotationSource)
  {
    $this->numberAnnotationSource = $numberAnnotationSource;
  }
  /**
   * @return string
   */
  public function getNumberAnnotationSource()
  {
    return $this->numberAnnotationSource;
  }
  /**
   * @param string
   */
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  /**
   * @return string
   */
  public function getRawText()
  {
    return $this->rawText;
  }
  /**
   * @param string
   */
  public function setRecipientType($recipientType)
  {
    $this->recipientType = $recipientType;
  }
  /**
   * @return string
   */
  public function getRecipientType()
  {
    return $this->recipientType;
  }
  /**
   * @param NlpSemanticParsingModelsCommunicationRelationshipArgument
   */
  public function setRelationship(NlpSemanticParsingModelsCommunicationRelationshipArgument $relationship)
  {
    $this->relationship = $relationship;
  }
  /**
   * @return NlpSemanticParsingModelsCommunicationRelationshipArgument
   */
  public function getRelationship()
  {
    return $this->relationship;
  }
  /**
   * @param int
   */
  public function setSensitiveNumBytes($sensitiveNumBytes)
  {
    $this->sensitiveNumBytes = $sensitiveNumBytes;
  }
  /**
   * @return int
   */
  public function getSensitiveNumBytes()
  {
    return $this->sensitiveNumBytes;
  }
  /**
   * @param int
   */
  public function setSensitiveStartByte($sensitiveStartByte)
  {
    $this->sensitiveStartByte = $sensitiveStartByte;
  }
  /**
   * @return int
   */
  public function getSensitiveStartByte()
  {
    return $this->sensitiveStartByte;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsCommunicationRecipient::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsCommunicationRecipient');
