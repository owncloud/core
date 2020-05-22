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

class Google_Service_Dfareporting_CustomEvent extends Google_Collection
{
  protected $collection_key = 'customVariables';
  protected $annotateClickEventType = 'Google_Service_Dfareporting_CustomEventClickAnnotation';
  protected $annotateClickEventDataType = '';
  protected $annotateImpressionEventType = 'Google_Service_Dfareporting_CustomEventImpressionAnnotation';
  protected $annotateImpressionEventDataType = '';
  protected $customVariablesType = 'Google_Service_Dfareporting_CustomVariable';
  protected $customVariablesDataType = 'array';
  public $eventType;
  public $floodlightConfigurationId;
  protected $insertEventType = 'Google_Service_Dfareporting_CustomEventInsert';
  protected $insertEventDataType = '';
  public $kind;
  public $ordinal;
  public $timestampMicros;

  /**
   * @param Google_Service_Dfareporting_CustomEventClickAnnotation
   */
  public function setAnnotateClickEvent(Google_Service_Dfareporting_CustomEventClickAnnotation $annotateClickEvent)
  {
    $this->annotateClickEvent = $annotateClickEvent;
  }
  /**
   * @return Google_Service_Dfareporting_CustomEventClickAnnotation
   */
  public function getAnnotateClickEvent()
  {
    return $this->annotateClickEvent;
  }
  /**
   * @param Google_Service_Dfareporting_CustomEventImpressionAnnotation
   */
  public function setAnnotateImpressionEvent(Google_Service_Dfareporting_CustomEventImpressionAnnotation $annotateImpressionEvent)
  {
    $this->annotateImpressionEvent = $annotateImpressionEvent;
  }
  /**
   * @return Google_Service_Dfareporting_CustomEventImpressionAnnotation
   */
  public function getAnnotateImpressionEvent()
  {
    return $this->annotateImpressionEvent;
  }
  /**
   * @param Google_Service_Dfareporting_CustomVariable
   */
  public function setCustomVariables($customVariables)
  {
    $this->customVariables = $customVariables;
  }
  /**
   * @return Google_Service_Dfareporting_CustomVariable
   */
  public function getCustomVariables()
  {
    return $this->customVariables;
  }
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  public function getEventType()
  {
    return $this->eventType;
  }
  public function setFloodlightConfigurationId($floodlightConfigurationId)
  {
    $this->floodlightConfigurationId = $floodlightConfigurationId;
  }
  public function getFloodlightConfigurationId()
  {
    return $this->floodlightConfigurationId;
  }
  /**
   * @param Google_Service_Dfareporting_CustomEventInsert
   */
  public function setInsertEvent(Google_Service_Dfareporting_CustomEventInsert $insertEvent)
  {
    $this->insertEvent = $insertEvent;
  }
  /**
   * @return Google_Service_Dfareporting_CustomEventInsert
   */
  public function getInsertEvent()
  {
    return $this->insertEvent;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOrdinal($ordinal)
  {
    $this->ordinal = $ordinal;
  }
  public function getOrdinal()
  {
    return $this->ordinal;
  }
  public function setTimestampMicros($timestampMicros)
  {
    $this->timestampMicros = $timestampMicros;
  }
  public function getTimestampMicros()
  {
    return $this->timestampMicros;
  }
}
