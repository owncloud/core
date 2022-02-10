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

namespace Google\Service\Analytics;

class Upload extends \Google\Collection
{
  protected $collection_key = 'errors';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $customDataSourceId;
  /**
   * @var string[]
   */
  public $errors;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $uploadTime;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setCustomDataSourceId($customDataSourceId)
  {
    $this->customDataSourceId = $customDataSourceId;
  }
  /**
   * @return string
   */
  public function getCustomDataSourceId()
  {
    return $this->customDataSourceId;
  }
  /**
   * @param string[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return string[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUploadTime($uploadTime)
  {
    $this->uploadTime = $uploadTime;
  }
  /**
   * @return string
   */
  public function getUploadTime()
  {
    return $this->uploadTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Upload::class, 'Google_Service_Analytics_Upload');
