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

class VideoMediaOverview extends \Google\Collection
{
  protected $collection_key = 'videoOverview';
  /**
   * @var string
   */
  public $aspectRatio;
  protected $audioOverviewType = VideoMediaOverviewAudioOverview::class;
  protected $audioOverviewDataType = 'array';
  /**
   * @var string
   */
  public $authoringTool;
  /**
   * @var string
   */
  public $colorDynamicRange;
  /**
   * @var string
   */
  public $creationTimeStampUsec;
  protected $dataOverviewType = VideoMediaOverviewDataOverview::class;
  protected $dataOverviewDataType = 'array';
  /**
   * @var string
   */
  public $frameRate;
  /**
   * @var bool
   */
  public $hasChapters;
  protected $mediaClipInfoOverviewType = VideoMediaOverviewMediaClipInfoOverview::class;
  protected $mediaClipInfoOverviewDataType = '';
  /**
   * @var string
   */
  public $orientation;
  /**
   * @var string
   */
  public $origin;
  /**
   * @var string
   */
  public $projection;
  /**
   * @var string
   */
  public $resolution;
  /**
   * @var string
   */
  public $spatialAudioMode;
  /**
   * @var string
   */
  public $stereoMode;
  protected $timedtextOverviewType = VideoMediaOverviewTimedTextOverview::class;
  protected $timedtextOverviewDataType = 'array';
  protected $videoOverviewType = VideoMediaOverviewVideoOverview::class;
  protected $videoOverviewDataType = 'array';
  /**
   * @var string
   */
  public $wallyMeshType;

  /**
   * @param string
   */
  public function setAspectRatio($aspectRatio)
  {
    $this->aspectRatio = $aspectRatio;
  }
  /**
   * @return string
   */
  public function getAspectRatio()
  {
    return $this->aspectRatio;
  }
  /**
   * @param VideoMediaOverviewAudioOverview[]
   */
  public function setAudioOverview($audioOverview)
  {
    $this->audioOverview = $audioOverview;
  }
  /**
   * @return VideoMediaOverviewAudioOverview[]
   */
  public function getAudioOverview()
  {
    return $this->audioOverview;
  }
  /**
   * @param string
   */
  public function setAuthoringTool($authoringTool)
  {
    $this->authoringTool = $authoringTool;
  }
  /**
   * @return string
   */
  public function getAuthoringTool()
  {
    return $this->authoringTool;
  }
  /**
   * @param string
   */
  public function setColorDynamicRange($colorDynamicRange)
  {
    $this->colorDynamicRange = $colorDynamicRange;
  }
  /**
   * @return string
   */
  public function getColorDynamicRange()
  {
    return $this->colorDynamicRange;
  }
  /**
   * @param string
   */
  public function setCreationTimeStampUsec($creationTimeStampUsec)
  {
    $this->creationTimeStampUsec = $creationTimeStampUsec;
  }
  /**
   * @return string
   */
  public function getCreationTimeStampUsec()
  {
    return $this->creationTimeStampUsec;
  }
  /**
   * @param VideoMediaOverviewDataOverview[]
   */
  public function setDataOverview($dataOverview)
  {
    $this->dataOverview = $dataOverview;
  }
  /**
   * @return VideoMediaOverviewDataOverview[]
   */
  public function getDataOverview()
  {
    return $this->dataOverview;
  }
  /**
   * @param string
   */
  public function setFrameRate($frameRate)
  {
    $this->frameRate = $frameRate;
  }
  /**
   * @return string
   */
  public function getFrameRate()
  {
    return $this->frameRate;
  }
  /**
   * @param bool
   */
  public function setHasChapters($hasChapters)
  {
    $this->hasChapters = $hasChapters;
  }
  /**
   * @return bool
   */
  public function getHasChapters()
  {
    return $this->hasChapters;
  }
  /**
   * @param VideoMediaOverviewMediaClipInfoOverview
   */
  public function setMediaClipInfoOverview(VideoMediaOverviewMediaClipInfoOverview $mediaClipInfoOverview)
  {
    $this->mediaClipInfoOverview = $mediaClipInfoOverview;
  }
  /**
   * @return VideoMediaOverviewMediaClipInfoOverview
   */
  public function getMediaClipInfoOverview()
  {
    return $this->mediaClipInfoOverview;
  }
  /**
   * @param string
   */
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return string
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param string
   */
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  /**
   * @return string
   */
  public function getOrigin()
  {
    return $this->origin;
  }
  /**
   * @param string
   */
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
  /**
   * @return string
   */
  public function getProjection()
  {
    return $this->projection;
  }
  /**
   * @param string
   */
  public function setResolution($resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return string
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  /**
   * @param string
   */
  public function setSpatialAudioMode($spatialAudioMode)
  {
    $this->spatialAudioMode = $spatialAudioMode;
  }
  /**
   * @return string
   */
  public function getSpatialAudioMode()
  {
    return $this->spatialAudioMode;
  }
  /**
   * @param string
   */
  public function setStereoMode($stereoMode)
  {
    $this->stereoMode = $stereoMode;
  }
  /**
   * @return string
   */
  public function getStereoMode()
  {
    return $this->stereoMode;
  }
  /**
   * @param VideoMediaOverviewTimedTextOverview[]
   */
  public function setTimedtextOverview($timedtextOverview)
  {
    $this->timedtextOverview = $timedtextOverview;
  }
  /**
   * @return VideoMediaOverviewTimedTextOverview[]
   */
  public function getTimedtextOverview()
  {
    return $this->timedtextOverview;
  }
  /**
   * @param VideoMediaOverviewVideoOverview[]
   */
  public function setVideoOverview($videoOverview)
  {
    $this->videoOverview = $videoOverview;
  }
  /**
   * @return VideoMediaOverviewVideoOverview[]
   */
  public function getVideoOverview()
  {
    return $this->videoOverview;
  }
  /**
   * @param string
   */
  public function setWallyMeshType($wallyMeshType)
  {
    $this->wallyMeshType = $wallyMeshType;
  }
  /**
   * @return string
   */
  public function getWallyMeshType()
  {
    return $this->wallyMeshType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoMediaOverview::class, 'Google_Service_Contentwarehouse_VideoMediaOverview');
