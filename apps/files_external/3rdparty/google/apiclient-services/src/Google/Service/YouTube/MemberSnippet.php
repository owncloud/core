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

class Google_Service_YouTube_MemberSnippet extends Google_Model
{
  public $creatorChannelId;
  protected $memberDetailsType = 'Google_Service_YouTube_ChannelProfileDetails';
  protected $memberDetailsDataType = '';
  protected $membershipsDetailsType = 'Google_Service_YouTube_MembershipsDetails';
  protected $membershipsDetailsDataType = '';

  public function setCreatorChannelId($creatorChannelId)
  {
    $this->creatorChannelId = $creatorChannelId;
  }
  public function getCreatorChannelId()
  {
    return $this->creatorChannelId;
  }
  /**
   * @param Google_Service_YouTube_ChannelProfileDetails
   */
  public function setMemberDetails(Google_Service_YouTube_ChannelProfileDetails $memberDetails)
  {
    $this->memberDetails = $memberDetails;
  }
  /**
   * @return Google_Service_YouTube_ChannelProfileDetails
   */
  public function getMemberDetails()
  {
    return $this->memberDetails;
  }
  /**
   * @param Google_Service_YouTube_MembershipsDetails
   */
  public function setMembershipsDetails(Google_Service_YouTube_MembershipsDetails $membershipsDetails)
  {
    $this->membershipsDetails = $membershipsDetails;
  }
  /**
   * @return Google_Service_YouTube_MembershipsDetails
   */
  public function getMembershipsDetails()
  {
    return $this->membershipsDetails;
  }
}
