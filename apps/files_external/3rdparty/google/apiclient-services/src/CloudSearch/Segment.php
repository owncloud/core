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

namespace Google\Service\CloudSearch;

class Segment extends \Google\Model
{
  protected $formattingType = Formatting::class;
  protected $formattingDataType = '';
  protected $hashtagDataType = HashtagData::class;
  protected $hashtagDataDataType = '';
  protected $linkDataType = LinkData::class;
  protected $linkDataDataType = '';
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $type;
  protected $userMentionDataType = UserMentionData::class;
  protected $userMentionDataDataType = '';

  /**
   * @param Formatting
   */
  public function setFormatting(Formatting $formatting)
  {
    $this->formatting = $formatting;
  }
  /**
   * @return Formatting
   */
  public function getFormatting()
  {
    return $this->formatting;
  }
  /**
   * @param HashtagData
   */
  public function setHashtagData(HashtagData $hashtagData)
  {
    $this->hashtagData = $hashtagData;
  }
  /**
   * @return HashtagData
   */
  public function getHashtagData()
  {
    return $this->hashtagData;
  }
  /**
   * @param LinkData
   */
  public function setLinkData(LinkData $linkData)
  {
    $this->linkData = $linkData;
  }
  /**
   * @return LinkData
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
   * @param UserMentionData
   */
  public function setUserMentionData(UserMentionData $userMentionData)
  {
    $this->userMentionData = $userMentionData;
  }
  /**
   * @return UserMentionData
   */
  public function getUserMentionData()
  {
    return $this->userMentionData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Segment::class, 'Google_Service_CloudSearch_Segment');
