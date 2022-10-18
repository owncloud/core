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

class KnowledgeAnswersIntentQueryArgumentProvenanceSearchAnswerValue extends \Google\Model
{
  protected $eventIdType = EventIdMessage::class;
  protected $eventIdDataType = '';
  /**
   * @var int
   */
  public $metadataValueIndex;
  /**
   * @var string
   */
  public $text;
  /**
   * @var int
   */
  public $valueIndex;

  /**
   * @param EventIdMessage
   */
  public function setEventId(EventIdMessage $eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return EventIdMessage
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param int
   */
  public function setMetadataValueIndex($metadataValueIndex)
  {
    $this->metadataValueIndex = $metadataValueIndex;
  }
  /**
   * @return int
   */
  public function getMetadataValueIndex()
  {
    return $this->metadataValueIndex;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param int
   */
  public function setValueIndex($valueIndex)
  {
    $this->valueIndex = $valueIndex;
  }
  /**
   * @return int
   */
  public function getValueIndex()
  {
    return $this->valueIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryArgumentProvenanceSearchAnswerValue::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryArgumentProvenanceSearchAnswerValue');
