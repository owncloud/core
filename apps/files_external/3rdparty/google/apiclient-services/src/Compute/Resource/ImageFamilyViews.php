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

namespace Google\Service\Compute\Resource;

use Google\Service\Compute\ImageFamilyView;

/**
 * The "imageFamilyViews" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $imageFamilyViews = $computeService->imageFamilyViews;
 *  </code>
 */
class ImageFamilyViews extends \Google\Service\Resource
{
  /**
   * Returns the latest image that is part of an image family, is not deprecated
   * and is rolled out in the specified zone. (imageFamilyViews.get)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $family Name of the image family to search for.
   * @param array $optParams Optional parameters.
   * @return ImageFamilyView
   */
  public function get($project, $zone, $family, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'family' => $family];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ImageFamilyView::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageFamilyViews::class, 'Google_Service_Compute_Resource_ImageFamilyViews');
