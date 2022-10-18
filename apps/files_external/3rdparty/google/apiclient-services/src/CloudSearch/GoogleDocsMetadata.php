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

class GoogleDocsMetadata extends \Google\Model
{
  protected $aclInfoType = AclInfo::class;
  protected $aclInfoDataType = '';
  /**
   * @var string
   */
  public $documentType;
  /**
   * @var string
   */
  public $fileExtension;
  /**
   * @var string
   */
  public $lastContentModifiedTimestamp;
  /**
   * @var int
   */
  public $numSubscribers;
  /**
   * @var int
   */
  public $numViewers;
  protected $resultInfoType = GoogleDocsResultInfo::class;
  protected $resultInfoDataType = '';
  protected $typeInfoType = TypeInfo::class;
  protected $typeInfoDataType = '';

  /**
   * @param AclInfo
   */
  public function setAclInfo(AclInfo $aclInfo)
  {
    $this->aclInfo = $aclInfo;
  }
  /**
   * @return AclInfo
   */
  public function getAclInfo()
  {
    return $this->aclInfo;
  }
  /**
   * @param string
   */
  public function setDocumentType($documentType)
  {
    $this->documentType = $documentType;
  }
  /**
   * @return string
   */
  public function getDocumentType()
  {
    return $this->documentType;
  }
  /**
   * @param string
   */
  public function setFileExtension($fileExtension)
  {
    $this->fileExtension = $fileExtension;
  }
  /**
   * @return string
   */
  public function getFileExtension()
  {
    return $this->fileExtension;
  }
  /**
   * @param string
   */
  public function setLastContentModifiedTimestamp($lastContentModifiedTimestamp)
  {
    $this->lastContentModifiedTimestamp = $lastContentModifiedTimestamp;
  }
  /**
   * @return string
   */
  public function getLastContentModifiedTimestamp()
  {
    return $this->lastContentModifiedTimestamp;
  }
  /**
   * @param int
   */
  public function setNumSubscribers($numSubscribers)
  {
    $this->numSubscribers = $numSubscribers;
  }
  /**
   * @return int
   */
  public function getNumSubscribers()
  {
    return $this->numSubscribers;
  }
  /**
   * @param int
   */
  public function setNumViewers($numViewers)
  {
    $this->numViewers = $numViewers;
  }
  /**
   * @return int
   */
  public function getNumViewers()
  {
    return $this->numViewers;
  }
  /**
   * @param GoogleDocsResultInfo
   */
  public function setResultInfo(GoogleDocsResultInfo $resultInfo)
  {
    $this->resultInfo = $resultInfo;
  }
  /**
   * @return GoogleDocsResultInfo
   */
  public function getResultInfo()
  {
    return $this->resultInfo;
  }
  /**
   * @param TypeInfo
   */
  public function setTypeInfo(TypeInfo $typeInfo)
  {
    $this->typeInfo = $typeInfo;
  }
  /**
   * @return TypeInfo
   */
  public function getTypeInfo()
  {
    return $this->typeInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDocsMetadata::class, 'Google_Service_CloudSearch_GoogleDocsMetadata');
