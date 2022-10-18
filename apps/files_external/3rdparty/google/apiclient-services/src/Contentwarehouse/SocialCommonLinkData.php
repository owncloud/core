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

class SocialCommonLinkData extends \Google\Model
{
  protected $attachmentType = SocialCommonAttachmentAttachment::class;
  protected $attachmentDataType = '';
  /**
   * @var string
   */
  public $attachmentRenderHint;
  /**
   * @var string
   */
  public $displayUrl;
  /**
   * @var string
   */
  public $linkTarget;
  /**
   * @var string
   */
  public $linkType;
  /**
   * @var string
   */
  public $title;

  /**
   * @param SocialCommonAttachmentAttachment
   */
  public function setAttachment(SocialCommonAttachmentAttachment $attachment)
  {
    $this->attachment = $attachment;
  }
  /**
   * @return SocialCommonAttachmentAttachment
   */
  public function getAttachment()
  {
    return $this->attachment;
  }
  /**
   * @param string
   */
  public function setAttachmentRenderHint($attachmentRenderHint)
  {
    $this->attachmentRenderHint = $attachmentRenderHint;
  }
  /**
   * @return string
   */
  public function getAttachmentRenderHint()
  {
    return $this->attachmentRenderHint;
  }
  /**
   * @param string
   */
  public function setDisplayUrl($displayUrl)
  {
    $this->displayUrl = $displayUrl;
  }
  /**
   * @return string
   */
  public function getDisplayUrl()
  {
    return $this->displayUrl;
  }
  /**
   * @param string
   */
  public function setLinkTarget($linkTarget)
  {
    $this->linkTarget = $linkTarget;
  }
  /**
   * @return string
   */
  public function getLinkTarget()
  {
    return $this->linkTarget;
  }
  /**
   * @param string
   */
  public function setLinkType($linkType)
  {
    $this->linkType = $linkType;
  }
  /**
   * @return string
   */
  public function getLinkType()
  {
    return $this->linkType;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialCommonLinkData::class, 'Google_Service_Contentwarehouse_SocialCommonLinkData');
