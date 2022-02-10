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

class ItemContent extends \Google\Model
{
  protected $contentDataRefType = UploadItemRef::class;
  protected $contentDataRefDataType = '';
  /**
   * @var string
   */
  public $contentFormat;
  /**
   * @var string
   */
  public $hash;
  /**
   * @var string
   */
  public $inlineContent;

  /**
   * @param UploadItemRef
   */
  public function setContentDataRef(UploadItemRef $contentDataRef)
  {
    $this->contentDataRef = $contentDataRef;
  }
  /**
   * @return UploadItemRef
   */
  public function getContentDataRef()
  {
    return $this->contentDataRef;
  }
  /**
   * @param string
   */
  public function setContentFormat($contentFormat)
  {
    $this->contentFormat = $contentFormat;
  }
  /**
   * @return string
   */
  public function getContentFormat()
  {
    return $this->contentFormat;
  }
  /**
   * @param string
   */
  public function setHash($hash)
  {
    $this->hash = $hash;
  }
  /**
   * @return string
   */
  public function getHash()
  {
    return $this->hash;
  }
  /**
   * @param string
   */
  public function setInlineContent($inlineContent)
  {
    $this->inlineContent = $inlineContent;
  }
  /**
   * @return string
   */
  public function getInlineContent()
  {
    return $this->inlineContent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ItemContent::class, 'Google_Service_CloudSearch_ItemContent');
