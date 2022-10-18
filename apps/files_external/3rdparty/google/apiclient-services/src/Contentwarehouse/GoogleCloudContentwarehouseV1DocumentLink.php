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

class GoogleCloudContentwarehouseV1DocumentLink extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;
  protected $sourceDocumentReferenceType = GoogleCloudContentwarehouseV1DocumentReference::class;
  protected $sourceDocumentReferenceDataType = '';
  /**
   * @var string
   */
  public $state;
  protected $targetDocumentReferenceType = GoogleCloudContentwarehouseV1DocumentReference::class;
  protected $targetDocumentReferenceDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudContentwarehouseV1DocumentReference
   */
  public function setSourceDocumentReference(GoogleCloudContentwarehouseV1DocumentReference $sourceDocumentReference)
  {
    $this->sourceDocumentReference = $sourceDocumentReference;
  }
  /**
   * @return GoogleCloudContentwarehouseV1DocumentReference
   */
  public function getSourceDocumentReference()
  {
    return $this->sourceDocumentReference;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param GoogleCloudContentwarehouseV1DocumentReference
   */
  public function setTargetDocumentReference(GoogleCloudContentwarehouseV1DocumentReference $targetDocumentReference)
  {
    $this->targetDocumentReference = $targetDocumentReference;
  }
  /**
   * @return GoogleCloudContentwarehouseV1DocumentReference
   */
  public function getTargetDocumentReference()
  {
    return $this->targetDocumentReference;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1DocumentLink::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1DocumentLink');
