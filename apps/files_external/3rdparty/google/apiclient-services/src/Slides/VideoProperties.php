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

namespace Google\Service\Slides;

class VideoProperties extends \Google\Model
{
  public $autoPlay;
  public $end;
  public $mute;
  protected $outlineType = Outline::class;
  protected $outlineDataType = '';
  public $start;

  public function setAutoPlay($autoPlay)
  {
    $this->autoPlay = $autoPlay;
  }
  public function getAutoPlay()
  {
    return $this->autoPlay;
  }
  public function setEnd($end)
  {
    $this->end = $end;
  }
  public function getEnd()
  {
    return $this->end;
  }
  public function setMute($mute)
  {
    $this->mute = $mute;
  }
  public function getMute()
  {
    return $this->mute;
  }
  /**
   * @param Outline
   */
  public function setOutline(Outline $outline)
  {
    $this->outline = $outline;
  }
  /**
   * @return Outline
   */
  public function getOutline()
  {
    return $this->outline;
  }
  public function setStart($start)
  {
    $this->start = $start;
  }
  public function getStart()
  {
    return $this->start;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoProperties::class, 'Google_Service_Slides_VideoProperties');
