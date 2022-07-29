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

namespace Google\Service\StreetViewPublish;

class PhotoSequence extends \Google\Collection
{
  protected $collection_key = 'rawGpsTimeline';
  /**
   * @var string
   */
  public $captureTimeOverride;
  public $distanceMeters;
  protected $failureDetailsType = ProcessingFailureDetails::class;
  protected $failureDetailsDataType = '';
  /**
   * @var string
   */
  public $failureReason;
  /**
   * @var string
   */
  public $filename;
  /**
   * @var string
   */
  public $gpsSource;
  /**
   * @var string
   */
  public $id;
  protected $imuType = Imu::class;
  protected $imuDataType = '';
  protected $photosType = Photo::class;
  protected $photosDataType = 'array';
  /**
   * @var string
   */
  public $processingState;
  protected $rawGpsTimelineType = Pose::class;
  protected $rawGpsTimelineDataType = 'array';
  protected $sequenceBoundsType = LatLngBounds::class;
  protected $sequenceBoundsDataType = '';
  protected $uploadReferenceType = UploadRef::class;
  protected $uploadReferenceDataType = '';
  /**
   * @var string
   */
  public $uploadTime;
  /**
   * @var string
   */
  public $viewCount;

  /**
   * @param string
   */
  public function setCaptureTimeOverride($captureTimeOverride)
  {
    $this->captureTimeOverride = $captureTimeOverride;
  }
  /**
   * @return string
   */
  public function getCaptureTimeOverride()
  {
    return $this->captureTimeOverride;
  }
  public function setDistanceMeters($distanceMeters)
  {
    $this->distanceMeters = $distanceMeters;
  }
  public function getDistanceMeters()
  {
    return $this->distanceMeters;
  }
  /**
   * @param ProcessingFailureDetails
   */
  public function setFailureDetails(ProcessingFailureDetails $failureDetails)
  {
    $this->failureDetails = $failureDetails;
  }
  /**
   * @return ProcessingFailureDetails
   */
  public function getFailureDetails()
  {
    return $this->failureDetails;
  }
  /**
   * @param string
   */
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  /**
   * @return string
   */
  public function getFailureReason()
  {
    return $this->failureReason;
  }
  /**
   * @param string
   */
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  /**
   * @return string
   */
  public function getFilename()
  {
    return $this->filename;
  }
  /**
   * @param string
   */
  public function setGpsSource($gpsSource)
  {
    $this->gpsSource = $gpsSource;
  }
  /**
   * @return string
   */
  public function getGpsSource()
  {
    return $this->gpsSource;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Imu
   */
  public function setImu(Imu $imu)
  {
    $this->imu = $imu;
  }
  /**
   * @return Imu
   */
  public function getImu()
  {
    return $this->imu;
  }
  /**
   * @param Photo[]
   */
  public function setPhotos($photos)
  {
    $this->photos = $photos;
  }
  /**
   * @return Photo[]
   */
  public function getPhotos()
  {
    return $this->photos;
  }
  /**
   * @param string
   */
  public function setProcessingState($processingState)
  {
    $this->processingState = $processingState;
  }
  /**
   * @return string
   */
  public function getProcessingState()
  {
    return $this->processingState;
  }
  /**
   * @param Pose[]
   */
  public function setRawGpsTimeline($rawGpsTimeline)
  {
    $this->rawGpsTimeline = $rawGpsTimeline;
  }
  /**
   * @return Pose[]
   */
  public function getRawGpsTimeline()
  {
    return $this->rawGpsTimeline;
  }
  /**
   * @param LatLngBounds
   */
  public function setSequenceBounds(LatLngBounds $sequenceBounds)
  {
    $this->sequenceBounds = $sequenceBounds;
  }
  /**
   * @return LatLngBounds
   */
  public function getSequenceBounds()
  {
    return $this->sequenceBounds;
  }
  /**
   * @param UploadRef
   */
  public function setUploadReference(UploadRef $uploadReference)
  {
    $this->uploadReference = $uploadReference;
  }
  /**
   * @return UploadRef
   */
  public function getUploadReference()
  {
    return $this->uploadReference;
  }
  /**
   * @param string
   */
  public function setUploadTime($uploadTime)
  {
    $this->uploadTime = $uploadTime;
  }
  /**
   * @return string
   */
  public function getUploadTime()
  {
    return $this->uploadTime;
  }
  /**
   * @param string
   */
  public function setViewCount($viewCount)
  {
    $this->viewCount = $viewCount;
  }
  /**
   * @return string
   */
  public function getViewCount()
  {
    return $this->viewCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotoSequence::class, 'Google_Service_StreetViewPublish_PhotoSequence');
