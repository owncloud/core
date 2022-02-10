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

namespace Google\Service\Dfareporting;

class CreativeAssignment extends \Google\Collection
{
  protected $collection_key = 'richMediaExitOverrides';
  /**
   * @var bool
   */
  public $active;
  /**
   * @var bool
   */
  public $applyEventTags;
  protected $clickThroughUrlType = ClickThroughUrl::class;
  protected $clickThroughUrlDataType = '';
  protected $companionCreativeOverridesType = CompanionClickThroughOverride::class;
  protected $companionCreativeOverridesDataType = 'array';
  protected $creativeGroupAssignmentsType = CreativeGroupAssignment::class;
  protected $creativeGroupAssignmentsDataType = 'array';
  /**
   * @var string
   */
  public $creativeId;
  protected $creativeIdDimensionValueType = DimensionValue::class;
  protected $creativeIdDimensionValueDataType = '';
  /**
   * @var string
   */
  public $endTime;
  protected $richMediaExitOverridesType = RichMediaExitOverride::class;
  protected $richMediaExitOverridesDataType = 'array';
  /**
   * @var int
   */
  public $sequence;
  /**
   * @var bool
   */
  public $sslCompliant;
  /**
   * @var string
   */
  public $startTime;
  /**
   * @var int
   */
  public $weight;

  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param bool
   */
  public function setApplyEventTags($applyEventTags)
  {
    $this->applyEventTags = $applyEventTags;
  }
  /**
   * @return bool
   */
  public function getApplyEventTags()
  {
    return $this->applyEventTags;
  }
  /**
   * @param ClickThroughUrl
   */
  public function setClickThroughUrl(ClickThroughUrl $clickThroughUrl)
  {
    $this->clickThroughUrl = $clickThroughUrl;
  }
  /**
   * @return ClickThroughUrl
   */
  public function getClickThroughUrl()
  {
    return $this->clickThroughUrl;
  }
  /**
   * @param CompanionClickThroughOverride[]
   */
  public function setCompanionCreativeOverrides($companionCreativeOverrides)
  {
    $this->companionCreativeOverrides = $companionCreativeOverrides;
  }
  /**
   * @return CompanionClickThroughOverride[]
   */
  public function getCompanionCreativeOverrides()
  {
    return $this->companionCreativeOverrides;
  }
  /**
   * @param CreativeGroupAssignment[]
   */
  public function setCreativeGroupAssignments($creativeGroupAssignments)
  {
    $this->creativeGroupAssignments = $creativeGroupAssignments;
  }
  /**
   * @return CreativeGroupAssignment[]
   */
  public function getCreativeGroupAssignments()
  {
    return $this->creativeGroupAssignments;
  }
  /**
   * @param string
   */
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  /**
   * @return string
   */
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  /**
   * @param DimensionValue
   */
  public function setCreativeIdDimensionValue(DimensionValue $creativeIdDimensionValue)
  {
    $this->creativeIdDimensionValue = $creativeIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getCreativeIdDimensionValue()
  {
    return $this->creativeIdDimensionValue;
  }
  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param RichMediaExitOverride[]
   */
  public function setRichMediaExitOverrides($richMediaExitOverrides)
  {
    $this->richMediaExitOverrides = $richMediaExitOverrides;
  }
  /**
   * @return RichMediaExitOverride[]
   */
  public function getRichMediaExitOverrides()
  {
    return $this->richMediaExitOverrides;
  }
  /**
   * @param int
   */
  public function setSequence($sequence)
  {
    $this->sequence = $sequence;
  }
  /**
   * @return int
   */
  public function getSequence()
  {
    return $this->sequence;
  }
  /**
   * @param bool
   */
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  /**
   * @return bool
   */
  public function getSslCompliant()
  {
    return $this->sslCompliant;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param int
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return int
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeAssignment::class, 'Google_Service_Dfareporting_CreativeAssignment');
