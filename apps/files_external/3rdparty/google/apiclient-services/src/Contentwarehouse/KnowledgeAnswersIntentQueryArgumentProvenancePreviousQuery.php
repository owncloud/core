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

class KnowledgeAnswersIntentQueryArgumentProvenancePreviousQuery extends \Google\Collection
{
  protected $collection_key = 'evalData';
  protected $currentQueryEvalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $currentQueryEvalDataDataType = 'array';
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = 'array';
  protected $eventIdType = EventIdMessage::class;
  protected $eventIdDataType = '';
  protected $roleType = KnowledgeAnswersIntentQueryArgumentProvenancePreviousQueryRole::class;
  protected $roleDataType = '';
  /**
   * @var string
   */
  public $source;

  /**
   * @param NlpSemanticParsingAnnotationEvalData[]
   */
  public function setCurrentQueryEvalData($currentQueryEvalData)
  {
    $this->currentQueryEvalData = $currentQueryEvalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData[]
   */
  public function getCurrentQueryEvalData()
  {
    return $this->currentQueryEvalData;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData[]
   */
  public function setEvalData($evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData[]
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
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
   * @param KnowledgeAnswersIntentQueryArgumentProvenancePreviousQueryRole
   */
  public function setRole(KnowledgeAnswersIntentQueryArgumentProvenancePreviousQueryRole $role)
  {
    $this->role = $role;
  }
  /**
   * @return KnowledgeAnswersIntentQueryArgumentProvenancePreviousQueryRole
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryArgumentProvenancePreviousQuery::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryArgumentProvenancePreviousQuery');
