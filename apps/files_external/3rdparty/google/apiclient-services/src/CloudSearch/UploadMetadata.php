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

class UploadMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $attachmentToken;
  protected $backendUploadMetadataType = AppsDynamiteSharedBackendUploadMetadata::class;
  protected $backendUploadMetadataDataType = '';
  protected $clonedAuthorizedItemIdType = AuthorizedItemId::class;
  protected $clonedAuthorizedItemIdDataType = '';
  /**
   * @var string
   */
  public $clonedDriveAction;
  /**
   * @var string
   */
  public $clonedDriveId;
  /**
   * @var string
   */
  public $contentName;
  /**
   * @var string
   */
  public $contentType;
  protected $dlpMetricsMetadataType = AppsDynamiteSharedDlpMetricsMetadata::class;
  protected $dlpMetricsMetadataDataType = '';
  /**
   * @var string
   */
  public $localId;
  protected $originalDimensionType = AppsDynamiteSharedDimension::class;
  protected $originalDimensionDataType = '';
  protected $videoReferenceType = AppsDynamiteSharedVideoReference::class;
  protected $videoReferenceDataType = '';
  /**
   * @var string
   */
  public $virusScanResult;

  /**
   * @param string
   */
  public function setAttachmentToken($attachmentToken)
  {
    $this->attachmentToken = $attachmentToken;
  }
  /**
   * @return string
   */
  public function getAttachmentToken()
  {
    return $this->attachmentToken;
  }
  /**
   * @param AppsDynamiteSharedBackendUploadMetadata
   */
  public function setBackendUploadMetadata(AppsDynamiteSharedBackendUploadMetadata $backendUploadMetadata)
  {
    $this->backendUploadMetadata = $backendUploadMetadata;
  }
  /**
   * @return AppsDynamiteSharedBackendUploadMetadata
   */
  public function getBackendUploadMetadata()
  {
    return $this->backendUploadMetadata;
  }
  /**
   * @param AuthorizedItemId
   */
  public function setClonedAuthorizedItemId(AuthorizedItemId $clonedAuthorizedItemId)
  {
    $this->clonedAuthorizedItemId = $clonedAuthorizedItemId;
  }
  /**
   * @return AuthorizedItemId
   */
  public function getClonedAuthorizedItemId()
  {
    return $this->clonedAuthorizedItemId;
  }
  /**
   * @param string
   */
  public function setClonedDriveAction($clonedDriveAction)
  {
    $this->clonedDriveAction = $clonedDriveAction;
  }
  /**
   * @return string
   */
  public function getClonedDriveAction()
  {
    return $this->clonedDriveAction;
  }
  /**
   * @param string
   */
  public function setClonedDriveId($clonedDriveId)
  {
    $this->clonedDriveId = $clonedDriveId;
  }
  /**
   * @return string
   */
  public function getClonedDriveId()
  {
    return $this->clonedDriveId;
  }
  /**
   * @param string
   */
  public function setContentName($contentName)
  {
    $this->contentName = $contentName;
  }
  /**
   * @return string
   */
  public function getContentName()
  {
    return $this->contentName;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param AppsDynamiteSharedDlpMetricsMetadata
   */
  public function setDlpMetricsMetadata(AppsDynamiteSharedDlpMetricsMetadata $dlpMetricsMetadata)
  {
    $this->dlpMetricsMetadata = $dlpMetricsMetadata;
  }
  /**
   * @return AppsDynamiteSharedDlpMetricsMetadata
   */
  public function getDlpMetricsMetadata()
  {
    return $this->dlpMetricsMetadata;
  }
  /**
   * @param string
   */
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  /**
   * @return string
   */
  public function getLocalId()
  {
    return $this->localId;
  }
  /**
   * @param AppsDynamiteSharedDimension
   */
  public function setOriginalDimension(AppsDynamiteSharedDimension $originalDimension)
  {
    $this->originalDimension = $originalDimension;
  }
  /**
   * @return AppsDynamiteSharedDimension
   */
  public function getOriginalDimension()
  {
    return $this->originalDimension;
  }
  /**
   * @param AppsDynamiteSharedVideoReference
   */
  public function setVideoReference(AppsDynamiteSharedVideoReference $videoReference)
  {
    $this->videoReference = $videoReference;
  }
  /**
   * @return AppsDynamiteSharedVideoReference
   */
  public function getVideoReference()
  {
    return $this->videoReference;
  }
  /**
   * @param string
   */
  public function setVirusScanResult($virusScanResult)
  {
    $this->virusScanResult = $virusScanResult;
  }
  /**
   * @return string
   */
  public function getVirusScanResult()
  {
    return $this->virusScanResult;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UploadMetadata::class, 'Google_Service_CloudSearch_UploadMetadata');
