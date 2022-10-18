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

class AssistantApiOutputRestrictions extends \Google\Model
{
  protected $accessControlOutputType = AssistantApiAccessControlOutput::class;
  protected $accessControlOutputDataType = '';
  /**
   * @var string
   */
  public $googlePhotoContent;
  protected $guestAccessOutputType = AssistantApiGuestAccessOutput::class;
  protected $guestAccessOutputDataType = '';
  /**
   * @var string
   */
  public $personalData;
  /**
   * @var string
   */
  public $proactiveNotificationOutput;
  protected $proactiveOutputType = AssistantApiProactiveOutput::class;
  protected $proactiveOutputDataType = '';
  /**
   * @var string
   */
  public $youtubeAutoplayRestriction;
  /**
   * @var string
   */
  public $youtubeContent;
  /**
   * @var string
   */
  public $youtubeTvContent;

  /**
   * @param AssistantApiAccessControlOutput
   */
  public function setAccessControlOutput(AssistantApiAccessControlOutput $accessControlOutput)
  {
    $this->accessControlOutput = $accessControlOutput;
  }
  /**
   * @return AssistantApiAccessControlOutput
   */
  public function getAccessControlOutput()
  {
    return $this->accessControlOutput;
  }
  /**
   * @param string
   */
  public function setGooglePhotoContent($googlePhotoContent)
  {
    $this->googlePhotoContent = $googlePhotoContent;
  }
  /**
   * @return string
   */
  public function getGooglePhotoContent()
  {
    return $this->googlePhotoContent;
  }
  /**
   * @param AssistantApiGuestAccessOutput
   */
  public function setGuestAccessOutput(AssistantApiGuestAccessOutput $guestAccessOutput)
  {
    $this->guestAccessOutput = $guestAccessOutput;
  }
  /**
   * @return AssistantApiGuestAccessOutput
   */
  public function getGuestAccessOutput()
  {
    return $this->guestAccessOutput;
  }
  /**
   * @param string
   */
  public function setPersonalData($personalData)
  {
    $this->personalData = $personalData;
  }
  /**
   * @return string
   */
  public function getPersonalData()
  {
    return $this->personalData;
  }
  /**
   * @param string
   */
  public function setProactiveNotificationOutput($proactiveNotificationOutput)
  {
    $this->proactiveNotificationOutput = $proactiveNotificationOutput;
  }
  /**
   * @return string
   */
  public function getProactiveNotificationOutput()
  {
    return $this->proactiveNotificationOutput;
  }
  /**
   * @param AssistantApiProactiveOutput
   */
  public function setProactiveOutput(AssistantApiProactiveOutput $proactiveOutput)
  {
    $this->proactiveOutput = $proactiveOutput;
  }
  /**
   * @return AssistantApiProactiveOutput
   */
  public function getProactiveOutput()
  {
    return $this->proactiveOutput;
  }
  /**
   * @param string
   */
  public function setYoutubeAutoplayRestriction($youtubeAutoplayRestriction)
  {
    $this->youtubeAutoplayRestriction = $youtubeAutoplayRestriction;
  }
  /**
   * @return string
   */
  public function getYoutubeAutoplayRestriction()
  {
    return $this->youtubeAutoplayRestriction;
  }
  /**
   * @param string
   */
  public function setYoutubeContent($youtubeContent)
  {
    $this->youtubeContent = $youtubeContent;
  }
  /**
   * @return string
   */
  public function getYoutubeContent()
  {
    return $this->youtubeContent;
  }
  /**
   * @param string
   */
  public function setYoutubeTvContent($youtubeTvContent)
  {
    $this->youtubeTvContent = $youtubeTvContent;
  }
  /**
   * @return string
   */
  public function getYoutubeTvContent()
  {
    return $this->youtubeTvContent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiOutputRestrictions::class, 'Google_Service_Contentwarehouse_AssistantApiOutputRestrictions');
