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

class IndexingMobileInterstitialsProtoDesktopInterstitialsDetails extends \Google\Model
{
  protected $basicInfoType = IndexingMobileInterstitialsProtoInterstitialBasicInfo::class;
  protected $basicInfoDataType = '';
  /**
   * @var bool
   */
  public $isSmearedSignal;

  /**
   * @param IndexingMobileInterstitialsProtoInterstitialBasicInfo
   */
  public function setBasicInfo(IndexingMobileInterstitialsProtoInterstitialBasicInfo $basicInfo)
  {
    $this->basicInfo = $basicInfo;
  }
  /**
   * @return IndexingMobileInterstitialsProtoInterstitialBasicInfo
   */
  public function getBasicInfo()
  {
    return $this->basicInfo;
  }
  /**
   * @param bool
   */
  public function setIsSmearedSignal($isSmearedSignal)
  {
    $this->isSmearedSignal = $isSmearedSignal;
  }
  /**
   * @return bool
   */
  public function getIsSmearedSignal()
  {
    return $this->isSmearedSignal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingMobileInterstitialsProtoDesktopInterstitialsDetails::class, 'Google_Service_Contentwarehouse_IndexingMobileInterstitialsProtoDesktopInterstitialsDetails');
