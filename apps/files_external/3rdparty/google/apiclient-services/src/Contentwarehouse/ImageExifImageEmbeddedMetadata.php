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

class ImageExifImageEmbeddedMetadata extends \Google\Model
{
  public $altitude;
  /**
   * @var float
   */
  public $aperture;
  /**
   * @var string
   */
  public $author;
  /**
   * @var string
   */
  public $author2;
  /**
   * @var float
   */
  public $brightness;
  /**
   * @var string
   */
  public $cameraMaker;
  /**
   * @var string
   */
  public $cameraModel;
  /**
   * @var string
   */
  public $cameraSerialNumber;
  /**
   * @var string
   */
  public $captureTime;
  /**
   * @var int
   */
  public $colorSpace;
  /**
   * @var string
   */
  public $comments;
  /**
   * @var string
   */
  public $comments2;
  /**
   * @var bool
   */
  public $continousDriveMode;
  /**
   * @var string
   */
  public $copyright;
  /**
   * @var string
   */
  public $deprecatedCity;
  /**
   * @var string
   */
  public $deprecatedCountry;
  /**
   * @var string
   */
  public $deprecatedState;
  /**
   * @var string
   */
  public $description;
  public $destBearing;
  public $destBearingRef;
  public $destDistance;
  public $destLatitude;
  public $destLongitude;
  /**
   * @var float
   */
  public $digitalZoomRatio;
  /**
   * @var float
   */
  public $exposureBias;
  /**
   * @var int
   */
  public $exposureProgram;
  /**
   * @var float
   */
  public $exposureTime;
  /**
   * @var bool
   */
  public $flashUsed;
  /**
   * @var float
   */
  public $focalLength;
  /**
   * @var float
   */
  public $focalLength35mm;
  /**
   * @var int
   */
  public $focalPlaneResUnit;
  /**
   * @var float
   */
  public $focalPlaneXres;
  /**
   * @var string
   */
  public $focusMode;
  public $gpsDop;
  /**
   * @var string
   */
  public $gpsMeasureMode;
  /**
   * @var string
   */
  public $gpsStatus;
  public $hPositioningError;
  /**
   * @var int
   */
  public $imageHeight;
  /**
   * @var int
   */
  public $imageWidth;
  public $imgDirection;
  /**
   * @var string
   */
  public $imgDirectionRef;
  protected $iptcType = ImageExifIPTCMetadata::class;
  protected $iptcDataType = '';
  /**
   * @var int
   */
  public $iso;
  /**
   * @var string
   */
  public $keywords;
  public $latitude;
  /**
   * @var string
   */
  public $lensId;
  /**
   * @var string
   */
  public $lensMaker;
  /**
   * @var int
   */
  public $lightSource;
  /**
   * @var int
   */
  public $longFocal;
  public $longitude;
  /**
   * @var float
   */
  public $maxApertureAtLongFocal;
  /**
   * @var float
   */
  public $maxApertureAtShortFocal;
  /**
   * @var int
   */
  public $meteringMode;
  /**
   * @var string
   */
  public $modificationTime;
  /**
   * @var string
   */
  public $orientation;
  /**
   * @var int
   */
  public $shortFocal;
  /**
   * @var string
   */
  public $software;
  /**
   * @var string
   */
  public $subject;
  /**
   * @var float
   */
  public $subjectDistance;
  /**
   * @var int
   */
  public $subjectLocationX;
  /**
   * @var int
   */
  public $subjectLocationY;
  /**
   * @var string
   */
  public $title;
  /**
   * @var float
   */
  public $xResolution;
  /**
   * @var float
   */
  public $yResolution;

