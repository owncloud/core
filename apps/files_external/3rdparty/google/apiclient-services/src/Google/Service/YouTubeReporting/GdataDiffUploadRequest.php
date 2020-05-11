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

class Google_Service_YouTubeReporting_GdataDiffUploadRequest extends Google_Model
{
  protected $checksumsInfoType = 'Google_Service_YouTubeReporting_GdataCompositeMedia';
  protected $checksumsInfoDataType = '';
  protected $objectInfoType = 'Google_Service_YouTubeReporting_GdataCompositeMedia';
  protected $objectInfoDataType = '';
  public $objectVersion;

  /**
   * @param Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function setChecksumsInfo(Google_Service_YouTubeReporting_GdataCompositeMedia $checksumsInfo)
  {
    $this->checksumsInfo = $checksumsInfo;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function getChecksumsInfo()
  {
    return $this->checksumsInfo;
  }
  /**
   * @param Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function setObjectInfo(Google_Service_YouTubeReporting_GdataCompositeMedia $objectInfo)
  {
    $this->objectInfo = $objectInfo;
  }
  /**
   * @return Google_Service_YouTubeReporting_GdataCompositeMedia
   */
  public function getObjectInfo()
  {
    return $this->objectInfo;
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
