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
  public $appProperties;
  protected $capabilitiesType = DriveFileCapabilities::class;
  protected $capabilitiesDataType = '';
  protected $contentHintsType = DriveFileContentHints::class;
  protected $contentHintsDataType = '';
  protected $contentRestrictionsType = ContentRestriction::class;
  protected $contentRestrictionsDataType = 'array';
  public $copyRequiresWriterPermission;
  public $createdTime;
  public $description;
  public $driveId;
  public $explicitlyTrashed;
  public $exportLinks;
  public $fileExtension;
  public $folderColorRgb;
  public $fullFileExtension;
  public $hasAugmentedPermissions;
  public $hasThumbnail;
  public $headRevisionId;
  public $iconLink;
  public $id;
  protected $imageMediaMetadataType = DriveFileImageMediaMetadata::class;
  protected $imageMediaMetadataDataType = '';
  public $isAppAuthorized;
  public $kind;
  protected $lastModifyingUserType = User::class;
  protected $lastModifyingUserDataType = '';
  protected $linkShareMetadataType = DriveFileLinkShareMetadata::class;
  protected $linkShareMetadataDataType = '';
  public $md5Checksum;
  public $mimeType;
  public $modifiedByMe;
  public $modifiedByMeTime;
  public $modifiedTime;
  public $name;
  public $originalFilename;
  public $ownedByMe;
  protected $ownersType = User::class;
  protected $ownersDataType = 'array';
  public $parents;
  public $permissionIds;
  protected $permissionsType = Permission::class;
  protected $permissionsDataType = 'array';
  public $properties;
  public $quotaBytesUsed;
  public $resourceKey;
  public $shared;
  public $sharedWithMeTime;
  protected $sharingUserType = User::class;
  protected $sharingUserDataType = '';
  protected $shortcutDetailsType = DriveFileShortcutDetails::class;
  protected $shortcutDetailsDataType = '';
  public $size;
  public $spaces;
  public $starred;
  public $teamDriveId;
  public $thumbnailLink;
  public $thumbnailVersion;
  public $trashed;
  public $trashedTime;
  protected $trashingUserType = User::class;
  protected $trashingUserDataType = '';
  public $version;
  protected $videoMediaMetadataType = DriveFileVideoMediaMetadata::class;
  protected $videoMediaMetadataDataType = '';
  public $viewedByMe;
  public $viewedByMeTime;
  public $viewersCanCopyContent;
  public $webContentLink;
  public $webViewLink;
  public $writersCanShare;

  public function setAppProperties($appProperties)
  {
    $this->appProperties = $appProperties;
  }
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
  public function setCopyRequiresWriterPermission($copyRequiresWriterPermission)
  {
    $this->copyRequiresWriterPermission = $copyRequiresWriterPermission;
  }
  public function getCopyRequiresWriterPermission()
  {
    return $this->copyRequiresWriterPermission;
  }
  public function setCreatedTime($createdTime)
  {
    $this->createdTime = $createdTime;
  }
  public function getCreatedTime()
  {
    return $this->createdTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDriveId($driveId)
  {
    $this->driveId = $driveId;
  }
  public function getDriveId()
  {
    return $this->driveId;
  }
  public function setExplicitlyTrashed($explicitlyTrashed)
  {
    $this->explicitlyTrashed = $explicitlyTrashed;
  }
  public function getExplicitlyTrashed()
  {
    return $this->explicitlyTrashed;
  }
  public function setExportLinks($exportLinks)
  {
    $this->exportLinks = $exportLinks;
  }
  public function getExportLinks()
  {
    return $this->exportLinks;
  }
  public function setFileExtension($fileExtension)
  {
    $this->fileExtension = $fileExtension;
  }
  public function getFileExtension()
  {
    return $this->fileExtension;
  }
  public function setFolderColorRgb($folderColorRgb)
  {
    $this->folderColorRgb = $folderColorRgb;
  }
  public function getFolderColorRgb()
  {
    return $this->folderColorRgb;
  }
  public function setFullFileExtension($fullFileExtension)
  {
    $this->fullFileExtension = $fullFileExtension;
  }
  public function getFullFileExtension()
  {
    return $this->fullFileExtension;
  }
  public function setHasAugmentedPermissions($hasAugmentedPermissions)
  {
    $this->hasAugmentedPermissions = $hasAugmentedPermissions;
  }
  public function getHasAugmentedPermissions()
  {
    return $this->hasAugmentedPermissions;
  }
  public function setHasThumbnail($hasThumbnail)
  {
    $this->hasThumbnail = $hasThumbnail;
  }
  public function getHasThumbnail()
  {
    return $this->hasThumbnail;
  }
  public function setHeadRevisionId($headRevisionId)
  {
    $this->headRevisionId = $headRevisionId;
  }
  public function getHeadRevisionId()
  {
    return $this->headRevisionId;
  }
  public function setIconLink($iconLink)
  {
    $this->iconLink = $iconLink;
  }
  public function getIconLink()
  {
    return $this->iconLink;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
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
  public function setIsAppAuthorized($isAppAuthorized)
  {
    $this->isAppAuthorized = $isAppAuthorized;
  }
  public function getIsAppAuthorized()
  {
    return $this->isAppAuthorized;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
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
  public function setMd5Checksum($md5Checksum)
  {
    $this->md5Checksum = $md5Checksum;
  }
  public function getMd5Checksum()
  {
    return $this->md5Checksum;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setModifiedByMe($modifiedByMe)
  {
    $this->modifiedByMe = $modifiedByMe;
  }
  public function getModifiedByMe()
  {
    return $this->modifiedByMe;
  }
  public function setModifiedByMeTime($modifiedByMeTime)
  {
    $this->modifiedByMeTime = $modifiedByMeTime;
  }
  public function getModifiedByMeTime()
  {
    return $this->modifiedByMeTime;
  }
  public function setModifiedTime($modifiedTime)
  {
    $this->modifiedTime = $modifiedTime;
  }
  public function getModifiedTime()
  {
    return $this->modifiedTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOriginalFilename($originalFilename)
  {
    $this->originalFilename = $originalFilename;
  }
  public function getOriginalFilename()
  {
    return $this->originalFilename;
  }
  public function setOwnedByMe($ownedByMe)
  {
    $this->ownedByMe = $ownedByMe;
  }
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
  public function setParents($parents)
  {
    $this->parents = $parents;
  }
  public function getParents()
  {
    return $this->parents;
  }
  public function setPermissionIds($permissionIds)
  {
    $this->permissionIds = $permissionIds;
  }
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
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setQuotaBytesUsed($quotaBytesUsed)
  {
    $this->quotaBytesUsed = $quotaBytesUsed;
  }
  public function getQuotaBytesUsed()
  {
    return $this->quotaBytesUsed;
  }
  public function setResourceKey($resourceKey)
  {
    $this->resourceKey = $resourceKey;
  }
  public function getResourceKey()
  {
    return $this->resourceKey;
  }
  public function setShared($shared)
  {
    $this->shared = $shared;
  }
  public function getShared()
  {
    return $this->shared;
  }
  public function setSharedWithMeTime($sharedWithMeTime)
  {
    $this->sharedWithMeTime = $sharedWithMeTime;
  }
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
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setSpaces($spaces)
  {
    $this->spaces = $spaces;
  }
  public function getSpaces()
  {
    return $this->spaces;
  }
  public function setStarred($starred)
  {
    $this->starred = $starred;
  }
  public function getStarred()
  {
    return $this->starred;
  }
  public function setTeamDriveId($teamDriveId)
  {
    $this->teamDriveId = $teamDriveId;
  }
  public function getTeamDriveId()
  {
    return $this->teamDriveId;
  }
  public function setThumbnailLink($thumbnailLink)
  {
    $this->thumbnailLink = $thumbnailLink;
  }
  public function getThumbnailLink()
  {
    return $this->thumbnailLink;
  }
  public function setThumbnailVersion($thumbnailVersion)
  {
    $this->thumbnailVersion = $thumbnailVersion;
  }
  public function getThumbnailVersion()
  {
    return $this->thumbnailVersion;
  }
  public function setTrashed($trashed)
  {
    $this->trashed = $trashed;
  }
  public function getTrashed()
  {
    return $this->trashed;
  }
  public function setTrashedTime($trashedTime)
  {
    $this->trashedTime = $trashedTime;
  }
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
  public function setVersion($version)
  {
    $this->version = $version;
  }
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
  public function setViewedByMe($viewedByMe)
  {
    $this->viewedByMe = $viewedByMe;
  }
  public function getViewedByMe()
  {
    return $this->viewedByMe;
  }
  public function setViewedByMeTime($viewedByMeTime)
  {
    $this->viewedByMeTime = $viewedByMeTime;
  }
  public function getViewedByMeTime()
  {
    return $this->viewedByMeTime;
  }
  public function setViewersCanCopyContent($viewersCanCopyContent)
  {
    $this->viewersCanCopyContent = $viewersCanCopyContent;
  }
  public function getViewersCanCopyContent()
  {
    return $this->viewersCanCopyContent;
  }
  public function setWebContentLink($webContentLink)
  {
    $this->webContentLink = $webContentLink;
  }
  public function getWebContentLink()
  {
    return $this->webContentLink;
  }
  public function setWebViewLink($webViewLink)
  {
    $this->webViewLink = $webViewLink;
  }
  public function getWebViewLink()
  {
    return $this->webViewLink;
  }
  public function setWritersCanShare($writersCanShare)
  {
    $this->writersCanShare = $writersCanShare;
  }
  public function getWritersCanShare()
  {
    return $this->writersCanShare;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveFile::class, 'Google_Service_Drive_DriveFile');
