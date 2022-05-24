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

namespace Google\Service\DLP\Resource;

use Google\Service\DLP\GooglePrivacyDlpV2RedactImageRequest;
use Google\Service\DLP\GooglePrivacyDlpV2RedactImageResponse;

/**
 * The "image" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google\Service\DLP(...);
 *   $image = $dlpService->image;
 *  </code>
 */
class ProjectsLocationsImage extends \Google\Service\Resource
{
  /**
   * Redacts potentially sensitive info from an image. This method has limits on
   * input size, processing time, and output size. See
   * https://cloud.google.com/dlp/docs/redacting-sensitive-data-images to learn
   * more. When no InfoTypes or CustomInfoTypes are specified in this request, the
   * system will automatically choose what detectors to run. By default this may
   * be all types, but may change over time as detectors are updated.
   * (image.redact)
   *
   * @param string $parent Parent resource name. The format of this value varies
   * depending on whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param GooglePrivacyDlpV2RedactImageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2RedactImageResponse
   */
  public function redact($parent, GooglePrivacyDlpV2RedactImageRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('redact', [$params], GooglePrivacyDlpV2RedactImageResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsImage::class, 'Google_Service_DLP_Resource_ProjectsLocationsImage');
