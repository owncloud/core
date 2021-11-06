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

class StackFrames extends \Google\Collection
{
  protected $collection_key = 'frame';
  public $droppedFramesCount;
  protected $frameType = StackFrame::class;
  protected $frameDataType = 'array';

  public function setDroppedFramesCount($droppedFramesCount)
  {
    $this->droppedFramesCount = $droppedFramesCount;
  }
  public function getDroppedFramesCount()
  {
    return $this->droppedFramesCount;
  }
  /**
   * @param StackFrame[]
   */
  public function setFrame($frame)
  {
    $this->frame = $frame;
  }
  /**
   * @return StackFrame[]
   */
  public function getFrame()
  {
    return $this->frame;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StackFrames::class, 'Google_Service_CloudTrace_StackFrames');
