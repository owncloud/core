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

class GoogleDocsResultInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $attachmentSha1;
  protected $cosmoIdType = Id::class;
  protected $cosmoIdDataType = '';
  /**
   * @var int
   */
  public $cosmoNameSpace;
  /**
   * @var string
   */
  public $encryptedId;
  /**
   * @var string
   */
  public $mimeType;
  protected $shareScopeType = ShareScope::class;
  protected $shareScopeDataType = '';

  /**
   * @param string
   */
  public function setAttachmentSha1($attachmentSha1)
  {
    $this->attachmentSha1 = $attachmentSha1;
  }
  /**
   * @return string
   */
  public function getAttachmentSha1()
  {
    return $this->attachmentSha1;
  }
  /**
   * @param Id
   */
  public function setCosmoId(Id $cosmoId)
  {
    $this->cosmoId = $cosmoId;
  }
  /**
   * @return Id
   */
  public function getCosmoId()
  {
    return $this->cosmoId;
  }
  /**
   * @param int
   */
  public function setCosmoNameSpace($cosmoNameSpace)
  {
    $this->cosmoNameSpace = $cosmoNameSpace;
  }
  /**
   * @return int
   */
  public function getCosmoNameSpace()
  {
    return $this->cosmoNameSpace;
  }
  /**
   * @param string
   */
  public function setEncryptedId($encryptedId)
  {
    $this->encryptedId = $encryptedId;
  }
  /**
   * @return string
   */
  public function getEncryptedId()
  {
    return $this->encryptedId;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param ShareScope
   */
  public function setShareScope(ShareScope $shareScope)
  {
    $this->shareScope = $shareScope;
  }
  /**
   * @return ShareScope
   */
  public function getShareScope()
  {
    return $this->shareScope;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDocsResultInfo::class, 'Google_Service_CloudSearch_GoogleDocsResultInfo');
