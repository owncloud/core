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

class Google_Service_YouTubeReporting_GdataDiffChecksumsResponse extends Google_Model
{
  protected $checksumsLocationType = 'Google_Service_YouTubeReporting_GdataCompositeMedia';
  protected $checksumsLocationDataType = '';
  public $chunkSizeBytes;
  protected $objectLocationType = 'Google_Service_YouTubeReporting_GdataCompositeMedia';
  protected $objectLocationDataType = '';
  public $objectSizeBytes;
  public $objectVersion;

  /**
   * @param Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function setChecksumsLocation(Google_Service_YouTubeReporting_GdataCompositeMedia $checksumsLocation)
  {
    $this->checksumsLocation = $checksumsLocation;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function getChecksumsLocation()
  {
    return $this->checksumsLocation;
  }
  public function setChunkSizeBytes($chunkSizeBytes)
  {
    $this->chunkSizeBytes = $chunkSizeBytes;
  }
  public function getChunkSizeBytes()
  {
    return $this->chunkSizeBytes;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function setObjectLocation(Google_Service_YouTubeReporting_GdataCompositeMedia $objectLocation)
  {
    $this->objectLocation = $objectLocation;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function getObjectLocation()
  {
    return $this->objectLocation;
  }
  public function setObjectSizeBytes($objectSizeBytes)
  {
    $this->objectSizeBytes = $objectSizeBytes;
  }
  public function getObjectSizeBytes()
  {
    return $this->objectSizeBytes;
  }
  public function setObjectVersion($objectVersion)
  {
    $this->objectVersion = $objectVersion;
  }
  public function getObjectVersion()
  {
    return $this->objectVersion;
  }
}
