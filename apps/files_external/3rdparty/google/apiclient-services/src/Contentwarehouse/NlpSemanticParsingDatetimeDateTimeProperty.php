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

class NlpSemanticParsingDatetimeDateTimeProperty extends \Google\Collection
{
  protected $collection_key = 'timeFormat';
  /**
   * @var string
   */
  public $dateFormat;
  /**
   * @var bool
   */
  public $expandYearToCurrent;
  /**
   * @var string
   */
  public $hourStatus;
  /**
   * @var string
   */
  public $inferredDateValue;
  /**
   * @var string
   */
  public $metadata;
  protected $personalReferenceMetadataType = CopleyPersonalReferenceMetadata::class;
  protected $personalReferenceMetadataDataType = '';
  /**
   * @var string
   */
  public $relationToReference;
  protected $relativeType = NlpSemanticParsingDatetimeRelativeDateTime::class;
  protected $relativeDataType = '';
  /**
   * @var string
   */
  public $sourceCalendar;
  protected $sourceTypeListType = CopleySourceTypeList::class;
  protected $sourceTypeListDataType = '';
  /**
   * @var string[]
   */
  public $timeFormat;
  /**
   * @var bool
   */
  public $timezoneIsExplicit;

  /**
   * @param string
   */
  public function setDateFormat($dateFormat)
  {
    $this->dateFormat = $dateFormat;
  }
  /**
   * @return string
   */
  public function getDateFormat()
  {
    return $this->dateFormat;
  }
  /**
   * @param bool
   */
  public function setExpandYearToCurrent($expandYearToCurrent)
  {
    $this->expandYearToCurrent = $expandYearToCurrent;
  }
  /**
   * @return bool
   */
  public function getExpandYearToCurrent()
  {
    return $this->expandYearToCurrent;
  }
  /**
   * @param string
   */
  public function setHourStatus($hourStatus)
  {
    $this->hourStatus = $hourStatus;
  }
  /**
   * @return string
   */
  public function getHourStatus()
  {
    return $this->hourStatus;
  }
  /**
   * @param string
   */
  public function setInferredDateValue($inferredDateValue)
  {
    $this->inferredDateValue = $inferredDateValue;
  }
  /**
   * @return string
   */
  public function getInferredDateValue()
  {
    return $this->inferredDateValue;
  }
  /**
   * @param string
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param CopleyPersonalReferenceMetadata
   */
  public function setPersonalReferenceMetadata(CopleyPersonalReferenceMetadata $personalReferenceMetadata)
  {
    $this->personalReferenceMetadata = $personalReferenceMetadata;
  }
  /**
   * @return CopleyPersonalReferenceMetadata
   */
  public function getPersonalReferenceMetadata()
  {
    return $this->personalReferenceMetadata;
  }
  /**
   * @param string
   */
  public function setRelationToReference($relationToReference)
  {
    $this->relationToReference = $relationToReference;
  }
  /**
   * @return string
   */
  public function getRelationToReference()
  {
    return $this->relationToReference;
  }
  /**
   * @param NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function setRelative(NlpSemanticParsingDatetimeRelativeDateTime $relative)
  {
    $this->relative = $relative;
  }
  /**
   * @return NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function getRelative()
  {
    return $this->relative;
  }
  /**
   * @param string
   */
  public function setSourceCalendar($sourceCalendar)
  {
    $this->sourceCalendar = $sourceCalendar;
  }
  /**
   * @return string
   */
  public function getSourceCalendar()
  {
    return $this->sourceCalendar;
  }
  /**
   * @param CopleySourceTypeList
   */
  public function setSourceTypeList(CopleySourceTypeList $sourceTypeList)
  {
    $this->sourceTypeList = $sourceTypeList;
  }
  /**
   * @return CopleySourceTypeList
   */
  public function getSourceTypeList()
  {
    return $this->sourceTypeList;
  }
  /**
   * @param string[]
   */
  public function setTimeFormat($timeFormat)
  {
    $this->timeFormat = $timeFormat;
  }
  /**
   * @return string[]
   */
  public function getTimeFormat()
  {
    return $this->timeFormat;
  }
  /**
   * @param bool
   */
  public function setTimezoneIsExplicit($timezoneIsExplicit)
  {
    $this->timezoneIsExplicit = $timezoneIsExplicit;
  }
  /**
   * @return bool
   */
  public function getTimezoneIsExplicit()
  {
    return $this->timezoneIsExplicit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeDateTimeProperty::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeDateTimeProperty');
