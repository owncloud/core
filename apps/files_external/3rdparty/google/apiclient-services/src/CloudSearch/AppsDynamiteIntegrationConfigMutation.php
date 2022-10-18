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

class AppsDynamiteIntegrationConfigMutation extends \Google\Model
{
  protected $addAppType = AppsDynamiteAppId::class;
  protected $addAppDataType = '';
  protected $addPinnedItemType = AppsDynamitePinnedItemId::class;
  protected $addPinnedItemDataType = '';
  protected $removeAppType = AppsDynamiteAppId::class;
  protected $removeAppDataType = '';
  protected $removePinnedItemType = AppsDynamitePinnedItemId::class;
  protected $removePinnedItemDataType = '';

  /**
   * @param AppsDynamiteAppId
   */
  public function setAddApp(AppsDynamiteAppId $addApp)
  {
    $this->addApp = $addApp;
  }
  /**
   * @return AppsDynamiteAppId
   */
  public function getAddApp()
  {
    return $this->addApp;
  }
  /**
   * @param AppsDynamitePinnedItemId
   */
  public function setAddPinnedItem(AppsDynamitePinnedItemId $addPinnedItem)
  {
    $this->addPinnedItem = $addPinnedItem;
  }
  /**
   * @return AppsDynamitePinnedItemId
   */
  public function getAddPinnedItem()
  {
    return $this->addPinnedItem;
  }
  /**
   * @param AppsDynamiteAppId
   */
  public function setRemoveApp(AppsDynamiteAppId $removeApp)
  {
    $this->removeApp = $removeApp;
  }
  /**
   * @return AppsDynamiteAppId
   */
  public function getRemoveApp()
  {
    return $this->removeApp;
  }
  /**
   * @param AppsDynamitePinnedItemId
   */
  public function setRemovePinnedItem(AppsDynamitePinnedItemId $removePinnedItem)
  {
    $this->removePinnedItem = $removePinnedItem;
  }
  /**
   * @return AppsDynamitePinnedItemId
   */
  public function getRemovePinnedItem()
  {
    return $this->removePinnedItem;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteIntegrationConfigMutation::class, 'Google_Service_CloudSearch_AppsDynamiteIntegrationConfigMutation');
