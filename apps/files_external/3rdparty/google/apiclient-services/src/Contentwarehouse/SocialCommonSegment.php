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

class SocialCommonSegment extends \Google\Model
{
  protected $formattingType = SocialCommonFormatting::class;
  protected $formattingDataType = '';
  protected $hashtagDataType = SocialCommonHashtagData::class;
  protected $hashtagDataDataType = '';
  protected $linkDataType = SocialCommonLinkData::class;
  protected $linkDataDataType = '';
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $type;
  protected $userMentionDataType = SocialCommonUserMentionData::class;
  protected $userMentionDataDataType = '';

  /**
   * @param SocialCommonFormatting
   */
  public function setFormatting(SocialCommonFormatting $formatting)
  {
    $this->formatting = $formatting;
  }
  /**
   * @return SocialCommonFormatting
   */
  public function getFormatting()
  {
    return $this->formatting;
  }
  /**
   * @param SocialCommonHashtagData
   */
  public function setHashtagData(SocialCommonHashtagData $hashtagData)
  {
    $this->hashtagData = $hashtagData;
  }
  /**
   * @return SocialCommonHashtagData
   */
  public function getHashtagData()
  {
    return $this->hashtagData;
  }
  /**
   * @param SocialCommonLinkData
   */
  public function setLinkData(SocialCommonLinkData $linkData)
  {
    $this->linkData = $linkData;
  }
  /**
   * @return SocialCommonLinkData
   */
  public function getLinkData()
  {
    return $this->linkData;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param SocialCommonUserMentionData
   */
  public function setUserMentionData(SocialCommonUserMentionData $userMentionData)
  {
    $this->userMentionData = $userMentionData;
  }
  /**
   * @return SocialCommonUserMentionData
   */
  public function getUserMentionData()
  {
    return $this->userMentionData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialCommonSegment::class, 'Google_Service_Contentwarehouse_SocialCommonSegment');
