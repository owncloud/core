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

class Google_Service_CloudSearch_ItemContent extends Google_Model
{
  protected $contentDataRefType = 'Google_Service_CloudSearch_UploadItemRef';
  protected $contentDataRefDataType = '';
  public $contentFormat;
  public $hash;
  public $inlineContent;

  /**
   * @param Google_Service_CloudSearch_UploadItemRef
   */
  public function setContentDataRef(Google_Service_CloudSearch_UploadItemRef $contentDataRef)
  {
    $this->contentDataRef = $contentDataRef;
  }
  /**
   * @return Google_Service_CloudSearch_UploadItemRef
   */
  public function getContentDataRef()
  {
    return $this->contentDataRef;
  }
  public function setContentFormat($contentFormat)
  {
    $this->contentFormat = $contentFormat;
  }
  public function getContentFormat()
  {
    return $this->contentFormat;
  }
  public function setHash($hash)
  {
    $this->hash = $hash;
  }
  public function getHash()
  {
    return $this->hash;
  }
  public function setInlineContent($inlineContent)
  {
    $this->inlineContent = $inlineContent;
  }
  public function getInlineContent()
  {
    return $this->inlineContent;
  }
}
