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

class AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedData extends \Google\Model
{
  protected $nameDisplayOptionsType = AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataNameDisplayOptions::class;
  protected $nameDisplayOptionsDataType = '';
  protected $photosCompareDataType = AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareData::class;
  protected $photosCompareDataDataType = '';
  protected $profileEditabilityType = AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileEditability::class;
  protected $profileEditabilityDataType = '';
  protected $profileNameModificationHistoryType = AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileNameModificationHistory::class;
  protected $profileNameModificationHistoryDataType = '';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataNameDisplayOptions
   */
  public function setNameDisplayOptions(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataNameDisplayOptions $nameDisplayOptions)
  {
    $this->nameDisplayOptions = $nameDisplayOptions;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataNameDisplayOptions
   */
  public function getNameDisplayOptions()
  {
    return $this->nameDisplayOptions;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareData
   */
  public function setPhotosCompareData(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareData $photosCompareData)
  {
    $this->photosCompareData = $photosCompareData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataPhotosCompareData
   */
  public function getPhotosCompareData()
  {
    return $this->photosCompareData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileEditability
   */
  public function setProfileEditability(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileEditability $profileEditability)
  {
    $this->profileEditability = $profileEditability;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileEditability
   */
  public function getProfileEditability()
  {
    return $this->profileEditability;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileNameModificationHistory
   */
  public function setProfileNameModificationHistory(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileNameModificationHistory $profileNameModificationHistory)
  {
    $this->profileNameModificationHistory = $profileNameModificationHistory;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedDataProfileNameModificationHistory
   */
  public function getProfileNameModificationHistory()
  {
    return $this->profileNameModificationHistory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiAboutMeExtendedData');
