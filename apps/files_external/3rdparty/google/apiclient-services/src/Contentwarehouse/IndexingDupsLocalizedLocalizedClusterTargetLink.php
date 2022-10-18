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

class IndexingDupsLocalizedLocalizedClusterTargetLink extends \Google\Model
{
  protected $linkDataType = IndexingDupsLocalizedLocalizedClusterTargetLinkLink::class;
  protected $linkDataDataType = '';
  protected $metaDataType = IndexingDupsLocalizedLocalizedClusterTargetLinkMetadata::class;
  protected $metaDataDataType = '';
  protected $targetDocDataType = IndexingDupsLocalizedLocalizedClusterTargetLinkTargetDocData::class;
  protected $targetDocDataDataType = '';
  /**
   * @var string
   */
  public $validationStatus;

  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkLink
   */
  public function setLinkData(IndexingDupsLocalizedLocalizedClusterTargetLinkLink $linkData)
  {
    $this->linkData = $linkData;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkLink
   */
  public function getLinkData()
  {
    return $this->linkData;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkMetadata
   */
  public function setMetaData(IndexingDupsLocalizedLocalizedClusterTargetLinkMetadata $metaData)
  {
    $this->metaData = $metaData;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkMetadata
   */
  public function getMetaData()
  {
    return $this->metaData;
  }
  /**
   * @param IndexingDupsLocalizedLocalizedClusterTargetLinkTargetDocData
   */
  public function setTargetDocData(IndexingDupsLocalizedLocalizedClusterTargetLinkTargetDocData $targetDocData)
  {
    $this->targetDocData = $targetDocData;
  }
  /**
   * @return IndexingDupsLocalizedLocalizedClusterTargetLinkTargetDocData
   */
  public function getTargetDocData()
  {
    return $this->targetDocData;
  }
  /**
   * @param string
   */
  public function setValidationStatus($validationStatus)
  {
    $this->validationStatus = $validationStatus;
  }
  /**
   * @return string
   */
  public function getValidationStatus()
  {
    return $this->validationStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDupsLocalizedLocalizedClusterTargetLink::class, 'Google_Service_Contentwarehouse_IndexingDupsLocalizedLocalizedClusterTargetLink');
