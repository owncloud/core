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
  public $childSpanCount;
  protected $displayNameType = TruncatableString::class;
  protected $displayNameDataType = '';
  public $endTime;
  protected $linksType = Links::class;
  protected $linksDataType = '';
  public $name;
  public $parentSpanId;
  public $sameProcessAsParentSpan;
  public $spanId;
  public $spanKind;
  protected $stackTraceType = StackTrace::class;
  protected $stackTraceDataType = '';
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
  public function setChildSpanCount($childSpanCount)
  {
    $this->childSpanCount = $childSpanCount;
  }
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
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParentSpanId($parentSpanId)
  {
    $this->parentSpanId = $parentSpanId;
  }
  public function getParentSpanId()
  {
    return $this->parentSpanId;
  }
  public function setSameProcessAsParentSpan($sameProcessAsParentSpan)
  {
    $this->sameProcessAsParentSpan = $sameProcessAsParentSpan;
  }
  public function getSameProcessAsParentSpan()
  {
    return $this->sameProcessAsParentSpan;
  }
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  public function getSpanId()
  {
    return $this->spanId;
  }
  public function setSpanKind($spanKind)
  {
    $this->spanKind = $spanKind;
  }
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
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
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
