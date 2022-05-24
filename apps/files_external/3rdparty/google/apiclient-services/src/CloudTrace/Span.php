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

namespace Google\Service\CloudTrace;

class Span extends \Google\Model
{
  protected $attributesType = Attributes::class;
  protected $attributesDataType = '';
  /**
   * @var int
   */
  public $childSpanCount;
  protected $displayNameType = TruncatableString::class;
  protected $displayNameDataType = '';
  /**
   * @var string
   */
  public $endTime;
  protected $linksType = Links::class;
  protected $linksDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $parentSpanId;
  /**
   * @var bool
   */
  public $sameProcessAsParentSpan;
  /**
   * @var string
   */
  public $spanId;
  /**
   * @var string
   */
  public $spanKind;
  protected $stackTraceType = StackTrace::class;
  protected $stackTraceDataType = '';
  /**
   * @var string
   */
  public $startTime;
  protected $statusType = Status::class;
  protected $statusDataType = '';
  protected $timeEventsType = TimeEvents::class;
  protected $timeEventsDataType = '';

  /**
   * @param Attributes
   */
  public function setAttributes(Attributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Attributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param int
   */
  public function setChildSpanCount($childSpanCount)
  {
    $this->childSpanCount = $childSpanCount;
  }
  /**
   * @return int
   */
  public function getChildSpanCount()
  {
    return $this->childSpanCount;
  }
  /**
   * @param TruncatableString
   */
  public function setDisplayName(TruncatableString $displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return TruncatableString
   */
  public function getDisplayName()
  {
    return $this->displayName;
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
   * @param Links
   */
  public function setLinks(Links $links)
  {
    $this->links = $links;
  }
  /**
   * @return Links
   */
  public function getLinks()
  {
    return $this->links;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setParentSpanId($parentSpanId)
  {
    $this->parentSpanId = $parentSpanId;
  }
  /**
   * @return string
   */
  public function getParentSpanId()
  {
    return $this->parentSpanId;
  }
  /**
   * @param bool
   */
  public function setSameProcessAsParentSpan($sameProcessAsParentSpan)
  {
    $this->sameProcessAsParentSpan = $sameProcessAsParentSpan;
  }
  /**
   * @return bool
   */
  public function getSameProcessAsParentSpan()
  {
    return $this->sameProcessAsParentSpan;
  }
  /**
   * @param string
   */
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  /**
   * @return string
   */
  public function getSpanId()
  {
    return $this->spanId;
  }
  /**
   * @param string
   */
  public function setSpanKind($spanKind)
  {
    $this->spanKind = $spanKind;
  }
  /**
   * @return string
   */
  public function getSpanKind()
  {
    return $this->spanKind;
  }
  /**
   * @param StackTrace
   */
  public function setStackTrace(StackTrace $stackTrace)
  {
    $this->stackTrace = $stackTrace;
  }
  /**
   * @return StackTrace
   */
  public function getStackTrace()
  {
    return $this->stackTrace;
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
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param TimeEvents
   */
  public function setTimeEvents(TimeEvents $timeEvents)
  {
    $this->timeEvents = $timeEvents;
  }
  /**
   * @return TimeEvents
   */
  public function getTimeEvents()
  {
    return $this->timeEvents;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Span::class, 'Google_Service_CloudTrace_Span');
