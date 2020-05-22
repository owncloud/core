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

class Google_Service_YouTube_MembershipsLevelSnippet extends Google_Model
{
  public $creatorChannelId;
  protected $levelDetailsType = 'Google_Service_YouTube_LevelDetails';
  protected $levelDetailsDataType = '';

  public function setCreatorChannelId($creatorChannelId)
  {
    $this->creatorChannelId = $creatorChannelId;
  }
  public function getCreatorChannelId()
  {
    return $this->creatorChannelId;
  }
  /**
   * @param Google_Service_YouTube_LevelDetails
   */
  public function setLevelDetails(Google_Service_YouTube_LevelDetails $levelDetails)
  {
    $this->levelDetails = $levelDetails;
  }
  /**
   * @return Google_Service_YouTube_LevelDetails
   */
  public function getLevelDetails()
  {
    return $this->levelDetails;
  }
}
