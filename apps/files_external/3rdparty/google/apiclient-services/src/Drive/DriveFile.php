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

namespace Google\Service\Drive;

class DriveFile extends \Google\Collection
{
  protected $collection_key = 'spaces';
  /**
   * @var string[]
   */
  public $appProperties;
  protected $capabilitiesType = DriveFileCapabilities::class;
  protected $capabilitiesDataType = '';
  protected $contentHintsType = DriveFileContentHints::class;
  protected $contentHintsDataType = '';
  protected $contentRestrictionsType = ContentRestriction::class;
  protected $contentRestrictionsDataType = 'array';
  /**
   * @var bool
   */
  public $copyRequiresWriterPermission;
  /**
   * @var string
   */
  public $createdTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $driveId;
  /**
   * @var bool
   */
  public $explicitlyTrashed;
  /**
   * @var string[]
   */
  public $exportLinks;
  /**
   * @var string
   */
  public $fileExtension;
  /**
   * @var string
   */
  public $folderColorRgb;
  /**
   * @var string
   */
  public $fullFileExtension;
  /**
   * @var bool
   */
  public $hasAugmentedPermissions;
  /**
   * @var bool
   */
  public $hasThumbnail;
  /**
   * @var string
   */
  public $headRevisionId;
  /**
   * @var string
   */
  public $iconLink;
  /**
   * @var string
   */
  public $id;
  protected $imageMediaMetadataType = DriveFileImageMediaMetadata::class;
  protected $imageMediaMetadataDataType = '';
  /**
   * @var bool
   */
  public $isAppAuthorized;
  /**
   * @var string
   */
  public $kind;
  protected $labelInfoType = DriveFileLabelInfo::class;
  protected $labelInfoDataType = '';
  protected $lastModifyingUserType = User::class;
  protected $lastModifyingUserDataType = '';
  protected $linkShareMetadataType = DriveFileLinkShareMetadata::class;
  protected $linkShareMetadataDataType = '';
  /**
   * @var string
   */
  public $md5Checksum;
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var bool
   */
  public $modifiedByMe;
  /**
   * @var string
   */
  public $modifiedByMeTime;
  /**
   * @var string
   */
  public $modifiedTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $originalFilename;
  /**
   * @var bool
   */
  public $ownedByMe;
  protected $ownersType = User::class;
  protected $ownersDataType = 'array';
  /**
   * @var string[]
   */
  public $parents;
  /**
   * @var string[]
   */
  public $permissionIds;
  protected $permissionsType = Permission::class;
  protected $permissionsDataType = 'array';
  /**
   * @var string[]
   */
  public $properties;
  /**
   * @var string
   */
  public $quotaBytesUsed;
  /**
   * @var string
   */
  public $resourceKey;
  /**
   * @var string
   */
  public $sha1Checksum;
  /**
   * @var string
   */
  public $sha256Checksum;
  /**
   * @var bool
   */
  public $shared;
  /**
   * @var string
   */
  public $sharedWithMeTime;
  protected $sharingUserType = User::class;
  protected $sharingUserDataType = '';
  protected $shortcutDetailsType = DriveFileShortcutDetails::class;
  protected $shortcutDetailsDataType = '';
  /**
   * @var string
   */
  public $size;
  /**
   * @var string[]
   */
  public $spaces;
  /**
   * @var bool
   */
  public $starred;
  /**
   * @var string
   */
  public $teamDriveId;
  /**
   * @var string
   */
  public $thumbnailLink;
  /**
   * @var string
   */
  public $thumbnailVersion;
  /**
   * @var bool
   */
  public $trashed;
  /**
   * @var string
   */
  public $trashedTime;
  protected $trashingUserType = User::class;
  protected $trashingUserDataType = '';
  /**
   * @var string
   */
  public $version;
  protected $videoMediaMetadataType = DriveFileVideoMediaMetadata::class;
  protected $videoMediaMetadataDataType = '';
  /**
   * @var bool
   */
  public $viewedByMe;
  /**
   * @var string
   */
  public $viewedByMeTime;
  /**
   * @var bool
   */
  public $viewersCanCopyContent;
  /**
   * @var string
   */
  public $webContentLink;
  /**
   * @var string
   */
  public $webViewLink;
  /**
   * @var bool
   */
  public $writersCanShare;

