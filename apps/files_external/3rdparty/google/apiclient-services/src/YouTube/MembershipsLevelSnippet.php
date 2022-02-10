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

namespace Google\Service\YouTube;

class MembershipsLevelSnippet extends \Google\Model
{
  /**
   * @var string
   */
  public $creatorChannelId;
  protected $levelDetailsType = LevelDetails::class;
  protected $levelDetailsDataType = '';

  /**
   * @param string
   */
  public function setCreatorChannelId($creatorChannelId)
  {
    $this->creatorChannelId = $creatorChannelId;
  }
  /**
   * @return string
   */
  public function getCreatorChannelId()
  {
    return $this->creatorChannelId;
  }
  /**
   * @param LevelDetails
   */
  public function setLevelDetails(LevelDetails $levelDetails)
  {
    $this->levelDetails = $levelDetails;
  }
  /**
   * @return LevelDetails
   */
  public function getLevelDetails()
  {
    return $this->levelDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MembershipsLevelSnippet::class, 'Google_Service_YouTube_MembershipsLevelSnippet');
