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

class AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareData extends \Google\Model
{
  protected $diffDataType = AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareDataDiffData::class;
  protected $diffDataDataType = '';
  /**
   * @var string
   */
  public $highResUrl;
  /**
   * @var bool
   */
  public $inconsistentPhoto;
  /**
   * @var string
   */
  public $lowResData;
  /**
   * @var string
   */
  public $lowResUrl;
  /**
   * @var string
   */
  public $monogramUrl;
  /**
   * @var bool
   */
  public $privateLowResAcl;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareDataDiffData
   */
  public function setDiffData(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareDataDiffData $diffData)
  {
    $this->diffData = $diffData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareDataDiffData
   */
  public function getDiffData()
  {
    return $this->diffData;
  }
  /**
   * @param string
   */
  public function setHighResUrl($highResUrl)
  {
    $this->highResUrl = $highResUrl;
  }
  /**
   * @return string
   */
  public function getHighResUrl()
  {
    return $this->highResUrl;
  }
  /**
   * @param bool
   */
  public function setInconsistentPhoto($inconsistentPhoto)
  {
    $this->inconsistentPhoto = $inconsistentPhoto;
  }
  /**
   * @return bool
   */
  public function getInconsistentPhoto()
  {
    return $this->inconsistentPhoto;
  }
  /**
   * @param string
   */
  public function setLowResData($lowResData)
  {
    $this->lowResData = $lowResData;
  }
  /**
   * @return string
   */
  public function getLowResData()
  {
    return $this->lowResData;
  }
  /**
   * @param string
   */
  public function setLowResUrl($lowResUrl)
  {
    $this->lowResUrl = $lowResUrl;
  }
  /**
   * @return string
   */
  public function getLowResUrl()
  {
    return $this->lowResUrl;
  }
  /**
   * @param string
   */
  public function setMonogramUrl($monogramUrl)
  {
    $this->monogramUrl = $monogramUrl;
  }
  /**
   * @return string
   */
  public function getMonogramUrl()
  {
    return $this->monogramUrl;
  }
  /**
   * @param bool
   */
  public function setPrivateLowResAcl($privateLowResAcl)
  {
    $this->privateLowResAcl = $privateLowResAcl;
  }
  /**
   * @return bool
   */
  public function getPrivateLowResAcl()
  {
    return $this->privateLowResAcl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareData');
