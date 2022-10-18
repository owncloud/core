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

class AppsDynamiteV1ApiCompatV1Attachment extends \Google\Collection
{
  protected $collection_key = 'mrkdwn_in';
  protected $internal_gapi_mappings = [
        "attachmentType" => "attachment_type",
        "authorIcon" => "author_icon",
        "authorLink" => "author_link",
        "authorName" => "author_name",
        "callbackId" => "callback_id",
        "footerIcon" => "footer_icon",
        "imageUrl" => "image_url",
        "mrkdwnIn" => "mrkdwn_in",
        "thumbUrl" => "thumb_url",
        "titleLink" => "title_link",
  ];
  protected $actionsType = AppsDynamiteV1ApiCompatV1Action::class;
  protected $actionsDataType = 'array';
  /**
   * @var string
   */
  public $attachmentType;
  /**
   * @var string
   */
  public $authorIcon;
  /**
   * @var string
   */
  public $authorLink;
  /**
   * @var string
   */
  public $authorName;
  /**
   * @var string
   */
  public $callbackId;
  /**
   * @var string
   */
  public $color;
  /**
   * @var string
   */
  public $fallback;
  protected $fieldsType = AppsDynamiteV1ApiCompatV1Field::class;
  protected $fieldsDataType = 'array';
  /**
   * @var string
   */
  public $footer;
  /**
   * @var string
   */
  public $footerIcon;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var string[]
   */
  public $mrkdwnIn;
  /**
   * @var string
   */
  public $pretext;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $thumbUrl;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $titleLink;
  /**
   * @var int
   */
  public $ts;

  /**
   * @param AppsDynamiteV1ApiCompatV1Action[]
   */
  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  /**
   * @return AppsDynamiteV1ApiCompatV1Action[]
   */
  public function getActions()
  {
    return $this->actions;
  }
  /**
   * @param string
   */
  public function setAttachmentType($attachmentType)
  {
    $this->attachmentType = $attachmentType;
  }
  /**
   * @return string
   */
  public function getAttachmentType()
  {
    return $this->attachmentType;
  }
  /**
   * @param string
   */
  public function setAuthorIcon($authorIcon)
  {
    $this->authorIcon = $authorIcon;
  }
  /**
   * @return string
   */
  public function getAuthorIcon()
  {
    return $this->authorIcon;
  }
  /**
   * @param string
   */
  public function setAuthorLink($authorLink)
  {
    $this->authorLink = $authorLink;
  }
  /**
   * @return string
   */
  public function getAuthorLink()
  {
    return $this->authorLink;
  }
  /**
   * @param string
   */
  public function setAuthorName($authorName)
  {
    $this->authorName = $authorName;
  }
  /**
   * @return string
   */
  public function getAuthorName()
  {
    return $this->authorName;
  }
  /**
   * @param string
   */
  public function setCallbackId($callbackId)
  {
    $this->callbackId = $callbackId;
  }
  /**
   * @return string
   */
  public function getCallbackId()
  {
    return $this->callbackId;
  }
  /**
   * @param string
   */
  public function setColor($color)
  {
    $this->color = $color;
  }
  /**
   * @return string
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param string
   */
  public function setFallback($fallback)
  {
    $this->fallback = $fallback;
  }
  /**
   * @return string
   */
  public function getFallback()
  {
    return $this->fallback;
  }
  /**
   * @param AppsDynamiteV1ApiCompatV1Field[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return AppsDynamiteV1ApiCompatV1Field[]
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param string
   */
  public function setFooter($footer)
  {
    $this->footer = $footer;
  }
  /**
   * @return string
   */
  public function getFooter()
  {
    return $this->footer;
  }
  /**
   * @param string
   */
  public function setFooterIcon($footerIcon)
  {
    $this->footerIcon = $footerIcon;
  }
  /**
   * @return string
   */
  public function getFooterIcon()
  {
    return $this->footerIcon;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param string[]
   */
  public function setMrkdwnIn($mrkdwnIn)
  {
    $this->mrkdwnIn = $mrkdwnIn;
  }
  /**
   * @return string[]
   */
  public function getMrkdwnIn()
  {
    return $this->mrkdwnIn;
  }
  /**
   * @param string
   */
  public function setPretext($pretext)
  {
    $this->pretext = $pretext;
  }
  /**
   * @return string
   */
  public function getPretext()
  {
    return $this->pretext;
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
  public function setThumbUrl($thumbUrl)
  {
    $this->thumbUrl = $thumbUrl;
  }
  /**
   * @return string
   */
  public function getThumbUrl()
  {
    return $this->thumbUrl;
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
  /**
   * @param string
   */
  public function setTitleLink($titleLink)
  {
    $this->titleLink = $titleLink;
  }
  /**
   * @return string
   */
  public function getTitleLink()
  {
    return $this->titleLink;
  }
  /**
   * @param int
   */
  public function setTs($ts)
  {
    $this->ts = $ts;
  }
  /**
   * @return int
   */
  public function getTs()
  {
    return $this->ts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteV1ApiCompatV1Attachment::class, 'Google_Service_CloudSearch_AppsDynamiteV1ApiCompatV1Attachment');
