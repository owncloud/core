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

use Google\Service\Compute\AccessConfig;
use Google\Service\Compute\AttachedDisk;
use Google\Service\Compute\BulkInsertInstanceResource;
use Google\Service\Compute\DisplayDevice;
use Google\Service\Compute\GuestAttributes;
use Google\Service\Compute\Instance;
use Google\Service\Compute\InstanceAggregatedList;
use Google\Service\Compute\InstanceList;
use Google\Service\Compute\InstanceListReferrers;
use Google\Service\Compute\InstancesAddResourcePoliciesRequest;
use Google\Service\Compute\InstancesGetEffectiveFirewallsResponse;
use Google\Service\Compute\InstancesRemoveResourcePoliciesRequest;
use Google\Service\Compute\InstancesSetLabelsRequest;
use Google\Service\Compute\InstancesSetMachineResourcesRequest;
use Google\Service\Compute\InstancesSetMachineTypeRequest;
use Google\Service\Compute\InstancesSetMinCpuPlatformRequest;
use Google\Service\Compute\InstancesSetServiceAccountRequest;
use Google\Service\Compute\InstancesStartWithEncryptionKeyRequest;
use Google\Service\Compute\Metadata;
use Google\Service\Compute\NetworkInterface;
use Google\Service\Compute\Operation;
use Google\Service\Compute\Policy;
use Google\Service\Compute\Scheduling;
use Google\Service\Compute\Screenshot;
use Google\Service\Compute\SerialPortOutput;
use Google\Service\Compute\ShieldedInstanceConfig;
use Google\Service\Compute\ShieldedInstanceIdentity;
use Google\Service\Compute\ShieldedInstanceIntegrityPolicy;
use Google\Service\Compute\Tags;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;
use Google\Service\Compute\ZoneSetPolicyRequest;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $instances = $computeService->instances;
 *  </code>
 */
