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

namespace Google\Service\Books;

class MetadataItems extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "downloadUrl" => "download_url",
        "encryptedKey" => "encrypted_key",
  ];
  /**
   * @var string
   */
  public $downloadUrl;
  /**
   * @var string
   */
  public $encryptedKey;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $size;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setDownloadUrl($downloadUrl)
  {
    $this->downloadUrl = $downloadUrl;
  }
  /**
   * @return string
   */
  public function getDownloadUrl()
  {
    return $this->downloadUrl;
  }
  /**
   * @param string
   */
  public function setEncryptedKey($encryptedKey)
  {
    $this->encryptedKey = $encryptedKey;
  }
  /**
   * @return string
   */
  public function getEncryptedKey()
  {
    return $this->encryptedKey;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetadataItems::class, 'Google_Service_Books_MetadataItems');
