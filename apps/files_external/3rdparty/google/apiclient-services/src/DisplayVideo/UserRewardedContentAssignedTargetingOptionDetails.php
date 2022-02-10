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

namespace Google\Service\DisplayVideo;

class UserRewardedContentAssignedTargetingOptionDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $targetingOptionId;
  /**
   * @var string
   */
  public $userRewardedContent;

  /**
   * @param string
   */
  public function setTargetingOptionId($targetingOptionId)
  {
    $this->targetingOptionId = $targetingOptionId;
  }
  /**
   * @return string
   */
  public function getTargetingOptionId()
  {
    return $this->targetingOptionId;
  }
  /**
   * @param string
   */
  public function setUserRewardedContent($userRewardedContent)
  {
    $this->userRewardedContent = $userRewardedContent;
  }
  /**
   * @return string
   */
  public function getUserRewardedContent()
  {
    return $this->userRewardedContent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserRewardedContentAssignedTargetingOptionDetails::class, 'Google_Service_DisplayVideo_UserRewardedContentAssignedTargetingOptionDetails');