  /**
   * @param string[]
   */
  public function setAppProperties($appProperties)
  {
    $this->appProperties = $appProperties;
  }
  /**
   * @return string[]
   */
  public function getAppProperties()
  {
    return $this->appProperties;
  }
  /**
   * @param DriveFileCapabilities
   */
  public function setCapabilities(DriveFileCapabilities $capabilities)
  {
    $this->capabilities = $capabilities;
  }
  /**
   * @return DriveFileCapabilities
   */
  public function getCapabilities()
  {
    return $this->capabilities;
  }
  /**
   * @param DriveFileContentHints
   */
  public function setContentHints(DriveFileContentHints $contentHints)
  {
    $this->contentHints = $contentHints;
  }
  /**
   * @return DriveFileContentHints
   */
  public function getContentHints()
  {
    return $this->contentHints;
  }
  /**
   * @param ContentRestriction[]
   */
  public function setContentRestrictions($contentRestrictions)
  {
    $this->contentRestrictions = $contentRestrictions;
  }
  /**
   * @return ContentRestriction[]
   */
  public function getContentRestrictions()
  {
    return $this->contentRestrictions;
  }
  /**
   * @param bool
   */
  public function setCopyRequiresWriterPermission($copyRequiresWriterPermission)
  {
    $this->copyRequiresWriterPermission = $copyRequiresWriterPermission;
  }
  /**
   * @return bool
   */
  public function getCopyRequiresWriterPermission()
  {
    return $this->copyRequiresWriterPermission;
  }
  /**
   * @param string
   */
  public function setCreatedTime($createdTime)
  {
    $this->createdTime = $createdTime;
  }
  /**
   * @return string
   */
  public function getCreatedTime()
  {
    return $this->createdTime;
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
  public function setDriveId($driveId)
  {
    $this->driveId = $driveId;
  }
  /**
   * @return string
   */
  public function getDriveId()
  {
    return $this->driveId;
  }
  /**
   * @param bool
   */
  public function setExplicitlyTrashed($explicitlyTrashed)
  {
    $this->explicitlyTrashed = $explicitlyTrashed;
  }
  /**
   * @return bool
   */
  public function getExplicitlyTrashed()
  {
    return $this->explicitlyTrashed;
  }
  /**
   * @param string[]
   */
  public function setExportLinks($exportLinks)
  {
    $this->exportLinks = $exportLinks;
  }
  /**
   * @return string[]
   */
  public function getExportLinks()
  {
    return $this->exportLinks;
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
  public function setFolderColorRgb($folderColorRgb)
  {
    $this->folderColorRgb = $folderColorRgb;
  }
  /**
   * @return string
   */
  public function getFolderColorRgb()
  {
    return $this->folderColorRgb;
  }
  /**
   * @param string
   */
  public function setFullFileExtension($fullFileExtension)
  {
    $this->fullFileExtension = $fullFileExtension;
  }
  /**
   * @return string
   */
  public function getFullFileExtension()
  {
    return $this->fullFileExtension;
  }
  /**
   * @param bool
   */
  public function setHasAugmentedPermissions($hasAugmentedPermissions)
  {
    $this->hasAugmentedPermissions = $hasAugmentedPermissions;
  }
  /**
   * @return bool
   */
  public function getHasAugmentedPermissions()
  {
    return $this->hasAugmentedPermissions;
  }
  /**
   * @param bool
   */
  public function setHasThumbnail($hasThumbnail)
  {
    $this->hasThumbnail = $hasThumbnail;
  }
  /**
   * @return bool
   */
  public function getHasThumbnail()
  {
    return $this->hasThumbnail;
  }
  /**
   * @param string
   */
  public function setHeadRevisionId($headRevisionId)
  {
    $this->headRevisionId = $headRevisionId;
  }
  /**
   * @return string
   */
  public function getHeadRevisionId()
  {
    return $this->headRevisionId;
  }
  /**
   * @param string
   */
  public function setIconLink($iconLink)
  {
    $this->iconLink = $iconLink;
  }
  /**
   * @return string
   */
  public function getIconLink()
  {
    return $this->iconLink;
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
   * @param DriveFileImageMediaMetadata
   */
  public function setImageMediaMetadata(DriveFileImageMediaMetadata $imageMediaMetadata)
  {
    $this->imageMediaMetadata = $imageMediaMetadata;
  }
  /**
   * @return DriveFileImageMediaMetadata
   */
  public function getImageMediaMetadata()
  {
    return $this->imageMediaMetadata;
  }
  /**
   * @param bool
   */
  public function setIsAppAuthorized($isAppAuthorized)
  {
    $this->isAppAuthorized = $isAppAuthorized;
  }
  /**
   * @return bool
   */
  public function getIsAppAuthorized()
  {
    return $this->isAppAuthorized;
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
   * @param DriveFileLabelInfo
   */
  public function setLabelInfo(DriveFileLabelInfo $labelInfo)
  {
    $this->labelInfo = $labelInfo;
  }
  /**
   * @return DriveFileLabelInfo
   */
  public function getLabelInfo()
  {
    return $this->labelInfo;
  }
  /**
   * @param User
   */
  public function setLastModifyingUser(User $lastModifyingUser)
  {
    $this->lastModifyingUser = $lastModifyingUser;
  }
  /**
   * @return User
   */
  public function getLastModifyingUser()
  {
    return $this->lastModifyingUser;
  }
  /**
   * @param DriveFileLinkShareMetadata
   */
  public function setLinkShareMetadata(DriveFileLinkShareMetadata $linkShareMetadata)
  {
    $this->linkShareMetadata = $linkShareMetadata;
  }
  /**
   * @return DriveFileLinkShareMetadata
   */
  public function getLinkShareMetadata()
  {
    return $this->linkShareMetadata;
  }
  /**
   * @param string
   */
  public function setMd5Checksum($md5Checksum)
  {
    $this->md5Checksum = $md5Checksum;
  }
  /**
   * @return string
   */
  public function getMd5Checksum()
  {
    return $this->md5Checksum;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param bool
   */
  public function setModifiedByMe($modifiedByMe)
  {
    $this->modifiedByMe = $modifiedByMe;
  }
  /**
   * @return bool
   */
  public function getModifiedByMe()
  {
    return $this->modifiedByMe;
  }
  /**
   * @param string
   */
  public function setModifiedByMeTime($modifiedByMeTime)
  {
    $this->modifiedByMeTime = $modifiedByMeTime;
  }
  /**
   * @return string
   */
  public function getModifiedByMeTime()
  {
    return $this->modifiedByMeTime;
  }
  /**
   * @param string
   */
  public function setModifiedTime($modifiedTime)
  {
    $this->modifiedTime = $modifiedTime;
  }
  /**
   * @return string
   */
  public function getModifiedTime()
  {
    return $this->modifiedTime;
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
   * @param string
   */
  public function setOriginalFilename($originalFilename)
  {
    $this->originalFilename = $originalFilename;
  }
  /**
   * @return string
   */
  public function getOriginalFilename()
  {
    return $this->originalFilename;
  }
  /**
   * @param bool
   */
  public function setOwnedByMe($ownedByMe)
  {
    $this->ownedByMe = $ownedByMe;
  }
  /**
   * @return bool
   */
  public function getOwnedByMe()
  {
    return $this->ownedByMe;
  }
  /**
   * @param User[]
   */
  public function setOwners($owners)
  {
    $this->owners = $owners;
  }
  /**
   * @return User[]
   */
  public function getOwners()
  {
    return $this->owners;
  }
  /**
   * @param string[]
   */
  public function setParents($parents)
  {
    $this->parents = $parents;
  }
  /**
   * @return string[]
   */
  public function getParents()
  {
    return $this->parents;
  }
  /**
   * @param string[]
   */
  public function setPermissionIds($permissionIds)
  {
    $this->permissionIds = $permissionIds;
  }
  /**
   * @return string[]
   */
  public function getPermissionIds()
  {
    return $this->permissionIds;
  }
  /**
   * @param Permission[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return Permission[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param string[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return string[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setQuotaBytesUsed($quotaBytesUsed)
  {
    $this->quotaBytesUsed = $quotaBytesUsed;
  }
  /**
   * @return string
   */
  public function getQuotaBytesUsed()
  {
    return $this->quotaBytesUsed;
  }
  /**
   * @param string
   */
  public function setResourceKey($resourceKey)
  {
    $this->resourceKey = $resourceKey;
  }
  /**
   * @return string
   */
  public function getResourceKey()
  {
    return $this->resourceKey;
  }
  /**
   * @param string
   */
  public function setSha1Checksum($sha1Checksum)
  {
    $this->sha1Checksum = $sha1Checksum;
  }
  /**
   * @return string
   */
  public function getSha1Checksum()
  {
    return $this->sha1Checksum;
  }
  /**
   * @param string
   */
  public function setSha256Checksum($sha256Checksum)
  {
    $this->sha256Checksum = $sha256Checksum;
  }
  /**
   * @return string
   */
  public function getSha256Checksum()
  {
    return $this->sha256Checksum;
  }
  /**
   * @param bool
   */
  public function setShared($shared)
  {
    $this->shared = $shared;
  }
  /**
   * @return bool
   */
  public function getShared()
  {
    return $this->shared;
  }
  /**
   * @param string
   */
  public function setSharedWithMeTime($sharedWithMeTime)
  {
    $this->sharedWithMeTime = $sharedWithMeTime;
  }
  /**
   * @return string
   */
  public function getSharedWithMeTime()
  {
    return $this->sharedWithMeTime;
  }
  /**
   * @param User
   */
  public function setSharingUser(User $sharingUser)
  {
    $this->sharingUser = $sharingUser;
  }
  /**
   * @return User
   */
  public function getSharingUser()
  {
    return $this->sharingUser;
  }
  /**
   * @param DriveFileShortcutDetails
   */
  public function setShortcutDetails(DriveFileShortcutDetails $shortcutDetails)
  {
    $this->shortcutDetails = $shortcutDetails;
  }
  /**
   * @return DriveFileShortcutDetails
   */
  public function getShortcutDetails()
  {
    return $this->shortcutDetails;
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
   * @param string[]
   */
  public function setSpaces($spaces)
  {
    $this->spaces = $spaces;
  }
  /**
   * @return string[]
   */
  public function getSpaces()
  {
    return $this->spaces;
  }
  /**
   * @param bool
   */
  public function setStarred($starred)
  {
    $this->starred = $starred;
  }
  /**
   * @return bool
   */
  public function getStarred()
  {
    return $this->starred;
  }
  /**
   * @param string
   */
  public function setTeamDriveId($teamDriveId)
  {
    $this->teamDriveId = $teamDriveId;
  }
  /**
   * @return string
   */
  public function getTeamDriveId()
  {
    return $this->teamDriveId;
  }
  /**
   * @param string
   */
  public function setThumbnailLink($thumbnailLink)
  {
    $this->thumbnailLink = $thumbnailLink;
  }
  /**
   * @return string
   */
  public function getThumbnailLink()
  {
    return $this->thumbnailLink;
  }
  /**
   * @param string
   */
  public function setThumbnailVersion($thumbnailVersion)
  {
    $this->thumbnailVersion = $thumbnailVersion;
  }
  /**
   * @return string
   */
  public function getThumbnailVersion()
  {
    return $this->thumbnailVersion;
  }
  /**
   * @param bool
   */
  public function setTrashed($trashed)
  {
    $this->trashed = $trashed;
  }
  /**
   * @return bool
   */
  public function getTrashed()
  {
    return $this->trashed;
  }
  /**
   * @param string
   */
  public function setTrashedTime($trashedTime)
  {
    $this->trashedTime = $trashedTime;
  }
  /**
   * @return string
   */
  public function getTrashedTime()
  {
    return $this->trashedTime;
  }
  /**
   * @param User
   */
  public function setTrashingUser(User $trashingUser)
  {
    $this->trashingUser = $trashingUser;
  }
  /**
   * @return User
   */
  public function getTrashingUser()
  {
    return $this->trashingUser;
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
  /**
   * @param DriveFileVideoMediaMetadata
   */
  public function setVideoMediaMetadata(DriveFileVideoMediaMetadata $videoMediaMetadata)
  {
    $this->videoMediaMetadata = $videoMediaMetadata;
  }
  /**
   * @return DriveFileVideoMediaMetadata
   */
  public function getVideoMediaMetadata()
  {
    return $this->videoMediaMetadata;
  }
  /**
   * @param bool
   */
  public function setViewedByMe($viewedByMe)
  {
    $this->viewedByMe = $viewedByMe;
  }
  /**
   * @return bool
   */
  public function getViewedByMe()
  {
    return $this->viewedByMe;
  }
  /**
   * @param string
   */
  public function setViewedByMeTime($viewedByMeTime)
  {
    $this->viewedByMeTime = $viewedByMeTime;
  }
  /**
   * @return string
   */
  public function getViewedByMeTime()
  {
    return $this->viewedByMeTime;
  }
  /**
   * @param bool
   */
  public function setViewersCanCopyContent($viewersCanCopyContent)
  {
    $this->viewersCanCopyContent = $viewersCanCopyContent;
  }
  /**
   * @return bool
   */
  public function getViewersCanCopyContent()
  {
    return $this->viewersCanCopyContent;
  }
  /**
   * @param string
   */
  public function setWebContentLink($webContentLink)
  {
    $this->webContentLink = $webContentLink;
  }
  /**
   * @return string
   */
  public function getWebContentLink()
  {
    return $this->webContentLink;
  }
  /**
   * @param string
   */
  public function setWebViewLink($webViewLink)
  {
    $this->webViewLink = $webViewLink;
  }
  /**
   * @return string
   */
  public function getWebViewLink()
  {
    return $this->webViewLink;
  }
  /**
   * @param bool
   */
  public function setWritersCanShare($writersCanShare)
  {
    $this->writersCanShare = $writersCanShare;
  }
  /**
   * @return bool
   */
  public function getWritersCanShare()
  {
    return $this->writersCanShare;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveFile::class, 'Google_Service_Drive_DriveFile');
