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

class VideoPerDocData extends \Google\Model
{
  protected $coreSignalsType = MediaIndexVideoCoreSignals::class;
  protected $coreSignalsDataType = '';
  protected $framesType = MediaIndexVideoFrames::class;
  protected $framesDataType = '';

  /**
   * @param MediaIndexVideoCoreSignals
   */
  public function setCoreSignals(MediaIndexVideoCoreSignals $coreSignals)
  {
    $this->coreSignals = $coreSignals;
  }
  /**
   * @return MediaIndexVideoCoreSignals
   */
  public function getCoreSignals()
  {
    return $this->coreSignals;
  }
  /**
   * @param MediaIndexVideoFrames
   */
  public function setFrames(MediaIndexVideoFrames $frames)
  {
    $this->frames = $frames;
  }
  /**
   * @return MediaIndexVideoFrames
   */
  public function getFrames()
  {
    return $this->frames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoPerDocData::class, 'Google_Service_Contentwarehouse_VideoPerDocData');
