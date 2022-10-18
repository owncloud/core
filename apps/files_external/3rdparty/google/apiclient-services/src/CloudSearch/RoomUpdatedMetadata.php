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

class RoomUpdatedMetadata extends \Google\Model
{
  protected $groupDetailsMetadataType = GroupDetailsUpdatedMetadata::class;
  protected $groupDetailsMetadataDataType = '';
  /**
   * @var bool
   */
  public $groupLinkSharingEnabled;
  protected $initiatorDataType = '';
  /**
   * @var string
   */
  public $initiatorType;
  /**
   * @var string
   */
  public $name;
  protected $renameMetadataType = RoomRenameMetadata::class;
  protected $renameMetadataDataType = '';
  protected $visibilityType = AppsDynamiteSharedGroupVisibility::class;
  protected $visibilityDataType = '';

  /**
   * @param GroupDetailsUpdatedMetadata
   */
  public function setGroupDetailsMetadata(GroupDetailsUpdatedMetadata $groupDetailsMetadata)
  {
    $this->groupDetailsMetadata = $groupDetailsMetadata;
  }
  /**
   * @return GroupDetailsUpdatedMetadata
   */
  public function getGroupDetailsMetadata()
  {
    return $this->groupDetailsMetadata;
  }
  /**
   * @param bool
   */
  public function setGroupLinkSharingEnabled($groupLinkSharingEnabled)
  {
    $this->groupLinkSharingEnabled = $groupLinkSharingEnabled;
  }
  /**
   * @return bool
   */
  public function getGroupLinkSharingEnabled()
  {
    return $this->groupLinkSharingEnabled;
  }
  /**
   * @param User
   */
  public function setInitiator(User $initiator)
  {
    $this->initiator = $initiator;
  }
  /**
   * @return User
   */
  public function getInitiator()
  {
    return $this->initiator;
  }
  /**
   * @param string
   */
  public function setInitiatorType($initiatorType)
  {
    $this->initiatorType = $initiatorType;
  }
  /**
   * @return string
   */
  public function getInitiatorType()
  {
    return $this->initiatorType;
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
   * @param RoomRenameMetadata
   */
  public function setRenameMetadata(RoomRenameMetadata $renameMetadata)
  {
    $this->renameMetadata = $renameMetadata;
  }
  /**
   * @return RoomRenameMetadata
   */
  public function getRenameMetadata()
  {
    return $this->renameMetadata;
  }
  /**
   * @param AppsDynamiteSharedGroupVisibility
   */
  public function setVisibility(AppsDynamiteSharedGroupVisibility $visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return AppsDynamiteSharedGroupVisibility
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RoomUpdatedMetadata::class, 'Google_Service_CloudSearch_RoomUpdatedMetadata');
