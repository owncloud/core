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

class AppsPeopleOzExternalMergedpeopleapiYoutubeExtendedData extends \Google\Collection
{
  protected $collection_key = 'channelData';
  protected $channelDataType = AppsPeopleOzExternalMergedpeopleapiChannelData::class;
  protected $channelDataDataType = 'array';
  protected $failureType = AppsPeopleOzExternalMergedpeopleapiProductProfileFailure::class;
  protected $failureDataType = '';

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiChannelData[]
   */
  public function setChannelData($channelData)
  {
    $this->channelData = $channelData;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiChannelData[]
   */
  public function getChannelData()
  {
    return $this->channelData;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiProductProfileFailure
   */
  public function setFailure(AppsPeopleOzExternalMergedpeopleapiProductProfileFailure $failure)
  {
    $this->failure = $failure;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiProductProfileFailure
   */
  public function getFailure()
  {
    return $this->failure;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiYoutubeExtendedData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiYoutubeExtendedData');
