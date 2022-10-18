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

class VideoVideoClipInfo extends \Google\Collection
{
  protected $collection_key = 'metadata';
  /**
   * @var string
   */
  public $artist;
  /**
   * @var string
   */
  public $audioVendorId;
  /**
   * @var string
   */
  public $author;
  /**
   * @var string
   */
  public $comment;
  /**
   * @var string
   */
  public $commissioned;
  /**
   * @var string
   */
  public $copyright;
  /**
   * @var string
   */
  public $digitizationTime;
  /**
   * @var string
   */
  public $director;
  /**
   * @var string
   */
  public $engineer;
  protected $geolocationType = VideoVideoGeoLocation::class;
  protected $geolocationDataType = '';
  /**
   * @var string
   */
  public $info;
  /**
   * @var string
   */
  public $keywords;
  /**
   * @var string
   */
  public $make;
  /**
   * @var string
   */
  public $medium;
  protected $metadataType = VideoClipInfo::class;
  protected $metadataDataType = 'array';
  /**
   * @var string
   */
  public $model;
  /**
   * @var string
   */
  public $performer;
  /**
   * @var string
   */
  public $producer;
  /**
   * @var string
   */
  public $requirements;
  /**
   * @var string
   */
  public $software;
  /**
   * @var string
   */
  public $sourceProvider;
  /**
   * @var string
   */
  public $subject;
  /**
   * @var string
   */
  public $technician;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $videoVendorId;

  /**
   * @param string
   */
  public function setArtist($artist)
  {
    $this->artist = $artist;
  }
  /**
   * @return string
   */
  public function getArtist()
  {
    return $this->artist;
  }
  /**
   * @param string
   */
  public function setAudioVendorId($audioVendorId)
  {
    $this->audioVendorId = $audioVendorId;
  }
  /**
   * @return string
   */
  public function getAudioVendorId()
  {
    return $this->audioVendorId;
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
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param string
   */
  public function setCommissioned($commissioned)
  {
    $this->commissioned = $commissioned;
  }
  /**
   * @return string
   */
  public function getCommissioned()
  {
    return $this->commissioned;
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
  public function setDigitizationTime($digitizationTime)
  {
    $this->digitizationTime = $digitizationTime;
  }
  /**
   * @return string
   */
  public function getDigitizationTime()
  {
    return $this->digitizationTime;
  }
  /**
   * @param string
   */
  public function setDirector($director)
  {
    $this->director = $director;
  }
  /**
   * @return string
   */
  public function getDirector()
  {
    return $this->director;
  }
  /**
   * @param string
   */
  public function setEngineer($engineer)
  {
    $this->engineer = $engineer;
  }
  /**
   * @return string
   */
  public function getEngineer()
  {
    return $this->engineer;
  }
  /**
   * @param VideoVideoGeoLocation
   */
  public function setGeolocation(VideoVideoGeoLocation $geolocation)
  {
    $this->geolocation = $geolocation;
  }
  /**
   * @return VideoVideoGeoLocation
   */
  public function getGeolocation()
  {
    return $this->geolocation;
  }
  /**
   * @param string
   */
  public function setInfo($info)
  {
    $this->info = $info;
  }
  /**
   * @return string
   */
  public function getInfo()
  {
    return $this->info;
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
  /**
   * @param string
   */
  public function setMake($make)
  {
    $this->make = $make;
  }
  /**
   * @return string
   */
  public function getMake()
  {
    return $this->make;
  }
  /**
   * @param string
   */
  public function setMedium($medium)
  {
    $this->medium = $medium;
  }
  /**
   * @return string
   */
  public function getMedium()
  {
    return $this->medium;
  }
  /**
   * @param VideoClipInfo[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return VideoClipInfo[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param string
   */
  public function setPerformer($performer)
  {
    $this->performer = $performer;
  }
  /**
   * @return string
   */
  public function getPerformer()
  {
    return $this->performer;
  }
  /**
   * @param string
   */
  public function setProducer($producer)
  {
    $this->producer = $producer;
  }
  /**
   * @return string
   */
  public function getProducer()
  {
    return $this->producer;
  }
  /**
   * @param string
   */
  public function setRequirements($requirements)
  {
    $this->requirements = $requirements;
  }
  /**
   * @return string
   */
  public function getRequirements()
  {
    return $this->requirements;
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
  public function setSourceProvider($sourceProvider)
  {
    $this->sourceProvider = $sourceProvider;
  }
  /**
   * @return string
   */
  public function getSourceProvider()
  {
    return $this->sourceProvider;
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
   * @param string
   */
  public function setTechnician($technician)
  {
    $this->technician = $technician;
  }
  /**
   * @return string
   */
  public function getTechnician()
  {
    return $this->technician;
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
   * @param string
   */
  public function setVideoVendorId($videoVendorId)
  {
    $this->videoVendorId = $videoVendorId;
  }
  /**
   * @return string
   */
  public function getVideoVendorId()
  {
    return $this->videoVendorId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoVideoClipInfo::class, 'Google_Service_Contentwarehouse_VideoVideoClipInfo');
