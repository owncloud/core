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

namespace Google\Service\YouTubeReporting;

class GdataDiffUploadRequest extends \Google\Model
{
  protected $checksumsInfoType = GdataCompositeMedia::class;
  protected $checksumsInfoDataType = '';
  protected $objectInfoType = GdataCompositeMedia::class;
  protected $objectInfoDataType = '';
  /**
   * @var string
   */
  public $objectVersion;

  /**
   * @param GdataCompositeMedia
   */
  public function setChecksumsInfo(GdataCompositeMedia $checksumsInfo)
  {
    $this->checksumsInfo = $checksumsInfo;
  }
  /**
   * @return GdataCompositeMedia
   */
  public function getChecksumsInfo()
  {
    return $this->checksumsInfo;
  }
  /**
   * @param GdataCompositeMedia
   */
  public function setObjectInfo(GdataCompositeMedia $objectInfo)
  {
    $this->objectInfo = $objectInfo;
  }
  /**
   * @return GdataCompositeMedia
   */
  public function getObjectInfo()
  {
    return $this->objectInfo;
  }
  /**
   * @param string
   */
  public function setObjectVersion($objectVersion)
  {
    $this->objectVersion = $objectVersion;
  }
  /**
   * @return string
   */
  public function getObjectVersion()
  {
    return $this->objectVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GdataDiffUploadRequest::class, 'Google_Service_YouTubeReporting_GdataDiffUploadRequest');
