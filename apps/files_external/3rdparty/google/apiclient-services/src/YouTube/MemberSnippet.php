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

class MemberSnippet extends \Google\Model
{
  /**
   * @var string
   */
  public $creatorChannelId;
  protected $memberDetailsType = ChannelProfileDetails::class;
  protected $memberDetailsDataType = '';
  protected $membershipsDetailsType = MembershipsDetails::class;
  protected $membershipsDetailsDataType = '';

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
   * @param ChannelProfileDetails
   */
  public function setMemberDetails(ChannelProfileDetails $memberDetails)
  {
    $this->memberDetails = $memberDetails;
  }
  /**
   * @return ChannelProfileDetails
   */
  public function getMemberDetails()
  {
    return $this->memberDetails;
  }
  /**
   * @param MembershipsDetails
   */
  public function setMembershipsDetails(MembershipsDetails $membershipsDetails)
  {
    $this->membershipsDetails = $membershipsDetails;
  }
  /**
   * @return MembershipsDetails
   */
  public function getMembershipsDetails()
  {
    return $this->membershipsDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MemberSnippet::class, 'Google_Service_YouTube_MemberSnippet');
