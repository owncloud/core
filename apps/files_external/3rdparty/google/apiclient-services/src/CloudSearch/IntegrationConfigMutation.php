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

class IntegrationConfigMutation extends \Google\Model
{
  protected $addAppType = AppId::class;
  protected $addAppDataType = '';
  protected $addPinnedItemType = PinnedItemId::class;
  protected $addPinnedItemDataType = '';
  protected $removeAppType = AppId::class;
  protected $removeAppDataType = '';
  protected $removePinnedItemType = PinnedItemId::class;
  protected $removePinnedItemDataType = '';

  /**
   * @param AppId
   */
  public function setAddApp(AppId $addApp)
  {
    $this->addApp = $addApp;
  }
  /**
   * @return AppId
   */
  public function getAddApp()
  {
    return $this->addApp;
  }
  /**
   * @param PinnedItemId
   */
  public function setAddPinnedItem(PinnedItemId $addPinnedItem)
  {
    $this->addPinnedItem = $addPinnedItem;
  }
  /**
   * @return PinnedItemId
   */
  public function getAddPinnedItem()
  {
    return $this->addPinnedItem;
  }
  /**
   * @param AppId
   */
  public function setRemoveApp(AppId $removeApp)
  {
    $this->removeApp = $removeApp;
  }
  /**
   * @return AppId
   */
  public function getRemoveApp()
  {
    return $this->removeApp;
  }
  /**
   * @param PinnedItemId
   */
  public function setRemovePinnedItem(PinnedItemId $removePinnedItem)
  {
    $this->removePinnedItem = $removePinnedItem;
  }
  /**
   * @return PinnedItemId
   */
  public function getRemovePinnedItem()
  {
    return $this->removePinnedItem;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IntegrationConfigMutation::class, 'Google_Service_CloudSearch_IntegrationConfigMutation');