class Instances extends \Google\Service\Resource
{
  /**
   * Adds an access config to an instance's network interface.
   * (instances.addAccessConfig)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param string $networkInterface The name of the network interface to add to
   * this instance.
   * @param AccessConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function addAccessConfig($project, $zone, $instance, $networkInterface, AccessConfig $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'networkInterface' => $networkInterface, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addAccessConfig', [$params], Operation::class);
  }
  /**
   * Adds existing resource policies to an instance. You can only add one policy
   * right now which will be applied to this instance for scheduling live
   * migrations. (instances.addResourcePolicies)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param InstancesAddResourcePoliciesRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function addResourcePolicies($project, $zone, $instance, InstancesAddResourcePoliciesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addResourcePolicies', [$params], Operation::class);
  }
  /**
   * Retrieves an aggregated list of all of the instances in your project across
   * all regions and zones. The performance of this method degrades when a filter
   * is specified on a project that has a very large number of instances.
   * (instances.aggregatedList)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. Most Compute resources support two types of filter expressions:
   * expressions that support regular expressions and expressions that follow API
   * improvement proposal AIP-160. If you want to use AIP-160, your expression
   * must specify the field name, an operator, and the value that you want to use
   * for filtering. The value must be a string, a number, or a boolean. The
   * operator must be either `=`, `!=`, `>`, `<`, `<=`, `>=` or `:`. For example,
   * if you are filtering Compute Engine instances, you can exclude instances
   * named `example-instance` by specifying `name != example-instance`. The `:`
   * operator can be used with string fields to match substrings. For non-string
   * fields it is equivalent to the `=` operator. The `:*` comparison can be used
   * to test whether a key has been defined. For example, to find all objects with
   * `owner` label use: ``` labels.owner:* ``` You can also filter nested fields.
   * For example, you could specify `scheduling.automaticRestart = false` to
   * include instances only if they are not scheduled for automatic restarts. You
   * can use filtering on nested fields to filter based on resource labels. To
   * filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ``` If you want to use a
   * regular expression, use the `eq` (equal) or `ne` (not equal) operator against
   * a single un-parenthesized expression with or without quotes or against
   * multiple parenthesized expressions. Examples: `fieldname eq unquoted literal`
   * `fieldname eq 'single quoted literal'` `fieldname eq "double quoted literal"`
   * `(fieldname1 eq literal) (fieldname2 ne "literal")` The literal value is
   * interpreted as a regular expression using Google RE2 library syntax. The
   * literal value must match the entire field. For example, to filter for
   * instances that do not end with name "instance", you would use `name ne
   * .*instance`.
   * @opt_param bool includeAllScopes Indicates whether every visible scope for
   * each scope type (zone, region, global) should be included in the response.
   * For new resource types added after this field, the flag has no effect as new
   * resource types will always include every visible scope for each scope type in
   * response. For resource types which predate this field, if this flag is
   * omitted or false, only scopes of the scope types where the resource type is
   * expected to be found will be included.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name. You
   * can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first. Currently, only sorting by `name` or
   * `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is
   * false.
   * @return InstanceAggregatedList
   */
  public function aggregatedList($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', [$params], InstanceAggregatedList::class);
  }
  /**
   * Attaches an existing Disk resource to an instance. You must first create the
   * disk before you can attach it. It is not possible to create and attach a disk
   * at the same time. For more information, read Adding a persistent disk to your
   * instance. (instances.attachDisk)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param AttachedDisk $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool forceAttach Whether to force attach the regional disk even if
   * it's currently attached to another instance. If you try to force attach a
   * zonal disk to an instance, you will receive an error.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function attachDisk($project, $zone, $instance, AttachedDisk $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('attachDisk', [$params], Operation::class);
  }
  /**
   * Creates multiple instances. Count specifies the number of instances to
   * create. For more information, see About bulk creation of VMs.
   * (instances.bulkInsert)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param BulkInsertInstanceResource $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function bulkInsert($project, $zone, BulkInsertInstanceResource $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkInsert', [$params], Operation::class);
  }
  /**
   * Deletes the specified Instance resource. For more information, see Deleting
   * an instance. (instances.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Deletes an access config from an instance's network interface.
   * (instances.deleteAccessConfig)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param string $accessConfig The name of the access config to delete.
   * @param string $networkInterface The name of the network interface.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function deleteAccessConfig($project, $zone, $instance, $accessConfig, $networkInterface, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'accessConfig' => $accessConfig, 'networkInterface' => $networkInterface];
    $params = array_merge($params, $optParams);
    return $this->call('deleteAccessConfig', [$params], Operation::class);
  }
  /**
   * Detaches a disk from an instance. (instances.detachDisk)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Instance name for this request.
   * @param string $deviceName The device name of the disk to detach. Make a get()
   * request on the instance to view currently attached disks and device names.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function detachDisk($project, $zone, $instance, $deviceName, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'deviceName' => $deviceName];
    $params = array_merge($params, $optParams);
    return $this->call('detachDisk', [$params], Operation::class);
  }
  /**
   * Returns the specified Instance resource. Gets a list of available instances
   * by making a list() request. (instances.get)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to return.
   * @param array $optParams Optional parameters.
   * @return Instance
   */
  public function get($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Instance::class);
  }
  /**
   * Returns effective firewalls applied to an interface of the instance.
   * (instances.getEffectiveFirewalls)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param string $networkInterface The name of the network interface to get the
   * effective firewalls.
   * @param array $optParams Optional parameters.
   * @return InstancesGetEffectiveFirewallsResponse
   */
  public function getEffectiveFirewalls($project, $zone, $instance, $networkInterface, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'networkInterface' => $networkInterface];
    $params = array_merge($params, $optParams);
    return $this->call('getEffectiveFirewalls', [$params], InstancesGetEffectiveFirewallsResponse::class);
  }
  /**
   * Returns the specified guest attributes entry. (instances.getGuestAttributes)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string queryPath Specifies the guest attributes path to be
   * queried.
   * @opt_param string variableKey Specifies the key for the guest attributes
   * entry.
   * @return GuestAttributes
   */
  public function getGuestAttributes($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('getGuestAttributes', [$params], GuestAttributes::class);
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (instances.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Policy
   */
  public function getIamPolicy($project, $zone, $resource, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns the screenshot from the specified instance. (instances.getScreenshot)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param array $optParams Optional parameters.
   * @return Screenshot
   */
  public function getScreenshot($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('getScreenshot', [$params], Screenshot::class);
  }
  /**
   * Returns the last 1 MB of serial port output from the specified instance.
   * (instances.getSerialPortOutput)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int port Specifies which COM or serial port to retrieve data from.
   * @opt_param string start Specifies the starting byte position of the output to
   * return. To start with the first byte of output to the specified port, omit
   * this field or set it to `0`. If the output for that byte position is
   * available, this field matches the `start` parameter sent with the request. If
   * the amount of serial console output exceeds the size of the buffer (1 MB),
   * the oldest output is discarded and is no longer available. If the requested
   * start position refers to discarded output, the start position is adjusted to
   * the oldest output still available, and the adjusted start position is
   * returned as the `start` property value. You can also provide a negative start
   * position, which translates to the most recent number of bytes written to the
   * serial port. For example, -3 is interpreted as the most recent 3 bytes
   * written to the serial console.
   * @return SerialPortOutput
   */
  public function getSerialPortOutput($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('getSerialPortOutput', [$params], SerialPortOutput::class);
  }
  /**
   * Returns the Shielded Instance Identity of an instance
   * (instances.getShieldedInstanceIdentity)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name or id of the instance scoping this request.
   * @param array $optParams Optional parameters.
   * @return ShieldedInstanceIdentity
   */
  public function getShieldedInstanceIdentity($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('getShieldedInstanceIdentity', [$params], ShieldedInstanceIdentity::class);
  }
  /**
   * Creates an instance resource in the specified project using the data included
   * in the request. (instances.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @opt_param string sourceInstanceTemplate Specifies instance template to
   * create the instance. This field is optional. It can be a full or partial URL.
   * For example, the following are all valid URLs to an instance template: -
   * https://www.googleapis.com/compute/v1/projects/project
   * /global/instanceTemplates/instanceTemplate -
   * projects/project/global/instanceTemplates/instanceTemplate -
   * global/instanceTemplates/instanceTemplate
   * @opt_param string sourceMachineImage Specifies the machine image to use to
   * create the instance. This field is optional. It can be a full or partial URL.
   * For example, the following are all valid URLs to a machine image: -
   * https://www.googleapis.com/compute/v1/projects/project/global/global
   * /machineImages/machineImage -
   * projects/project/global/global/machineImages/machineImage -
   * global/machineImages/machineImage
   * @return Operation
   */
  public function insert($project, $zone, Instance $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves the list of instances contained within the specified zone.
   * (instances.listInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. Most Compute resources support two types of filter expressions:
   * expressions that support regular expressions and expressions that follow API
   * improvement proposal AIP-160. If you want to use AIP-160, your expression
   * must specify the field name, an operator, and the value that you want to use
   * for filtering. The value must be a string, a number, or a boolean. The
   * operator must be either `=`, `!=`, `>`, `<`, `<=`, `>=` or `:`. For example,
   * if you are filtering Compute Engine instances, you can exclude instances
   * named `example-instance` by specifying `name != example-instance`. The `:`
   * operator can be used with string fields to match substrings. For non-string
   * fields it is equivalent to the `=` operator. The `:*` comparison can be used
   * to test whether a key has been defined. For example, to find all objects with
   * `owner` label use: ``` labels.owner:* ``` You can also filter nested fields.
   * For example, you could specify `scheduling.automaticRestart = false` to
   * include instances only if they are not scheduled for automatic restarts. You
   * can use filtering on nested fields to filter based on resource labels. To
   * filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ``` If you want to use a
   * regular expression, use the `eq` (equal) or `ne` (not equal) operator against
   * a single un-parenthesized expression with or without quotes or against
   * multiple parenthesized expressions. Examples: `fieldname eq unquoted literal`
   * `fieldname eq 'single quoted literal'` `fieldname eq "double quoted literal"`
   * `(fieldname1 eq literal) (fieldname2 ne "literal")` The literal value is
   * interpreted as a regular expression using Google RE2 library syntax. The
   * literal value must match the entire field. For example, to filter for
   * instances that do not end with name "instance", you would use `name ne
   * .*instance`.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name. You
   * can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first. Currently, only sorting by `name` or
   * `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is
   * false.
   * @return InstanceList
   */
  public function listInstances($project, $zone, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], InstanceList::class);
  }
  /**
   * Retrieves a list of resources that refer to the VM instance specified in the
   * request. For example, if the VM instance is part of a managed or unmanaged
   * instance group, the referrers list includes the instance group. For more
   * information, read Viewing referrers to VM instances.
   * (instances.listReferrers)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the target instance scoping this request, or
   * '-' if the request should span over all instances in the container.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. Most Compute resources support two types of filter expressions:
   * expressions that support regular expressions and expressions that follow API
   * improvement proposal AIP-160. If you want to use AIP-160, your expression
   * must specify the field name, an operator, and the value that you want to use
   * for filtering. The value must be a string, a number, or a boolean. The
   * operator must be either `=`, `!=`, `>`, `<`, `<=`, `>=` or `:`. For example,
   * if you are filtering Compute Engine instances, you can exclude instances
   * named `example-instance` by specifying `name != example-instance`. The `:`
   * operator can be used with string fields to match substrings. For non-string
   * fields it is equivalent to the `=` operator. The `:*` comparison can be used
   * to test whether a key has been defined. For example, to find all objects with
   * `owner` label use: ``` labels.owner:* ``` You can also filter nested fields.
   * For example, you could specify `scheduling.automaticRestart = false` to
   * include instances only if they are not scheduled for automatic restarts. You
   * can use filtering on nested fields to filter based on resource labels. To
   * filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ``` If you want to use a
   * regular expression, use the `eq` (equal) or `ne` (not equal) operator against
   * a single un-parenthesized expression with or without quotes or against
   * multiple parenthesized expressions. Examples: `fieldname eq unquoted literal`
   * `fieldname eq 'single quoted literal'` `fieldname eq "double quoted literal"`
   * `(fieldname1 eq literal) (fieldname2 ne "literal")` The literal value is
   * interpreted as a regular expression using Google RE2 library syntax. The
   * literal value must match the entire field. For example, to filter for
   * instances that do not end with name "instance", you would use `name ne
   * .*instance`.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name. You
   * can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first. Currently, only sorting by `name` or
   * `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is
   * false.
   * @return InstanceListReferrers
   */
  public function listReferrers($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('listReferrers', [$params], InstanceListReferrers::class);
  }
  /**
   * Removes resource policies from an instance.
   * (instances.removeResourcePolicies)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param InstancesRemoveResourcePoliciesRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function removeResourcePolicies($project, $zone, $instance, InstancesRemoveResourcePoliciesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeResourcePolicies', [$params], Operation::class);
  }
  /**
   * Performs a reset on the instance. This is a hard reset. The VM does not do a
   * graceful shutdown. For more information, see Resetting an instance.
   * (instances.reset)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function reset($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params], Operation::class);
  }
  /**
   * Resumes an instance that was suspended using the instances().suspend method.
   * (instances.resume)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to resume.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function resume($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('resume', [$params], Operation::class);
  }
  /**
   * Sends diagnostic interrupt to the instance.
   * (instances.sendDiagnosticInterrupt)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param array $optParams Optional parameters.
   */
  public function sendDiagnosticInterrupt($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('sendDiagnosticInterrupt', [$params]);
  }
  /**
   * Sets deletion protection on the instance. (instances.setDeletionProtection)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool deletionProtection Whether the resource should be protected
   * against deletion.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setDeletionProtection($project, $zone, $resource, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('setDeletionProtection', [$params], Operation::class);
  }
  /**
   * Sets the auto-delete flag for a disk attached to an instance.
   * (instances.setDiskAutoDelete)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param bool $autoDelete Whether to auto-delete the disk when the instance is
   * deleted.
   * @param string $deviceName The device name of the disk to modify. Make a get()
   * request on the instance to view currently attached disks and device names.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setDiskAutoDelete($project, $zone, $instance, $autoDelete, $deviceName, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'autoDelete' => $autoDelete, 'deviceName' => $deviceName];
    $params = array_merge($params, $optParams);
    return $this->call('setDiskAutoDelete', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (instances.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param ZoneSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($project, $zone, $resource, ZoneSetPolicyRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Sets labels on an instance. To learn more about labels, read the Labeling
   * Resources documentation. (instances.setLabels)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param InstancesSetLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setLabels($project, $zone, $instance, InstancesSetLabelsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLabels', [$params], Operation::class);
  }
  /**
   * Changes the number and/or type of accelerator for a stopped instance to the
   * values specified in the request. (instances.setMachineResources)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param InstancesSetMachineResourcesRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setMachineResources($project, $zone, $instance, InstancesSetMachineResourcesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMachineResources', [$params], Operation::class);
  }
  /**
   * Changes the machine type for a stopped instance to the machine type specified
   * in the request. (instances.setMachineType)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param InstancesSetMachineTypeRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setMachineType($project, $zone, $instance, InstancesSetMachineTypeRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMachineType', [$params], Operation::class);
  }
  /**
   * Sets metadata for the specified instance to the data included in the request.
   * (instances.setMetadata)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param Metadata $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setMetadata($project, $zone, $instance, Metadata $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMetadata', [$params], Operation::class);
  }
  /**
   * Changes the minimum CPU platform that this instance should use. This method
   * can only be called on a stopped instance. For more information, read
   * Specifying a Minimum CPU Platform. (instances.setMinCpuPlatform)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param InstancesSetMinCpuPlatformRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setMinCpuPlatform($project, $zone, $instance, InstancesSetMinCpuPlatformRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMinCpuPlatform', [$params], Operation::class);
  }
  /**
   * Sets an instance's scheduling options. You can only call this method on a
   * stopped instance, that is, a VM instance that is in a `TERMINATED` state. See
   * Instance Life Cycle for more information on the possible instance states. For
   * more information about setting scheduling options for a VM, see Set VM host
   * maintenance policy. (instances.setScheduling)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Instance name for this request.
   * @param Scheduling $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setScheduling($project, $zone, $instance, Scheduling $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setScheduling', [$params], Operation::class);
  }
  /**
   * Sets the service account on the instance. For more information, read Changing
   * the service account and access scopes for an instance.
   * (instances.setServiceAccount)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to start.
   * @param InstancesSetServiceAccountRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setServiceAccount($project, $zone, $instance, InstancesSetServiceAccountRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setServiceAccount', [$params], Operation::class);
  }
  /**
   * Sets the Shielded Instance integrity policy for an instance. You can only use
   * this method on a running instance. This method supports PATCH semantics and
   * uses the JSON merge patch format and processing rules.
   * (instances.setShieldedInstanceIntegrityPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name or id of the instance scoping this request.
   * @param ShieldedInstanceIntegrityPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setShieldedInstanceIntegrityPolicy($project, $zone, $instance, ShieldedInstanceIntegrityPolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setShieldedInstanceIntegrityPolicy', [$params], Operation::class);
  }
  /**
   * Sets network tags for the specified instance to the data included in the
   * request. (instances.setTags)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param Tags $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function setTags($project, $zone, $instance, Tags $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setTags', [$params], Operation::class);
  }
  /**
   * Simulates a host maintenance event on a VM. For more information, see
   * Simulate a host maintenance event. (instances.simulateMaintenanceEvent)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function simulateMaintenanceEvent($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('simulateMaintenanceEvent', [$params], Operation::class);
  }
  /**
   * Starts an instance that was stopped using the instances().stop method. For
   * more information, see Restart an instance. (instances.start)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to start.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function start($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], Operation::class);
  }
  /**
   * Starts an instance that was stopped using the instances().stop method. For
   * more information, see Restart an instance. (instances.startWithEncryptionKey)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to start.
   * @param InstancesStartWithEncryptionKeyRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function startWithEncryptionKey($project, $zone, $instance, InstancesStartWithEncryptionKeyRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startWithEncryptionKey', [$params], Operation::class);
  }
  /**
   * Stops a running instance, shutting it down cleanly, and allows you to restart
   * the instance at a later time. Stopped instances do not incur VM usage charges
   * while they are stopped. However, resources that the VM is using, such as
   * persistent disks and static IP addresses, will continue to be charged until
   * they are deleted. For more information, see Stopping an instance.
   * (instances.stop)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to stop.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function stop($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], Operation::class);
  }
  /**
   * This method suspends a running instance, saving its state to persistent
   * storage, and allows you to resume the instance at a later time. Suspended
   * instances have no compute costs (cores or RAM), and incur only storage
   * charges for the saved VM memory and localSSD data. Any charged resources the
   * virtual machine was using, such as persistent disks and static IP addresses,
   * will continue to be charged while the instance is suspended. For more
   * information, see Suspending and resuming an instance. (instances.suspend)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to suspend.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function suspend($project, $zone, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('suspend', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (instances.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestPermissionsResponse
   */
  public function testIamPermissions($project, $zone, $resource, TestPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestPermissionsResponse::class);
  }
  /**
   * Updates an instance only if the necessary resources are available. This
   * method can update only a specific set of instance properties. See Updating a
   * running instance for a list of updatable instance properties.
   * (instances.update)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance resource to update.
   * @param Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string minimalAction Specifies the action to take when updating an
   * instance even if the updated properties do not require it. If not specified,
   * then Compute Engine acts based on the minimum action that the updated
   * properties require.
   * @opt_param string mostDisruptiveAllowedAction Specifies the most disruptive
   * action that can be taken on the instance as part of the update. Compute
   * Engine returns an error if the instance properties require a more disruptive
   * action as part of the instance update. Valid options from lowest to highest
   * are NO_EFFECT, REFRESH, and RESTART.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function update($project, $zone, $instance, Instance $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
  /**
   * Updates the specified access config from an instance's network interface with
   * the data included in the request. This method supports PATCH semantics and
   * uses the JSON merge patch format and processing rules.
   * (instances.updateAccessConfig)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param string $networkInterface The name of the network interface where the
   * access config is attached.
   * @param AccessConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function updateAccessConfig($project, $zone, $instance, $networkInterface, AccessConfig $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'networkInterface' => $networkInterface, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateAccessConfig', [$params], Operation::class);
  }
  /**
   * Updates the Display config for a VM instance. You can only use this method on
   * a stopped VM instance. This method supports PATCH semantics and uses the JSON
   * merge patch format and processing rules. (instances.updateDisplayDevice)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name of the instance scoping this request.
   * @param DisplayDevice $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function updateDisplayDevice($project, $zone, $instance, DisplayDevice $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateDisplayDevice', [$params], Operation::class);
  }
  /**
   * Updates an instance's network interface. This method can only update an
   * interface's alias IP range and attached network. See Modifying alias IP
   * ranges for an existing instance for instructions on changing alias IP ranges.
   * See Migrating a VM between networks for instructions on migrating an
   * interface. This method follows PATCH semantics.
   * (instances.updateNetworkInterface)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance The instance name for this request.
   * @param string $networkInterface The name of the network interface to update.
   * @param NetworkInterface $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function updateNetworkInterface($project, $zone, $instance, $networkInterface, NetworkInterface $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'networkInterface' => $networkInterface, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateNetworkInterface', [$params], Operation::class);
  }
  /**
   * Updates the Shielded Instance config for an instance. You can only use this
   * method on a stopped instance. This method supports PATCH semantics and uses
   * the JSON merge patch format and processing rules.
   * (instances.updateShieldedInstanceConfig)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $instance Name or id of the instance scoping this request.
   * @param ShieldedInstanceConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function updateShieldedInstanceConfig($project, $zone, $instance, ShieldedInstanceConfig $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateShieldedInstanceConfig', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instances::class, 'Google_Service_Compute_Resource_Instances');
