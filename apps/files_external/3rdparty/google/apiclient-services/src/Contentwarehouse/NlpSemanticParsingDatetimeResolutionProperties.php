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

class NlpSemanticParsingDatetimeResolutionProperties extends \Google\Model
{
  /**
   * @var string
   */
  public $meridiem;
  /**
   * @var string
   */
  public $metadata;
  protected $relativeType = NlpSemanticParsingDatetimeRelativeDateTime::class;
  protected $relativeDataType = '';

  /**
   * @param string
   */
  public function setMeridiem($meridiem)
  {
    $this->meridiem = $meridiem;
  }
  /**
   * @return string
   */
  public function getMeridiem()
  {
    return $this->meridiem;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeResolutionProperties::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeResolutionProperties');
