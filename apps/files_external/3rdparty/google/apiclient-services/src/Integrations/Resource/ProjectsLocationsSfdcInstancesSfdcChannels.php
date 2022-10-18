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

namespace Google\Service\Integrations\Resource;

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListSfdcChannelsResponse;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaSfdcChannel;
use Google\Service\Integrations\GoogleProtobufEmpty;

/**
 * The "sfdcChannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $sfdcChannels = $integrationsService->sfdcChannels;
 *  </code>
 */
class ProjectsLocationsSfdcInstancesSfdcChannels extends \Google\Service\Resource
{
  /**
   * Creates an sfdc channel record. Store the sfdc channel in Spanner. Returns
   * the sfdc channel. (sfdcChannels.create)
   *
   * @param string $parent Required. "projects/{project}/locations/{location}"
   * format.
   * @param GoogleCloudIntegrationsV1alphaSfdcChannel $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaSfdcChannel
   */
  public function create($parent, GoogleCloudIntegrationsV1alphaSfdcChannel $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudIntegrationsV1alphaSfdcChannel::class);
  }
  /**
   * Deletes an sfdc channel. (sfdcChannels.delete)
   *
   * @param string $name Required. The name that is associated with the
   * SfdcChannel.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets an sfdc channel. If the channel doesn't exist, Code.NOT_FOUND exception
   * will be thrown. (sfdcChannels.get)
   *
   * @param string $name Required. The name that is associated with the
   * SfdcChannel.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaSfdcChannel
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudIntegrationsV1alphaSfdcChannel::class);
  }
  /**
   * Lists all sfdc channels that match the filter. Restrict to sfdc channels
   * belonging to the current client only.
   * (sfdcChannels.listProjectsLocationsSfdcInstancesSfdcChannels)
   *
   * @param string $parent Required. The client, which owns this collection of
   * SfdcChannels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filtering as supported in
   * https://developers.google.com/authorized-buyers/apis/guides/v2/list-filters.
   * @opt_param int pageSize The size of entries in the response. If unspecified,
   * defaults to 100.
   * @opt_param string pageToken The token returned in the previous response.
   * @opt_param string readMask The mask which specifies fields that need to be
   * returned in the SfdcChannel's response.
   * @return GoogleCloudIntegrationsV1alphaListSfdcChannelsResponse
   */
  public function listProjectsLocationsSfdcInstancesSfdcChannels($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListSfdcChannelsResponse::class);
  }
  /**
   * Updates an sfdc channel. Updates the sfdc channel in spanner. Returns the
   * sfdc channel. (sfdcChannels.patch)
   *
   * @param string $name Resource name of the SFDC channel projects/{project}/loca
   * tions/{location}/sfdcInstances/{sfdc_instance}/sfdcChannels/{sfdc_channel}.
   * @param GoogleCloudIntegrationsV1alphaSfdcChannel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask specifying the fields in the above
   * SfdcChannel that have been modified and need to be updated.
   * @return GoogleCloudIntegrationsV1alphaSfdcChannel
   */
  public function patch($name, GoogleCloudIntegrationsV1alphaSfdcChannel $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudIntegrationsV1alphaSfdcChannel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSfdcInstancesSfdcChannels::class, 'Google_Service_Integrations_Resource_ProjectsLocationsSfdcInstancesSfdcChannels');