  public function setAltitude($altitude)
  {
    $this->altitude = $altitude;
  }
  public function getAltitude()
  {
    return $this->altitude;
  }
  /**
   * @param float
   */
  public function setAperture($aperture)
  {
    $this->aperture = $aperture;
  }
  /**
   * @return float
   */
  public function getAperture()
  {
    return $this->aperture;
  }
  /**
   * @param string
   */
  public function setAuthor($author)
  {
    $this->author = $author;
  }
  /**
   * @return string
   */
  public function getAuthor()
  {
    return $this->author;
  }
  /**
   * @param string
   */
  public function setAuthor2($author2)
  {
    $this->author2 = $author2;
  }
  /**
   * @return string
   */
  public function getAuthor2()
  {
    return $this->author2;
  }
  /**
   * @param float
   */
  public function setBrightness($brightness)
  {
    $this->brightness = $brightness;
  }
  /**
   * @return float
   */
  public function getBrightness()
  {
    return $this->brightness;
  }
  /**
   * @param string
   */
  public function setCameraMaker($cameraMaker)
  {
    $this->cameraMaker = $cameraMaker;
  }
  /**
   * @return string
   */
  public function getCameraMaker()
  {
    return $this->cameraMaker;
  }
  /**
   * @param string
   */
  public function setCameraModel($cameraModel)
  {
    $this->cameraModel = $cameraModel;
  }
  /**
   * @return string
   */
  public function getCameraModel()
  {
    return $this->cameraModel;
  }
  /**
   * @param string
   */
  public function setCameraSerialNumber($cameraSerialNumber)
  {
    $this->cameraSerialNumber = $cameraSerialNumber;
  }
  /**
   * @return string
   */
  public function getCameraSerialNumber()
  {
    return $this->cameraSerialNumber;
  }
  /**
   * @param string
   */
  public function setCaptureTime($captureTime)
  {
    $this->captureTime = $captureTime;
  }
  /**
   * @return string
   */
  public function getCaptureTime()
  {
    return $this->captureTime;
  }
  /**
   * @param int
   */
  public function setColorSpace($colorSpace)
  {
    $this->colorSpace = $colorSpace;
  }
  /**
   * @return int
   */
  public function getColorSpace()
  {
    return $this->colorSpace;
  }
  /**
   * @param string
   */
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  /**
   * @return string
   */
  public function getComments()
  {
    return $this->comments;
  }
  /**
   * @param string
   */
  public function setComments2($comments2)
  {
    $this->comments2 = $comments2;
  }
  /**
   * @return string
   */
  public function getComments2()
  {
    return $this->comments2;
  }
  /**
   * @param bool
   */
  public function setContinousDriveMode($continousDriveMode)
  {
    $this->continousDriveMode = $continousDriveMode;
  }
  /**
   * @return bool
   */
  public function getContinousDriveMode()
  {
    return $this->continousDriveMode;
  }
  /**
   * @param string
   */
  public function setCopyright($copyright)
  {
    $this->copyright = $copyright;
  }
  /**
   * @return string
   */
  public function getCopyright()
  {
    return $this->copyright;
  }
  /**
   * @param string
   */
  public function setDeprecatedCity($deprecatedCity)
  {
    $this->deprecatedCity = $deprecatedCity;
  }
  /**
   * @return string
   */
  public function getDeprecatedCity()
  {
    return $this->deprecatedCity;
  }
  /**
   * @param string
   */
  public function setDeprecatedCountry($deprecatedCountry)
  {
    $this->deprecatedCountry = $deprecatedCountry;
  }
  /**
   * @return string
   */
  public function getDeprecatedCountry()
  {
    return $this->deprecatedCountry;
  }
  /**
   * @param string
   */
  public function setDeprecatedState($deprecatedState)
  {
    $this->deprecatedState = $deprecatedState;
  }
  /**
   * @return string
   */
  public function getDeprecatedState()
  {
    return $this->deprecatedState;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  public function setDestBearing($destBearing)
  {
    $this->destBearing = $destBearing;
  }
  public function getDestBearing()
  {
    return $this->destBearing;
  }
  public function setDestBearingRef($destBearingRef)
  {
    $this->destBearingRef = $destBearingRef;
  }
  public function getDestBearingRef()
  {
    return $this->destBearingRef;
  }
  public function setDestDistance($destDistance)
  {
    $this->destDistance = $destDistance;
  }
  public function getDestDistance()
  {
    return $this->destDistance;
  }
  public function setDestLatitude($destLatitude)
  {
    $this->destLatitude = $destLatitude;
  }
  public function getDestLatitude()
  {
    return $this->destLatitude;
  }
  public function setDestLongitude($destLongitude)
  {
    $this->destLongitude = $destLongitude;
  }
  public function getDestLongitude()
  {
    return $this->destLongitude;
  }
  /**
   * @param float
   */
  public function setDigitalZoomRatio($digitalZoomRatio)
  {
    $this->digitalZoomRatio = $digitalZoomRatio;
  }
  /**
   * @return float
   */
  public function getDigitalZoomRatio()
  {
    return $this->digitalZoomRatio;
  }
  /**
   * @param float
   */
  public function setExposureBias($exposureBias)
  {
    $this->exposureBias = $exposureBias;
  }
  /**
   * @return float
   */
  public function getExposureBias()
  {
    return $this->exposureBias;
  }
  /**
   * @param int
   */
  public function setExposureProgram($exposureProgram)
  {
    $this->exposureProgram = $exposureProgram;
  }
  /**
   * @return int
   */
  public function getExposureProgram()
  {
    return $this->exposureProgram;
  }
  /**
   * @param float
   */
  public function setExposureTime($exposureTime)
  {
    $this->exposureTime = $exposureTime;
  }
  /**
   * @return float
   */
  public function getExposureTime()
  {
    return $this->exposureTime;
  }
  /**
   * @param bool
   */
  public function setFlashUsed($flashUsed)
  {
    $this->flashUsed = $flashUsed;
  }
  /**
   * @return bool
   */
  public function getFlashUsed()
  {
    return $this->flashUsed;
  }
  /**
   * @param float
   */
  public function setFocalLength($focalLength)
  {
    $this->focalLength = $focalLength;
  }
  /**
   * @return float
   */
  public function getFocalLength()
  {
    return $this->focalLength;
  }
  /**
   * @param float
   */
  public function setFocalLength35mm($focalLength35mm)
  {
    $this->focalLength35mm = $focalLength35mm;
  }
  /**
   * @return float
   */
  public function getFocalLength35mm()
  {
    return $this->focalLength35mm;
  }
  /**
   * @param int
   */
  public function setFocalPlaneResUnit($focalPlaneResUnit)
  {
    $this->focalPlaneResUnit = $focalPlaneResUnit;
  }
  /**
   * @return int
   */
  public function getFocalPlaneResUnit()
  {
    return $this->focalPlaneResUnit;
  }
  /**
   * @param float
   */
  public function setFocalPlaneXres($focalPlaneXres)
  {
    $this->focalPlaneXres = $focalPlaneXres;
  }
  /**
   * @return float
   */
  public function getFocalPlaneXres()
  {
    return $this->focalPlaneXres;
  }
  /**
   * @param string
   */
  public function setFocusMode($focusMode)
  {
    $this->focusMode = $focusMode;
  }
  /**
   * @return string
   */
  public function getFocusMode()
  {
    return $this->focusMode;
  }
  public function setGpsDop($gpsDop)
  {
    $this->gpsDop = $gpsDop;
  }
  public function getGpsDop()
  {
    return $this->gpsDop;
  }
  /**
   * @param string
   */
  public function setGpsMeasureMode($gpsMeasureMode)
  {
    $this->gpsMeasureMode = $gpsMeasureMode;
  }
  /**
   * @return string
   */
  public function getGpsMeasureMode()
  {
    return $this->gpsMeasureMode;
  }
  /**
   * @param string
   */
  public function setGpsStatus($gpsStatus)
  {
    $this->gpsStatus = $gpsStatus;
  }
  /**
   * @return string
   */
  public function getGpsStatus()
  {
    return $this->gpsStatus;
  }
  public function setHPositioningError($hPositioningError)
  {
    $this->hPositioningError = $hPositioningError;
  }
  public function getHPositioningError()
  {
    return $this->hPositioningError;
  }
  /**
   * @param int
   */
  public function setImageHeight($imageHeight)
  {
    $this->imageHeight = $imageHeight;
  }
  /**
   * @return int
   */
  public function getImageHeight()
  {
    return $this->imageHeight;
  }
  /**
   * @param int
   */
  public function setImageWidth($imageWidth)
  {
    $this->imageWidth = $imageWidth;
  }
  /**
   * @return int
   */
  public function getImageWidth()
  {
    return $this->imageWidth;
  }
  public function setImgDirection($imgDirection)
  {
    $this->imgDirection = $imgDirection;
  }
  public function getImgDirection()
  {
    return $this->imgDirection;
  }
  /**
   * @param string
   */
  public function setImgDirectionRef($imgDirectionRef)
  {
    $this->imgDirectionRef = $imgDirectionRef;
  }
  /**
   * @return string
   */
  public function getImgDirectionRef()
  {
    return $this->imgDirectionRef;
  }
  /**
   * @param ImageExifIPTCMetadata
   */
  public function setIptc(ImageExifIPTCMetadata $iptc)
  {
    $this->iptc = $iptc;
  }
  /**
   * @return ImageExifIPTCMetadata
   */
  public function getIptc()
  {
    return $this->iptc;
  }
  /**
   * @param int
   */
  public function setIso($iso)
  {
    $this->iso = $iso;
  }
  /**
   * @return int
   */
  public function getIso()
  {
    return $this->iso;
  }
  /**
   * @param string
   */
  public function setKeywords($keywords)
  {
    $this->keywords = $keywords;
  }
  /**
   * @return string
   */
  public function getKeywords()
  {
    return $this->keywords;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  /**
   * @param string
   */
  public function setLensId($lensId)
  {
    $this->lensId = $lensId;
  }
  /**
   * @return string
   */
  public function getLensId()
  {
    return $this->lensId;
  }
  /**
   * @param string
   */
  public function setLensMaker($lensMaker)
  {
    $this->lensMaker = $lensMaker;
  }
  /**
   * @return string
   */
  public function getLensMaker()
  {
    return $this->lensMaker;
  }
  /**
   * @param int
   */
  public function setLightSource($lightSource)
  {
    $this->lightSource = $lightSource;
  }
  /**
   * @return int
   */
  public function getLightSource()
  {
    return $this->lightSource;
  }
  /**
   * @param int
   */
  public function setLongFocal($longFocal)
  {
    $this->longFocal = $longFocal;
  }
  /**
   * @return int
   */
  public function getLongFocal()
  {
    return $this->longFocal;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
  /**
   * @param float
   */
  public function setMaxApertureAtLongFocal($maxApertureAtLongFocal)
  {
    $this->maxApertureAtLongFocal = $maxApertureAtLongFocal;
  }
  /**
   * @return float
   */
  public function getMaxApertureAtLongFocal()
  {
    return $this->maxApertureAtLongFocal;
  }
  /**
   * @param float
   */
  public function setMaxApertureAtShortFocal($maxApertureAtShortFocal)
  {
    $this->maxApertureAtShortFocal = $maxApertureAtShortFocal;
  }
  /**
   * @return float
   */
  public function getMaxApertureAtShortFocal()
  {
    return $this->maxApertureAtShortFocal;
  }
  /**
   * @param int
   */
  public function setMeteringMode($meteringMode)
  {
    $this->meteringMode = $meteringMode;
  }
  /**
   * @return int
   */
  public function getMeteringMode()
  {
    return $this->meteringMode;
  }
  /**
   * @param string
   */
  public function setModificationTime($modificationTime)
  {
    $this->modificationTime = $modificationTime;
  }
  /**
   * @return string
   */
  public function getModificationTime()
  {
    return $this->modificationTime;
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
   * @param int
   */
  public function setShortFocal($shortFocal)
  {
    $this->shortFocal = $shortFocal;
  }
  /**
   * @return int
   */
  public function getShortFocal()
  {
    return $this->shortFocal;
  }
  /**
   * @param string
   */
  public function setSoftware($software)
  {
    $this->software = $software;
  }
  /**
   * @return string
   */
  public function getSoftware()
  {
    return $this->software;
  }
  /**
   * @param string
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return string
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param float
   */
  public function setSubjectDistance($subjectDistance)
  {
    $this->subjectDistance = $subjectDistance;
  }
  /**
   * @return float
   */
  public function getSubjectDistance()
  {
    return $this->subjectDistance;
  }
  /**
   * @param int
   */
  public function setSubjectLocationX($subjectLocationX)
  {
    $this->subjectLocationX = $subjectLocationX;
  }
  /**
   * @return int
   */
  public function getSubjectLocationX()
  {
    return $this->subjectLocationX;
  }
  /**
   * @param int
   */
  public function setSubjectLocationY($subjectLocationY)
  {
    $this->subjectLocationY = $subjectLocationY;
  }
  /**
   * @return int
   */
  public function getSubjectLocationY()
  {
    return $this->subjectLocationY;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param float
   */
  public function setXResolution($xResolution)
  {
    $this->xResolution = $xResolution;
  }
  /**
   * @return float
   */
  public function getXResolution()
  {
    return $this->xResolution;
  }
  /**
   * @param float
   */
  public function setYResolution($yResolution)
  {
    $this->yResolution = $yResolution;
  }
  /**
   * @return float
   */
  public function getYResolution()
  {
    return $this->yResolution;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageExifImageEmbeddedMetadata::class, 'Google_Service_Contentwarehouse_ImageExifImageEmbeddedMetadata');
