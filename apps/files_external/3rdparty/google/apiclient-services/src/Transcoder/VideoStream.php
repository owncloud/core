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

namespace Google\Service\Transcoder;

class VideoStream extends \Google\Model
{
  protected $h264Type = H264CodecSettings::class;
  protected $h264DataType = '';
  protected $h265Type = H265CodecSettings::class;
  protected $h265DataType = '';
  protected $vp9Type = Vp9CodecSettings::class;
  protected $vp9DataType = '';

  /**
   * @param H264CodecSettings
   */
  public function setH264(H264CodecSettings $h264)
  {
    $this->h264 = $h264;
  }
  /**
   * @return H264CodecSettings
   */
  public function getH264()
  {
    return $this->h264;
  }
  /**
   * @param H265CodecSettings
   */
  public function setH265(H265CodecSettings $h265)
  {
    $this->h265 = $h265;
  }
  /**
   * @return H265CodecSettings
   */
  public function getH265()
  {
    return $this->h265;
  }
  /**
   * @param Vp9CodecSettings
   */
  public function setVp9(Vp9CodecSettings $vp9)
  {
    $this->vp9 = $vp9;
  }
  /**
   * @return Vp9CodecSettings
   */
  public function getVp9()
  {
    return $this->vp9;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoStream::class, 'Google_Service_Transcoder_VideoStream');
