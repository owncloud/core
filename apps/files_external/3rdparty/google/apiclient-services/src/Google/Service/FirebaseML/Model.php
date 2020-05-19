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

class Google_Service_FirebaseML_Model extends Google_Collection
{
  protected $collection_key = 'tags';
  protected $activeOperationsType = 'Google_Service_FirebaseML_Operation';
  protected $activeOperationsDataType = 'array';
  public $createTime;
  public $displayName;
  public $etag;
  public $modelHash;
  public $name;
  protected $stateType = 'Google_Service_FirebaseML_ModelState';
  protected $stateDataType = '';
  public $tags;
  protected $tfliteModelType = 'Google_Service_FirebaseML_TfLiteModel';
  protected $tfliteModelDataType = '';
  public $updateTime;

  /**
   * @param Google_Service_FirebaseML_Operation
   */
  public function setActiveOperations($activeOperations)
  {
    $this->activeOperations = $activeOperations;
  }
  /**
   * @return Google_Service_FirebaseML_Operation
   */
  public function getActiveOperations()
  {
    return $this->activeOperations;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setModelHash($modelHash)
  {
    $this->modelHash = $modelHash;
  }
  public function getModelHash()
  {
    return $this->modelHash;
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
   * @param Google_Service_FirebaseML_ModelState
   */
  public function setState(Google_Service_FirebaseML_ModelState $state)
  {
    $this->state = $state;
  }
  /**
   * @return Google_Service_FirebaseML_ModelState
   */
  public function getState()
  {
    return $this->state;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param Google_Service_FirebaseML_TfLiteModel
   */
  public function setTfliteModel(Google_Service_FirebaseML_TfLiteModel $tfliteModel)
  {
    $this->tfliteModel = $tfliteModel;
  }
  /**
   * @return Google_Service_FirebaseML_TfLiteModel
   */
  public function getTfliteModel()
  {
    return $this->tfliteModel;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
