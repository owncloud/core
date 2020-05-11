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

class Google_Service_NetworkManagement_Step extends Google_Model
{
  protected $abortType = 'Google_Service_NetworkManagement_AbortInfo';
  protected $abortDataType = '';
  public $causesDrop;
  protected $deliverType = 'Google_Service_NetworkManagement_DeliverInfo';
  protected $deliverDataType = '';
  public $description;
  protected $dropType = 'Google_Service_NetworkManagement_DropInfo';
  protected $dropDataType = '';
  protected $endpointType = 'Google_Service_NetworkManagement_EndpointInfo';
  protected $endpointDataType = '';
  protected $firewallType = 'Google_Service_NetworkManagement_FirewallInfo';
  protected $firewallDataType = '';
  protected $forwardType = 'Google_Service_NetworkManagement_ForwardInfo';
  protected $forwardDataType = '';
  protected $forwardingRuleType = 'Google_Service_NetworkManagement_ForwardingRuleInfo';
  protected $forwardingRuleDataType = '';
  protected $instanceType = 'Google_Service_NetworkManagement_InstanceInfo';
  protected $instanceDataType = '';
  protected $loadBalancerType = 'Google_Service_NetworkManagement_LoadBalancerInfo';
  protected $loadBalancerDataType = '';
  protected $networkType = 'Google_Service_NetworkManagement_NetworkInfo';
  protected $networkDataType = '';
  public $projectId;
  protected $routeType = 'Google_Service_NetworkManagement_RouteInfo';
  protected $routeDataType = '';
  public $state;
  protected $vpnGatewayType = 'Google_Service_NetworkManagement_VpnGatewayInfo';
  protected $vpnGatewayDataType = '';
  protected $vpnTunnelType = 'Google_Service_NetworkManagement_VpnTunnelInfo';
  protected $vpnTunnelDataType = '';

  /**
   * @param Google_Service_NetworkManagement_AbortInfo
   */
  public function setAbort(Google_Service_NetworkManagement_AbortInfo $abort)
  {
    $this->abort = $abort;
  }
  /**
   * @return Google_Service_NetworkManagement_AbortInfo
   */
  public function getAbort()
  {
    return $this->abort;
  }
  public function setCausesDrop($causesDrop)
  {
    $this->causesDrop = $causesDrop;
  }
  public function getCausesDrop()
  {
    return $this->causesDrop;
  }
  /**
   * @param Google_Service_NetworkManagement_DeliverInfo
   */
  public function setDeliver(Google_Service_NetworkManagement_DeliverInfo $deliver)
  {
    $this->deliver = $deliver;
  }
  /**
   * @return Google_Service_NetworkManagement_DeliverInfo
   */
  public function getDeliver()
  {
    return $this->deliver;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_NetworkManagement_DropInfo
   */
  public function setDrop(Google_Service_NetworkManagement_DropInfo $drop)
  {
    $this->drop = $drop;
  }
  /**
   * @return Google_Service_NetworkManagement_DropInfo
   */
  public function getDrop()
  {
    return $this->drop;
  }
  /**
   * @param Google_Service_NetworkManagement_EndpointInfo
   */
  public function setEndpoint(Google_Service_NetworkManagement_EndpointInfo $endpoint)
  {
    $this->endpoint = $endpoint;
  }
  /**
   * @return Google_Service_NetworkManagement_EndpointInfo
   */
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  /**
   * @param Google_Service_NetworkManagement_FirewallInfo
   */
  public function setFirewall(Google_Service_NetworkManagement_FirewallInfo $firewall)
  {
    $this->firewall = $firewall;
  }
  /**
   * @return Google_Service_NetworkManagement_FirewallInfo
   */
  public function getFirewall()
  {
    return $this->firewall;
  }
  /**
   * @param Google_Service_NetworkManagement_ForwardInfo
   */
  public function setForward(Google_Service_NetworkManagement_ForwardInfo $forward)
  {
    $this->forward = $forward;
  }
  /**
   * @return Google_Service_NetworkManagement_ForwardInfo
   */
  public function getForward()
  {
    return $this->forward;
  }
  /**
   * @param Google_Service_NetworkManagement_ForwardingRuleInfo
   */
  public function setForwardingRule(Google_Service_NetworkManagement_ForwardingRuleInfo $forwardingRule)
  {
    $this->forwardingRule = $forwardingRule;
  }
  /**
   * @return Google_Service_NetworkManagement_ForwardingRuleInfo
   */
  public function getForwardingRule()
  {
    return $this->forwardingRule;
  }
  /**
   * @param Google_Service_NetworkManagement_InstanceInfo
   */
  public function setInstance(Google_Service_NetworkManagement_InstanceInfo $instance)
  {
    $this->instance = $instance;
  }
  /**
   * @return Google_Service_NetworkManagement_InstanceInfo
   */
  public function getInstance()
  {
    return $this->instance;
  }
  /**
   * @param Google_Service_NetworkManagement_LoadBalancerInfo
   */
  public function setLoadBalancer(Google_Service_NetworkManagement_LoadBalancerInfo $loadBalancer)
  {
    $this->loadBalancer = $loadBalancer;
  }
  /**
   * @return Google_Service_NetworkManagement_LoadBalancerInfo
   */
  public function getLoadBalancer()
  {
    return $this->loadBalancer;
  }
  /**
   * @param Google_Service_NetworkManagement_NetworkInfo
   */
  public function setNetwork(Google_Service_NetworkManagement_NetworkInfo $network)
  {
    $this->network = $network;
  }
  /**
   * @return Google_Service_NetworkManagement_NetworkInfo
   */
  public function getNetwork()
  {
    return $this->network;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Google_Service_NetworkManagement_RouteInfo
   */
  public function setRoute(Google_Service_NetworkManagement_RouteInfo $route)
  {
    $this->route = $route;
  }
  /**
   * @return Google_Service_NetworkManagement_RouteInfo
   */
  public function getRoute()
  {
    return $this->route;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Google_Service_NetworkManagement_VpnGatewayInfo
   */
  public function setVpnGateway(Google_Service_NetworkManagement_VpnGatewayInfo $vpnGateway)
  {
    $this->vpnGateway = $vpnGateway;
  }
  /**
   * @return Google_Service_NetworkManagement_VpnGatewayInfo
   */
  public function getVpnGateway()
  {
    return $this->vpnGateway;
  }
  /**
   * @param Google_Service_NetworkManagement_VpnTunnelInfo
   */
  public function setVpnTunnel(Google_Service_NetworkManagement_VpnTunnelInfo $vpnTunnel)
  {
    $this->vpnTunnel = $vpnTunnel;
  }
  /**
   * @return Google_Service_NetworkManagement_VpnTunnelInfo
   */
  public function getVpnTunnel()
  {
    return $this->vpnTunnel;
  }
}
