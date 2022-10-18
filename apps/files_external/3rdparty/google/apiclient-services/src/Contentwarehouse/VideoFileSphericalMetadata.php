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

class VideoFileSphericalMetadata extends \Google\Model
{
  protected $clampedOptimalFovBoundsType = VideoFileSphericalMetadataFOVBounds::class;
  protected $clampedOptimalFovBoundsDataType = '';
  protected $cubemapType = VideoFileSphericalMetadataCubemapProjection::class;
  protected $cubemapDataType = '';
  protected $deprecatedCroppedAreaType = VideoFileSphericalMetadataCroppedArea::class;
  protected $deprecatedCroppedAreaDataType = '';
  protected $deprecatedInitialViewType = VideoFileSphericalMetadataViewDirection::class;
  protected $deprecatedInitialViewDataType = '';
  protected $equirectType = VideoFileSphericalMetadataEquirectProjection::class;
  protected $equirectDataType = '';
  /**
   * @var int
   */
  public $fullPanoHeightPixels;
  /**
   * @var int
   */
  public $fullPanoWidthPixels;
  protected $meshType = VideoFileSphericalMetadataMeshProjection::class;
  protected $meshDataType = '';
  /**
   * @var string
   */
  public $metadataSource;
  protected $optimalFovBoundsType = VideoFileSphericalMetadataFOVBounds::class;
  protected $optimalFovBoundsDataType = '';
  protected $poseType = VideoFileSphericalMetadataPose::class;
  protected $poseDataType = '';
  /**
   * @var string
   */
  public $projectionType;
  /**
   * @var int
   */
  public $sourceCount;
  /**
   * @var bool
   */
  public $spherical;
  /**
   * @var string
   */
  public $stereoMode;
  /**
   * @var bool
   */
  public $stitched;
  /**
   * @var string
   */
  public $stitchingSoftware;
  /**
   * @var string
   */
  public $timestamp;

  /**
   * @param VideoFileSphericalMetadataFOVBounds
   */
  public function setClampedOptimalFovBounds(VideoFileSphericalMetadataFOVBounds $clampedOptimalFovBounds)
  {
    $this->clampedOptimalFovBounds = $clampedOptimalFovBounds;
  }
  /**
   * @return VideoFileSphericalMetadataFOVBounds
   */
  public function getClampedOptimalFovBounds()
  {
    return $this->clampedOptimalFovBounds;
  }
  /**
   * @param VideoFileSphericalMetadataCubemapProjection
   */
  public function setCubemap(VideoFileSphericalMetadataCubemapProjection $cubemap)
  {
    $this->cubemap = $cubemap;
  }
  /**
   * @return VideoFileSphericalMetadataCubemapProjection
   */
  public function getCubemap()
  {
    return $this->cubemap;
  }
  /**
   * @param VideoFileSphericalMetadataCroppedArea
   */
  public function setDeprecatedCroppedArea(VideoFileSphericalMetadataCroppedArea $deprecatedCroppedArea)
  {
    $this->deprecatedCroppedArea = $deprecatedCroppedArea;
  }
  /**
   * @return VideoFileSphericalMetadataCroppedArea
   */
  public function getDeprecatedCroppedArea()
  {
    return $this->deprecatedCroppedArea;
  }
  /**
   * @param VideoFileSphericalMetadataViewDirection
   */
  public function setDeprecatedInitialView(VideoFileSphericalMetadataViewDirection $deprecatedInitialView)
  {
    $this->deprecatedInitialView = $deprecatedInitialView;
  }
  /**
   * @return VideoFileSphericalMetadataViewDirection
   */
  public function getDeprecatedInitialView()
  {
    return $this->deprecatedInitialView;
  }
  /**
   * @param VideoFileSphericalMetadataEquirectProjection
   */
  public function setEquirect(VideoFileSphericalMetadataEquirectProjection $equirect)
  {
    $this->equirect = $equirect;
  }
  /**
   * @return VideoFileSphericalMetadataEquirectProjection
   */
  public function getEquirect()
  {
    return $this->equirect;
  }
  /**
   * @param int
   */
  public function setFullPanoHeightPixels($fullPanoHeightPixels)
  {
    $this->fullPanoHeightPixels = $fullPanoHeightPixels;
  }
  /**
   * @return int
   */
  public function getFullPanoHeightPixels()
  {
    return $this->fullPanoHeightPixels;
  }
  /**
   * @param int
   */
  public function setFullPanoWidthPixels($fullPanoWidthPixels)
  {
    $this->fullPanoWidthPixels = $fullPanoWidthPixels;
  }
  /**
   * @return int
   */
  public function getFullPanoWidthPixels()
  {
    return $this->fullPanoWidthPixels;
  }
  /**
   * @param VideoFileSphericalMetadataMeshProjection
   */
  public function setMesh(VideoFileSphericalMetadataMeshProjection $mesh)
  {
    $this->mesh = $mesh;
  }
  /**
   * @return VideoFileSphericalMetadataMeshProjection
   */
  public function getMesh()
  {
    return $this->mesh;
  }
  /**
   * @param string
   */
  public function setMetadataSource($metadataSource)
  {
    $this->metadataSource = $metadataSource;
  }
  /**
   * @return string
   */
  public function getMetadataSource()
  {
    return $this->metadataSource;
  }
  /**
   * @param VideoFileSphericalMetadataFOVBounds
   */
  public function setOptimalFovBounds(VideoFileSphericalMetadataFOVBounds $optimalFovBounds)
  {
    $this->optimalFovBounds = $optimalFovBounds;
  }
  /**
   * @return VideoFileSphericalMetadataFOVBounds
   */
  public function getOptimalFovBounds()
  {
    return $this->optimalFovBounds;
  }
  /**
   * @param VideoFileSphericalMetadataPose
   */
  public function setPose(VideoFileSphericalMetadataPose $pose)
  {
    $this->pose = $pose;
  }
  /**
   * @return VideoFileSphericalMetadataPose
   */
  public function getPose()
  {
    return $this->pose;
  }
  /**
   * @param string
   */
  public function setProjectionType($projectionType)
  {
    $this->projectionType = $projectionType;
  }
  /**
   * @return string
   */
  public function getProjectionType()
  {
    return $this->projectionType;
  }
  /**
   * @param int
   */
  public function setSourceCount($sourceCount)
  {
    $this->sourceCount = $sourceCount;
  }
  /**
   * @return int
   */
  public function getSourceCount()
  {
    return $this->sourceCount;
  }
  /**
   * @param bool
   */
  public function setSpherical($spherical)
  {
    $this->spherical = $spherical;
  }
  /**
   * @return bool
   */
  public function getSpherical()
  {
    return $this->spherical;
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
   * @param bool
   */
  public function setStitched($stitched)
  {
    $this->stitched = $stitched;
  }
  /**
   * @return bool
   */
  public function getStitched()
  {
    return $this->stitched;
  }
  /**
   * @param string
   */
  public function setStitchingSoftware($stitchingSoftware)
  {
    $this->stitchingSoftware = $stitchingSoftware;
  }
  /**
   * @return string
   */
  public function getStitchingSoftware()
  {
    return $this->stitchingSoftware;
  }
  /**
   * @param string
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileSphericalMetadata::class, 'Google_Service_Contentwarehouse_VideoFileSphericalMetadata');
