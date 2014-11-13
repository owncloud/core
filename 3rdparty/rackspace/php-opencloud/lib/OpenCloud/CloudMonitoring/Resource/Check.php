<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\CloudMonitoring\Exception;

/**
 * Check class.
 */
class Check extends AbstractResource
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string|CheckType The type of check.
     */
    private $type;

    /**
     * @var array Details specific to the check type.
     */
    private $details;

    /**
     * @var bool Disables the check.
     */
    private $disabled;

    /**
     * @var string A friendly label for a check.
     */
    private $label;

    /**
     * @var int The period in seconds for a check. The value must be greater than the minimum period set on your account.
     */
    private $period;

    /**
     * @var int The timeout in seconds for a check. This has to be less than the period.
     */
    private $timeout;

    /**
     * For remote checks only. List of monitoring zones to poll from. Note: This argument is only required for remote
     * (non-agent) checks.
     *
     * @var array
     */
    private $monitoring_zones_poll;

    /**
     * For remote checks only. A key in the entity's 'ip_addresses' hash used to resolve this check to an IP address.
     * This parameter is mutually exclusive with target_hostname.
     *
     * @var string
     */
    private $target_alias;

    /**
     * For remote checks only. The hostname this check should target. This parameter is mutually exclusive with target_alias.
     *
     * @var string
     */
    private $target_hostname;

    /**
     * For remote checks only. Determines how to resolve the check target.
     * @var string
     */
    private $target_resolver;

    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'checks';

    protected static $emptyObject = array(
        'type',
        'details',
        'disabled',
        'label',
        'period',
        'timeout',
        'monitoring_zones_poll',
        'target_alias',
        'target_hostname',
        'target_resolver'
    );

    protected static $requiredKeys = array('type');
    
    protected $associatedResources = array('CheckType' => 'CheckType');

    protected $dataPointParams = array(
        'from',
        'to',
        'points',
        'resolution',
        'select'
    );

    public function testUrl($debug = false)
    {
        $params = array();
        if ($debug === true) {
            $params['debug'] = 'true';
        }
        return $this->getParent()->url('test-check', $params); 
    }

    public function testExistingUrl($debug = false)
    {
        return $this->getUrl()->addPath('test');
    }

    public function getMetrics()
    {
        return $this->getService()->resourceList('Metric', null, $this);
    }

    public function getMetric($info = null)
    {
        return $this->getService()->resource('Metric', $info, $this);
    }

    /**
     * Fetch particular data points.
     *
     * @param string $metricName
     * @param array  $options
     * @return mixed
     * @throws \OpenCloud\CloudMonitoring\Exception\MetricException
     */
    public function fetchDataPoints($metricName, array $options = array())
    {
        $metric = $this->getService()->resource('Metric', null, $this);

        $url = clone $metric->getUrl();
        $url->addPath($metricName)->addPath('plot');

        $parts = array();

        // Timestamps
        foreach (array('to', 'from', 'points') as $param) {
            if (isset($options[$param])) {
                $parts[$param] = $options[$param];
            }
        }

        if (!isset($parts['to'])) {
            throw new Exception\MetricException(sprintf(
                'Please specify a "to" value'
            ));
        }

        if (!isset($parts['from'])) {
            throw new Exception\MetricException(sprintf(
                'Please specify a "from" value'
            ));
        }

        if (isset($options['resolution'])) {
            $allowedResolutions = array('FULL', 'MIN5', 'MIN20', 'MIN60', 'MIN240', 'MIN1440');
            if (!in_array($options['resolution'], $allowedResolutions)) {
                throw new Exception\MetricException(sprintf(
                    '%s is an invalid resolution type. Please use one of the following: %s',
                    $options['resolution'],
                    implode(', ', $allowedResolutions)
                ));
            }
            $parts['resolution'] = $options['resolution'];
        }

        if (isset($options['select'])) {
            $allowedStats = array('average', 'variance', 'min', 'max');
            if (!in_array($options['select'], $allowedStats)) {
                throw new Exception\MetricException(sprintf(
                    '%s is an invalid stat type. Please use one of the following: %s',
                    $options['select'],
                    implode(', ', $allowedStats)
                ));
            }
            $parts['select'] = $options['select'];
        }

        if (!isset($parts['points']) && !isset($parts['resolution'])) {
            throw new Exception\MetricException(sprintf(
                'Please specify at least one point or resolution value'
            ));
        }

        $url->setQuery($parts);

        return $this->getService()->resourceList('Metric', $url, $this);
    }

}