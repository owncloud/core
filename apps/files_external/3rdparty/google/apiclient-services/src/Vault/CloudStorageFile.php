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

namespace Google\Service\Vault;

class CloudStorageFile extends \Google\Model
{
  /**
   * @var string
   */
  public $bucketName;
  /**
   * @var string
   */
  public $md5Hash;
  /**
   * @var string
   */
  public $objectName;
  /**
   * @var string
   */
  public $size;

  /**
   * @param string
   */
  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }
  /**
   * @return string
   */
  public function getBucketName()
  {
    return $this->bucketName;
  }
  /**
   * @param string
   */
  public function setMd5Hash($md5Hash)
  {
    $this->md5Hash = $md5Hash;
  }
  /**
   * @return string
   */
  public function getMd5Hash()
  {
    return $this->md5Hash;
  }
  /**
   * @param string
   */
  public function setObjectName($objectName)
  {
    $this->objectName = $objectName;
  }
  /**
   * @return string
   */
  public function getObjectName()
  {
    return $this->objectName;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudStorageFile::class, 'Google_Service_Vault_CloudStorageFile');
