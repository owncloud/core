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

class NlpSemanticParsingDatetimeFetchedRelativeDateTime extends \Google\Collection
{
  protected $collection_key = 'ordinal';
  /**
   * @var string
   */
  public $baseType;
  /**
   * @var string
   */
  public $count;
  /**
   * @var string
   */
  public $metadata;
  /**
   * @var int[]
   */
  public $ordinal;
  protected $rangeType = NlpSemanticParsingDatetimeRange::class;
  protected $rangeDataType = '';
  /**
   * @var string
   */
  public $rangeModifier;
  protected $relativeRangeType = NlpSemanticParsingDatetimeResolutionProperties::class;
  protected $relativeRangeDataType = '';
  protected $targetType = NlpSemanticParsingDatetimeTargetToFetch::class;
  protected $targetDataType = '';

  /**
   * @param string
   */
  public function setBaseType($baseType)
  {
    $this->baseType = $baseType;
  }
  /**
   * @return string
   */
  public function getBaseType()
  {
    return $this->baseType;
  }
  /**
   * @param string
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return string
   */
  public function getCount()
  {
    return $this->count;
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
   * @param int[]
   */
  public function setOrdinal($ordinal)
  {
    $this->ordinal = $ordinal;
  }
  /**
   * @return int[]
   */
  public function getOrdinal()
  {
    return $this->ordinal;
  }
  /**
   * @param NlpSemanticParsingDatetimeRange
   */
  public function setRange(NlpSemanticParsingDatetimeRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return NlpSemanticParsingDatetimeRange
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param string
   */
  public function setRangeModifier($rangeModifier)
  {
    $this->rangeModifier = $rangeModifier;
  }
  /**
   * @return string
   */
  public function getRangeModifier()
  {
    return $this->rangeModifier;
  }
  /**
   * @param NlpSemanticParsingDatetimeResolutionProperties
   */
  public function setRelativeRange(NlpSemanticParsingDatetimeResolutionProperties $relativeRange)
  {
    $this->relativeRange = $relativeRange;
  }
  /**
   * @return NlpSemanticParsingDatetimeResolutionProperties
   */
  public function getRelativeRange()
  {
    return $this->relativeRange;
  }
  /**
   * @param NlpSemanticParsingDatetimeTargetToFetch
   */
  public function setTarget(NlpSemanticParsingDatetimeTargetToFetch $target)
  {
    $this->target = $target;
  }
  /**
   * @return NlpSemanticParsingDatetimeTargetToFetch
   */
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeFetchedRelativeDateTime::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeFetchedRelativeDateTime');
