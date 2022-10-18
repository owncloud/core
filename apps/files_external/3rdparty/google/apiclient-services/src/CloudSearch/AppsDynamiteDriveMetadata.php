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

class AppsDynamiteDriveMetadata extends \Google\Model
{
  protected $aclFixRequestType = AppsDynamiteDriveMetadataAclFixRequest::class;
  protected $aclFixRequestDataType = '';
  protected $aclFixStatusType = AppsDynamiteDriveMetadataAclFixStatus::class;
  protected $aclFixStatusDataType = '';
  /**
   * @var bool
   */
  public $canEdit;
  /**
   * @var bool
   */
  public $canShare;
  /**
   * @var bool
   */
  public $canView;
  /**
   * @var string
   */
  public $driveAction;
  /**
   * @var string
   */
  public $driveState;
  protected $embedUrlType = TrustedResourceUrlProto::class;
  protected $embedUrlDataType = '';
  /**
   * @var bool
   */
  public $encryptedDocId;
  /**
   * @var string
   */
  public $encryptedResourceKey;
  /**
   * @var string
   */
  public $externalMimetype;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isDownloadRestricted;
  /**
   * @var bool
   */
  public $isOwner;
  protected $legacyUploadMetadataType = AppsDynamiteDriveMetadataLegacyUploadMetadata::class;
  protected $legacyUploadMetadataDataType = '';
  /**
   * @var string
   */
  public $mimetype;
  /**
   * @var string
   */
  public $organizationDisplayName;
  protected $shortcutAuthorizedItemIdType = AuthorizedItemId::class;
  protected $shortcutAuthorizedItemIdDataType = '';
  /**
   * @var bool
   */
  public $shouldNotRender;
  /**
   * @var int
   */
  public $thumbnailHeight;
  /**
   * @var string
   */
  public $thumbnailUrl;
  /**
   * @var int
   */
  public $thumbnailWidth;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $urlFragment;
  protected $wrappedResourceKeyType = WrappedResourceKey::class;
  protected $wrappedResourceKeyDataType = '';

  /**
   * @param AppsDynamiteDriveMetadataAclFixRequest
   */
  public function setAclFixRequest(AppsDynamiteDriveMetadataAclFixRequest $aclFixRequest)
  {
    $this->aclFixRequest = $aclFixRequest;
  }
  /**
   * @return AppsDynamiteDriveMetadataAclFixRequest
   */
  public function getAclFixRequest()
  {
    return $this->aclFixRequest;
  }
  /**
   * @param AppsDynamiteDriveMetadataAclFixStatus
   */
  public function setAclFixStatus(AppsDynamiteDriveMetadataAclFixStatus $aclFixStatus)
  {
    $this->aclFixStatus = $aclFixStatus;
  }
  /**
   * @return AppsDynamiteDriveMetadataAclFixStatus
   */
  public function getAclFixStatus()
  {
    return $this->aclFixStatus;
  }
  /**
   * @param bool
   */
  public function setCanEdit($canEdit)
  {
    $this->canEdit = $canEdit;
  }
  /**
   * @return bool
   */
  public function getCanEdit()
  {
    return $this->canEdit;
  }
  /**
   * @param bool
   */
  public function setCanShare($canShare)
  {
    $this->canShare = $canShare;
  }
  /**
   * @return bool
   */
  public function getCanShare()
  {
    return $this->canShare;
  }
  /**
   * @param bool
   */
  public function setCanView($canView)
  {
    $this->canView = $canView;
  }
  /**
   * @return bool
   */
  public function getCanView()
  {
    return $this->canView;
  }
  /**
   * @param string
   */
  public function setDriveAction($driveAction)
  {
    $this->driveAction = $driveAction;
  }
  /**
   * @return string
   */
  public function getDriveAction()
  {
    return $this->driveAction;
  }
  /**
   * @param string
   */
  public function setDriveState($driveState)
  {
    $this->driveState = $driveState;
  }
  /**
   * @return string
   */
  public function getDriveState()
  {
    return $this->driveState;
  }
  /**
   * @param TrustedResourceUrlProto
   */
  public function setEmbedUrl(TrustedResourceUrlProto $embedUrl)
  {
    $this->embedUrl = $embedUrl;
  }
  /**
   * @return TrustedResourceUrlProto
   */
  public function getEmbedUrl()
  {
    return $this->embedUrl;
  }
  /**
   * @param bool
   */
  public function setEncryptedDocId($encryptedDocId)
  {
    $this->encryptedDocId = $encryptedDocId;
  }
  /**
   * @return bool
   */
  public function getEncryptedDocId()
  {
    return $this->encryptedDocId;
  }
  /**
   * @param string
   */
  public function setEncryptedResourceKey($encryptedResourceKey)
  {
    $this->encryptedResourceKey = $encryptedResourceKey;
  }
  /**
   * @return string
   */
  public function getEncryptedResourceKey()
  {
    return $this->encryptedResourceKey;
  }
  /**
   * @param string
   */
  public function setExternalMimetype($externalMimetype)
  {
    $this->externalMimetype = $externalMimetype;
  }
  /**
   * @return string
   */
  public function getExternalMimetype()
  {
    return $this->externalMimetype;
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
   * @param bool
   */
  public function setIsDownloadRestricted($isDownloadRestricted)
  {
    $this->isDownloadRestricted = $isDownloadRestricted;
  }
  /**
   * @return bool
   */
  public function getIsDownloadRestricted()
  {
    return $this->isDownloadRestricted;
  }
  /**
   * @param bool
   */
  public function setIsOwner($isOwner)
  {
    $this->isOwner = $isOwner;
  }
  /**
   * @return bool
   */
  public function getIsOwner()
  {
    return $this->isOwner;
  }
  /**
   * @param AppsDynamiteDriveMetadataLegacyUploadMetadata
   */
  public function setLegacyUploadMetadata(AppsDynamiteDriveMetadataLegacyUploadMetadata $legacyUploadMetadata)
  {
    $this->legacyUploadMetadata = $legacyUploadMetadata;
  }
  /**
   * @return AppsDynamiteDriveMetadataLegacyUploadMetadata
   */
  public function getLegacyUploadMetadata()
  {
    return $this->legacyUploadMetadata;
  }
  /**
   * @param string
   */
  public function setMimetype($mimetype)
  {
    $this->mimetype = $mimetype;
  }
  /**
   * @return string
   */
  public function getMimetype()
  {
    return $this->mimetype;
  }
  /**
   * @param string
   */
  public function setOrganizationDisplayName($organizationDisplayName)
  {
    $this->organizationDisplayName = $organizationDisplayName;
  }
  /**
   * @return string
   */
  public function getOrganizationDisplayName()
  {
    return $this->organizationDisplayName;
  }
  /**
   * @param AuthorizedItemId
   */
  public function setShortcutAuthorizedItemId(AuthorizedItemId $shortcutAuthorizedItemId)
  {
    $this->shortcutAuthorizedItemId = $shortcutAuthorizedItemId;
  }
  /**
   * @return AuthorizedItemId
   */
  public function getShortcutAuthorizedItemId()
  {
    return $this->shortcutAuthorizedItemId;
  }
  /**
   * @param bool
   */
  public function setShouldNotRender($shouldNotRender)
  {
    $this->shouldNotRender = $shouldNotRender;
  }
  /**
   * @return bool
   */
  public function getShouldNotRender()
  {
    return $this->shouldNotRender;
  }
  /**
   * @param int
   */
  public function setThumbnailHeight($thumbnailHeight)
  {
    $this->thumbnailHeight = $thumbnailHeight;
  }
  /**
   * @return int
   */
  public function getThumbnailHeight()
  {
    return $this->thumbnailHeight;
  }
  /**
   * @param string
   */
  public function setThumbnailUrl($thumbnailUrl)
  {
    $this->thumbnailUrl = $thumbnailUrl;
  }
  /**
   * @return string
   */
  public function getThumbnailUrl()
  {
    return $this->thumbnailUrl;
  }
  /**
   * @param int
   */
  public function setThumbnailWidth($thumbnailWidth)
  {
    $this->thumbnailWidth = $thumbnailWidth;
  }
  /**
   * @return int
   */
  public function getThumbnailWidth()
  {
    return $this->thumbnailWidth;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setUrlFragment($urlFragment)
  {
    $this->urlFragment = $urlFragment;
  }
  /**
   * @return string
   */
  public function getUrlFragment()
  {
    return $this->urlFragment;
  }
  /**
   * @param WrappedResourceKey
   */
  public function setWrappedResourceKey(WrappedResourceKey $wrappedResourceKey)
  {
    $this->wrappedResourceKey = $wrappedResourceKey;
  }
  /**
   * @return WrappedResourceKey
   */
  public function getWrappedResourceKey()
  {
    return $this->wrappedResourceKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteDriveMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteDriveMetadata');
