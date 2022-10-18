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

class AppsPeopleOzExternalMergedpeopleapiMapsExtendedData extends \Google\Collection
{
  protected $collection_key = 'topicExpertise';
  protected $failureType = AppsPeopleOzExternalMergedpeopleapiProductProfileFailure::class;
  protected $failureDataType = '';
  /**
   * @var string
   */
  public $followeeCount;
  /**
   * @var int
   */
  public $followerCount;
  /**
   * @var string
   */
  public $numContributions;
  /**
   * @var string
   */
  public $profilePhotoUrl;
  /**
   * @var string
   */
  public $tagline;
  /**
   * @var string[]
   */
  public $topicExpertise;
  /**
   * @var string
   */
  public $userCaption;

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
  /**
   * @param string
   */
  public function setFolloweeCount($followeeCount)
  {
    $this->followeeCount = $followeeCount;
  }
  /**
   * @return string
   */
  public function getFolloweeCount()
  {
    return $this->followeeCount;
  }
  /**
   * @param int
   */
  public function setFollowerCount($followerCount)
  {
    $this->followerCount = $followerCount;
  }
  /**
   * @return int
   */
  public function getFollowerCount()
  {
    return $this->followerCount;
  }
  /**
   * @param string
   */
  public function setNumContributions($numContributions)
  {
    $this->numContributions = $numContributions;
  }
  /**
   * @return string
   */
  public function getNumContributions()
  {
    return $this->numContributions;
  }
  /**
   * @param string
   */
  public function setProfilePhotoUrl($profilePhotoUrl)
  {
    $this->profilePhotoUrl = $profilePhotoUrl;
  }
  /**
   * @return string
   */
  public function getProfilePhotoUrl()
  {
    return $this->profilePhotoUrl;
  }
  /**
   * @param string
   */
  public function setTagline($tagline)
  {
    $this->tagline = $tagline;
  }
  /**
   * @return string
   */
  public function getTagline()
  {
    return $this->tagline;
  }
  /**
   * @param string[]
   */
  public function setTopicExpertise($topicExpertise)
  {
    $this->topicExpertise = $topicExpertise;
  }
  /**
   * @return string[]
   */
  public function getTopicExpertise()
  {
    return $this->topicExpertise;
  }
  /**
   * @param string
   */
  public function setUserCaption($userCaption)
  {
    $this->userCaption = $userCaption;
  }
  /**
   * @return string
   */
  public function getUserCaption()
  {
    return $this->userCaption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiMapsExtendedData::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiMapsExtendedData');
