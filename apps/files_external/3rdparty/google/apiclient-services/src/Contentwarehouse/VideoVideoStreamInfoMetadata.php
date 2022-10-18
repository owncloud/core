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

class VideoVideoStreamInfoMetadata extends \Google\Model
{
  protected $lutsType = VideoVideoStreamInfoMetadataLutAttachments::class;
  protected $lutsDataType = '';
  protected $videoFpaType = VideoFileFramePackingArrangement::class;
  protected $videoFpaDataType = '';

  /**
   * @param VideoVideoStreamInfoMetadataLutAttachments
   */
  public function setLuts(VideoVideoStreamInfoMetadataLutAttachments $luts)
  {
    $this->luts = $luts;
  }
  /**
   * @return VideoVideoStreamInfoMetadataLutAttachments
   */
  public function getLuts()
  {
    return $this->luts;
  }
  /**
   * @param VideoFileFramePackingArrangement
   */
  public function setVideoFpa(VideoFileFramePackingArrangement $videoFpa)
  {
    $this->videoFpa = $videoFpa;
  }
  /**
   * @return VideoFileFramePackingArrangement
   */
  public function getVideoFpa()
  {
    return $this->videoFpa;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoVideoStreamInfoMetadata::class, 'Google_Service_Contentwarehouse_VideoVideoStreamInfoMetadata');
