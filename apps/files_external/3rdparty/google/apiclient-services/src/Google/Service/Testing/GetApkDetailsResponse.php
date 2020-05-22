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

class Google_Service_Testing_GetApkDetailsResponse extends Google_Model
{
  protected $apkDetailType = 'Google_Service_Testing_ApkDetail';
  protected $apkDetailDataType = '';

  /**
   * @param Google_Service_Testing_ApkDetail
   */
  public function setApkDetail(Google_Service_Testing_ApkDetail $apkDetail)
  {
    $this->apkDetail = $apkDetail;
  }
  /**
   * @return Google_Service_Testing_ApkDetail
   */
  public function getApkDetail()
  {
    return $this->apkDetail;
  }
}
