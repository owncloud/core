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

class NlpSemanticParsingModelsRecurrenceRecurrenceStart extends \Google\Model
{
  protected $startDateTimeType = NlpSemanticParsingDateTimeAnnotation::class;
  protected $startDateTimeDataType = '';
  /**
   * @var string
   */
  public $startMillis;

  /**
   * @param NlpSemanticParsingDateTimeAnnotation
   */
  public function setStartDateTime(NlpSemanticParsingDateTimeAnnotation $startDateTime)
  {
    $this->startDateTime = $startDateTime;
  }
  /**
   * @return NlpSemanticParsingDateTimeAnnotation
   */
  public function getStartDateTime()
  {
    return $this->startDateTime;
  }
  /**
   * @param string
   */
  public function setStartMillis($startMillis)
  {
    $this->startMillis = $startMillis;
  }
  /**
   * @return string
   */
  public function getStartMillis()
  {
    return $this->startMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsRecurrenceRecurrenceStart::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsRecurrenceRecurrenceStart');
