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

namespace Google\Service\GamesConfiguration\Resource;

use Google\Service\GamesConfiguration\ImageConfiguration;

/**
 * The "imageConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesConfigurationService = new Google\Service\GamesConfiguration(...);
 *   $imageConfigurations = $gamesConfigurationService->imageConfigurations;
 *  </code>
 */
class ImageConfigurations extends \Google\Service\Resource
{
  /**
   * Uploads an image for a resource with the given ID and image type.
   * (imageConfigurations.upload)
   *
   * @param string $resourceId The ID of the resource used by this method.
   * @param string $imageType Selects which image in a resource for this method.
   * @param array $optParams Optional parameters.
   * @return ImageConfiguration
   */
  public function upload($resourceId, $imageType, $optParams = [])
  {
    $params = ['resourceId' => $resourceId, 'imageType' => $imageType];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], ImageConfiguration::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageConfigurations::class, 'Google_Service_GamesConfiguration_Resource_ImageConfigurations');
