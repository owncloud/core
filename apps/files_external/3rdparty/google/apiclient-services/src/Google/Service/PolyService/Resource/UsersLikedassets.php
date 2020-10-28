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

/**
 * The "likedassets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $polyService = new Google_Service_PolyService(...);
 *   $likedassets = $polyService->likedassets;
 *  </code>
 */
class Google_Service_PolyService_Resource_UsersLikedassets extends Google_Service_Resource
{
  /**
   * Lists assets that the user has liked. Only the value 'me', representing the
   * currently-authenticated user, is supported. May include assets with an access
   * level of UNLISTED. (likedassets.listUsersLikedassets)
   *
   * @param string $name A valid user id. Currently, only the special value 'me',
   * representing the currently-authenticated user is supported. To use 'me', you
   * must pass an OAuth token with the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Specifies a continuation token from a previous
   * search whose results were split into multiple pages. To get the next page,
   * submit the same request specifying the value from next_page_token.
   * @opt_param string orderBy Specifies an ordering for assets. Acceptable values
   * are: `BEST`, `NEWEST`, `OLDEST`, 'LIKED_TIME'. Defaults to `LIKED_TIME`,
   * which ranks assets based on how recently they were liked.
   * @opt_param string format Return only assets with the matching format.
   * Acceptable values are: `BLOCKS`, `FBX`, `GLTF`, `GLTF2`, `OBJ`, `TILT`.
   * @opt_param int pageSize The maximum number of assets to be returned. This
   * value must be between `1` and `100`. Defaults to `20`.
   * @return Google_Service_PolyService_ListLikedAssetsResponse
   */
  public function listUsersLikedassets($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PolyService_ListLikedAssetsResponse");
  }
}
