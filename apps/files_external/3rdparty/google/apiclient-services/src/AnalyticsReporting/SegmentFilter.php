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

namespace Google\Service\AnalyticsReporting;

class SegmentFilter extends \Google\Model
{
  public $not;
  protected $sequenceSegmentType = SequenceSegment::class;
  protected $sequenceSegmentDataType = '';
  protected $simpleSegmentType = SimpleSegment::class;
  protected $simpleSegmentDataType = '';

  public function setNot($not)
  {
    $this->not = $not;
  }
  public function getNot()
  {
    return $this->not;
  }
  /**
   * @param SequenceSegment
   */
  public function setSequenceSegment(SequenceSegment $sequenceSegment)
  {
    $this->sequenceSegment = $sequenceSegment;
  }
  /**
   * @return SequenceSegment
   */
  public function getSequenceSegment()
  {
    return $this->sequenceSegment;
  }
  /**
   * @param SimpleSegment
   */
  public function setSimpleSegment(SimpleSegment $simpleSegment)
  {
    $this->simpleSegment = $simpleSegment;
  }
  /**
   * @return SimpleSegment
   */
  public function getSimpleSegment()
  {
    return $this->simpleSegment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SegmentFilter::class, 'Google_Service_AnalyticsReporting_SegmentFilter');
