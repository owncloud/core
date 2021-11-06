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

class SequenceSegment extends \Google\Collection
{
  protected $collection_key = 'segmentSequenceSteps';
  public $firstStepShouldMatchFirstHit;
  protected $segmentSequenceStepsType = SegmentSequenceStep::class;
  protected $segmentSequenceStepsDataType = 'array';

  public function setFirstStepShouldMatchFirstHit($firstStepShouldMatchFirstHit)
  {
    $this->firstStepShouldMatchFirstHit = $firstStepShouldMatchFirstHit;
  }
  public function getFirstStepShouldMatchFirstHit()
  {
    return $this->firstStepShouldMatchFirstHit;
  }
  /**
   * @param SegmentSequenceStep[]
   */
  public function setSegmentSequenceSteps($segmentSequenceSteps)
  {
    $this->segmentSequenceSteps = $segmentSequenceSteps;
  }
  /**
   * @return SegmentSequenceStep[]
   */
  public function getSegmentSequenceSteps()
  {
    return $this->segmentSequenceSteps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SequenceSegment::class, 'Google_Service_AnalyticsReporting_SequenceSegment');
