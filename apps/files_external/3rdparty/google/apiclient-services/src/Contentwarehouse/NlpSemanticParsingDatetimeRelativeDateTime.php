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

class NlpSemanticParsingDatetimeRelativeDateTime extends \Google\Model
{
  protected $fetchedType = NlpSemanticParsingDatetimeFetchedRelativeDateTime::class;
  protected $fetchedDataType = '';
  /**
   * @var string
   */
  public $metadata;
  /**
   * @var string
   */
  public $modifier;
  protected $shiftedType = NlpSemanticParsingDatetimeShiftedRelativeDateTime::class;
  protected $shiftedDataType = '';

  /**
   * @param NlpSemanticParsingDatetimeFetchedRelativeDateTime
   */
  public function setFetched(NlpSemanticParsingDatetimeFetchedRelativeDateTime $fetched)
  {
    $this->fetched = $fetched;
  }
  /**
   * @return NlpSemanticParsingDatetimeFetchedRelativeDateTime
   */
  public function getFetched()
  {
    return $this->fetched;
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
   * @param string
   */
  public function setModifier($modifier)
  {
    $this->modifier = $modifier;
  }
  /**
   * @return string
   */
  public function getModifier()
  {
    return $this->modifier;
  }
  /**
   * @param NlpSemanticParsingDatetimeShiftedRelativeDateTime
   */
  public function setShifted(NlpSemanticParsingDatetimeShiftedRelativeDateTime $shifted)
  {
    $this->shifted = $shifted;
  }
  /**
   * @return NlpSemanticParsingDatetimeShiftedRelativeDateTime
   */
  public function getShifted()
  {
    return $this->shifted;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeRelativeDateTime::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeRelativeDateTime');
