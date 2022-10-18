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

namespace Google\Service\DriveLabels\Resource;

use Google\Service\DriveLabels\GoogleAppsDriveLabelsV2Label;
use Google\Service\DriveLabels\GoogleAppsDriveLabelsV2ListLabelsResponse;

/**
 * The "labels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $drivelabelsService = new Google\Service\DriveLabels(...);
 *   $labels = $drivelabelsService->labels;
 *  </code>
 */
class Labels extends \Google\Service\Resource
{
  /**
   * Get a label by its resource name. Resource name may be any of: *
   * `labels/{id}` - See `labels/{id}@latest` * `labels/{id}@latest` - Gets the
   * latest revision of the label. * `labels/{id}@published` - Gets the current
   * published revision of the label. * `labels/{id}@{revision_id}` - Gets the
   * label at the specified revision ID. (labels.get)
   *
   * @param string $name Required. Label resource name. May be any of: *
   * `labels/{id}` (equivalent to labels/{id}@latest) * `labels/{id}@latest` *
   * `labels/{id}@published` * `labels/{id}@{revision_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The BCP-47 language code to use for evaluating
   * localized field labels. When not specified, values in the default configured
   * language are used.
   * @opt_param bool useAdminAccess Set to `true` in order to use the user's admin
   * credentials. The server verifies that the user is an admin for the label
   * before allowing access.
   * @opt_param string view When specified, only certain fields belonging to the
   * indicated view are returned.
   * @return GoogleAppsDriveLabelsV2Label
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleAppsDriveLabelsV2Label::class);
  }
  /**
   * List labels. (labels.listLabels)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The BCP-47 language code to use for evaluating
   * localized field labels. When not specified, values in the default configured
   * language are used.
   * @opt_param string minimumRole Specifies the level of access the user must
   * have on the returned Labels. The minimum role a user must have on a label.
   * Defaults to `READER`.
   * @opt_param int pageSize Maximum number of labels to return per page. Default:
   * 50. Max: 200.
   * @opt_param string pageToken The token of the page to return.
   * @opt_param bool publishedOnly Whether to include only published labels in the
   * results. * When `true`, only the current published label revisions are
   * returned. Disabled labels are included. Returned label resource names
   * reference the published revision (`labels/{id}/{revision_id}`). * When
   * `false`, the current label revisions are returned, which might not be
   * published. Returned label resource names don't reference a specific revision
   * (`labels/{id}`).
   * @opt_param bool useAdminAccess Set to `true` in order to use the user's admin
   * credentials. This will return all Labels within the customer.
   * @opt_param string view When specified, only certain fields belonging to the
   * indicated view are returned.
   * @return GoogleAppsDriveLabelsV2ListLabelsResponse
   */
  public function listLabels($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAppsDriveLabelsV2ListLabelsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Labels::class, 'Google_Service_DriveLabels_Resource_Labels');
