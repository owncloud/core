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

class TimeEvent extends \Google\Model
{
  protected $annotationType = Annotation::class;
  protected $annotationDataType = '';
  protected $messageEventType = MessageEvent::class;
  protected $messageEventDataType = '';
  /**
   * @var string
   */
  public $time;

  /**
   * @param Annotation
   */
  public function setAnnotation(Annotation $annotation)
  {
    $this->annotation = $annotation;
  }
  /**
   * @return Annotation
   */
  public function getAnnotation()
  {
    return $this->annotation;
  }
  /**
   * @param MessageEvent
   */
  public function setMessageEvent(MessageEvent $messageEvent)
  {
    $this->messageEvent = $messageEvent;
  }
  /**
   * @return MessageEvent
   */
  public function getMessageEvent()
  {
    return $this->messageEvent;
  }
  /**
   * @param string
   */
  public function setTime($time)
  {
    $this->time = $time;
  }
  /**
   * @return string
   */
  public function getTime()
  {
    return $this->time;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TimeEvent::class, 'Google_Service_CloudTrace_TimeEvent');
