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

class Google_Service_FirebaseHosting_Version extends Google_Model
{
  protected $configType = 'Google_Service_FirebaseHosting_ServingConfig';
  protected $configDataType = '';
  public $createTime;
  protected $createUserType = 'Google_Service_FirebaseHosting_ActingUser';
  protected $createUserDataType = '';
  public $deleteTime;
  protected $deleteUserType = 'Google_Service_FirebaseHosting_ActingUser';
  protected $deleteUserDataType = '';
  public $fileCount;
  public $finalizeTime;
  protected $finalizeUserType = 'Google_Service_FirebaseHosting_ActingUser';
  protected $finalizeUserDataType = '';
  public $labels;
  public $name;
  protected $previewType = 'Google_Service_FirebaseHosting_PreviewConfig';
  protected $previewDataType = '';
  public $status;
  public $versionBytes;

  /**
   * @param Google_Service_FirebaseHosting_ServingConfig
   */
  public function setConfig(Google_Service_FirebaseHosting_ServingConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_FirebaseHosting_ServingConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_FirebaseHosting_ActingUser
   */
  public function setCreateUser(Google_Service_FirebaseHosting_ActingUser $createUser)
  {
    $this->createUser = $createUser;
  }
  /**
   * @return Google_Service_FirebaseHosting_ActingUser
   */
  public function getCreateUser()
  {
    return $this->createUser;
  }
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  /**
   * @param Google_Service_FirebaseHosting_ActingUser
   */
  public function setDeleteUser(Google_Service_FirebaseHosting_ActingUser $deleteUser)
  {
    $this->deleteUser = $deleteUser;
  }
  /**
   * @return Google_Service_FirebaseHosting_ActingUser
   */
  public function getDeleteUser()
  {
    return $this->deleteUser;
  }
  public function setFileCount($fileCount)
  {
    $this->fileCount = $fileCount;
  }
  public function getFileCount()
  {
    return $this->fileCount;
  }
  public function setFinalizeTime($finalizeTime)
  {
    $this->finalizeTime = $finalizeTime;
  }
  public function getFinalizeTime()
  {
    return $this->finalizeTime;
  }
  /**
   * @param Google_Service_FirebaseHosting_ActingUser
   */
  public function setFinalizeUser(Google_Service_FirebaseHosting_ActingUser $finalizeUser)
  {
    $this->finalizeUser = $finalizeUser;
  }
  /**
   * @return Google_Service_FirebaseHosting_ActingUser
   */
  public function getFinalizeUser()
  {
    return $this->finalizeUser;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_FirebaseHosting_PreviewConfig
   */
  public function setPreview(Google_Service_FirebaseHosting_PreviewConfig $preview)
  {
    $this->preview = $preview;
  }
  /**
   * @return Google_Service_FirebaseHosting_PreviewConfig
   */
  public function getPreview()
  {
    return $this->preview;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setVersionBytes($versionBytes)
  {
    $this->versionBytes = $versionBytes;
  }
  public function getVersionBytes()
  {
    return $this->versionBytes;
  }
}
